@extends('layouts.admin')

@section('title', 'Add Customer')

@section('header')
    <style>
        #map {
            height: 350px;
            width: 100%;
            margin: 20px 0px 20px 0px;
        }
    </style>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> -->
    <!-- <script>
        const process = {
            env: {}
        };
        process.env.GOOGLE_MAPS_API_KEY =
            "AIzaSyBwrJu0M1d4pIlMLij7FNnBZWPS7gJ9JUg";
    </script> -->

@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Add Customer Information</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('admin/customer') }}" class="text-muted text-hover-primary">Customers</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">Add Customer</li>
    </ul>
@endsection

@section('content')
    <form autocomplete="off" action="{{ url('admin/customer/add') }}" enctype="multipart/form-data" method="post"
        id="addForm" onsubmit="return checkValidation();">
        @csrf
        <input type="hidden" id="placeId" name="placeId">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Profile Image</label>
                            <div class="d-flex flex-center flex-column py-5 mb-1">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url('assets/media/blank.png')">
                                    <div class="image-input-wrapper w-120px h-120px"
                                        style="background-image: url('assets/media/blank.png')"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Add Image">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="profileImage" accept="image/*" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed all image file types
                                    .webp is preffered for better performance
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- First Card -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-5 mb-5">
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">First Name</label>
                                <input type="text" class="form-control txtOnly space" placeholder="Enter First Name"
                                    id="fname" name="fname" minlength="1" validate>
                            </div>
                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                                <input type="text" class="form-control txtOnly space" placeholder="Enter Last Name"
                                    id="lname" name="lname" minlength="1" validate>
                            </div>

                            <div class="col-md-3 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Gender</label>
                                <select class="form-select" data-control="select2" data-placeholder="Select Gender"
                                    data-hide-search="true" id="gender" name="gender">
                                    <option value=""></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-3 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Status</label>
                                <select class="form-select" data-control="select2" data-hide-search="true" name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>

                            <div class="col-md-3 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Phone</label>
                                <input type="text" class="form-control numOnly" placeholder="Enter Phone" id="phone"
                                    name="phone" maxlength="10" onkeyup="checkphone('customerPhone')"
                                    data-validation="phoneNo" data-title="Phone No" validate>
                                <span class="text-danger" id="phonetitle"></span>
                            </div>

                            <div class="col-md-3 fv-row">
                                <label class=" fs-6 fw-semibold mb-2">Email</label>
                                <input type="text" class="form-control space" placeholder="Enter Email"
                                    id="email" name="email" onkeyup="checkemail('categoryEmail')"
                                    data-validation="email" data-title="Email" validatefiled>
                                <span class="text-danger" id="emailtitle"></span>
                            </div>

                            <div class="col-md-3 fv-row">
                                <label class=" fs-6 fw-semibold mb-2">Date of Birth</label>
                                <input type="date" class="form-control space" placeholder="Enter DOB"
                                    id="dateOfBirth" name="dateOfBirth">
                            </div>

                            <div class="col-md-3 fv-row">
                                <label class="fs-6 fw-semibold mb-2"> Image Alt</label>
                                <input type="text" class="form-control txtOnly" placeholder="Enter Alt"
                                    id="profileImageAlt" name="profileImageAlt">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Card -->
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Google Map Column -->
                            <div class="col-md-4 fv-row">
                                <div style="width: 100%; height: 460px; border: 1px solid #ddd;">
                                    <div id="mapDiv" style="display: block; ">
                                        <div class="row p-2">
                                            <div class="col-sm-12" style="position: relative;">
                                                <input type="text" class="form-control" id="searchmap"
                                                    placeholder="Enter a location" style="margin-top: 10px; ">
                                                <button class="btn btn-secondary" type="button" id="searchLoc"
                                                    style="position: absolute; top: 10px; right: 10px; ">Search</button>

                                            </div>
                                        </div>
                                        <div id="map"></div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="addBtn">
                                <span class="indicator-label">Add</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection



@section('scripts')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <!-- required validation -->
    <script>
        function checkValidation() {
            var valid = true;
            var emptyFieldExists = false; // Track if any required field is empty
            var requiredInputFields = document.querySelectorAll('input[validate]');
            var validInputFields = document.querySelectorAll('input[validatefiled]');
            var requiredSelectFields = document.querySelectorAll('select[validate]');
            var requiredTextareaFields = document.querySelectorAll('textarea[validate]');
            var submitButton = document.querySelector('button[type="submit"]');

            requiredInputFields.forEach(function(item) {
                $(item).removeClass('is-invalid');
                var value = $(item).val().trim();
                var validationType = $(item).data('validation');

                if (value === '') {
                    valid = false;
                    emptyFieldExists = true; // Mark that a required field is empty
                    $(item).addClass('is-invalid');
                } else if (validationType) {
                    var regexMap = {
                        'phoneNo': /^[6789][0-9]{9}$/,
                    };

                    if (regexMap[validationType] && !regexMap[validationType].test(value)) {
                        valid = false;
                        $(item).addClass('is-invalid');
                        toastr.error($(item).data('title') + ' is invalid');
                    }
                }
            });

            validInputFields.forEach(function(item) {
                $(item).removeClass('is-invalid');
                var value = $(item).val().trim();
                var validationType = $(item).data('validation');

                if (validationType && value !== '') {
                    var regexMap = {
                        'email': /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
                    };

                    if (regexMap[validationType] && !regexMap[validationType].test(value)) {
                        valid = false;
                        $(item).addClass('is-invalid');
                        toastr.error($(item).data('title') + ' is invalid');
                    }
                }
            });

            requiredSelectFields.forEach(function(item) {
                if ($(item).val() === '') {
                    valid = false;
                    emptyFieldExists = true;
                    $(item).next().find('.select2-selection').addClass('is-invalid');
                } else {
                    $(item).next().find('.select2-selection').removeClass('is-invalid');
                }
            });

            requiredTextareaFields.forEach(function(item) {
                if ($(item).val().trim() === '') {
                    valid = false;
                    emptyFieldExists = true;
                    $(item).addClass('is-invalid');
                } else {
                    $(item).removeClass('is-invalid');
                }
            });

            // Show error message only if an empty required field exists
            if (emptyFieldExists) {
                toastr.error('Please fill all the required fields.');
            }

            if (valid) {
                submitButton.disabled = true; // Disable submit button only on successful validation
            }

            return valid;
        }
    </script>

@endsection
