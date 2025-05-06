@extends('admin.layouts.master')

@section('title', 'Landing Page Management')

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
                        <h4 class="mb-sm-0 font-size-20 fw-bold">Landing Pages</h4>
                        <div>
                            Dashboard/Landing Pages
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
                                <a href="{{ route('admin.landingPage.create') }}" class="btn btn-primary fw-bold ms-3">
                                    Tambah Baru
                                </a>
                            </div>

                            <!-- Form Pencarian -->
                            <form class="app-search d-none d-lg-block" method="GET" action="{{ route('admin.landingPage.index') }}">
                                <div class="position-relative">
                                    <input type="text" name="search" class="form-control border border-2" placeholder="Search..."
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
                                        <th class="text-left fs-6">Nama Landing Page</th>
                                        {{-- <th class="text-left fs-6">Slug</th> --}}
                                        <th class="text-left fs-6">Visitors</th>
                                        <th class="text-left fs-6 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($landing_pages as $index => $item)
                                    <tr>
                                        <td>
                                            <div style="display: flex;gap: 10px;align-items: center;height: 64px;">
                                                {{ $index + 1 }}
                                            </div>
                                        </td>
                                        <td>
                                            <div style="display: flex;gap: 10px;align-items: center;">
                                                <img src="/landing/icon.png" style="
                                                    width: 64px;height: 64px;
                                                    object-fit: contain;
                                                ">
                                                {{ $item->name }}
                                            </div>
                                        </td>
                                        {{-- <td>
                                            <div style="display: flex;gap: 10px;align-items: center;height: 64px;">
                                                {{ $item->slug }}
                                            </div>
                                        </td> --}}
                                        <td>
                                            <div style="display: flex;gap: 10px;align-items: center;height: 64px;">
                                                {{ number_format($item->visitors) }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div style="display: flex;gap: 10px;align-items: center;height: 64px;justify-content: center;">
                                                <a href="/admin/landing-page/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="bx bx-edit-alt"></i></a>
                                                <a href="/landing/{{$item->slug}}" class="btn btn-secondary btn-sm" target="_blank"><i class="bx bx-link"></i></a>
                                                <a href="/admin/landing-page/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if(count($landing_pages) === 0)
                                    <tr>
                                        <td colspan="5" class="text-center">Belum ada data</td>
                                    </tr>
                                    @endif
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
