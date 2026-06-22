@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-pink-50">

    <!-- Navbar -->
    <nav class="bg-pink-600 shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-white">
                🧺 PING LAUNDRY
            </h1>

            <div class="flex items-center gap-4">
                <span class="text-white">
                    Halo, {{ Auth::user()->name }}
                </span>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-pink-100 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="container mx-auto px-6 py-10">
        <div class="bg-gradient-to-r from-pink-500 to-pink-700 rounded-3xl p-10 text-white shadow-xl">
            <h2 class="text-4xl font-bold mb-3">
                Selamat Datang di PING LAUNDRY
            </h2>

            <p class="text-pink-100 text-lg">
                Solusi Laundry Cepat, Bersih, Wangi, dan Profesional.
            </p>
        </div>
    </section>

    <!-- Statistik -->
    <section class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="text-gray-500">Total Pelanggan</h3>
                <p class="text-3xl font-bold text-pink-600 mt-2">125</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="text-gray-500">Order Hari Ini</h3>
                <p class="text-3xl font-bold text-pink-600 mt-2">32</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="text-gray-500">Sedang Diproses</h3>
                <p class="text-3xl font-bold text-pink-600 mt-2">18</p>
            </div>

            <div class="bg-white rounded-2xl p-6 shadow-md">
                <h3 class="text-gray-500">Pendapatan</h3>
                <p class="text-3xl font-bold text-pink-600 mt-2">
                    Rp 2,5 Jt
                </p>
            </div>

        </div>
    </section>

    <!-- Menu Cepat -->
    <section class="container mx-auto px-6 py-10">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">
            Menu Cepat
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="#" class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                <div class="text-5xl mb-3">🧺</div>
                <h3 class="font-bold text-xl text-pink-600">
                    Data Laundry
                </h3>
                <p class="text-gray-500">
                    Kelola pesanan laundry pelanggan.
                </p>
            </a>

            <a href="#" class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                <div class="text-5xl mb-3">👥</div>
                <h3 class="font-bold text-xl text-pink-600">
                    Pelanggan
                </h3>
                <p class="text-gray-500">
                    Lihat data seluruh pelanggan.
                </p>
            </a>

            <a href="#" class="bg-white rounded-2xl p-6 shadow-md hover:shadow-xl transition">
                <div class="text-5xl mb-3">💰</div>
                <h3 class="font-bold text-xl text-pink-600">
                    Laporan
                </h3>
                <p class="text-gray-500">
                    Pantau pemasukan dan transaksi.
                </p>
            </a>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white border-t mt-10">
        <div class="container mx-auto px-6 py-4 text-center text-gray-500">
            © {{ date('Y') }} PING LAUNDRY — Cepat • Bersih • Wangi
        </div>
    </footer>

</div>
@endsection