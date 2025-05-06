@extends('admin.layouts.master')

@section('title', 'Edit Landing Page')

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
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Edit Landing Page</h4>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card p-4">
                    <div class="row">                     
                        <div class="col-md-12">
                            <form method="POST" enctype="multipart/form-data">
                                @csrf
                                <h4 class="fw-bold">Detail Landing Page</h4>

                                <div class="mb-2 row">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Produk Dipilih</label>
                                        <select class="form-select" name="product_id" required>
                                            <option value="" >Pilih Produk</option>
                                            @foreach($products as $item)
                                            <option value="{{$item->id}}" {{$landingPage->product_id === $item->id ? 'selected' : ''}} >{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Judul Landing Page</label>
                                        <input type="text" class="form-control" name="name" value="{{$landingPage->name}}" required oninput="generate_slug(this.value)">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Slug Landing Page</label>
                                    <input type="text" class="form-control" name="slug" required id="slug" readonly placeholder="This slug value will automatically generated" value="{{$landingPage->slug}}">
                                </div>
                                <h4 class="fw-bold mt-4 section">Section 1</h4>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Judul Section 1</label>
                                    <textarea type="text" class="form-control" name="section_1_title" id="editor" >{!! $landingPage->section_1_title !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Gambar Section 1</label>
                                    <div>
                                        <img src="/storage/{{$landingPage->section_1_media}}" style="width:300px;height:300px;object-fit:contain;">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Upload Gambar Section 1</label>
                                    <input type="file" class="form-control" name="section_1_media" accept="image/*">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Keterangan Section 1</label>
                                    <textarea class="form-control" id="editor" name="section_1_description">{!! $landingPage->section_1_description !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Background Section 1</label>
                                    <input type="color" class="form-control" name="section_1_bg" value="{{$landingPage->section_1_bg}}" required>
                                </div>
                                <h4 class="fw-bold mt-4 section">Section 2</h4>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Judul Section 2</label>
                                    <textarea type="text" class="form-control" name="section_2_title" id="editor">{!! $landingPage->section_2_title !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Gambar Section 1</label>
                                    <div>
                                        <img src="/storage/{{$landingPage->section_2_media}}" style="width:300px;height:300px;object-fit:contain;">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Upload Gambar Section 2</label>
                                    <input type="file" class="form-control" name="section_2_media" accept="image/*">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Keterangan Section 2</label>
                                    <textarea class="form-control" id="editor" name="section_2_description">{!! $landingPage->section_2_description !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Background Section 2</label>
                                    <input type="color" class="form-control" name="section_2_bg" value="{{ $landingPage->section_2_bg }}" required>
                                </div>
                                <h4 class="fw-bold mt-4 section">Section 3</h4>
                                <div class="mb-2">
                                        <label class="form-label fw-bold">Gunakan Section 3</label>
                                        <select class="form-select" name="use_section_3" required>
                                            <option value="1" {{$landingPage->use_section_3 ? 'selected' : ''}} >Ya</option>
                                            <option value="0" {{!$landingPage->use_section_3 ? 'selected' : ''}} >Tidak</option>
                                        </select>
                                    </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Judul Section 3</label>
                                    <textarea type="text" class="form-control" name="section_3_title" id="editor" >{!! $landingPage->section_3_title !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Gambar Section 3</label>
                                    <div>
                                        <img src="/storage/{{$landingPage->section_3_media}}" style="width:300px;height:300px;object-fit:contain;">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Upload Gambar Section 3</label>
                                    <input type="file" class="form-control" name="section_3_media" accept="image/*">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Keterangan Section 3</label>
                                    <textarea class="form-control" id="editor" name="section_3_description">{!! $landingPage->section_3_description !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Background Section 3</label>
                                    <input type="color" class="form-control" name="section_3_bg" value="{{$landingPage->section_3_bg}}" required>
                                </div>
                                <h4 class="fw-bold mt-4 section">Section 4</h4>
                                <div class="mb-2">
                                        <label class="form-label fw-bold">Gunakan Section 4</label>
                                        <select class="form-select" name="use_section_4" required>
                                            <option value="1" {{$landingPage->use_section_4 ? 'selected' : ''}} >Ya</option>
                                            <option value="0" {{!$landingPage->use_section_4 ? 'selected' : ''}} >Tidak</option>
                                        </select>
                                    </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Judul Section 4</label>
                                    <textarea type="text" class="form-control" name="section_4_title" id="editor" >{!! $landingPage->section_4_title !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Gambar Section 4</label>
                                    <div>
                                        <img src="/storage/{{$landingPage->section_4_media}}" style="width:300px;height:300px;object-fit:contain;">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Upload Gambar Section 4</label>
                                    <input type="file" class="form-control" name="section_4_media" accept="image/*">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Keterangan Section 4</label>
                                    <textarea class="form-control" id="editor" name="section_4_description">{!! $landingPage->section_4_description !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Background Section 4</label>
                                    <input type="color" class="form-control" name="section_4_bg" value="{{$landingPage->section_4_bg}}" required>
                                </div>
                                <h4 class="fw-bold mt-4 section">Section 5</h4>
                                <div class="mb-2">
                                        <label class="form-label fw-bold">Gunakan Section 5</label>
                                        <select class="form-select" name="use_section_5" required>
                                            <option value="1" {{$landingPage->use_section_5 ? 'selected' : ''}} >Ya</option>
                                            <option value="0" {{!$landingPage->use_section_5 ? 'selected' : ''}} >Tidak</option>
                                        </select>
                                    </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Judul Section 5</label>
                                    <textarea type="text" class="form-control" name="section_5_title" id="editor" >{!! $landingPage->section_5_title !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Gambar Section 5</label>
                                    <div>
                                        <img src="/storage/{{$landingPage->section_5_media}}" style="width:300px;height:300px;object-fit:contain;">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Upload Gambar Section 5</label>
                                    <input type="file" class="form-control" name="section_5_media" accept="image/*">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Keterangan Section 5</label>
                                    <textarea class="form-control" id="editor" name="section_5_description">{!! $landingPage->section_5_description !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Background Section 5</label>
                                    <input type="color" class="form-control" name="section_5_bg" value="{{ $landingPage->section_5_bg }}" required>
                                </div>
                                <h4 class="fw-bold mt-4 section">Section 6</h4>
                                <div class="mb-2">
                                        <label class="form-label fw-bold">Gunakan Section 6</label>
                                        <select class="form-select" name="use_section_6" required>
                                            <option value="1" {{$landingPage->use_section_6 ? 'selected' : ''}} >Ya</option>
                                            <option value="0" {{!$landingPage->use_section_6 ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Judul Section 6</label>
                                    <textarea type="text" class="form-control" name="section_6_title" id="editor" >{!! $landingPage->section_6_title !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Gambar Section 6</label>
                                    <div>
                                        <img src="/storage/{{$landingPage->section_6_media}}" style="width:300px;height:300px;object-fit:contain;">
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Upload Gambar Section 6</label>
                                    <input type="file" class="form-control" name="section_6_media" accept="image/*">
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Keterangan Section 6</label>
                                    <textarea class="form-control" id="editor" name="section_6_description">{!! $landingPage->section_6_description !!}</textarea>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-bold">Background Section 6</label>
                                    <input type="color" class="form-control" name="section_6_bg" value="{{$landingPage->section_6_bg}}" required>
                                </div>
                                <button type="submit" class="btn w-auto px-4 mt-2" style="background-color: #556EE6; color: white; border: none;">
                                    Simpan Landing Page
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