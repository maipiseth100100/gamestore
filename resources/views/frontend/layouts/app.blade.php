<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Game Store')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        :root{
            --primary:#6366f1;
            --secondary:#06b6d4;
            --success:#22c55e;
            --dark:#020617;
            --card:#111827;
            --text:#e2e8f0;
            --muted:#94a3b8;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:#0b1120;
            color:var(--text);
            min-height:100vh;
            overflow-x:hidden;
        }

        a{
            text-decoration:none;
        }

        /* Scrollbar */

        ::-webkit-scrollbar{
            width:10px;
        }

        ::-webkit-scrollbar-thumb{
            background:var(--primary);
            border-radius:20px;
        }

        ::-webkit-scrollbar-track{
            background:#0f172a;
        }

        /* Navbar */

        .navbar{
            background:rgba(15,23,42,.95)!important;
            backdrop-filter:blur(12px);
            border-bottom:1px solid rgba(255,255,255,.05);
        }

        .navbar-brand{
            color:#fff!important;
            font-size:1.8rem;
            font-weight:800;
        }

        .nav-link{
            color:#cbd5e1!important;
            font-weight:500;
            margin-left:12px;
            transition:.3s;
        }

        .nav-link:hover{
            color:#60a5fa!important;
        }

        /* Main */

        main{
            min-height:75vh;
        }

        /* Section */

        .section-title{
            font-size:2.8rem;
            font-weight:800;
            color:white;
            margin-bottom:20px;
        }

        .section-subtitle{
            color:var(--muted);
        }

        /* Cards */

        .card{
            background:var(--card);
            border:none;
            border-radius:20px;
            overflow:hidden;
            color:white;
        }

        .game-card{
            transition:.4s;
        }

        .game-card:hover{
            transform:translateY(-10px);
            box-shadow:0 25px 50px rgba(99,102,241,.25);
        }

        .game-card img{
            height:320px;
            object-fit:cover;
            transition:.5s;
        }

        .game-card:hover img{
            transform:scale(1.05);
        }

        /* Buttons */

        .btn{
            border-radius:12px;
            font-weight:600;
        }

        .btn-primary{
            background:linear-gradient(
                135deg,
                #4f46e5,
                #6366f1
            );
            border:none;
        }

        .btn-primary:hover{
            background:linear-gradient(
                135deg,
                #4338ca,
                #4f46e5
            );
        }

        .btn-success{
            border:none;
            background:#22c55e;
        }

        /* Forms */

        .form-control,
        .form-select{
            background:#1e293b;
            border:1px solid rgba(255,255,255,.08);
            color:white;
        }

        .form-control:focus,
        .form-select:focus{
            background:#1e293b;
            color:white;
            border-color:#6366f1;
            box-shadow:none;
        }

        /* Alerts */

        .alert{
            border:none;
            border-radius:15px;
        }

        /* Tables */

        .table{
            color:white;
        }

        /* Pagination */

        .page-link{
            background:#111827;
            color:white;
            border:none;
            margin:0 4px;
            border-radius:10px;
        }

        .page-item.active .page-link{
            background:#6366f1;
        }

        /* Footer */

        footer{
            background:linear-gradient(
                180deg,
                #020617,
                #0f172a
            );
            color:white;
            margin-top:80px;
        }

        /* Mobile */

        @media(max-width:768px){

            .navbar-brand{
                font-size:1.4rem;
            }

            .section-title{
                font-size:2rem;
            }

            .game-card img{
                height:250px;
            }

        }

    </style>

    @stack('styles')

</head>

<body>

    {{-- Header --}}
    @include('frontend.layouts.header')

    {{-- Success Message --}}
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    {{-- Error Message --}}
    @if(session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    {{-- Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('frontend.layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>