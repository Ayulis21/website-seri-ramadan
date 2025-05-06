@extends('admin.layouts.master')

@section('title', 'Detail Produk')

@push('styles')
    {{-- Link CSS khusus jika diperlukan --}}
@endpush

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Detail Produk</h4>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="/storage/{{ $product['media'][0]['url'] }}" style="width: 150px; height: 150px; object-fit: cover;" alt="Product Image">
                        <div class="ms-3">
                            <h5>{{ $product['name'] }}</h5>
                            <p><strong>Code:</strong> #{{ $product['code'] }}</p>
                            <p><strong>Price:</strong> Rp {{ number_format($product['normal_price']) }}</p>
                            <p><strong>HPP:</strong> Rp {{ number_format($product['hpp']) }}</p>
                            <p><strong>Net Revenue:</strong> Rp {{ number_format($netRevenue) }}</p>
                            <p><strong>Net Profit:</strong> Rp {{ number_format($netProfit) }}</p>
                            <p><strong>Orders:</strong> {{ $orderCount }} orders</p>
                            <p><strong>Paid Orders:</strong> {{ $orderPaid }} paid</p>
                            <p><strong>Paid Ratio:</strong> {{ $orderCount > 0 ? strval(floor($orderPaid / $orderCount * 100)) . '%' : '0%' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- Link JS khusus jika diperlukan --}}
@endpush
