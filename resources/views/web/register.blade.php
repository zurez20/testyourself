@extends('layouts.web')

@section('style')
    <style>
        body {
            background: linear-gradient(to right, #f97316, #ffb347);
            font-family: 'Nunito', sans-serif;
        }

        .register-box {
            max-width: 500px;
            margin: 60px auto;
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #f97316;
        }

        .btn-oranges {
            background-color: #f97316 !important;
            color: #fff !important;
        }

        .btn-oranges:hover {
            background-color: #ff7f24;
        }

        .logo-text {
            font-weight: bold;
            font-size: 1.8rem;
            color: #f97316;
        }

        .register-box h4 {
            font-weight: 700;
        }
    </style>
@endsection

@section('content')
    <div class="register-box text-center">
        <div class="logo-text mb-3">Test Yourself</div>
        <h4 class="mb-4">Create Your Account</h4>
        <form method="POST" action="{{ route('player.register') }}">
            @csrf
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name"
                    required>
            </div>
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Create Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Create password"
                    required>
            </div>
            <div class="mb-3 text-start">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                    placeholder="Re-enter password" required>
            </div>
            <button type="submit" class="btn btn-oranges w-100 mt-3">Register</button>
        </form>


        <p class="mt-4 mb-0">Already have an account? <a href="{{ url('/login') }}" class="text-decoration-none"
                style="color: #f97316">Log in</a></p>
    </div>
@endsection
