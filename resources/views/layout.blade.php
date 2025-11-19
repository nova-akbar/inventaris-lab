<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Lab</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        /* NAVBAR PREMIUM */
        .navbar-custom {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 14px 40px;
        }

        .navbar-logo {
            height: 45px;
            margin-right: 10px;
        }

        .navbar-brand-text {
            font-weight: 700;
            font-size: 20px;
            color: #222;
            letter-spacing: 0.5px;
        }

        .nav-link-custom {
            position: relative;
            padding: 8px 14px !important;
            font-size: 16px;
            font-weight: 500;
            color: #333 !important;
            transition: 0.3s;
        }

        /* Orange hover effect */
        .nav-link-custom:hover {
            color: #f38b45 !important;
        }

        /* Animated underline */
        .nav-link-custom::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            background: #f38b45;
            left: 50%;
            bottom: 2px;
            transition: 0.3s;
        }

        .nav-link-custom:hover::after {
            width: 60%;
            left: 20%;
        }

        /* Active state */
        .nav-active {
            color: #f38b45 !important;
        }

        .nav-active::after {
            width: 60%;
            left: 20%;
        }
    </style>

</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">

        {{-- LOGO + TEXT --}}
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
    <img src="{{ asset('storage/lab-foto/logo-lab.png') }}" 
         alt="Logo" 
         class="navbar-logo" 
         style="height: 45px; width:auto; margin-right:10px;">
    <span class="navbar-brand-text">Inventaris Lab</span>
</a>



        {{-- TOGGLER MOBILE --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->is('/') ? 'nav-active' : '' }}"
                       href="{{ url('/') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->is('lab*') ? 'nav-active' : '' }}"
                       href="{{ route('lab.index') }}">
                        Lab
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->is('barang*') ? 'nav-active' : '' }}"
                       href="{{ route('barang.index') }}">
                        Barang
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->is('mutasi_barang*') ? 'nav-active' : '' }}"
                       href="{{ route('mutasi_barang.index') }}">
                        Mutasi Barang
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

{{-- PAGE CONTENT --}}
@yield('content')

</body>
</html>
