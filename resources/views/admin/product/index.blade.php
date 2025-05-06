@extends('admin.layouts.master')

@section('title', 'Produk')

@push('styles')
    {{-- <link rel="stylesheet" href="{{ asset('admin-template/assets/css/custom-dashboard.css') }}"> --}}
@endpush

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Start Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Products</h4>
                        <div>
                            Nama Store/Produk
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <!-- Show Entries -->
                        <div class="d-flex align-items-center">
                            <label class="me-2 mb-0 fw-medium">Show</label>
                            <select class="form-select w-auto" id="entriesSelect">
                                <option>10</option>
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                            <label class="ms-2 mb-0 fw-medium">entries</label>
                            <a href="{{ route('admin.product.create') }}" class="btn btn-primary fw-bold ms-3">
                                Tambah Baru
                            </a>
                        </div>

                        <!-- Form Pencarian -->
                        <form class="app-search d-none d-lg-block" method="GET" action="{{ route('admin.product.index') }}">
                            <div class="position-relative">
                                <input type="text" name="search" class="form-control border border-2" placeholder="Masukkan nama produk..." 
                                    style="padding-left: 35px; background-color: #fff; color: #333; border-color: #6c757d; border-width: 2px;" 
                                    value="{{ request('search') }}">
                                <span class="bx bx-search position-absolute" 
                                    style="left: 10px; top: 50%; transform: translateY(-50%); font-size: 18px; color: #BDBDBD;"></span>
                            </div>
                        </form>                                                                     
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-left fs-6">No</th>
                                    <th class="text-left fs-6">
                                        Produk
                                        @if ($sort == 'name' && $direction == 'asc')
                                            <a href="{{ route('admin.product.index', ['sort' => 'name', 'direction' => 'desc']) }}" class="fs-6 text-decoration-none">
                                                <i class="bx bx-sort" style="font-size: 13px;"></i> 
                                            </a>
                                        @else
                                            <a href="{{ route('admin.product.index', ['sort' => 'name', 'direction' => 'asc']) }}" class="fs-6 text-decoration-none">
                                                <i class="bx bx-sort" style="font-size: 13px;"></i> <!-- Arahkan ke ascending -->
                                            </a>
                                        @endif
                                    </th>
                                                                          
                                    <th class="text-left fs-6">Harga</th>
                                    <th class="text-left fs-6">HPP</th>
                                    <th class="text-left fs-6">Orders</th>
                                    <th class="text-left fs-6">Sudah Dibayar</th>
                                    <th class="text-left fs-6">Rasio Bayar</th>
                                    <th class="text-left fs-6">Pendapatan Bersih</th>
                                    <th class="text-left fs-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_products as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <div>
                                                <img src="/storage/{{$item['media'][0]['url']}}" style="width: 64px;height: 64px;object-fit: cover;">
                                            </div>
                                            <div>
                                                <div><b>{{$item['name']}}</b></div>
                                                <div style="font-size:11px;">#{{$item['code']}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>Rp {{ number_format($item['normal_price']) }}</td>
                                    <td>Rp {{ number_format($item['hpp']) }}</td>
                                    <td>{{ number_format($item['order_count']) }}</td>
                                    <td>{{ number_format($item['order_paid']) }}</td>
                                    <td>{{ $item['paid_rasio' ]}}</td>
                                    <td>Rp {{ number_format($item['net_revenue']) }}</td>
                                    <td class="text-center">
                                        <a href="/admin/product/edit/{{$item['id']}}" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                        {{-- <a href="{{ route('admin.product.show', $item['id']) }}" class="btn btn-primary btn-sm">
                                            <i class="bx bx-show"></i>
                                        </a> --}}
                                        <a href="/admin/product/delete/{{$item['id']}}" class="btn btn-danger btn-sm"><i class="bx bx-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $all_products->links() }}
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-3">
                        <span class="text-muted">Showing 1 to 10 of 50 entries</span>
                        <nav>
                            <ul class="pagination mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- <script src="{{ asset('admin-template/assets/js/custom-dashboard.js') }}"></script> --}}
@endpush
