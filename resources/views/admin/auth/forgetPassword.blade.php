@extends('layouts.auth')

@section('title', 'Forget Password')

@section('header')

@endsection

@section('content')

<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
	<div class="w-md-400px">
		<form class="form w-100" novalidate="novalidate" id="kt_new_password_form" data-kt-redirect-url="/login" action="#">
			<div class="text-center mb-10">
				<h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
				<div class="text-gray-500 fw-semibold fs-6">
					Have you already reset the password?
					<a href="{{url('/admin/login')}}" class="link-primary fw-bold">Sign in</a>
				</div>
			</div>
			<div class="fv-row mb-8" id="phoneDiv">
				<input type="text" placeholder="Enter Your Phone Number" name="phone" id="phone" autocomplete="off" class="numOnly form-control bg-transparent" maxlength="10" />
				<span class="text-danger" id="phoneValidation">
			</div>
			<div class="" id="passwordFields" style="display: none;">
				<div class="fv-row mb-8" data-kt-password-meter="true">
					<div class="mb-1">
						<div class="position-relative mb-3">
							<input class="form-control bg-transparent" type="password" placeholder="Password" name="password" id="password" autocomplete="off" />
							<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
								<i class="bi bi-eye-slash fs-2"></i>
								<i class="bi bi-eye fs-2 d-none"></i>
							</span>
						</div>
						<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
						</div>
					</div>
					<div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
				</div>
				<div class="fv-row mb-8">
					<input type="password" placeholder="Repeat Password" name="cpassword" id="cpassword" autocomplete="off" class="form-control bg-transparent" />
				</div>
			</div>

			<div id="NextBtnDiv" class="col-sm-12">
				<div class="d-grid mb-10">
					<button type="button" id="nextBtn" class="btn btn-primary">
						<span class="indicator-label">Next</span>
					</button>
				</div>
			</div>

			<div id="submitBtn" class="col-sm-12" style="display: none;">
				<div class="d-grid mb-10">
					<button type="button" id="kt_new_password_submit" class="btn btn-primary">
						<span class="indicator-label">Submit</span>
					</button>
				</div>
			</div>

		</form>

	</div>
</div>
@endsection

@section('footer')
<script src="{{asset('assets/js/custom/authentication/reset-password/new-password.js')}}"></script>
@endsection