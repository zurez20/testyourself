@extends('layouts.admin')

@section('title', 'Update Customer')

@section('header')

@endsection
@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Update Information of {{ $customer->fname }} {{ $customer->lname }}</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/customer')}}" class="text-muted text-hover-primary">Customer</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Update Customer</li>
</ul>
@endsection

@section('content')
<form autocomplete="off" action="{{url('admin/customer/update')}}" enctype="multipart/form-data" method="post" id="updateForm" onsubmit="return checkValidation();">
    <input type="hidden" value="{{Request::get('customerUid')}}" name="customerUid">
    @csrf
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Profile Image</label>
                        <div class="d-flex flex-center flex-column py-5 mb-1">
                            <div class="image-input image-input-outline" data-kt-image-input="true">
                                <?php
                                if ($customer->profileImage != null) {
                                    $placeholderImage = $customer->profileImage;
                                } else {
                                    $placeholderImage = config('placeholderImage');
                                }
                                ?>
                                <div class="image-input-wrapper w-120px h-120px" style="background-image: url('{{ $placeholderImage }}')"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Add Image">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="profileImage" accept="image/*" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
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
                            <input type="text" class="form-control txtOnly space" placeholder="Enter First Name" id="fname" name="fname" minlength="1" value="{{ $customer->fname }}" validate>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                            <input type="text" class="form-control txtOnly space" placeholder="Enter Last Name" id="lname" name="lname" minlength="1" value="{{ $customer->lname }}" validate>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Gender</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" name="gender">
                                <option value="Male" {{ $customer->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $customer->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Status</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" name="status">
                                <option value="1" {{ $customer->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $customer->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Phone</label>
                            <input type="hidden" id="oldPhone" value="{{$customer->phone}}">
                            <input type="text" class="form-control numOnly" placeholder="Enter Phone" id="phone" name="phone" maxlength="10" value="{{ $customer->phone }}" onkeyup="checkphone('customerPhone')" data-validation="phoneNo" data-title="Phone No" validate>
                            <span class="text-danger" id="phonetitle"></span>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Email</label>
                            <input type="hidden" id="oldEmail" value="{{$customer->email}}">
                            <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="{{ $customer->email }}" onkeyup="checkemail('customerEmail')" data-validation="email" data-title="Email" validatefiled>
                            <span class="text-danger" id="emailtitle"></span>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Date of Birth</label>
                            <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="{{ $customer->dateOfBirth }}">
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2"> Image Alt</label>
                            <input type="text" class="form-control txtOnly" placeholder="Enter Alt" id="profileImageAlt" name="profileImageAlt" value="{{ $customer->profileImageAlt }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="modal-footer">
                        <button type="submit " class="btn btn-primary" id="updateBtn">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection

@section('scripts')
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

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

<!-- Check Existing email & phone -->
<script>
    function checkphone(fieldType) {
        var filed = document.getElementById('phone').value;
        var title = document.getElementById('phonetitle');
        var button = document.getElementById('updateBtn');

        if (filed == "") {
            title.style.display = "none";
        } else {
            $.ajax({
                type: "GET",
                url: "{{url('/admin/checkdata')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'phone': filed,
                    'fieldType': fieldType
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        var oldPhone = document.getElementById('oldPhone').value;
                        if (response.data.phone === oldPhone) {
                            title.style.display = "none";
                            button.disabled = false;
                        } else {
                            title.innerHTML = "A customer already exists with this phone number";
                            title.style.display = "block";
                            button.disabled = true;
                        }
                    } else {
                        title.style.display = "none";
                        button.disabled = false;
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }

    function checkemail(fieldType) {
        var filed = document.getElementById('email').value;
        var title = document.getElementById('emailtitle');
        var button = document.getElementById('updateBtn');

        if (filed == "") {
            title.style.display = "none";
        } else {
            $.ajax({
                type: "GET",
                url: "{{url('/admin/checkdata')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'email': filed,
                    'fieldType': fieldType
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        var oldEmail = document.getElementById('oldEmail').value;
                        if (response.data.email === oldEmail) {
                            title.style.display = "none";
                            button.disabled = false;
                        } else {
                            title.innerHTML = "A customer already exists with this email";
                            title.style.display = "block";
                            button.disabled = true;
                        }
                    } else {
                        title.style.display = "none";
                        button.disabled = false;
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        }
    }
</script>

@endsection