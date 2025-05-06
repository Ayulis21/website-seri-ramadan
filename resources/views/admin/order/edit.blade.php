@extends('admin.layouts.master')

@section('title', 'Tambah Landing Page')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-template/assets/css/custom-dashboard.css') }}">
    <style>
        .sidebar-left {
            background-color: white;
            padding: 15px;
            border-radius: 10px;
            height: auto;
            min-height: 100px;
        }
        .list-group-item {
            cursor: pointer;
            background-color: #556EE619;
            transition: background-color 0.3s, color 0.3s;
        }
        .section-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: solid #556EE6;
            color: #556EE6;
            font-weight: bold;
            margin-right: 10px;
            transition: background-color 0.3s, color 0.3s;
        }
        .list-group-item.active .section-number {
            background-color: #556EE6;
            color: white;
            border: solid #556EE6;
        }
        .list-group-item.active {
            background-color: #556EE633 !important;
            color: black;
        }
        .list-group-item:hover {
            background-color: #556EE633;
        }
        h4.section{
            border-top: 1px dashed; #ccced1;
            padding-top: 20px;
            padding-bottom: 0px;
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@endpush

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Edit Order</h4>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card p-4">
                    <div class="row">                     
                        <div class="col-md-12">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4 class="fw-bold">Detail Order</h4>
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">ID Order</label>
                                        <input type="text" class="form-control" value="{{ $order->id }}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Nama Customer</label>
                                        <input type="text" class="form-control" name="customer_name" value="{{ $order->customer_name }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Telepon Customer</label>
                                        <input type="text" class="form-control" name="customer_phone" value="{{ $order->customer_phone }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Provinsi</label>
                                        <input type="text" class="form-control" name="customer_address_province" value="{{ $order->customer_address_province }}" required>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Kab/Kota</label>
                                        <input type="text" class="form-control" name="customer_address_district" value="{{ $order->customer_address_district }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Kecamatan</label>
                                        <input type="text" class="form-control" name="customer_address_subdistrict" value="{{ $order->customer_address_subdistrict }}" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-bold">Desa</label>
                                        <input type="text" class="form-control" name="customer_address_village" value="{{ $order->customer_address_village }}" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Alamat Lengkap</label>
                                    <textarea class="form-control" name="customer_address_full" rows="3" required>{{ $order->customer_address_full }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Tags</label>
                                    <input type="text" class="form-control" name="tags" value="{{ $order->tags }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Detail Produk</label>
                                    <input type="text" class="form-control" value="@foreach($order->details as $index => $item){{$index + 1}}. {{$item->variation->name}} x {{$item->qty}},@endforeach
                                    " required readonly>
                                </div>
                                
                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Kurir</label>
                                        <input type="text" class="form-control" value="{{ $order->shipper->name }} | {{$order->courier->name}}" required readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Service</label>
                                        <input type="text" class="form-control" value="{{ $order->service->name }} | Rp{{number_format($order->service->cost)}}" required readonly>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Biaya Pengiriman</label>
                                        <input type="text" class="form-control" value="Rp {{ number_format($order->shipping_cost) }}" required readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Metode Pembayaran</label>
                                        <input type="text" class="form-control" value="{{ $order->payment_method}}" required readonly>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Status</label>
                                        <select class="form-select" name="orders_status" required>
                                            <option value="pending" {{ $order->orders_status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="processing" {{ $order->orders_status == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="shipped" {{ $order->orders_status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="delivered" {{ $order->orders_status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ $order->orders_status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Pembayaran</label>
                                        <select class="form-select" name="payment_status" required>
                                            <option value="unpaid" {{ $order->payment_status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                            <option value="paid" {{ $order->payment_status == 'paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="refunded" {{ $order->payment_status == 'Refunded' ? 'selected' : '' }}>Refunded</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn px-4 mt-3" style="background-color: #556EE6; color: white; border: none;">
                                    Update Order
                                </button>
                                <a href="{{ url()->previous('/') }}" class="btn btn-secondary px-4 mt-3">
                                    Cancel
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add variation button
        document.getElementById('add-variation').addEventListener('click', function() {
            const container = document.getElementById('variations-container');
            const variationCount = document.querySelectorAll('.variation-item').length;
            
            const variationHtml = `
                <div class="variation-item mb-3 p-3 border rounded">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Variasi</label>
                            <select class="form-select" name="variation_id[]" required>
                                <option value="">Pilih Variasi</option>
                                @foreach($order->details as $variation)
                                    <option value="{{ $variation->id }}">
                                        {{ $variation->name }} - Rp {{ number_format($variation->price) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-bold">Quantity</label>
                            <input type="number" class="form-control" name="quantity[]" value="1" min="1" required>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-variation">
                                <i class="bx bx-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            container.insertAdjacentHTML('beforeend', variationHtml);
            
            // Add event listeners to new remove buttons
            document.querySelectorAll('.remove-variation').forEach(button => {
                button.addEventListener('click', function() {
                    this.closest('.variation-item').remove();
                });
            });
        });
        
        // Remove variation button event listeners
        document.querySelectorAll('.remove-variation').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.variation-item').remove();
            });
        });
    });
</script>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Inisialisasi CKEditor
        document.querySelectorAll('#editor').forEach((item)=>{
            new FroalaEditor(item);
        })

        // Set default section ke 1
        // showSection(1);
    });

    function generate_slug(value) {
        value = value.toLowerCase()
                     .replace(/\s+/g, '-')        // ganti spasi dengan tanda hubung
                     .replace(/[^\w\-]+/g, '')    // hapus karakter non-alphanumeric kecuali -
                     .replace(/\-\-+/g, '-')      // ganti multiple '-' jadi satu
                     .replace(/^-+|-+$/g, '');    // hapus '-' di awal dan akhir

        document.querySelector('#slug').value = value;
    }


    function showSection(sectionNumber) {
        console.log("Section dipilih:", sectionNumber); // Debugging

        // Pastikan input hidden untuk section ada
        let activeSectionInput = document.getElementById("activeSection");
        if (activeSectionInput) {
            activeSectionInput.value = sectionNumber;
        } else {
            console.error("Error: input hidden #activeSection tidak ditemukan!");
        }

        // Update teks di semua elemen dengan id #sectionTitle
        document.querySelectorAll("#sectionTitle").forEach(el => {
            el.innerText = sectionNumber;
        });

        // Hapus class "active" dari semua section
        document.querySelectorAll(".list-group-item").forEach(item => item.classList.remove("active"));

        // Tambahkan class "active" ke section yang dipilih (cek dulu biar gak error)
        let sectionItems = document.querySelectorAll(".list-group-item");
        if (sectionItems[sectionNumber - 1]) {
            sectionItems[sectionNumber - 1].classList.add("active");
        } else {
            console.error("Error: Element list-group-item untuk section", sectionNumber, "tidak ditemukan!");
        }

        // Debugging cek di console
        console.log("Value input hidden sekarang:", activeSectionInput ? activeSectionInput.value : "Tidak ditemukan");
    }
</script>
@endpush