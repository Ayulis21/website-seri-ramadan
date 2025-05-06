@extends('admin.layouts.master')

@section('title', 'Pilih Produk')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-template/assets/css/custom-dashboard.css') }}">
@endpush

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Tambah Produk</h4>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2 row">
                                    <div class="col-md-6 mb-2">
                                        <label for="product-name" class="form-label mb-1 fw-bold">Nama Produk</label>
                                        <i style="font-size: 11px">akan muncul di cart & invoice</i>
                                        <select class="form-select" name="slug" id="delivery-id" required>
                                            <option value="">Pilih Produk</option>
                                            @foreach($landing as $item)
                                                <option value="{{$item->slug}}">{{$item->product->name}} | {{$item->product->code}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn w-auto px-4 mt-1" style="background-color: #556EE6; color: white; border: none;">
                                    Simpan Produk
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@endpush