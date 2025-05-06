@extends('admin.layouts.master')

@section('title', 'Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-template/assets/css/custom-dashboard.css') }}">
@endpush

@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start profile section -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <!-- Gambar Profil & Teks -->
                        <div class="d-flex align-items-center">
                            <!-- <img src="{{ asset('admin-template/assets/images/product/img-1.pngtar-1.jpg') }}" alt="Profile Picture" 
                                height="50" width="50"> -->

                                <div>
                                    @if (Auth::check())
                                        <h4 class="mb-2">Hello, {{ Auth::user()->name }}</h4>
                                        <p class="text-muted mb-0">Siap untuk kembali?</p>
                                    @else
                                        <h4 class="mb-2">Hello, Guest</h4>
                                        <p class="text-muted mb-0">Silakan login untuk melanjutkan</p>
                                    @endif
                                </div>
                        </div>

                        <!-- Tombol "+ Add New Jobs" di kanan -->
                        <div class="page-title-right">
                            <button class="btn btn-primary">
                                + Add New Jobs
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end profile section -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <!-- Gross Revenue -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-1">Gross Revenue</p>
                                            <h4 class="mb-0">Rp {{number_format($totals['total_gross_revenue'])}}</h4>
                                        </div>
                                        <!-- <div style="width: 100px; height: 55px;">
                                            <canvas id="chartGrossRevenue"></canvas>
                                        </div> -->
                                    </div>
                                    <!-- <hr class="my-2">
                                    <div style="border-top: 1px solid #E0E7ED; margin-top: 10px; padding-top: 10px;">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <span class="badge badge-soft-success">
                                                <i class="bx bx-trending-up align-bottom"></i> 18.89%
                                            </span>
                                            <span class="ms-1">dari bulan sebelumnya</span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
            
                        <!-- Shipping Cost -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-1">Shipping Cost</p>
                                            <h4 class="mb-0">Rp {{number_format($totals['total_shipping_cost'])}}</h4>
                                        </div>
                                        <!-- <div style="width: 100px; height: 55px;">
                                            <canvas id="chartShippingCost"></canvas>
                                        </div> -->
                                    </div>
                                    <!-- <hr class="my-2">
                                    <div style="border-top: 1px solid #E0E7ED; margin-top: 10px; padding-top: 10px;">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <span class="badge badge-soft-success">
                                                <i class="bx bx-trending-up align-bottom"></i> 18.89%
                                            </span>
                                            <span class="ms-1">dari bulan sebelumnya</span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
            
                        <!-- Net Revenue -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-1">Net Revenue</p>
                                            <h4 class="mb-0">Rp {{number_format($totals['total_net_revenue'])}}</h4>
                                        </div>
                                        <!-- <div style="width: 100px; height: 55px;">
                                            <canvas id="chartNetRevenue"></canvas>
                                        </div> -->
                                    </div>
                                    <!-- <hr class="my-2">
                                    <div style="border-top: 1px solid #E0E7ED; margin-top: 10px; padding-top: 10px;">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <span class="badge badge-soft-success">
                                                <i class="bx bx-trending-up align-bottom"></i> 18.89%
                                            </span>
                                            <span class="ms-1">dari bulan sebelumnya</span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
            
                        <!-- Net Profit -->
                        <div class="col-md-3">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-1">Net Profit</p>
                                            <h4 class="mb-0">Rp {{number_format($totals['total_net_profit'])}}</h4>
                                        </div>
                                        <!-- <div style="width: 100px; height: 55px;">
                                            <canvas id="chartNetProfit"></canvas>
                                        </div> -->
                                    </div>
                                    <!-- <hr class="my-2">
                                    <div style="border-top: 1px solid #E0E7ED; margin-top: 10px; padding-top: 10px;">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <span class="badge badge-soft-danger">
                                                <i class="bx bx-trending-up align-bottom"></i> 20.63%
                                            </span>
                                            <span class="ms-1">dari bulan sebelumnya</span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
            
                    </div> <!-- End Row -->
                </div>
            </div>

            <div class="row g-0">
                <!-- Produk Yang Menguntungkan -->
                <div class="container-fluid px-0">
                    <div class="row d-flex g-0">
                        <!-- Produk Yang Menguntungkan -->
                        <div class="col-md-4">
                            <div class="card p-3 border" style="border-color: #E0E7ED;">
                                <h5 class="mb-3">Produk Yang Menguntungkan</h5>
                                <div class="mb-3">
                                    @foreach($categories['most_profitable'] as $item)
                                    <div class="card p-3 border">
                                        <div class="d-flex align-items-center">
                                            <img src="/storage/{{$item['media'][0]['url']}}" alt="Produk 1" width="50" height="50">                                           
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{$item['name']}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row text-center">
                                            <div class="col"><p class="mb-1 text-muted">Order</p><h6 class="mb-0">{{number_format($item['order_count'])}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Paid</p><h6 class="mb-0">{{number_format($item['order_paid'])}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Paid Ratio</p><h6 class="mb-0">{{$item['paid_rasio']}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Net Revenue</p><h6 class="mb-0">Rp {{number_format($item['net_revenue'])}}</h6></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                
                        <!-- Produk Permintaan Tertinggi -->
                        <div class="col-md-4">
                            <div class="card p-3 border" style="border-color: #E0E7ED;">
                                <h5 class="mb-3">Produk Permintaan Tertinggi</h5>
                                <div class="mb-3">
                                    @foreach($categories['most_requested'] as $item)
                                    <div class="card p-3 border">
                                        <div class="d-flex align-items-center">
                                            <img src="/storage/{{$item['media'][0]['url']}}" alt="Produk 1" width="50" height="50">
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{$item['name']}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row text-center">
                                            <div class="col"><p class="mb-1 text-muted">Order</p><h6 class="mb-0">{{number_format($item['order_count'])}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Paid</p><h6 class="mb-0">{{number_format($item['order_paid'])}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Paid Ratio</p><h6 class="mb-0">{{$item['paid_rasio']}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Net Revenue</p><h6 class="mb-0">Rp {{number_format($item['net_revenue'])}}</h6></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                
                        <!-- Produk dengan Penjualan Tertinggi -->
                        <div class="col-md-4">
                            <div class="card p-3 border" style="border-color: #E0E7ED;">
                                <h5 class="mb-3">Produk dengan Penjualan Tertinggi</h5>
                                <div class="mb-3">
                                    @foreach($categories['most_sold'] as $item)
                                    <div class="card p-3 border">
                                        <div class="d-flex align-items-center">
                                            <img src="/storage/{{$item['media'][0]['url']}}" alt="Produk 1" width="50" height="50">
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{$item['name']}}</h6>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row text-center">
                                            <div class="col"><p class="mb-1 text-muted">Order</p><h6 class="mb-0">{{number_format($item['order_count'])}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Paid</p><h6 class="mb-0">{{number_format($item['order_paid'])}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Paid Ratio</p><h6 class="mb-0">{{$item['paid_rasio']}}</h6></div>
                                            <div class="col"><p class="mb-1 text-muted">Net Revenue</p><h6 class="mb-0">Rp {{number_format($item['net_revenue'])}}</h6></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Row -->
                </div> 
                <!-- End Container -->
                
                <!-- Produk dengan Penjualan Tertinggi -->
            </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

@endsection

@push('scripts')
    <script src="{{ asset('admin-template/assets/js/custom-dashboard.js') }}"></script>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
    function createChart(canvasId) {
        var ctx = document.getElementById(canvasId).getContext("2d");
        new Chart(ctx, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
                datasets: [{
                    label: "Trend",
                    data: [10, 20, 15, 30, 25, 40], // Bisa diganti dengan data dari database
                    borderColor: "#78D7B4", // Warna hijau baru
                    backgroundColor: "rgba(120, 215, 180, 0.1)", // Hijau transparan
                    fill: true,
                    pointRadius: 0, // Tetap tanpa bulatan
                    pointHoverRadius: 5, // Saat hover tetap terlihat laporan
                    borderWidth: 2 // Ketebalan garis
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Menyesuaikan ukuran canvas
                scales: {
                    x: { display: false },
                    y: { display: false }
                },
                elements: {
                    line: { tension: 0.4 }
                },
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        enabled: true, // Pastikan tooltip aktif
                        mode: "nearest", // Muncul di titik terdekat saat disentuh
                        intersect: false // Bisa muncul meskipun tidak langsung di titik
                    }
                },
                hover: {
                    mode: "nearest", // Saat menyentuh, laporan tetap muncul
                    intersect: false
                }
            }
        });
    }

    createChart("chartGrossRevenue");
    createChart("chartShippingCost");
    createChart("chartNetRevenue");
    createChart("chartNetProfit");
});



    </script>
@endpush
