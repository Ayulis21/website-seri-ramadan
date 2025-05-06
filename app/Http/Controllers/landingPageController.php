<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Products;


class LandingPageController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth'); // Semua pengguna harus login
    //     $this->middleware('admin')->except('index'); // Hanya admin yang bisa mengelola, pelanggan hanya bisa melihat
    // }

    // Halaman landing page yang bisa diakses admin & pelanggan
    public function index(Request $request)
    {
        // Ambil jumlah entries dari parameter request, default 10
        $entries = $request->get('entries', 10);

        // Ambil nilai pencarian dari query parameter
        $search = $request->get('search', '');

        // Query untuk landing pages, dengan pencarian berdasarkan nama
        $landing_pages = LandingPage::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
            ->paginate($entries);

        return view('admin.landingPage.index', compact('landing_pages', 'search'));
    }



    // Form tambah data (hanya admin)
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            if ($request->hasFile('section_1_media')) {
                $data['section_1_media'] = $request->file('section_1_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_2_media')) {
                $data['section_2_media'] = $request->file('section_2_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_3_media')) {
                $data['section_3_media'] = $request->file('section_3_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_4_media')) {
                $data['section_4_media'] = $request->file('section_4_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_5_media')) {
                $data['section_5_media'] = $request->file('section_5_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_6_media')) {
                $data['section_6_media'] = $request->file('section_6_media')->store('uploads', 'public');
            }

            $data_to_ = [];

            foreach ($data as $label => $item) {
                if ($item !== null)
                    $data_to_[$label] = $item;
            }

            // echo json_encode($data_to_);
            // return;

            LandingPage::create($data_to_);
            return redirect()->route('admin.landingPage.index');
        }

        $products = Products::with(['category', 'classification'])->get();
        return view('admin.landingPage.create', ['products' => $products]);
    }


    // // Simpan data ke database (hanya admin)
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'bg_color' => 'nullable|string|max:20',
            'judul_landing' => 'required|string|max:255',
            'judul_section' => 'nullable|string|max:255',
            'sub_judul_section' => 'nullable|string|max:255',
            'gambar_section' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string',
            'section' => 'required|integer|min:1|max:6',
        ]);

        // Simpan ke tabel landing_pages
        $landingPage = LandingPage::create([
            'name' => $request->nama_produk,
        ]);

        // Debugging jika ID tidak ditemukan
        if (!$landingPage->id) {
            return back()->withErrors('Terjadi kesalahan: ID landing page tidak ditemukan.');
        }

        // Jika ada gambar, simpan gambar ke storage
        $gambarPath = null;
        if ($request->hasFile('gambar_section')) {
            $gambarPath = $request->file('gambar_section')->store('uploads', 'public');
        }

        // Simpan data ke tabel sections
        $section = Section::create([
            'landing_page_id' => $landingPage->id,
            'section_number' => $request->section,
            'title' => $request->judul_section ?? 'Judul Default',
            'subtitle' => $request->sub_judul_section,
            'image' => $gambarPath,
            'description' => $request->keterangan,
            'bg_color' => $request->bg_color ?? '#ffffff',
        ]);

        return redirect()->route('admin.landingPage.index')->with('success', 'Landing Page berhasil ditambahkan!');
    }


    // Menampilkan form edit (hanya admin)
    public function edit(Request $request, $id)
    {

        $landingPage = LandingPage::with('product')->findOrFail($id);
        if ($request->isMethod('post')) {
            $data = $request->all();

            if ($request->hasFile('section_1_media')) {
                $data['section_1_media'] = $request->file('section_1_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_2_media')) {
                $data['section_2_media'] = $request->file('section_2_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_3_media')) {
                $data['section_3_media'] = $request->file('section_3_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_4_media')) {
                $data['section_4_media'] = $request->file('section_4_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_5_media')) {
                $data['section_5_media'] = $request->file('section_5_media')->store('uploads', 'public');
            }

            if ($request->hasFile('section_6_media')) {
                $data['section_6_media'] = $request->file('section_6_media')->store('uploads', 'public');
            }

            $data_to_ = [];

            foreach ($data as $label => $item) {
                if ($item !== null)
                    $data_to_[$label] = $item;
            }


            $landingPage->update($data_to_);
            return redirect()->route('admin.landingPage.index');
        }
        $products = Products::all();
        return view('admin.landingPage.edit', compact('landingPage', 'products'));
    }

    public function update(Request $request, $id)
    {
        $landingPage = LandingPage::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'bg_color' => 'nullable|string|max:20', // Dipindah ke sections
            'judul_section' => 'nullable|string|max:255',
            'sub_judul_section' => 'nullable|string|max:255',
            'gambar_section' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Update data landing page
            $landingPage->update([
                'name' => $request->name,
            ]);

            // Jika ada section terkait, update juga
            $section = $landingPage->sections()->first();
            if ($section) {
                // Jika ada gambar baru, hapus yang lama & simpan yang baru
                if ($request->hasFile('gambar_section')) {
                    if ($section->image) {
                        Storage::disk('public')->delete($section->image);
                    }
                    $gambarPath = $request->file('gambar_section')->store('uploads', 'public');
                } else {
                    $gambarPath = $section->image;
                }

                $section->update([
                    'title' => $request->judul_section ?? $section->title,
                    'subtitle' => $request->sub_judul_section,
                    'image' => $gambarPath,
                    'description' => $request->keterangan,
                    'bg_color' => $request->bg_color, // Dipindahkan ke sections
                ]);
            }

            DB::commit();
            return redirect()->route('admin.landingPage.index')->with('success', 'Landing Page berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }
    public function show()
    {
        // Ambil semua data sections tanpa filtering berdasarkan landing page
        $sections = Section::all();
        return view('admin.landingPage.detail', compact('sections'));
    }

    // Menghapus landing page
    public function destroy($id)
    {
        $landingPage = LandingPage::findOrFail($id);
        $landingPage->delete();

        return redirect()->route('admin.landingPage.index')->with('success', 'Landing Page berhasil dihapus.');
    }

    public function show_landing(Request $request, $slug)
    {
        $landing = LandingPage::with(['product.product_variations', 'product.category', 'product.classification', 'product.customer_service', 'product.product_services', 'product.product_shipping.shipper'])->where('slug', $slug)->first();
        if ($landing) {
            $landing->update(['visitors' => $landing->visitors + 1]);
            return view('landing.index', ['landing' => $landing]);
        }
        return view('404');
    }
}
