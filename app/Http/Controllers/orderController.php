<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Shippers;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Models\ProductVariations;
use App\Models\ProductShipping;
use App\Models\ProductServices;
use App\Models\LandingPage;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->query('sort_by', 'id');
        $direction = $request->query('direction', 'asc');
        $search = $request->query('search');

        $query = Orders::with([
            'product.category',
            'details.variation',
            'shipper',
            'courier.shipper',
            'product.classification',
            'product.customer_service',
            'product.insurances',
            'product.media',
            'service'
        ]);

        // Fitur pencarian
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%$search%")
                    ->orWhere('customer_name', 'like', "%$search%")
                    ->orWhere('tags', 'like', "%$search%");
            });
        }

        if ($sortBy === 'id' && in_array($direction, ['asc', 'desc'])) {
            $query->orderBy($sortBy, $direction);
        }

        $orders = $query->get(); // atau paginate()

        return view('admin.order.index', [
            'orders' => $orders,
            'sortBy' => $sortBy,
            'direction' => $direction,
            'search' => $search
        ]);
    }



    public function select_slug(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (isset($data['slug'])) {
                return redirect('/admin/order/create/' . $data['slug']);
            }
            return view('404');
        }
        $landing = LandingPage::with(['product.product_variations'])->get();
        return view('admin.order.select_slug', ['landing' => $landing]);
    }
    public function create(Request $request, $slug)
    {
        $landing = LandingPage::with(['product.product_variations', 'product.category', 'product.classification', 'product.customer_service', 'product.product_services', 'product.product_shipping.shipper'])->where('slug', $slug)->first();
        if ($landing) {
            $landing->update(['visitors' => $landing->visitors + 1]);
            return view('admin.order.create', ['landing' => $landing]);
        }
        return view('404');
    }
    public function detail(Request $request, $id)
    {
        $order = Orders::with(['product.customer_service', 'shipper', 'courier', 'details.variation'])->find($id);
        return view('admin.order.detail', ['order' => $order]);
    }
    public function edit(Request $request, $id)
    {
        $order = Orders::with(['product.customer_service', 'shipper', 'courier', 'details.variation', 'service'])->find($id);
        $products = Products::all();
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo json_encode($data);
            // return;
            $order->update([
                'payment_status' => $data['payment_status'],
                'orders_status' => $data['orders_status'],
                'customer_name' => $data['customer_name'],
                'customer_address_full' => $data['customer_address_full'],
                'customer_address_village' => $data['customer_address_village'],
                'customer_address_district' => $data['customer_address_district'],
                'customer_address_province' => $data['customer_address_province'],
                'customer_address_subdistrict' => $data['customer_address_subdistrict'],
            ]);
            return redirect('/admin/order/detail/' . $order->id);
        }
        return view('admin.order.edit', ['order' => $order, 'products' => $products]);
    }
    public function update() {}
    public function do_order(Request $request)
    {

        $order_data = $request->all();

        try {
            // processing the order data

            $order_id = '';
            do {
                $order_id = 'ord-' . date('Ymd') . '-' . strtoupper(Str::random(6));
            } while (Orders::where('id', $order_id)->exists());

            // getting total price
            $product_id = $order_data['order_data']['product_id'];
            $price_total = 0;
            foreach ($order_data['order_data']['cart'] as $item) {
                $variation = ProductVariations::find($item['variation_id']);
                if ($variation) {
                    $price_total += ($variation->price * $item['qty']);
                }
            }

            // getting product shipping
            $product_shipping = ProductShipping::find($order_data['shipping']);
            $price_total += $product_shipping->cost;

            // getting product services
            $product_service = ProductServices::find($order_data['service']);
            $price_total += $product_service->cost;

            // accumulating total price with unique payment code
            $payment_unique = random_int(100, 999);
            $price_total += $payment_unique;

            $order_ = [
                'id' => $order_id,
                'product_id' => $product_id,
                'total_price' => $price_total,
                'payment_method' => $order_data['payment_method'],
                'payment_data' => '-',
                'payment_unique' => $payment_unique,
                'shipper_id' => $product_shipping->shipper_id,
                'courier_id' => $product_shipping->courier_id,
                'shipping_cost' => $product_shipping->cost,
                'product_service_id' => $product_service->id,
                'tags' => 'Belum Selesai, Order Baru',
                'customer_name' => $order_data['customer_data']['name'],
                'customer_phone' => $order_data['customer_data']['phone'],
                'customer_address_province' => $order_data['customer_data']['address']['province'],
                'customer_address_district' => $order_data['customer_data']['address']['district'],
                'customer_address_subdistrict' => $order_data['customer_data']['address']['subdistrict'],
                'customer_address_village' => $order_data['customer_data']['address']['village'],
                'customer_address_full' => $order_data['customer_data']['address']['full'],
            ];

            Orders::create($order_);
            foreach ($order_data['order_data']['cart'] as $item) {
                OrderDetails::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'variation_id' => $item['variation_id'],
                    'qty' => $item['qty']
                ]);
            }

            return response()->json([
                'message' => 'Pesanan berhasil dibuat',
                'order_data' => $order_,
                'order_id' => $order_id
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Terjadi kesalahan server',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function order_details(Request $request, $order_id)
    {
        $order = Orders::with(['product', 'details.variation', 'shipper', 'courier'])->find($order_id);
        if ($order) {
            return view('orders.detail', ['order' => $order]);
        }
        return view('404');
    }
}
