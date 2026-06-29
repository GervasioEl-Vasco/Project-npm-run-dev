<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PING! Laundry - Bersih, Wangi & Cepat</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            /* Warna cadangan jika gambar background gagal dimuat */
            background-color: #c4aeb9; 
        }
    </style>
</head>
<body class="text-[#1b1b18] min-h-screen flex flex-col" 
      style="background-image: url('{{ asset('images/bg-landing.png') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <nav class="max-w-7xl mx-auto px-6 py-6 w-full flex justify-between items-center relative z-50">

        <!-- Spacer sebelah kiri agar logo seimbang tepat di tengah -->
        <div class="hidden md:flex flex-1"></div>

        <!-- Logo PING! Laundry di tengah dan diperbesar -->
        <div class="flex-1 flex justify-start md:justify-center items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="PING! Laundry Logo" class="h-28 lg:h-32 w-auto object-contain drop-shadow-md">
            </a>
        </div>
        
        <div class="flex-1 flex justify-end">
            @if (Route::has('login'))
                <div class="flex items-center gap-4 lg:gap-8">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-2.5 px-8 rounded-xl transition duration-200 shadow-md">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-900 hover:text-[#d94f87] font-bold text-lg transition">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-2.5 px-8 rounded-xl transition duration-200 shadow-md">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </nav>

    <main class="flex-1 flex flex-col justify-center max-w-7xl mx-auto px-6 w-full pt-12 pb-24 space-y-24">
        
        <section id="harga" class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="space-y-6">
                <span class="bg-[#e49bb7] text-white text-sm font-bold uppercase tracking-wider px-5 py-1.5 rounded-full inline-block">
                    Solusi Cuci Pakaian Anda
                </span>
                <h1 class="text-5xl lg:text-6xl font-black text-gray-900 leading-[1.1] uppercase">
                    Cucian <span class="text-[#d94f87] underline decoration-[#d94f87]/40">Bersih</span><br>
                    Wangi Dan Rapi<br>
                    Tanpa Harus Ribet
                </h1>
                <p class="text-gray-700 text-lg leading-relaxed max-w-md">
                    Percayakan pakaian kotor Anda kepada PING! Laundry. Proses cepat, pengecekan detail pakaian, dengan harga ekonomis.
                </p>
                <div class="flex items-center gap-4 pt-2">
                    <a href="{{ route('register') }}" class="bg-[#d94f87] hover:bg-pink-700 text-white font-bold py-3.5 px-6 rounded-lg transition duration-200 shadow-lg text-sm">
                        Mulai Laundry Sekarang
                    </a>
                    <a href="#layanan" class="text-gray-900 hover:text-[#d94f87] font-extrabold flex items-center gap-1.5 transition text-sm">
                        Kelebihan kami ---->
                    </a>
                </div>
            </div>

            <div class="flex justify-center lg:justify-end">
                <div class="bg-white p-8 rounded-[2rem] shadow-xl max-w-sm w-full space-y-6">
                    <div class="flex items-center justify-between pb-2">
                        <span class="text-sm font-black text-gray-900 tracking-wide">Daftar Layanan</span>
                        <span class="bg-[#e49bb7] text-white text-xs font-bold px-3 py-1 rounded-full">Harga Terbaik</span>
                    </div>
        
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-gray-800">Cuci Kering</span>
                            <span class="font-black text-gray-900 text-xs">Rp7.000/Kg</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-gray-800">Cuci Setrika</span>
                            <span class="font-black text-gray-900 text-xs">Rp10.000/Kg</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-xs font-bold text-gray-800">Setrika aja</span>
                            <span class="font-black text-gray-900 text-xs">Rp5.000/Kg</span>
                        </div>
                    </div>
                    
                    <div class="pt-6 flex justify-between items-end">
                        <div>
                            <p class="text-[10px] text-gray-500 font-medium">Proses Cepat & Bersih</p>
                            <p class="text-xs font-black text-gray-900">PING! Laundry Express</p>
                        </div>
                        <span class="font-black text-gray-900 text-xs">Rp50.000/Kg</span>
                    </div>
                </div>
            </div>
        </section>

        <section id="layanan" class="space-y-12">
            <div class="text-center max-w-2xl mx-auto">
                <h2 class="text-4xl lg:text-5xl font-black text-black leading-tight">
                    Kami Menjaga Pakaian Anda<br>Seperti Milik Sendiri
                </h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-[#e8a3c0] rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#ba2b65]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-900 mb-2">Proses Cheking Detail</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Kami menjamin tidak ada barang berharga tertinggal di asaku dan memisahkan pakaian luntur sebelum pencucian.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-[#e8a3c0] rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#ba2b65]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-900 mb-2">Proses Cepat & Tepat Waktu</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Pilihan layanan express kilat siap membantu saat kondisi darurat. Kembali bersih tepat waktu.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-xl transition duration-300">
                    <div class="w-14 h-14 bg-[#e8a3c0] rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-[#ba2b65]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-extrabold text-gray-900 mb-2">Metode Pembayaran</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Mendukung pembayaran langsung tunai di kasir maupun upload bukti bank secara digital.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <span class="text-xl font-black tracking-wider text-pink-500">PING!<span class="text-white font-medium">Laundry</span></span>
            </div>
            <p class="text-sm">&copy; {{ date('Y') }} PING! Laundry. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>