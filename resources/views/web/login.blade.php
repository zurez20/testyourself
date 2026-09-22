@extends('layouts.web')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <style>
        body {
            background: linear-gradient(to right, #f97316, #ffb347);
            font-family: 'Nunito', sans-serif;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-brand span {
            color: #f97316;
            /* Orange */
        }

        .navbar-nav .nav-link {
            color: #333;
            font-weight: 500;
            margin: 0 10px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            color: #f97316;
        }

        .btn-outline-dark {
            border-color: #333;
            color: #333;
        }

        .btn-outline-dark:hover {
            background-color: #333;
            color: #fff;
        }

        .btn-warning {
            background-color: #f97316;
            border: none;
        }

        .btn-warning:hover {
            background-color: #e65c00;
        }

        .login-box {
            max-width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #f97316;
        }

        .btn-orange {
            background-color: #f97316 !important;
            color: #fff !important;
        }

        .btn-orange:hover {
            background-color: #ff7f24 !important;
        }

        .logo-text {
            font-weight: bold;
            font-size: 1.8rem;
            color: #f97316;
        }

        .login-box h4 {
            font-weight: 700;
        }
    </style>
@endsection
@section('content')
    <div class="login-box text-center">
        <div class="logo-text mb-3">Test Yourself</div>
        <h4 class="mb-4">Welcome Back!</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn btn-orange w-100 mt-3">Login</button>
        </form>

        <p class="mt-4 mb-0">
            Don't have an account?
            <a href="{{ url('register') }}" class="text-decoration-none" style="color: #f97316;">Join now</a>
        </p>
    </div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toastr messages
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        // Disable button after form submit
        const form = document.querySelector('form');
        const submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.innerHTML = 'Logging in...';
        });
    });
</script>
@endsection
