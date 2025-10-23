@extends('layouts.auth')

@section('title', 'Login')

@section('header')

@endsection

@section('content')
    <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
        <div class ="w-md-400px">
            <form id="kt_sign_in_form" class="form w-100" novalidate="novalidate" method="POST">
                <div class="d-flex mb-9 justify-content-center align-items-center">
                    <img alt="Logo" src="{{ asset('assets/media/logos/testyourself_logo_no_bg.png') }}"
                        style="height: 190px; width: auto;" />
                </div>
                <div class="text-center mb-5">
                    <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                </div>

                <div class="fv-row mb-3" style="text-align: left;">
                    <label class="required form-label fs-6 fw-bolder text-dark">Phone Number </label>
                    <input type="text" placeholder="Enter Your Phone Number" id="Login" name="login"
                        autocomplete="off" class="numOnly form-control bg-transparent" maxlength="10" />
                </div>
                <div class="fv-row mb-3" style="text-align: left;" data-kt-password-meter="true">
                    <label class="required form-label fs-6 fw-bolder text-dark">Password </label>
                    <div class="position-relative mb-3">
                        <input type="password" placeholder="Enter Your Password" id="Password" name="password"
                            autocomplete="off" class="form-control bg-transparent" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                            data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                    </div>
                </div>
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div></div>
                    <a href="{{ url('/admin/forgetpassword') }}" class="link-primary">Forgot Password ?</a>
                </div>
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                        <span class="indicator-label">Sign In</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('footer')
    <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
@endsection
