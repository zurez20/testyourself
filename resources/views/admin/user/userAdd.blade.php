@extends('layouts.admin')

@section('title', 'Add user')

@section('header')

@endsection
@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Add User Information</h1>
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
    <li class="breadcrumb-item text-dark">Add User</li>
</ul>
@endsection
@section('content')
<form autocomplete="off" action="{{ url('admin/user/add') }}" enctype="multipart/form-data" method="post" id="addForm" onsubmit="return checkValidation();">
    @csrf
    <div class="row g-5 mb-5">
        <!-- Card for Image and Image Alt -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Profile Image</label>
                            <div class="d-flex flex-center flex-column py-5 mb-1">
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/blank.png')">
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('assets/media/blank.png')"></div>
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
                        <div class="col-md-12 fv-row g-5 mt-5">
                            <label class="fs-6 fw-semibold mb-2"> Image Alt</label>
                            <input type="text" class="form-control txtOnly" placeholder="Enter Alt" id="profileImageAlt" name="profileImageAlt">
                        </div>
                        <div class="col-md-12 fv-row g-5 mb-5 mt-4">
                            <label class="required fs-6 fw-semibold mb-2">Select Role</label>
                            <select class="form-select" data-control="select2" data-hide-search="true" data-placeholder="Select Role" name="role" id="role" onchange="displayPass()" validate>
                                <option value=""></option>
                                @foreach($roles as $role)
                                <option value="{{ $role->slug }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
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
                        <div class="col-md-6 fv-row ">
                            <label class="required fs-6 fw-semibold mb-2">First Name</label>
                            <input type="text" class="form-control txtOnly space" placeholder="Enter First Name" id="fname" name="fname" minlength="1" validate>
                        </div>
                        <div class="col-md-6 fv-row ">
                            <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                            <input type="text" class="form-control txtOnly space" placeholder="Enter Last Name" id="lname" name="lname" minlength="1" validate>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Phone</label>
                            <input type="text" class="form-control numOnly" placeholder="Enter Phone" id="phone" name="phone" maxlength="10" onkeyup="checkphone('userPhone')" data-validation="phoneNo" data-title="Phone No" validate>
                            <span class="text-danger" id="phonetitle"></span>
                        </div>

                        <div class="col-md-4 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Email</label>
                            <input type="text" class="form-control " placeholder="Enter Email" id="email" name="email" onkeyup="checkemail('userEmail')" data-validation="email" data-title="Email" validate>
                            <span class="text-danger" id="emailtitle"></span>
                        </div>
                        <div class="col-md-4 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Select Outlet</label>
                            <select class="form-select" data-control="select2" data-placeholder="Select Outlet" name="outletUid" id="outletUid">
                                <option value=""></option>
                                @foreach($outlets as $outlet)
                                <option value="{{ $outlet->uid }}">{{ $outlet->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Employee Number</label>
                            <input type="text" class="form-control space" placeholder="Enter Employee Number" id="empNo" name="empNo" onkeyup="checkempNo('userEmpNO')" data-validation="empNo" data-title="Employee No" validate>
                            <span id="emptitle" style="display:none;color:red;"></span>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2 ">Status</label>
                            <select class="form-select " data-control="select2" data-hide-search="true" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <!-- Password Field -->
                        <div class="col-md-6 fv-row" id="passwordField" style="display:none">
                            <label class="required fs-6 fw-semibold mb-2">Password</label>
                            <input type="password" class="form-control" onkeyup="validatePass()" id="Password" name="password" placeholder="Enter Password" data-validation="password" data-title="Password"  /><br>
                            <div class="row">
                                <div class="col-sm-1 text-center">
                                    <i id="redCapital" class="fas fa-times text-danger"></i>
                                    <i id="greenCapital" class="fas fa-check" style="color: green; display: none;"></i>
                                </div>
                                <div class="col-sm-5">
                                    <label>1 Capital letter</label>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <i id="redSmall" class="fas fa-times text-danger"></i>
                                    <i id="greenSmall" class="fas fa-check" style="color: green; display: none;"></i>
                                </div>
                                <div class="col-sm-5">
                                    <label>1 small letter</label>e
                                </div>
                                <div class="col-sm-1 text-center">
                                    <i id="redNumber" class="fas fa-times text-danger"></i>
                                    <i id="greenNumber" class="fas fa-check" style="color: green; display: none;"></i>
                                </div>
                                <div class="col-sm-5">
                                    <label>1 Number</label>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <i id="redSpecial" class="fas fa-times text-danger"></i>
                                    <i id="greenSpecial" class="fas fa-check" style="color: green; display: none;"></i>
                                </div>
                                <div class="col-sm-5">
                                    <label>1 Special character</label>
                                </div>
                                <div class="col-sm-1 text-center">
                                    <i id="red8charac" class="fas fa-times text-danger"></i>
                                    <i id="green8charac" class="fas fa-check" style="color: green; display: none;"></i>
                                </div>
                                <div class="col-sm-11">
                                    <label>Password should contain at least 8 characters</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-5">
        <button type="submit" class="btn btn-primary" id="addBtn">
            <span class="indicator-label">Add</span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
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
                    'password': /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/,
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

<!-- Check Existing email ,phone and employee number -->
<script>
    function checkphone(fieldType) {
        var filed = document.getElementById('phone').value;
        var title = document.getElementById('phonetitle');
        var button = document.getElementById('addBtn');

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
                        title.innerHTML = "A user already exists with this phone number";
                        title.style.display = "block";
                        button.disabled = true;
                    } else if (response.status == 404) {
                        title.innerHTML = "";
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
        var button = document.getElementById('addBtn');

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
                        title.innerHTML = "A user already exists with this email";
                        title.style.display = "block";
                        button.disabled = true;
                    } else if (response.status == 404) {
                        title.innerHTML = "";
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
        var title = document.getElementById('emptitle');
        var button = document.getElementById('addBtn');

        if (filed == "") {
            title.style.display = "none";
        } else {
            $.ajax({
                type: "GET",
                url: "{{ url('/admin/checkdata') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'empNo': filed,
                    'fieldType': fieldType
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status == 200) {
                        title.innerHTML = "A user already exists with this employee number";
                        title.style.display = "block";
                        button.disabled = true;
                    } else if (response.status == 404) {
                        title.innerHTML = "";
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

<!-- password fields -->
<script>
    function validatePass() {
        var pass = document.getElementById('Password').value;

        // Regex for password criteria
        var hasUpperCase = /[A-Z]/.test(pass);
        var hasLowerCase = /[a-z]/.test(pass);
        var hasNumbers = /[0-9]/.test(pass);
        var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(pass);
        var isValidLength = pass.length >= 8;

        // Check password length
        if (!isValidLength) {
            document.getElementById('red8charac').style.display = 'block';
            document.getElementById('green8charac').style.display = 'none';
        } else {
            document.getElementById('red8charac').style.display = 'none';
            document.getElementById('green8charac').style.display = 'block';
        }

        // Check for capital letters
        if (!hasUpperCase) {
            document.getElementById('redCapital').style.display = 'block';
            document.getElementById('greenCapital').style.display = 'none';
        } else {
            document.getElementById('redCapital').style.display = 'none';
            document.getElementById('greenCapital').style.display = 'block';
        }

        // Check for small letters
        if (!hasLowerCase) {
            document.getElementById('redSmall').style.display = 'block';
            document.getElementById('greenSmall').style.display = 'none';
        } else {
            document.getElementById('redSmall').style.display = 'none';
            document.getElementById('greenSmall').style.display = 'block';
        }

        // Check for numbers
        if (!hasNumbers) {
            document.getElementById('redNumber').style.display = 'block';
            document.getElementById('greenNumber').style.display = 'none';
        } else {
            document.getElementById('redNumber').style.display = 'none';
            document.getElementById('greenNumber').style.display = 'block';
        }

        // Check for special characters
        if (!hasSpecialChar) {
            document.getElementById('redSpecial').style.display = 'block';
            document.getElementById('greenSpecial').style.display = 'none';
        } else {
            document.getElementById('redSpecial').style.display = 'none';
            document.getElementById('greenSpecial').style.display = 'block';
        }
    }
</script>

<!-- Display Password Field -->
<script>
    var roles = @json($roles);

    function displayPass() {
        var role = $('#role').val();
        var panelRoles = roles.find(panelRoles => panelRoles.slug == role);
        if(panelRoles.panelFlag == 1){
            $('#passwordField').show();
            $('#Password').attr('validate', true);
        }else{
            $('#passwordField').hide();
            $('#Password').removeAttr('validate');
        }
    }
</script>

@endsection