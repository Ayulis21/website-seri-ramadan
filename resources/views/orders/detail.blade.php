<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
        }
        .order-container {
            max-width: 600px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 4px;
            padding: 30px;
            border: 2px dashed gainsboro;
        }
        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .unpaid-badge {
            background-color: #f0f0f0;
            color: #666;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .menunggu-konfirmasi {
            color: #ff9800;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: rgba(255, 152, 0, 0.1);
            display: inline-block;
            margin-top: 5px;
        }
        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .divider {
            border-top: 1px solid #eee;
            margin: 15px 0;
        }
        .total-row {
            font-weight: bold;
        }
        .transfer-amount {
            color: #2e7d32;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }
        .btn-copy {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            color: #333;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px auto;
            font-size: 14px;
            width: fit-content;
        }
        .btn-copy i {
            margin-right: 8px;
        }
        .bank-section {
            border: 1px dashed #ccc;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            margin: 20px auto;
            max-width: 250px;
        }
        .bank-logo {
            max-width: 80px;
            margin-bottom: 10px;
        }
        .confirmation-text {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }
        .confirmation-link {
            color: #1976d2;
            text-decoration: none;
        }
        .customer-info {
            margin-bottom: 15px;
        }
        .info-item {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="order-container">
            <div class="order-header">
                <div>
                    <div><strong>Order ID:</strong> {{ $order->id }}</div>
                    <div class="text-muted small">Tanggal Pemesanan: {{ $order->date_created }}</div>
                </div>
                <div class="text-end">
                    <div class="unpaid-badge">{{ $order->payment_status }}</div>
                    <div class="menunggu-konfirmasi">{{$order->orders_status}}</div>
                </div>
            </div>

            <div class="customer-info">
                <div class="info-item"><strong>Nama:</strong> {{ $order->customer_name }}</div>
                <div class="info-item"><strong>No. Telepon/HP:</strong> {{ $order->customer_phone }}</div>
                <div class="info-item"><strong>Alamat:</strong> {{ $order->customer_address_full }}</div>
                <div class="info-item"><strong>Kurir Pengiriman:</strong> {{ $order->shipper->name }} - {{ $order->service->name }}</div>
                <div class="info-item"><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</div>
            </div>

            <div class="item-section">
                <div class="item-title fw-bold mb-2">Order Details</div>
                @foreach($order->details as $item)
                <div class="order-item">
                    <div>Harga "{{ $item->variation->name }}" × {{ $item->qty }}</div>
                    <div>Rp {{ number_format($item->qty * $item->variation->price) }}</div>
                </div>
                @endforeach
                <div class="order-item">
                    <div>Biaya Pengiriman</div>
                    <div>Rp {{number_format($order->shipping_cost)}}</div>
                </div>
                <div class="order-item">
                    <div>Biaya Service</div>
                    <div>Rp {{number_format($order->service->cost)}}</div>
                </div>
                <div class="order-item">
                    <div>Kode Unik</div>
                    <div>Rp {{number_format($order->payment_unique)}}</div>
                </div>
                <div class="divider"></div>
                <div class="order-item total-row">
                    <div>Total:</div>
                    <div>Rp {{number_format($order->total_price)}}</div>
                </div>
            </div>

            <div class="text-center mt-4">
                <p>Pesanan Anda sudah kami terima, silakan transfer senilai</p>
                <div class="transfer-amount">Rp {{number_format($order->total_price)}}</div>
                <button class="btn-copy">
                    <i class="fas fa-copy"></i> Salin Jumlah
                </button>
            </div>

            <div class="text-center mt-3">
                <p>Ke salah satu bank dibawah ini:</p>
            </div>

            <div class="bank-section">
                <div class="mb-2">
                    <div>No. Rek: 8960275340</div>
                    <div>Atas nama: Khoirul Fawaid</div>
                </div>
                <button class="btn-copy">
                    <i class="fas fa-copy"></i> Salin No. Rekening
                </button>
            </div>

            <div class="confirmation-text">
                Setelah Anda melakukan pembayaran,<br>
                silahkan isi <a href="#" class="confirmation-link">form konfirmasi pembayaran disini</a>.
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Copy functionality
        document.querySelectorAll('.btn-copy').forEach(button => {
            button.addEventListener('click', function() {
                const copyText = this.innerText.includes('Jumlah') ? '206804' : '8960275340';
                navigator.clipboard.writeText(copyText).then(() => {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check"></i> Tersalin';
                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 2000);
                });
            });
        });

        @if(isset($_GET['print']) and $_GET['print'] === '1')
        print();
        @endif
    </script>
</body>
</html>