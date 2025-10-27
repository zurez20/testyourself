<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Test Yourself</title>
    @section('style')
    @show
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body>
    <!-- ✅ Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#">
                Test <span style="color:#f97316;">Yourself</span>.
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/howtoplay') }}">How to Play</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/category') }}">Quiz Category</a>
                    </li>
                </ul>
                @if (Auth::guard('player')->check())
                    <h1>{{ Auth::guard('player')->user()->name }}</h1>
                @else
                    <div class="d-flex">
                        <a href="{{ url('login') }}" class="btn btn-outline-dark me-2">Log in</a>
                        <a href="{{ url('register') }}" class="btn btn-warning text-white">Join now</a>
                    </div>
                @endif

            </div>
        </div>
    </nav>

    @section('content')
    @show
    <!-- AOS Script -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
