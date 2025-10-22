@extends('layouts.admin')

@section('title', 'Update user')

@section('header')

@endsection
@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Update Information of {{$user->fname}} {{$user->lname}}</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/user')}}" class="text-muted text-hover-primary">Users</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Update Information</li>
</ul>
@endsection

@section('content')
<form autocomplete="off" action="{{url('admin/user/update')}}" enctype="multipart/form-data" method="post" id="updateForm" onsubmit="return checkValidation();">
    <input type="hidden" value="{{Request::get('userUid')}}" name="userUid">
    @csrf
    <div class="row g-5 mb-5">
        <!-- Card for Image and Image Alt -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row g-5 mb-5">
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Profile Image</label>
                            <div class="d-flex flex-center flex-column py-5 mb-1">
                                <div class="image-input image-input-outline" data-kt-image-input="true">
                                    <?php
                                    if ($user->profileImage != null) {
                                        $placeholderImage = $user->profileImage;
                                    } else {
                                        $placeholderImage = config('placeholderImage');
                                    }
                                    ?>
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ $placeholderImage }}')"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Image">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="profileImage" accept="image/*" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Image">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed all image file types
                                    .webp is preferred for better performance
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Image Alt</label>
                            <input type="text" class="form-control txtOnly" placeholder="Enter Alt" id="profileImageAlt" name="profileImageAlt" value="{{ $user->profileImageAlt }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card for Other Fields -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row g-5 mb-5">
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">First Name</label>
                            <input type="text" class="form-control txtOnly space" placeholder="Enter First Name" id="fname" name="fname" value="{{ $user->fname }}" minlength="1" validate>
                        </div>
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                            <input type="text" class="form-control txtOnly space" placeholder="Enter Last Name" id="lname" name="lname" value="{{ $user->lname }}" minlength="1" validate>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Phone</label>
                            <input type="hidden" id="oldPhone" value="{{$user->phone}}">
                            <input type="text" class="form-control numOnly" placeholder="Enter Phone" id="phone" name="phone" max="10" value="{{ $user->phone }}" onkeyup="checkphone('userPhone')" data-validation="phoneNo" data-title="Phone No" validate>
                            <span class="text-danger" id="phonetitle"></span>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Email</label>
                            <input type="hidden" id="oldEmail" value="{{$user->email}}">
                            <input type="text" class="form-control" placeholder="Enter Email" id="email" name="email" value="{{ $user->email }}" onkeyup="checkemail('userEmail')" data-validation="email" data-title="Email" validate>
                            <span class="text-danger" id="emailtitle"></span>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Status</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" name="status">
                                <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Employee Number</label>
                            <input type="hidden" id="oldEmpNo" value="{{ $user->empNo }}">
                            <input type="text" class="form-control space" placeholder="Enter Employee Number" id="empNo" name="empNo" value="{{ $user->empNo }}" onkeyup="checkempNo('userEmpNO')" data-validation="empNo" data-title="Employee No" validate>
                            <span class="text-danger" id="phonetitle"></span>
                            <span class="text-danger" id="empNoTitle" style="display:none;"></span>
                        </div>


                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Select Outlet</label>
                            <select class="form-select" data-control="select2" data-placeholder="Select Outlet" name="outletUid" id="outletUid">
                                <option value=""></option>
                                @foreach($outlets as $outlet)
                                <option value="{{ $outlet->uid }}" {{ $outlet->uid == $user->outletUid ? 'selected' : '' }}>{{ $outlet->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Select Role</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select Role" name="role" id="role" validate>
                                <option value=""></option>
                                @foreach($roles as $role)
                                <option value="{{ $role->slug }}" {{ $role->slug == $user->role ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-5">
        <button type="submit" class="btn btn-primary" id="updateBtn">
            <span class="indicator-label">Update</span>
            <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
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
                    'email': /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
                    'empNo': /^[a-zA-Z0-9]+$/,
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
                            title.innerHTML = "A user already exists with this phone number";
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
                            title.innerHTML = "A user already exists with this email";
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

    function checkempNo(fieldType) {
        var filed = document.getElementById('empNo').value;
        var title = document.getElementById('empNoTitle');
        var button = document.getElementById('updateBtn');

        if (filed == "") {
            title.style.display = "none";
        } else {
            $.ajax({
                type: "GET",
                url: "{{url('/admin/checkdata')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'empNo': filed,
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
                            title.innerHTML = "A user already exists with this employee number";
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