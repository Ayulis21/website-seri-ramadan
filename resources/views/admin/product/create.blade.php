@extends('admin.layouts.master')

@section('title', 'Tambah Product')

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
                                        <input type="text" class="form-control" id="product-name" name="name" placeholder="Masukkan nama produk" required>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="checkout-url" class="form-label mb-1 fw-bold">URL Halaman Checkout</label>
                                        <i style="font-size: 11px">(Contoh: https://jualin.orderanonline.id/kelambu)</i>
                                        <div class="input-group">
                                            <div class="input-group-text">/</div>
                                            <input type="text" class="form-control" id="checkout-url" name="checkout_url" placeholder="Masukkan path checkout" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="product-code" class="form-label mb-1 fw-bold">Kode Produk</label>
                                        <i style="font-size: 11px">Misal: Kelambu Anak Bayi → KAB</i>
                                        <input type="text" class="form-control" id="product-code" name="code" placeholder="Masukkan kode produk" required>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="product-classification" class="form-label mb-1 fw-bold">Klasifikasi Produk</label>
                                        <select class="form-select" name="classification_id" id="product-classification" required>
                                            <option value="">Pilih klasifikasi</option>
                                            @foreach($classification as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="product-category" class="form-label mb-1 fw-bold">Kategori Produk</label>
                                        <select class="form-select" name="category_id" id="product-category" required>
                                            <option value="">Pilih kategori</option>
                                            @foreach($categories as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="product-status" class="form-label mb-1 fw-bold">Status Produk</label>
                                        <select class="form-select" name="status" id="product-status" required>
                                            <option value="">Pilih status</option>
                                            <option value="active">Aktif</option>
                                            <option value="nonactive">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="product-description" class="form-label mb-1 fw-bold">Keterangan</label>
                                    <textarea class="form-control" id="product-description" name="description" placeholder="Tuliskan deskripsi produk..."></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="product-image" class="form-label mb-1 fw-bold">Upload Gambar</label>
                                    <input type="file" class="form-control" id="product-image" name="product_media" accept="image/*" required>
                                </div>

                                <div style="border-bottom: 1.5px solid red; margin: 10px 0;"></div>

                                <!-- Harga -->
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <h5 class="fw-bold">Pengaturan Harga</h5>
                                        <div class="row mb-2">
                                            <div class="col-md-6 mb-3">
                                                <label for="normal-price" class="form-label mb-1 fw-bold">Harga Normal</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">Rp</div>
                                                    <input type="text" class="form-control" id="normal-price" name="normal_price" placeholder="Masukkan harga normal" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="hpp" class="form-label mb-1 fw-bold">HPP (Opsional)</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">Rp</div>
                                                    <input type="text" class="form-control" id="hpp" name="hpp" placeholder="Masukkan HPP">
                                                </div>
                                            </div>
                                        </div>

                                        <div style="border-bottom: 1.5px solid red; margin: 10px 0;"></div>

                                        <!-- Pengiriman -->
                                        <div class="mb-2 row mb-3 mt-3">
                                            <h5 class="fw-bold">Pengiriman</h5>
                                            <div class="col-md-6 mb-3">
                                                <label for="delivery-id" class="form-label mb-1 fw-bold">Kurir Pengirim</label>
                                                <select class="form-select" name="delivery_id" id="delivery-id" required>
                                                    <option value="">Pilih kurir</option>
                                                    @foreach($delivery_couriers as $item)
                                                        <option value="{{$item->id}}">{{$item->name}} | {{$item->shipper->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="shipping-cost" class="form-label mb-1 fw-bold">Biaya Pengiriman</label>
                                                <div class="input-group">
                                                    <div class="input-group-text">Rp</div>
                                                    <input type="text" class="form-control" id="shipping-cost" name="payment_cost" placeholder="Masukkan biaya pengiriman">
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="region-province" class="form-label fw-bold">Dikirim dari - Provinsi</label>
                                                <input type="text" class="form-control" id="region-province" name="region_province" placeholder="Masukkan provinsi asal" required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="region-district" class="form-label fw-bold">Kab/Kota</label>
                                                <input type="text" class="form-control" id="region-district" name="region_district" placeholder="Masukkan kabupaten/kota" required>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="region-subdistrict" class="form-label fw-bold">Kecamatan</label>
                                                <input type="text" class="form-control" id="region-subdistrict" name="region_subdistrict" placeholder="Masukkan kecamatan" required>
                                            </div>
                                        </div>

                                        <div style="border-bottom: 1.5px solid red; margin: 10px 0;"></div>

                                        <!-- Pembayaran -->
                                        <div class="mb-2 row mb-2 mt-3">
                                            <h5 class="fw-bold">Pembayaran</h5>

                                            <div class="col-md-4 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-check-input mb-1 me-2" type="checkbox" id="payment-transfer" name="payment_transfer">
                                                    <label class="form-label fw-bold mb-0" for="payment-transfer">Transfer Bank</label>
                                                </div>
                                                <input type="text" class="form-control mt-1" id="note-transfer" placeholder="Keterangan metode transfer" name="payment_transfer_notes">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-check-input mb-1 me-2" type="checkbox" id="payment-cod" name="payment_cod">
                                                    <label class="form-label fw-bold mb-0" for="payment-cod">Bayar di Tempat (COD)</label>
                                                </div>
                                                <input type="text" class="form-control mt-1" id="note-cod" placeholder="Keterangan metode COD" name="payment_cod_notes">
                                            </div>

                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <input class="form-check-input mb-1 me-2" type="checkbox" id="payment-epayment" name="payment_ewallet">
                                                    <label class="form-label fw-bold mb-0" for="payment-epayment">e-Payment</label>
                                                </div>
                                                <input type="text" class="form-control mt-1" id="note-epayment" placeholder="Keterangan metode e-payment" name="payment_ewallet_notes">
                                            </div>
                                        </div>

                                        <div style="border-bottom: 1.5px solid red; margin: 10px 0;"></div>

                                        <!-- Assign -->
                                        <div class="mb-2 row mb-2 mt-3">
                                            <h5 class="fw-bold mb-2">Tugaskan Produk ke</h5>
                                            <div class="col-md-4 mb-3">
                                                <label for="assign-cs" class="form-label mb-1 fw-bold">Customer Service</label>
                                                <select class="form-select" name="cs_id" id="assign-cs" required>
                                                    <option value="">Pilih CS</option>
                                                    @foreach($customer_services as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- SECTION: VARIASI PRODUK -->
                                <div style="border-bottom: 1.5px solid red; margin: 20px 0;"></div>
                                <div class="mb-2 row mt-3">
                                    <h5 class="fw-bold mb-2">VARIASI PRODUK</h5>
                                    <div id="product-variations">
                                        <div class="row variation-item mb-3">
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="variations[0][name]" placeholder="Contoh: Warna Merah">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="variations[0][description]" placeholder="Ukuran L, warna solid">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="variations[0][stock]" placeholder="Jumlah stok">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">Rp</div>
                                                    <input type="number" class="form-control" name="variations[0][price]" placeholder="Harga variasi">
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <select class="form-select" name="variations[0][status]">
                                                    <option value="active">Aktif</option>
                                                    <option value="inactive">Tidak Aktif</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">✖</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="addVariation()">+ Tambah Variasi</button>
                                    </div>
                                </div>

                                <!-- SECTION: DATA ASURANSI -->
                                <div style="border-bottom: 1.5px solid red; margin: 20px 0;"></div>
                                <div class="mb-4 row mt-3">
                                    <h5 class="fw-bold mb-2">ASURANSI PRODUK</h5>
                                    <div id="product-insurance">
                                        <div class="row insurance-item mb-3">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="insurance[0][name]" placeholder="Nama Asuransi">
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" name="insurance[0][description]" placeholder="Cakupan atau penjelasan">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeInsurance(this)">✖</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="addInsurance()">+ Tambah Asuransi</button>
                                    </div>
                                </div>
                                <div style="border-bottom: 1.5px solid red; margin: 20px 0;"></div>
                                <div class="mb-4 row mt-3">
                                    <h5 class="fw-bold mb-2">PRODUK SERVICE</h5>
                                    <div id="product-services">
                                        <div class="row service-item mb-3">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="services[0][name]" placeholder="Nama Service" value="standar">
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" name="services[0][description]" placeholder="Deskripsi singkat service" value="Pelayanan standar">
                                            </div>
                                            <div class="col-md-2">
                                                <div class="input-group">
                                                    <div class="input-group-text">Rp</div>
                                                    <input type="number" class="form-control" name="services[0][price]" placeholder="Harga" value="0">
                                                </div>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="removeService(this)">✖</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="addService()">+ Tambah Service</button>
                                    </div>
                                </div>

                                <div style="border-bottom: 1.5px solid red; margin: 20px 0;"></div>

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
<script>
let variationIndex = 1;
let insuranceIndex = 1;
let serviceIndex = 1;

function addService() {
    const container = document.getElementById('product-services');
    const html = `
        <div class="row service-item mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" name="services[${serviceIndex}][name]" placeholder="Nama Service">
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="services[${serviceIndex}][description]" placeholder="Deskripsi singkat service">
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <div class="input-group-text">Rp</div>
                    <input type="number" class="form-control" name="services[${serviceIndex}][price]" placeholder="Harga">
                </div>
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeService(this)">✖</button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    serviceIndex++;
}

function removeService(button) {
    button.closest('.service-item').remove();
}

function addVariation() {
    const container = document.getElementById('product-variations');
    const html = `
        <div class="row variation-item mb-3">
            <div class="col-md-3">
                <input type="text" class="form-control" name="variations[${variationIndex}][name]" placeholder="Contoh: Warna Merah">
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="variations[${variationIndex}][description]" placeholder="Ukuran L, warna solid">
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control" name="variations[${variationIndex}][stock]" placeholder="Jumlah stok">
            </div>
            <div class="col-md-2">
                <div class="input-group">
                    <div class="input-group-text">Rp</div>
                    <input type="number" class="form-control" name="variations[${variationIndex}][price]" placeholder="Harga variasi">
                </div>
            </div>
            <div class="col-md-1">
                <select class="form-select" name="variations[${variationIndex}][status]">
                    <option value="active">Aktif</option>
                    <option value="inactive">Tidak Aktif</option>
                </select>
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">✖</button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    variationIndex++;
}

function removeVariation(button) {
    button.closest('.variation-item').remove();
}

function addInsurance() {
    const container = document.getElementById('product-insurance');
    const html = `
        <div class="row insurance-item mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" name="insurance[${insuranceIndex}][name]" placeholder="Nama Asuransi">
            </div>
            <div class="col-md-7">
                <input type="text" class="form-control" name="insurance[${insuranceIndex}][description]" placeholder="Cakupan atau penjelasan">
            </div>
            <div class="col-md-1 d-flex align-items-center">
                <button type="button" class="btn btn-danger btn-sm" onclick="removeInsurance(this)">✖</button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    insuranceIndex++;
}

function removeInsurance(button) {
    button.closest('.insurance-item').remove();
}
</script>


@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
@endpush