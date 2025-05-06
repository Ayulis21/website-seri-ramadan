<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 - Halaman Tidak Ditemukan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen px-4">

  <div class="text-center">
    <h1 class="text-6xl font-bold text-blue-600 mb-4">404</h1>
    <h2 class="text-2xl font-semibold mb-2">Oops! Halaman tidak ditemukan</h2>
    <p class="text-gray-600 mb-6">Halaman yang kamu cari mungkin telah dipindahkan atau tidak tersedia.</p>
    <a href="{{ url()->previous('/') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition-all duration-200">
      Kembali ke Beranda
    </a>
  </div>

</body>
</html>
