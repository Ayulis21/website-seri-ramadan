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
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Orders</h4>
                        <div>
                            Nama Store/Order
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
                            <a href="/admin/order/create" class="btn btn-primary fw-bold ms-3">
                                Tambah Baru
                            </a>
                        </div>

                        <!-- Form Pencarian -->
                        <form class="app-search d-none d-lg-block" method="GET" action="{{ route('admin.order.index') }}">
                            <div class="position-relative">
                                <input type="text" name="search" class="form-control border border-2" placeholder="Cari . . ."
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
                                        ID Order
                                        @if (request('sort_by') == 'id' && request('direction') == 'asc')
                                            <a href="{{ route('admin.order.index', ['sort_by' => 'id', 'direction' => 'desc']) }}" class="fs-6 text-decoration-none">
                                                <i class="bx bx-sort" style="font-size: 13px;"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('admin.order.index', ['sort_by' => 'id', 'direction' => 'asc']) }}" class="fs-6 text-decoration-none">
                                                <i class="bx bx-sort" style="font-size: 13px;"></i>
                                            </a>
                                        @endif
                                    </th>         
                                    <th class="text-left fs-6">Nama Customer</th>
                                    <th class="text-left fs-6">Tags</th>
                                    <th class="text-left fs-6">Nama Produk</th>
                                    <th class="text-left fs-6">Variasi</th>
                                    <th class="text-left fs-6">QTY</th>
                                    <th class="text-left fs-6">KOTA</th>
                                    <th class="text-left fs-6">Status</th>
                                    <th class="text-left fs-6">Pembayaran</th>
                                    <th class="text-left fs-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $index => $item)
                                @php
                                    $qty = 0;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->customer_name }}</td>
                                    <td>{{ $item->tags }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        @foreach($item->details as $detail_index => $jtem)
                                        <div>{{ $detail_index + 1 }}. {{ $jtem->variation->name }} X {{ $jtem->qty }} = Rp. {{ number_format(strval($jtem->qty * $jtem->variation->price)) }}</div>
                                         @php
                                            $qty += $jtem->qty;
                                        @endphp
                                        @endforeach
                                    </td>
                                    <td>{{ $qty }}</td>
                                    <td>{{ $item->customer_address_district }}</td>
                                    <td>{{ $item->orders_status }}</td>
                                    <td>{{ $item->payment_status }}</td>
                                    <td class="text-center">
                                        <a href="/admin/order/detail/{{$item->id}}" class="btn btn-primary btn-sm"><i class="bx bx-show"></i></a>
                                        <a href="/orders/{{$item->id}}?print=1" class="btn btn-secondary btn-sm"><i class="bx bx-printer"></i></a>
                                        <a href="/admin/order/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
