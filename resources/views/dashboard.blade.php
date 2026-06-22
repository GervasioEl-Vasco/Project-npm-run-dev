<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PING LAUNDRY</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Segoe UI',sans-serif;
            background:#fff5f8;
        }

        .navbar{
            background:white;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }

        .navbar-brand{
            color:#ff4f9d !important;
            font-weight:700;
            font-size:1.5rem;
        }

        .hero{
            min-height:90vh;
            display:flex;
            align-items:center;
            background:
            linear-gradient(
            135deg,
            #ff4f9d,
            #ff7eb3);
            color:white;
        }

        .hero h1{
            font-size:4rem;
            font-weight:800;
        }

        .hero p{
            font-size:1.2rem;
            margin-top:15px;
        }

        .btn-pink{
            background:white;
            color:#ff4f9d;
            border:none;
            font-weight:600;
            padding:12px 30px;
            border-radius:50px;
        }

        .btn-pink:hover{
            background:#ffe3ef;
        }

        .feature-card{
            border:none;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            transition:.3s;
        }

        .feature-card:hover{
            transform:translateY(-8px);
        }

        .section-title{
            color:#ff4f9d;
            font-weight:700;
        }

        .footer{
            background:#ff4f9d;
            color:white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            🧺 PING LAUNDRY
        </a>

        <div>
            <a href="/login" class="btn btn-outline-danger me-2">
                Login
            </a>

            <a href="/register" class="btn btn-danger">
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
                    <a href="/dashboard" class="btn btn-pink me-2">
                        Dashboard
                    </a>

                    <a href="#layanan" class="btn btn-outline-light">
                        Lihat Layanan
                    </a>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <img
                    src="https://cdn-icons-png.flaticon.com/512/2933/2933245.png"
                    width="350"
                    class="img-fluid"
                    alt="Laundry">
            </div>

        </div>

    </div>
</section>

<!-- Layanan -->
<section id="layanan" class="py-5">
    <div class="container">

        <h2 class="text-center section-title mb-5">
            Layanan Kami
        </h2>

        <div class="row">

            <div class="col-md-3 mb-4">
                <div class="card feature-card p-4 text-center">
                    <h1>👕</h1>
                    <h5>Cuci Kering</h5>
                    <p>Pakaian bersih dan wangi.</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card feature-card p-4 text-center">
                    <h1>🧺</h1>
                    <h5>Cuci Setrika</h5>
                    <p>Praktis dan siap pakai.</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card feature-card p-4 text-center">
                    <h1>⚡</h1>
                    <h5>Express</h5>
                    <p>Selesai dalam hitungan jam.</p>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card feature-card p-4 text-center">
                    <h1>🚚</h1>
                    <h5>Pickup Delivery</h5>
                    <p>Antar jemput ke lokasi Anda.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Statistik -->
<section class="py-5 bg-white">
    <div class="container">

        <div class="row text-center">

            <div class="col-md-3">
                <h2 class="text-danger">1000+</h2>
                <p>Pelanggan</p>
            </div>

            <div class="col-md-3">
                <h2 class="text-danger">5000+</h2>
                <p>Pesanan</p>
            </div>

            <div class="col-md-3">
                <h2 class="text-danger">99%</h2>
                <p>Kepuasan</p>
            </div>

            <div class="col-md-3">
                <h2 class="text-danger">24/7</h2>
                <p>Layanan</p>
            </div>

        </div>

    </div>
</section>

<!-- Footer -->
<footer class="footer py-4">
    <div class="container text-center">
        <h5>PING LAUNDRY</h5>
        <p class="mb-0">
            © 2026 PING LAUNDRY. All Rights Reserved.
        </p>
    </div>
</footer>

</body>
</html>