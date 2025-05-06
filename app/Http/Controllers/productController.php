<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\ProductCategories;
use App\Models\ProductClassifications;
use App\Models\DeliveryCourier;
use App\Models\ProductServices;
use App\Models\CustomerService;
use App\Models\Products;
use App\Models\ProductMedia;
use App\Models\ProductShipping;
use App\Models\ProductVariations;
use App\Models\ProductInsurance;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        $search = $request->get('search', '');

        $products = Products::with(['media', 'order', 'product_shipping'])
            ->where('name', 'like', '%' . $search . '%')
            ->get()
            ->sortBy($sort, SORT_REGULAR, $direction === 'desc')
            ->values(); // Important to reset the keys!

        $result = collect();
        $totalGrossRevenue = 0;
        $totalShippingCost = 0;
        $totalNetRevenue = 0;
        $totalNetProfit = 0;

        foreach ($products as $product) {
            $grossRevenue = 0;
            $shippingCost = 0;
            $orderCount = count($product->order);
            $orderPaid = 0;

            foreach ($product->order as $order) {
                $grossRevenue += $order->total_price;
                $shippingCost += $order->shipping_cost;
                if ($order->payment_status === 'paid') {
                    $orderPaid += 1;
                }
            }

            $netRevenue = $grossRevenue - $shippingCost;
            $netProfit = $netRevenue - $product->hpp;

            $totalGrossRevenue += $grossRevenue;
            $totalShippingCost += $shippingCost;
            $totalNetRevenue += $netRevenue;
            $totalNetProfit += $netProfit;

            $result->push([
                'product_id' => $product->id,
                'name' => $product->name,
                'gross_revenue' => $grossRevenue,
                'shipping_cost' => $shippingCost,
                'net_revenue' => $netRevenue,
                'net_profit' => $netProfit,
                'order_count' => $orderCount,
                'order_paid' => $orderPaid,
                'paid_rasio' => $orderCount > 0 ? floor($orderPaid / $orderCount * 100) . '%' : '0%',
                'media' => $product->media,
                'code' => $product->code,
                'normal_price' => $product->normal_price,
                'hpp' => $product->hpp,
                'id' => $product->id
            ]);
        }

        // Manual pagination
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $paginatedResult = new LengthAwarePaginator(
            $result->slice(($currentPage - 1) * $perPage, $perPage)->values(),
            $result->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        // Kategori produk
        $mostProfitable = $result->sortByDesc('net_profit');
        $mostRequested = $result->sortByDesc('order_count');
        $mostSold = $result->sortByDesc('gross_revenue');

        return view('admin.product.index', [
            'all_products' => $paginatedResult,
            'sort' => $sort,
            'direction' => $direction,
            'search' => $search,
            'categories' => [
                'most_profitable' => $mostProfitable,
                'most_requested' => $mostRequested,
                'most_sold' => $mostSold,
            ],
            'totals' => [
                'total_gross_revenue' => $totalGrossRevenue,
                'total_shipping_cost' => $totalShippingCost,
                'total_net_revenue' => $totalNetRevenue,
                'total_net_profit' => $totalNetProfit,
            ],
        ]);
    }


    public function create(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();

            // saving the product data first
            $product = Products::create([
                'name' => $data['name'],
                'code' => $data['code'],
                'category_id' => $data['category_id'],
                'classification_id' => $data['classification_id'],
                'cs_id' => $data['cs_id'],
                'checkout_url' => $data['checkout_url'],
                'status' => $data['status'],
                'description' => $data['description'],
                'payment_transfer' => isset($data['payment_transfer']) && $data['payment_transfer'] === 'on' ? true : false,
                'payment_cod' => isset($data['payment_cod']) && $data['payment_cod'] === 'on' ? true : false,
                'payment_ewallet' => isset($data['payment_ewallet']) && $data['payment_ewallet'] === 'on' ? true : false,
                'payment_transfer_notes' => $data['payment_transfer_notes'] ?? '-',
                'payment_cod_notes' => $data['payment_cod_notes'] ?? '-',
                'payment_ewallet_notes' => $data['payment_ewallet_notes'] ?? '-',
                'normal_price' => $data['normal_price'] ?? '-',
                'hpp' => $data['hpp'] ?? 0,
                'variations' => 1,
                'stock' => 0,
                'region_province' => $data['region_province'] ?? '-',
                'region_district' => $data['region_district'] ?? '-',
                'region_subdistrict' => $data['region_subdistrict'] ?? '-'
            ]);

            // save the product media
            if ($request->hasFile('product_media')) {
                $file_name = $request->file('product_media')->store('uploads', 'public');
                ProductMedia::create(['url' => $file_name, 'product_id' => $product->id]);
            }

            // create the product shipping
            $courier = DeliveryCourier::with('shipper')->find($data['delivery_id']);
            ProductShipping::create([
                'product_id' => $product->id,
                'shipper_id' => $courier->shipper->id,
                'courier_id' => $courier->id,
                'cost' => $data['payment_cost']
            ]);

            // working on product variations
            if (!isset($data['variations'])) {
                $data['variations'] = [];
            }
            foreach ($data['variations'] as $item) {
                if (
                    isset($item['name']) &&
                    !empty($item['name']) &&
                    isset($item['description']) &&
                    !empty($item['description']) &&
                    isset($item['stock']) &&
                    !empty($item['stock']) &&
                    isset($item['price']) &&
                    !empty($item['price']) &&
                    isset($item['status']) &&
                    !empty($item['status'])
                ) {
                    ProductVariations::create([
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'price' => $item['price'],
                        'stock' => $item['stock'],
                        'status' => $item['status'],
                        'product_id' => $product->id
                    ]);
                }
            }

            if (!isset($data['services'])) {
                $data['services'] = [];
            }
            foreach ($data['services'] as $item) {
                if (
                    isset($item['name']) &&
                    !empty($item['name']) &&
                    isset($item['description']) &&
                    !empty($item['description'])
                ) {
                    ProductServices::create([
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'cost' => $item['price'],
                        'product_id' => $product->id
                    ]);
                }
            }

            if (!isset($data['insurance'])) {
                $data['insurance'] = [];
            }
            foreach ($data['insurance'] as $item) {
                if (
                    isset($item['name']) &&
                    !empty($item['name']) &&
                    isset($item['description']) &&
                    !empty($item['description'])
                ) {
                    ProductInsurance::create([
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'product_id' => $product->id
                    ]);
                }
            }
            return redirect('/admin/product/index');
        }
        $data = [
            'categories' => ProductCategories::all(),
            'classification' => ProductClassifications::all(),
            'delivery_couriers' => DeliveryCourier::with('shipper')->get(),
            'customer_services' => CustomerService::all()

        ];
        return view('admin.product.create', $data);
    }

    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            // saving the product data first
            $product = Products::find($id);
            $product->update([
                'name' => $data['name'],
                'code' => $data['code'],
                'category_id' => $data['category_id'],
                'classification_id' => $data['classification_id'],
                'cs_id' => $data['cs_id'],
                'checkout_url' => $data['checkout_url'],
                'status' => $data['status'],
                'description' => $data['description'],
                'payment_transfer' => isset($data['payment_transfer']) && $data['payment_transfer'] === 'on' ? true : false,
                'payment_cod' => isset($data['payment_cod']) && $data['payment_cod'] === 'on' ? true : false,
                'payment_ewallet' => isset($data['payment_ewallet']) && $data['payment_ewallet'] === 'on' ? true : false,
                'payment_transfer_notes' => $data['payment_transfer_notes'] ?? '-',
                'payment_cod_notes' => $data['payment_cod_notes'] ?? '-',
                'payment_ewallet_notes' => $data['payment_ewallet_notes'] ?? '-',
                'normal_price' => $data['normal_price'] ?? '-',
                'hpp' => $data['hpp'] ?? 0,
                'variations' => 1,
                'stock' => 0,
                'region_province' => $data['region_province'] ?? '-',
                'region_district' => $data['region_district'] ?? '-',
                'region_subdistrict' => $data['region_subdistrict'] ?? '-'
            ]);

            // save the product media
            if ($request->hasFile('product_media')) {
                // delete the last one
                ProductMedia::where('product_id', $product->id)->delete();
                // upload the new one
                $file_name = $request->file('product_media')->store('uploads', 'public');
                ProductMedia::create(['url' => $file_name, 'product_id' => $product->id]);
            }

            // create the product shipping
            $courier = DeliveryCourier::with('shipper')->find($data['delivery_id']);
            // delete the last one
            ProductShipping::where('product_id', $product->id)->delete();
            ProductShipping::create([
                'product_id' => $product->id,
                'shipper_id' => $courier->shipper->id,
                'courier_id' => $courier->id,
                'cost' => $data['payment_cost']
            ]);

            // working on product variations
            ProductVariations::where('product_id', $product->id)->delete();
            if (!isset($data['variations'])) {
                $data['variations'] = [];
            }
            foreach ($data['variations'] as $item) {
                if (
                    isset($item['name']) &&
                    !empty($item['name']) &&
                    isset($item['description']) &&
                    !empty($item['description']) &&
                    isset($item['stock']) &&
                    !empty($item['stock']) &&
                    isset($item['price']) &&
                    !empty($item['price']) &&
                    isset($item['status']) &&
                    !empty($item['status'])
                ) {
                    ProductVariations::create([
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'price' => $item['price'],
                        'stock' => $item['stock'],
                        'status' => $item['status'],
                        'product_id' => $product->id
                    ]);
                }
            }

            ProductServices::where('product_id', $product->id)->delete();
            if (!isset($data['services'])) {
                $data['services'] = [];
            }
            foreach ($data['services'] as $item) {
                if (
                    isset($item['name']) &&
                    !empty($item['name']) &&
                    isset($item['description']) &&
                    !empty($item['description'])
                ) {
                    ProductServices::create([
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'cost' => $item['price'],
                        'product_id' => $product->id
                    ]);
                }
            }

            ProductInsurance::where('product_id', $product->id)->delete();
            if (!isset($data['insurance'])) {
                $data['insurance'] = [];
            }
            foreach ($data['insurance'] as $item) {
                if (
                    isset($item['name']) &&
                    !empty($item['name']) &&
                    isset($item['description']) &&
                    !empty($item['description'])
                ) {
                    ProductInsurance::create([
                        'name' => $item['name'],
                        'description' => $item['description'],
                        'product_id' => $product->id
                    ]);
                }
            }
            return redirect('/admin/product/index');
        }
        $data = [
            'categories' => ProductCategories::all(),
            'classification' => ProductClassifications::all(),
            'delivery_couriers' => DeliveryCourier::with('shipper')->get(),
            'customer_services' => CustomerService::all()
        ];
        $product = Products::with([
            'media',
            'category',
            'classification',
            'customer_service',
            'product_variations',
            'product_shipping',
            'product_services',
            'insurances'
        ])->find($id);
        $data['product'] = $product;
        return view('admin.product.edit', $data);
    }

    public function show($id)
    {
        $product = Products::with(['media', 'order', 'product_shipping'])->findOrFail($id);

        $grossRevenue = 0;
        $shippingCost = 0;
        $orderCount = count($product['order']);
        $orderPaid = 0;

        // Hitung pendapatan dan biaya pengiriman
        foreach ($product['order'] as $order) {
            $grossRevenue += $order['total_price'];
            $shippingCost += $order['shipping_cost'];
            if ($order['payment_status'] === 'paid') {
                $orderPaid += 1;
            }
        }

        $netRevenue = $grossRevenue - $shippingCost;
        $netProfit = $netRevenue - $product['hpp'];

        return view('admin.product.detail', [
            'product' => $product,
            'grossRevenue' => $grossRevenue,
            'shippingCost' => $shippingCost,
            'netRevenue' => $netRevenue,
            'netProfit' => $netProfit,
            'orderCount' => $orderCount,
            'orderPaid' => $orderPaid,
        ]);
    }



    public function delete(Request $request, $id)
    {
        $product = Products::find($id);
        if ($product) {
            $product->delete();
        }
        return redirect('/admin/product/index');
    }
}
