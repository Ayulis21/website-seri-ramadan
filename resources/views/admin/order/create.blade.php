@extends('admin.layouts.master')

@section('title', 'Tambah Order')

@push('styles')
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .header-stripe {
            height: 15px;
            width: 100%;
            background: repeating-linear-gradient(90deg, #ffeb3b, #ffeb3b 30px, #2196f3 30px, #2196f3 60px);
            margin-bottom: 20px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .section {
            margin-bottom: 30px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
        }
        
        .quantity-btn {
            background-color: #9de0f9;
            border: none;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            cursor: pointer;
            border-radius: 4px;
        }
        
        .quantity-display {
            width: 40px;
            text-align: center;
            margin: 0 10px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }
        
        .required:after {
            content: " *";
            color: red;
        }
        
        input[type="text"], 
        textarea, 
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        
        textarea {
            height: 100px;
            resize: vertical;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .checkbox-group input {
            margin-right: 10px;
        }
        
        .section-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 18px;
        }
        
        .delivery-payment {
            display: flex;
            gap: 15px;
        }
        
        .delivery-payment > div {
            flex: 1;
        }
        
        .summary {
            border-top: 1px dashed; #ddd;
            padding-top: 15px;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .total {
            font-weight: bold;
            padding-top: 10px;
            border-top: 1px dashed red;
        }
        
        .info-box {
            background-color: #9de0f9;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        
        .submit-btn {
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
        }
        
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        
        header {
            background-color: #e8f3ff;
            text-align: center;
        }
        
        h1 {
            font-size: 28px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .promo-text {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
        }
        
        .price-container {
            margin: 15px 0;
        }
        
        .original-price {
            text-decoration: line-through;
            color: #777;
            font-size: 18px;
        }
        
        .discount-price {
            color: #000;
            font-size: 20px;
            font-weight: bold;
            margin-left: 10px;
        }
        
        .ppn {
            font-size: 12px;
            color: #777;
        }
        
        .description {
            text-align: center;
            margin: 20px 0;
            font-size: 14px;
            padding: 0 40px;
        }
        
        .promo-banner {
            background-color: #456ed8;
            color: white;
            padding: 20px;
            position: relative;
            text-align: center;
        }
        
        .promo-banner h2 {
            color: #ffde59;
            font-size: 24px;
            margin-bottom: 15px;
        }
        
        .book-covers {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        
        .book-cover {
            width: 120px;
            height: 160px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .kuota {
            position: absolute;
            top: -15px;
            right: 20px;
            background-color: #ff5252;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .features {
            margin: 20px 0;
            padding: 10px;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .feature-item:before {
            content: "•";
            color: #456ed8;
            font-weight: bold;
            margin-right: 10px;
            font-size: 20px;
        }
        
        .product-info {
            display: flex;
            flex-direction: column;
            padding: 30px 0;
            background-color: beige;
        }
        
        @media (min-width: 768px) {
            .product-info {
                flex-direction: row;
                align-items: center;
                gap: 30px;
            }
        }
        
        .product-image {
            flex: 1;
            text-align: center;
        }
        
        .product-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        
        .product-details {
            flex: 1;
            padding: 20px;
        }
        
        .product-title {
            font-size: 22px;
            margin-bottom: 15px;
            color: #333;
        }
        
        .spec-list {
            margin: 20px 0;
        }
        
        .spec-item {
            display: flex;
            margin-bottom: 8px;
        }
        
        .spec-label {
            width: 100px;
            font-weight: bold;
        }
        
        .cta-button {
            display: block;
            background-color: #456ed8;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            margin: 30px auto;
            max-width: 200px;
            transition: background-color 0.3s;
        }
        
        .cta-button:hover {
            background-color: #3456b0;
        }
        
        .testimonial {
            background-color: white;
            border-radius: 8px;
            padding: 30px 20px;
        }
        
        .testimonial-heading {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
        }
        
        .testimonial-content {
            display: flex;
            flex-direction: column;
        }
        
        @media (min-width: 768px) {
            .testimonial-content {
                flex-direction: row;
                gap: 30px;
            }
        }
        
        .testimonial-text {
            flex: 2;
            padding: 10px;
        }
        
        .testimonial-images {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .testimonial-image {
            width: 100%;
            border-radius: 5px;
        }
        
        .discount-highlight {
            color: #ff5252;
            font-weight: bold;
        }
        
        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            font-size: 12px;
            color: #777;
        }
        .section{
            padding-bottom: 0 !important;
            padding-top: 0 !important;
        }
    </style>
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
                            <div class="section">
                              <table>
                                  <tr>
                                      <th>Nama Variasi</th>
                                      <th>Jumlah</th>
                                  </tr>
                                  @foreach($landing->product->product_variations as $index => $item)
                                  <tr>
                                      <td>{{ $item->name }} x Rp. {{ number_format($item->price) }}</td>
                                      <td>
                                          <div class="quantity-control">
                                              <button class="quantity-btn decrease" data-product="seri{{$index + 1}}">-</button>
                                              <span class="quantity-display" id="quantity-seri{{$index + 1}}">0</span>
                                              <button class="quantity-btn increase" data-product="seri{{$index + 1}}">+</button>
                                          </div>
                                      </td>
                                  </tr>
                                  @endforeach
                              </table>
                          </div>
                          
                          <div class="section">
                              <div class="section-title">DATA DIRI PENERIMA</div>
                              
                              <div class="form-group">
                                  <label class="required">Nama Penerima</label>
                                  <input type="text" id="nama" placeholder="Penerima" name="customer_name" required>
                              </div>
                              
                              <div class="form-group">
                                  <label class="required">Nomor WhatsApp</label>
                                  <input type="text" id="whatsapp" placeholder="08xxxx" name="customer_phone" required>
                              </div>
                              
                              <!-- <div class="checkbox-group">
                                  <input type="checkbox" id="save-address">
                                  <label for="save-address">Gunakan alamat saya sekarang</label>
                              </div> -->
                              
                              <div class="form-group">
                                  <label class="required">Provinsi</label>
                                  <select id="provinsi" name="customer_address_province" required onchange="get_kota(this.value)">
                                      <option value="">Pilih</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label class="required">Kab / Kota</label>
                                  <select id="kota" name="customer_address_district" required onchange="get_kecamatan(this.value)">
                                      <option value="">Pilih</option>
                                  </select>
                              </div>
                              
                              <div class="form-group">
                                  <label class="required">Kecamatan</label>
                                  <select id="kecamatan" name="customer_address_subdistrict" required onchange="get_desa(this.value)">
                                      <option value="">Pilih</option>
                                  </select>
                              </div>
                              
                              <div class="form-group">
                                  <label class="required">Desa / Kelurahan</label>
                                  <select id="desa" name="customer_address_village" required>
                                      <option value="">Pilih</option>
                                  </select>
                              </div>
                              
                              <div class="form-group">
                                  <label class="required">Alamat Lengkap</label>
                                  <textarea id="alamat" placeholder="Tuliskan" required></textarea>
                              </div>
                          </div>
                          
                          <div class="section">
                              <div class="section-title">PENGIRIMAN & CARA PEMBAYARAN</div>
                              
                              <div class="delivery-payment">
                                  <div class="form-group">
                                      <label>Service</label>
                                      <select id="service_cost" onchange="updateSummary()">
                                            @foreach($landing->product->product_services as $item)
                                            <option value="{{$item->id}}">{{$item->name}} | Rp. {{ number_format($item->cost) }}</option>
                                            @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Pengiriman</label>
                                      <select id="pengiriman" onchange="updateSummary()">
                                            @foreach($landing->product->product_shipping as $item)
                                            <option value="{{$item->id}}">{{$item->shipper->name}} | Rp. {{number_format($item->cost)}}</option>
                                            @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Pembayaran</label>
                                      <select id="pembayaran">
                                            @if($landing->product->payment_transfer)
                                            <option value="transfer">Transfer</option>
                                            @endif
                                            @if($landing->product->payment_cod)
                                            <option value="cod">COD</option>
                                            @endif
                                            @if($landing->product->payment_ewallet)
                                            <option value="ewallet">E-Wallet</option>
                                            @endif
                                      </select>
                                  </div>
                              </div>
                              
                              <div class="summary">
                                  <div class="summary-row">
                                      <span>Subtotal</span>
                                      <span id="subtotal">Rp 0.00</span>
                                  </div>
                                  <div class="summary-row">
                                      <span>Biaya Service</span>
                                      <span id="service_fee">Rp 0.00</span>
                                  </div>
                                  <div class="summary-row">
                                      <span>Ongkos Kirim</span>
                                      <span id="ongkir">Rp 0.00</span>
                                  </div>
                                  <div class="summary-row total">
                                      <span>Total Bayar</span>
                                      <span id="total">Rp 0.00</span>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="info-box">
                              <p>Dikirim dari <strong>{{$landing->product->region_subdistrict}}, {{$landing->product->region_district}}, {{$landing->product->region_province}}, Indonesia</strong></p>
                              <!-- <p>Perkiraan tiba 19 Februari - 21 Februari</p> -->
                          </div>
                          <button class="submit-btn">BUAT PESANAN SEKARANG</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    let provinsi;
    let kota;
    let kecamatan;
    let desa;
    // Simple countdown timer for the promotion
    document.addEventListener('DOMContentLoaded', async function() {
        // Set countdown to 24 hours from now
        const tomorrow = new Date();
        tomorrow.setHours(tomorrow.getHours() + 24);
        
        // Update CTA buttons on hover
        const ctaButtons = document.querySelectorAll('.cta-button');
        ctaButtons.forEach(button => {
            button.addEventListener('mouseover', function() {
                this.textContent = 'Pesan Sekarang!';
            });
            
            button.addEventListener('mouseout', function() {
                this.textContent = 'Beli Sekarang';
            });
        });
        
        // Add smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // getting the data of provinve
        provinsi = await (await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)).json();

        const provinces_el = find('#provinsi');
        provinsi.forEach((item)=>{
            provinces_el.innerHTML += `<option value="${item.id}">${item.name}</option>`;
        })
    });
    const find = (query)=>{
        return document.querySelector(query);
    }
    const get_kota = async (query)=>{
        reset_selector(['#kecamatan','#desa']);
        kota = await (await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${query}.json`)).json();
        const kota_el = find('#kota');
        kota_el.innerHTML = `<option value="">Pilih</option>`;
        kota.forEach((item)=>{
            kota_el.innerHTML += `<option value="${item.id}">${item.name}</option>`;
        })
    }
    const get_kecamatan = async (query)=>{
        reset_selector(['#desa']);
        kecamatan = await (await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${query}.json`)).json();
        const kecamatan_el = find('#kecamatan');
        kecamatan_el.innerHTML = `<option value="">Pilih</option>`;
        kecamatan.forEach((item)=>{
            kecamatan_el.innerHTML += `<option value="${item.id}">${item.name}</option>`;
        })
    }
    const get_desa = async (query)=>{
        desa = await (await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${query}.json`)).json();
        const desa_el = find('#desa');
        desa_el.innerHTML = `<option value="">Pilih</option>`;
        desa.forEach((item)=>{
            desa_el.innerHTML += `<option value="${item.id}">${item.name}</option>`;
        })
    }
    const reset_selector = (els)=>{
        els.forEach((items)=>{
            find(els).innerHTML = `<option value="">Pilih</option>`;
        })
    }
</script>
<script>
    // Product data
    const products = {};

    // Cart data
    const cart = {};

    let shipping_cost = 0;
    let service_cost = 0;

    const product_variations = {!! json_encode($landing->product->product_variations) !!};
    const product_shipping = {!! json_encode($landing->product->product_shipping) !!};
    const product_services = {!! json_encode($landing->product->product_services) !!};

    product_variations.forEach((item,i)=>{
        products['seri'+(i+1)] = {name:item.name,price:item.price, variation_id:item.id};
        cart['seri'+(i+1)] = 0;
    })

    // console.log(product_variations);

    // Format currency
    function formatCurrency(amount) {
        return 'Rp ' + amount.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    function get_service_cost(id){
        let cost = null;
        for(let i=0;i<product_services.length;i++){
            const item = product_services[i];
            if(item.id === id){
                cost = item.cost;
                break;
            }
        }
        return cost ?? 0;
    }

    function get_shipping_cost(id){
        let cost = null;
        for(let i=0;i<product_shipping.length;i++){
            const item = product_shipping[i];
            if(item.id === id){
                cost = item.cost;
                break;
            }
        }
        return cost ?? 0;
    }

    // Update summary
    function updateSummary() {
        let subtotal = 0;
        for (const [productId, quantity] of Object.entries(cart)) {
            subtotal += products[productId].price * quantity;
        }

        // working on service cost
        service_cost = get_service_cost(Number(find('#service_cost').value));

        // working on shipping cost
        shipping_cost = get_shipping_cost(Number(find('#pengiriman').value));
        
        // For this demo, shipping cost is fixed at 0
        const total = subtotal + shipping_cost + service_cost;
        
        document.getElementById('subtotal').textContent = formatCurrency(subtotal);
        document.getElementById('ongkir').textContent = formatCurrency(shipping_cost);
        document.getElementById('service_fee').textContent = formatCurrency(service_cost);
        document.getElementById('total').textContent = formatCurrency(total);
    }

    // Handle quantity changes
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.product;
            const isIncrease = this.classList.contains('increase');
            
            if (isIncrease) {
                cart[productId]++;
            } else if (cart[productId] > 0) {
                cart[productId]--;
            }
            
            // Update display
            document.getElementById(`quantity-${productId}`).textContent = cart[productId];
            updateSummary();
        });
    });

    // Form submit event
    document.querySelector('.submit-btn').addEventListener('click', function(e) {
        e.preventDefault();
        
        // Validation
        const nama = document.getElementById('nama').value;
        const whatsapp = document.getElementById('whatsapp').value;
        const alamat = document.getElementById('alamat').value;
        const provinsi_ = document.getElementById('provinsi').value;
        const kota_ = document.getElementById('kota').value;
        const kecamatan_ = document.getElementById('kecamatan').value;
        const desa_ = document.getElementById('desa').value;
        
        if (!nama || !whatsapp || !alamat || !provinsi_ || !kota_ || !kecamatan_ || !desa_) {
            alert('Harap isi semua kolom yang wajib diisi (bertanda *)');
            return;
        }
        
        // Check if cart is empty
        const totalItems = Object.values(cart).reduce((sum, quantity) => sum + quantity, 0);
        if (totalItems === 0) {
            alert('Keranjang belanja Anda kosong. Silakan tambahkan produk.');
            return;
        }

        const order = {
            customer_data:{
                name: nama,
                phone: whatsapp,
                address:{
                    full: alamat,
                    province: (()=>{
                        let name;
                        for(let i=0;i<provinsi.length;i++){
                            if(provinsi[i].id === provinsi_){
                                name = provinsi[i].name
                            }
                        }
                        return name;
                    })(),
                    district: (()=>{
                        let name;
                        for(let i=0;i<kota.length;i++){
                            if(kota[i].id === kota_){
                                name = kota[i].name
                            }
                        }
                        return name;
                    })(),
                    subdistrict: (()=>{
                        let name;
                        for(let i=0;i<kecamatan.length;i++){
                            if(kecamatan[i].id === kecamatan_){
                                name = kecamatan[i].name
                            }
                        }
                        return name;
                    })(),
                    village: (()=>{
                        let name;
                        for(let i=0;i<desa.length;i++){
                            if(desa[i].id === desa_){
                                name = desa[i].name
                            }
                        }
                        return name;
                    })()
                }
            },
            order_data:{
                product_id: {{$landing->product->id}},
                cart:[]
            },
            shipping: Number(find('#pengiriman').value),
            service: Number(find('#service_cost').value),
            payment_method: find('#pembayaran').value
        };

        // getting the order id
        for(let i in cart){
            if(cart[i] > 0){
                order.order_data.cart.push({
                    qty:cart[i],
                    variation_id:products[i].variation_id
                });
            }
        }

        Swal.fire({
          title: 'Processing...',
          html: 'Please wait while we process your request.',
          allowOutsideClick: false,
          didOpen: () => {
            Swal.showLoading();
          }
        });


        // making order request to server
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/order',
            type: 'POST',
            data: JSON.stringify(order),
            contentType: 'application/json',
            success: function(response) {
                Swal.close();
                Swal.fire({
                    icon: 'success',
                    title: 'Pesanan Berhasil!',
                    text: 'Pesanan Anda telah berhasil dibuat.',
                }).then(()=>{
                    location.href = '/admin/order/index';
                });
            },
            error: function(xhr, status, error) {
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Terjadi kesalahan saat membuat pesanan. Silakan coba lagi.',
                });
                console.error('Order Error:', error);
            }
        });

        
        // alert('Pesanan berhasil dibuat!');
        // Here you would normally submit the form data to a server
    });

    // Initialize
    updateSummary();
</script>
@endsection