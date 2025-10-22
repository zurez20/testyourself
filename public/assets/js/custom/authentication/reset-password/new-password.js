$('#nextBtn').click(function (e) {
    e.preventDefault();
    var phone = $('#phone').val();
    if (phone === '') {
        Swal.fire({
            text: 'Please enter your phone number',
            icon: 'warning',
            buttonsStyling: false,
            confirmButtonText: 'Ok, got it!',
            customClass: {
                confirmButton: 'btn font-weight-bold btn-light-primary'
            }
        }).then(function () {
            KTUtil.scrollTop();
        });
        return;
    }


    $.ajax({
        type: "POST",
        url: "/admin/forgetpassword",
        data: {
            "_token": "{{ csrf_token() }}",
            "phone": phone
        },
        dataType: "json",
        success: function (response) {
            if (response.status == 201) {
                $('#NextBtnDiv').css('display', 'none');
                $('#phoneDiv').css('display', 'none');
                $('#passwordFields').css('display', 'block');
                $('#submitBtn').css('display', 'block');
            } else if (response.status == 200) {
                $('#phone').val('')
                Swal.fire({
                    text: 'User not found in our record',
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function () {
                    KTUtil.scrollTop();

                });
            }
        }
    });
});

function isValidPassword(password) {
    var passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return passwordPattern.test(password);
}

$('#submitBtn').click(function (e) {
    e.preventDefault();

    var phone = $('#phone').val();
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();

    if (password === '' || cpassword === '') {
        Swal.fire({
            text: 'Please enter both the password and confirm password fields',
            icon: 'warning',
            buttonsStyling: false,
            confirmButtonText: 'Ok, got it!',
            customClass: {
                confirmButton: 'btn font-weight-bold btn-light-primary'
            }
        }).then(function () {
            KTUtil.scrollTop();
        });
        return;
    }

    if (password !== cpassword) {
        Swal.fire({
            text: 'Password and Confirm Password do not match',
            icon: 'warning',
            buttonsStyling: false,
            confirmButtonText: 'Ok, got it!',
            customClass: {
                confirmButton: 'btn font-weight-bold btn-light-primary'
            }
        }).then(function () {
            KTUtil.scrollTop();
        });
        return;
    }

    if (!isValidPassword(password)) {
        Swal.fire({
            text: 'Password must be at least 8 characters long and include a mix of letters, numbers, and symbols',
            icon: 'warning',
            buttonsStyling: false,
            confirmButtonText: 'Ok, got it!',
            customClass: {
                confirmButton: 'btn font-weight-bold btn-light-primary'
            }
        }).then(function () {
            KTUtil.scrollTop();
        });
        return;
    }

    $.ajax({
        type: "POST",
        url: "/admin/changepassword",
        data: {
            "_token": "{{ csrf_token() }}",
            "phone": phone,
            "password": password
        },
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    text: "Password Changed Successfully",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light-primary"
                    }
                }).then(function () {
                    KTUtil.scrollTop();
                    window.location.href = "/admin/login";
                });
            }
        },
        error: function (response) {
            console.log(response);
        }
    });
});

