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
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Detail Orders</h4>
                    </div>
                </div>
            </div>
            <!-- End Page Title -->

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="order-details">
                                <ul class="list-unstyled">
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>ID Order
                                        </div>
                                        <div>#{{$order->id}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Nama Customer
                                        </div>
                                        <div>{{$order->customer_name}} | {{$order->customer_phone}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Tags
                                        </div>
                                        <div>{{$order->tags}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Nama Produk
                                        </div>
                                        <div>{{$order->product->name}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Variasi
                                        </div>
                                        <div>
                                            @php
                                            $total_qty = 0;
                                            @endphp
                                            @foreach($order->details as $index => $item)
                                            @php
                                            $total_qty += $item->qty;
                                            @endphp
                                            <div>{{$index + 1}}. {{$item->variation->name}} x {{$item->qty}} ({{ number_format($item->variation->price) }}) = Rp. {{number_format($item->qty * $item->variation->price)}}</div>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Quantity
                                        </div>
                                        <div>{{number_format($total_qty)}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Kota
                                        </div>
                                        <div>{{$order->customer_address_district}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Shipping Info
                                        </div>
                                        <div>{{$order->shipper->name}} - {{$order->service->name}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Status
                                        </div>
                                        <div><span class="badge bg-warning text-dark">{{$order->orders_status}}</span></div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Pembayaran
                                        </div>
                                        <div><span class="badge bg-danger">{{$order->payment_status}}</span></div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Ditugaskan untuk
                                        </div>
                                        <div>{{$order->product->customer_service->name}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Tanggal
                                        </div>
                                        <div>{{$order->date_created}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Gross Revenue
                                        </div>
                                        <div>Rp {{number_format($order->total_price)}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Informasi Pembayaran
                                        </div>
                                        <div>{{$order->payment_method}}</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Meta
                                        </div>
                                        <div>IP Address: 110.139.194.0</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>UTM Source
                                        </div>
                                        <div>Facebook_Mobile_Feed</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>UTM Medium
                                        </div>
                                        <div>GC92 | FMH | ADVANTAGE + (1) | 25-65 | ALL</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>UTM Campaign
                                        </div>
                                        <div>ABO FILOSOFI MENIKMATI HIDUP Kampanye Advantage +</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>UTM Term
                                        </div>
                                        <div>-</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>UTM Content
                                        </div>
                                        <div>FMH | VID | TIKTOK4</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Tindakan
                                        </div>
                                        <div>-</div>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <div class="fw-medium" style="width: 180px;">
                                            <i class="bx bx-circle me-2" style="font-size: 8px; vertical-align: middle;"></i>Follow Up
                                        </div>
                                        <div>
                                            <span class="badge rounded-pill bg-warning text-dark me-1">1</span>
                                            <span class="badge rounded-pill bg-primary me-1">2</span>
                                            <span class="badge rounded-pill bg-success me-1">3</span>
                                            <span class="badge rounded-pill bg-danger me-1">4</span>
                                            <span class="badge rounded-pill bg-secondary me-1">5</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="d-flex mt-4">
                                <a href="/orders/{{$order->id}}?print=1" class="btn btn-secondary me-2">
                                    <i class="bx bx-printer"></i>
                                </a>
                                <a href="/admin/order/edit/{{$order->id}}" class="btn btn-warning">
                                    <i class="bx bx-edit-alt"></i>
                                </a>
                            </div>
                        </div>
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
