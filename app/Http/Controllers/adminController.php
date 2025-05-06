<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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

class AdminController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // Memproses login
    public function login(Request $request)
    {
        // dd($request->all());  // Memeriksa data inputan
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Mencari admin berdasarkan username
        $admin = Admin::where('username', $request->username)->first();

        if (!$admin) {
            return back()->withErrors(['Invalid username or password']);
        }

        // Mengecek password dengan hash di database
        if (Hash::check($request->password, $admin->password)) {
            // Login user jika password cocok
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['Invalid username or password']);
        }
    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // pastikan kamu pakai guard 'admin' di auth.php
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    // Dashboard Admin (jika login berhasil)
    public function dashboard()
    {
        $products = Products::with(['media', 'order', 'product_shipping'])->get();

        $result = [];
        $totalGrossRevenue = 0;
        $totalShippingCost = 0;
        $totalNetRevenue = 0;
        $totalNetProfit = 0;

        foreach ($products as $product) {
            $grossRevenue = 0;
            $shippingCost = 0;
            $orderCount = count($product['order']);
            $orderPaid = 0;

            foreach ($product['order'] as $order) {
                $grossRevenue += $order['total_price'];
                $shippingCost += $order['shipping_cost'];
                if ($order['payment_status'] === 'paid') {
                    $orderPaid += 1;
                }
            }

            $netRevenue = $grossRevenue - $shippingCost;
            $netProfit = $netRevenue - $product['hpp'];

            // Akumulasi total semua produk
            $totalGrossRevenue += $grossRevenue;
            $totalShippingCost += $shippingCost;
            $totalNetRevenue += $netRevenue;
            $totalNetProfit += $netProfit;

            $result[] = [
                'product_id' => $product['id'],
                'name' => $product['name'],
                'gross_revenue' => $grossRevenue,
                'shipping_cost' => $shippingCost,
                'net_revenue' => $netRevenue,
                'net_profit' => $netProfit,
                'order_count' => $orderCount,
                'order_paid' => $orderPaid,
                'paid_rasio' => $orderCount > 0 ? strval(floor($orderPaid / $orderCount * 100)) . '%' : '0%',
                'media' => $product['media']
            ];
        }

        // Kategori produk
        $mostProfitable = collect($result)->sortByDesc('net_profit');
        $mostRequested = collect($result)->sortByDesc('order_count');
        $mostSold = collect($result)->sortByDesc('gross_revenue');

        $summary = [
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
            'all_products' => $result,
        ];

        return view('admin.dashboard', $summary);
    }
}
