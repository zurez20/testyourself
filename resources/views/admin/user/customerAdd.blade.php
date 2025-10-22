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
<form autocomplete="off" action="{{ url('admin/customer/add') }}" enctype="multipart/form-data" method="post" id="addForm" onsubmit="return checkValidation();">
    @csrf
    <input type="hidden" id="placeId" name="placeId">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 fv-row">
                        <label class="fs-6 fw-semibold mb-2">Profile Image</label>
                        <div class="d-flex flex-center flex-column py-5 mb-1">
                            <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/blank.png')">
                                <div class="image-input-wrapper w-120px h-120px" style="background-image: url('assets/media/blank.png')"></div>
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
                            <input type="text" class="form-control txtOnly space" placeholder="Enter First Name" id="fname" name="fname" minlength="1" validate>
                        </div>
                        <div class="col-md-3 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Last Name</label>
                            <input type="text" class="form-control txtOnly space" placeholder="Enter Last Name" id="lname" name="lname" minlength="1" validate>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Gender</label>
                            <select class="form-select" data-control="select2" data-placeholder="Select Gender" data-hide-search="true" id="gender" name="gender">
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
                            <input type="text" class="form-control numOnly" placeholder="Enter Phone" id="phone" name="phone" maxlength="10" onkeyup="checkphone('customerPhone')" data-validation="phoneNo" data-title="Phone No" validate>
                            <span class="text-danger" id="phonetitle"></span>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class=" fs-6 fw-semibold mb-2">Email</label>
                            <input type="text" class="form-control space" placeholder="Enter Email" id="email" name="email" onkeyup="checkemail('categoryEmail')" data-validation="email" data-title="Email" validatefiled>
                            <span class="text-danger" id="emailtitle"></span>
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class=" fs-6 fw-semibold mb-2">Date of Birth</label>
                            <input type="date" class="form-control space" placeholder="Enter DOB" id="dateOfBirth" name="dateOfBirth">
                        </div>

                        <div class="col-md-3 fv-row">
                            <label class="fs-6 fw-semibold mb-2"> Image Alt</label>
                            <input type="text" class="form-control txtOnly" placeholder="Enter Alt" id="profileImageAlt" name="profileImageAlt">
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
                                            <input type="text" class="form-control" id="searchmap" placeholder="Enter a location" style="margin-top: 10px; ">
                                            <button class="btn btn-secondary" type="button" id="searchLoc" style="position: absolute; top: 10px; right: 10px; ">Search</button>           
                                        </div>
                                    </div>
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Fields Column -->
                        <div class="col-md-8 fv-row">
                            <div class="row g-5 mb-5">

                                <div class="col-md-6 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Address Line 1</label>
                                    <input type="text" class="form-control space txtOnly" placeholder="Enter Address Line 1" id="address1" name="address1">
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Address Line 2</label>
                                    <input type="text" class="form-control txtOnly" placeholder="Enter Address Line 2" id="address2" name="address2">
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">State</label>
                                    <select class="form-select" data-control="select2" data-hide-search="false" data-placeholder="Select State" name="state" id="state">
                                        <option value=""></option>
                                        @foreach($states as $state)
                                        <option value="{{ $state->state }}">{{ $state->state }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">City</label>
                                    <input type="text" class="form-control space txtOnly" placeholder="Enter City" id="city" name="city">
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Pincode</label>
                                    <input type="text" class="form-control space numOnly" placeholder="Enter Pincode" id="pincode" name="pincode" maxlength="6">
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Contact Name</label>
                                    <input type="text" class="form-control txtOnly space" placeholder="Enter Name" id="name" name="name" readonly>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Contact Phone</label>
                                    <input type="text" class="form-control numOnly space" placeholder="Enter Phone" id="phonee" name="phonee" maxlength="10" readonly>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Type</label>
                                    <select class="form-select" id="type" name="type" data-control="select2" data-placeholder="Select Type" data-hide-search="true" onchange="displayOtherType()">
                                        <option value=""></option>
                                        <option value="Home">Home</option>
                                        <option value="Office">Office</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="col-md-3 fv-row" id="otherTypeInput" style="display: none;">
                                    <label for="otherType" class="fs-6 fw-semibold mb-2">Other Type</label>
                                    <input type="text" id="otherType" name="otherType" class="form-control" placeholder="Other type">
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Latitude</label>
                                    <input type="text" class="form-control space" placeholder="Enter Latitude" id="lat" name="lat" readonly>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Longitude</label>
                                    <input type="text" class="form-control space" placeholder="Enter Longitude" id="long" name="long" readonly>
                                </div>

                                <div class="col-md-4 fv-row">
                                    <label class="fs-6 fw-semibold mb-2">Status</label>
                                    <select class="form-select" data-control="select2" data-hide-search="true" name="statuss">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-md-12 fv-row">
                                    <label class=" fs-6 fw-semibold mb-2">Google Address</label>
                                    <textarea class="form-control space" placeholder="Enter Google Address" id="googleAddress" name="googleAddress" rows="3" readonly></textarea>
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
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<!-- Display Other Type -->
<script>
    function displayOtherType() {
        if ($('#type').val() == 'Other') {
            $('#otherTypeInput').css('display', 'block');
            $('#otherType').attr('validate', true);
        } else {
            $('#otherTypeInput').css('display', 'none');
            $('#otherType').removeAttr('validate');
        }
    }
</script>

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

<!-- Map script -->
<script async src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&libraries=places&callback=initMap"></script>

<!-- Map script -->
<script>
    function initMap() {
        const myLatlng = {
            lat: 19.066204,
            lng: 73.002288
        };
        let selectedLat = 0;
        let selectedLng = 0;
        let address = '';

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: myLatlng,
        });

        const marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            draggable: true,
        });

        // Handle marker drag event
        google.maps.event.addListener(marker, 'dragend', function(event) {
            selectedLat = event.latLng.lat();
            selectedLng = event.latLng.lng();
            document.getElementById("lat").value = selectedLat;
            document.getElementById("long").value = selectedLng;

            const geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': event.latLng
            }, function(results, status) {
                if (status === google.maps.GeocoderStatus.OK && results.length > 0) {
                    updateFieldsFromGeocoder(results);
                }
            });
        });

        const searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        const searchButton = document.getElementById('searchLoc');
        let searchTimeout;

        // Handle search button click
        searchButton.addEventListener('click', function() {
            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(function() {
                performSearch();
            }, 500);
        });

        function updateFieldsFromGeocoder(results) {
            const firstResult = results[0];
            console.log(firstResult);
            
            let city = '';
            let address2 = '';
            let pincode = '';

            if (firstResult) {
                address = firstResult.formatted_address;
                $('#googleAddress').val(address);

                $('#address1').val(firstResult.address_components[0]?.long_name || '');
                $('#placeId').val(firstResult.place_id || '');

                firstResult.address_components.forEach(component => {
                    if (component.types.includes('sublocality_level_1')) {
                        city = component.long_name;
                    }
                    if (component.types.includes('sublocality_level_2')) {
                        address2 = component.long_name;
                    }
                    if (component.types.includes('postal_code')) {
                        pincode = component.long_name;
                    }
                });

                $('#city').val(city);
                $('#address2').val(address2);
                $('#pincode').val(pincode);

                $('#state').val('').change();
                $('#areaRadius').val('');

            }
        }

        function performSearch() {
            const places = searchBox.getPlaces();
            if (!places || places.length === 0) {
                alert("No results found for the entered address.");
                clearFields();
                return;
            }

            const bounds = new google.maps.LatLngBounds();

            places.forEach(place => {
                bounds.extend(place.geometry.location);
                selectedLat = place.geometry.location.lat();
                selectedLng = place.geometry.location.lng();
                address = place.formatted_address;

                $('#googleAddress').val(address);
                $('#address1').val(place.name || '');
                $('#placeId').val(place.place_id || '');

                let city = '';
                let address2 = '';
                let pincode = '';

                place.address_components.forEach(component => {
                    if (component.types.includes('sublocality_level_1')) {
                        city = component.long_name;
                    }
                    if (component.types.includes('sublocality_level_2')) {
                        address2 = component.long_name;
                    }
                    if (component.types.includes('postal_code')) {
                        pincode = component.long_name;
                    }
                });

                $('#city').val(city);
                $('#address2').val(address2);
                $('#pincode').val(pincode);

                $('#state').val('').change();
                $('#areaRadius').val('');


                document.getElementById("lat").value = selectedLat;
                document.getElementById("long").value = selectedLng;
                marker.setPosition(place.geometry.location);
            });

            map.fitBounds(bounds);
            map.setZoom(15);
        }

        function clearFields() {
            $('#googleAddress').val('');
            $('#address1').val('');
            $('#placeId').val('');
            $('#city').val('');
            $('#address2').val('');
            $('#pincode').val('');
            document.getElementById("lat").value = '';
            document.getElementById("long").value = '';
        }
    }
</script>

<!-- Display Name & Phone -->
<script>
    $(document).ready(function() {
        $('#fname, #lname').keyup(function(e) {
            var fname = $('#fname').val();
            var lname = $('#lname').val();
            var fullName = fname + ' ' + lname;
            $('#name').val(fullName.trim());
        });

        $('#phone').keyup(function(e) {
            var phone = $(this).val();
            $('#phonee').val(phone);
        });
    });
</script>

<!-- Check Existing email & phone -->
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
                        title.innerHTML = "A customer already exists with this phone number";
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
                        title.innerHTML = "A customer already exists with this email";
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
@endsection