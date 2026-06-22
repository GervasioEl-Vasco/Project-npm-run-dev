<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PING! Laundry - Bersih, Wangi & Cepat</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS (via Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="antialiased bg-gradient-to-tr from-pink-50 via-white to-pink-100 min-h-screen text-gray-800">

    <!-- Navbar -->
    <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center bg-white/60 backdrop-blur-md sticky top-0 z-50 border-b border-pink-100">
        <div class="flex items-center gap-2">
            <span class="text-2xl">🫧</span>
            <span class="text-2xl font-black tracking-wider text-pink-600">PING!<span class="text-gray-800 font-medium">Laundry</span></span>
        </div>
        
        <div>
<<<<<<< HEAD
            <a href="{{ route('login') }}" class="btn btn-outline-danger me-2">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-danger">
                Daftar
            </a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6">
                <h1>
                    PING LAUNDRY
                </h1>

                <p>
                    Solusi laundry modern, cepat, bersih, dan terpercaya.
                    Antar jemput laundry langsung ke rumah Anda.
                </p>

                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-pink me-2">
                        Dashboard
                    </a>

                    <a href="#layanan" class="btn btn-outline-light">
                        Lihat Layanan
                    </a>
=======
            @if (Route::has('login'))
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2.5 px-6 rounded-xl transition duration-200 shadow-lg shadow-pink-200">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-pink-600 font-bold transition">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2.5 px-6 rounded-xl transition duration-200 shadow-lg shadow-pink-200">
                                Daftar Baru
                            </a>
                        @endif
                    @endauth
>>>>>>> ui-ux
                </div>
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="max-w-7xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <span class="bg-pink-100 text-pink-700 text-xs font-black uppercase tracking-widest px-4 py-1.5 rounded-full inline-block">
                ✨ Solusi Cuci Pakaian Terbaik Anda
            </span>
            <h1 class="text-5xl lg:text-6xl font-black text-gray-900 leading-tight">
                Cucian <span class="text-pink-600 underline decoration-pink-300">Bersih</span>, <br>
                Wangi & Rapi <br>
                Tanpa Harus Ribet!
            </h1>
            <p class="text-gray-600 text-lg leading-relaxed max-w-md">
                Percayakan pakaian kotor Anda kepada PING! Laundry. Proses cepat, pengecekan detail pakaian, dengan harga ekonomis.
            </p>
            <div class="flex items-center gap-4 pt-2">
                <a href="{{ route('register') }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-3.5 px-8 rounded-xl transition duration-200 shadow-xl shadow-pink-200 text-base">
                    Mulai Laundry Sekarang
                </a>
                <a href="#layanan" class="text-pink-600 hover:text-pink-700 font-bold flex items-center gap-1.5 transition">
                    Lihat Layanan Kami <span class="text-lg">→</span>
                </a>
            </div>
        </div>

        <!-- Hero Graphic (Bubbles CSS) -->
        <div class="relative flex justify-center items-center h-[400px]">
            <!-- Big Pink Bubble -->
            <div class="absolute w-72 h-72 rounded-full bg-pink-400/20 blur-2xl animate-pulse"></div>
            <!-- Glassmorphism Card -->
            <div class="relative bg-white/70 backdrop-blur-lg border border-pink-100 p-8 rounded-3xl shadow-2xl max-w-sm w-full space-y-6">
                <div class="flex items-center justify-between">
                    <span class="text-sm font-bold text-gray-500">Estimasi Cuci</span>
                    <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">Proses Express</span>
                </div>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span>Layanan Cuci Setrika</span>
                        <span class="font-bold text-gray-800">Rp 10.000 / Kg</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span>Pengecekan Fisik Saku</span>
                        <span class="text-green-600 font-bold flex items-center gap-1">✓ Checked</span>
                    </div>
                </div>
                <div class="border-t border-pink-50 pt-4 flex justify-between items-center">
                    <div>
                        <p class="text-xs text-gray-400">Total Pembayaran</p>
                        <p class="text-2xl font-black text-pink-600">Rp 50.000</p>
                    </div>
                    <span class="text-3xl">🧺</span>
                </div>
            </div>
        </div>
    </header>

    <!-- Kelebihan Section -->
    <section class="bg-white/80 py-20 border-t border-pink-50" id="layanan">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-xl mx-auto mb-16 space-y-3">
                <span class="text-pink-600 text-sm font-extrabold uppercase tracking-widest">Kenapa Harus PING! Laundry?</span>
                <h2 class="text-4xl font-black text-gray-900">Kami Menjaga Pakaian Anda Seperti Milik Sendiri</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-gradient-to-b from-white to-pink-50/50 p-8 rounded-2xl border border-pink-100 hover:shadow-xl transition duration-300">
                    <span class="text-4xl bg-pink-100 p-4 rounded-xl inline-block mb-6">🔍</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Proses Checking Detail</h3>
                    <p class="text-gray-600">
                        Kami menjamin tidak ada barang berharga tertinggal di saku dan memisahkan pakaian luntur sebelum pencucian.
                    </p>
                </div>
                <!-- Card 2 -->
                <div class="bg-gradient-to-b from-white to-pink-50/50 p-8 rounded-2xl border border-pink-100 hover:shadow-xl transition duration-300">
                    <span class="text-4xl bg-pink-100 p-4 rounded-xl inline-block mb-6">⚡</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Proses Cepat & Tepat Waktu</h3>
                    <p class="text-gray-600">
                        Pilihan layanan express kilat siap membantu saat kondisi darurat. Pakaian kembali bersih tepat waktu.
                    </p>
                </div>
                <!-- Card 3 -->
                <div class="bg-gradient-to-b from-white to-pink-50/50 p-8 rounded-2xl border border-pink-100 hover:shadow-xl transition duration-300">
                    <span class="text-4xl bg-pink-100 p-4 rounded-xl inline-block mb-6">💵</span>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Metode Pembayaran Mudah</h3>
                    <p class="text-gray-600">
                        Mendukung pembayaran langsung tunai di kasir maupun upload bukti transfer bank secara digital.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="items-center gap-2">
                <span class="text-xl font-black tracking-wider text-pink-500">PING!<span class="text-white font-medium">Laundry</span></span>
            </div>
        </div>
    </footer>

</body>
</html>