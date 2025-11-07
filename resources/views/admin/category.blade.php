@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('header')
@endsection


@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Category</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">Category</li>
    </ul>
@endsection
@section('content')

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))
            <div class="col-sm-12">
                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    {{ Session::get('alert-' . $msg) }}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    @endforeach
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="col-sm-12">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </div>
    @endif


    <!-- table -->
    @if ($categories->count() == 0)
        <div class="card">
            <div class="card-body p-0">
                <div class="text-center px-4">
                    <img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sketchy-1/5.png" />
                </div>
                <div class="card-px text-center py-20 ">
                    <p class="text-gray-400 fs-4 fw-semibold mb-10">Looks like you do not have any categories added here.
                        <br />If you want to add a category, click on the button below.
                    </p>
                    </p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal"><span
                            class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                    fill="currentColor" />
                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                    transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                    fill="currentColor" />
                            </svg>
                        </span>Add Category
                    </button>
                </div>

            </div>
        </div>
    @else
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input type="text" data-kt-customer-table-filter="search" class="form-control w-250px ps-15"
                            placeholder="Search Categories " />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                        fill="currentColor" />
                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                        transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            Add Category
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0" id="tableDiv">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                    <thead>
                        <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="text-center min-w-50px">Icon</th>
                            <th class="text-center min-w-50px">Name</th>
                            <th class="text-center min-w-50px">Description</th>
                            <th class="text-center min-w-50px">Status</th>
                            <th class="text-center min-w-50px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        <?php $i = 1; ?>
                        @foreach ($categories as $data)
                            <tr>
                                <td class="text-center">
                                    <div class="symbol symbol-50px">
                                        <img src="{{ $data->icon != null ? $data->icon : 'assets/media/blankimg.svg' }}" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $data->name ?? 'Not Found' }}
                                </td>
                                <td class="text-center">
                                    {{ $data->desc ?? 'Not Found' }}
                                </td>
                                <td class="text-center">
                                    @if ($data->status == 1)
                                        <div class="badge badge-light-success">
                                            Active
                                        </div>
                                    @else
                                        <div class="badge badge-light-danger">
                                            Inactive
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="align-middle text-center">
                                        <a class="btn btn-icon btn-outline-warning has-ripple" data-bs-toggle="modal"
                                            onclick="openUpdateModal('{{ $data->id }}')" data-bs-target="#updateModal"
                                            style="border-radius: 50%;"><i class="fas fa-pen"></i></a>
                                        <a class="btn btn-icon btn-outline-danger has-ripple" data-bs-toggle="modal"
                                            onclick="openDeleteModal('{{ $data->id }}')" data-bs-target="#deleteModal"
                                            style="border-radius: 50%;"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <!--create modal start-->
    <div class="modal fade addclearonclose" id="addmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h1 class="modal-tital w-100 text-center"> Add Category </h1>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <form autocomplete="off" action="{{ url('admin/category/add') }}" enctype="multipart/form-data"
                    method="POST" id="addForm">
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0">
                        @csrf
                        <div class="row g-5 mt-2">
                            <div class="col-md-12 fv-row">
                                <label class="fs-6 fw-semibold mb-1">Icon</label>
                                <div class="d-flex flex-center flex-column py-2 mb-1">
                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                        style="background-image: url('assets/media/blankimg.svg')">
                                        <div class="image-input-wrapper w-125px h-125px"
                                            style="background-image: url('assets/media/blankimg.svg')"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Add Icon">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="icon" accept="image/*" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                        <span
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                            title="Cancel Icon">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="form-text">Allowed all image file types
                                        .webp is preffered for better performance
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 fv-row g-5 mt-5">
                                <label class="required fs-6 fw-semibold mb-2">Category Name</label>
                                <input type="text" class="form-control txtOnly space" placeholder="Enter Name"
                                    id="name" name="name" onkeyup="checkname('categoryName')">
                                <span class="text-danger" id="categoryNamespan"></span>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Status</label>
                                <select class="form-select" data-control="select2" data-hide-search="true"
                                    name="status" id="Status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-12 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Description</label>
                                <textarea class="form-control space" placeholder="Enter Description" id="description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="addBtn">
                            <span class="indicator-label">Add</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--create modal end-->

    <!--update modal start-->
    <div class="modal fade updateclearonclose" id="updateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header">
                    <h1 class="modal-tital w-100 text-center"> Update Category </h1>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <form autocomplete="off" action="{{ url('admin/category/update') }}" enctype="multipart/form-data"
                    method="post" id="updateForm">
                    <div class="modal-body scroll-y px-10 px-lg-15 pt-0">
                        @csrf
                        <input type="hidden" name="categoryId" id="updateCategoryId">
                        <div class="row g-5 mt-5">
                            <div class="col-md-12 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Icon</label>
                                <div class="d-flex flex-center flex-column py-3 mb-1">
                                    <div class="image-input image-input-outline" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-125px h-125px" id="inputWrappericon"
                                            style="background-image: url('assets/media/blankimg.svg')"></div>
                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            title="Change Icon">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="icon" accept="image/*" />
                                            <input type="hidden" name="avatar_remove" />
                                        </label>
                                    </div>
                                    <div class="form-text">Allowed all image file types
                                        .webp is preferred for better performance
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 fv-row">
                                <input type="hidden" id="oldCategory">
                                <label class="required fs-6 fw-semibold mb-2">Category</label>
                                <input type="text" class="form-control space txtOnly" placeholder="Enter Name"
                                    id="updatename" name="name">
                                <span class="text-danger" id="updatecategoryName"></span>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Status</label>
                                <select class="form-select" data-control="select2" data-hide-search="true"
                                    name="status" id="updatestatus">
                                </select>
                            </div>
                            <div class="col-md-12 fv-row">
                                <label class="fs-6 fw-semibold mb-2">Description</label>
                                <textarea class="form-control space" placeholder="Enter Description" id="updatedescription" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="updateBtn">
                            <span class="indicator-label">Update</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--update modal end-->

    <!--delete modal start-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Category</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
                <form action="{{ url('admin/category/delete') }}" id="deleteForm" method="post">
                    @csrf
                    <input type="hidden" id="categoryId" name="categoryId">
                    <div class="modal-body">
                        <span>Are you sure you want to delete this category ? <br> Action cannot be reverted</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">No</button>
                        <button type="submit" id="delYes" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--delete modal end-->

@endsection

@section('scripts')
    <!-- Modals -->
    <script>
        let categories = @json($categories);
        var config = {
            placeholderblank: 'assets/media/blankimg.svg'
        };

        function openDeleteModal(categoryId) {
            let category = categories.find(x => x.id == categoryId);
            $('#categoryId').val(category.id);
        }

        function openUpdateModal(categoryId) {
            let category = categories.find(x => x.id == categoryId);
            $('#updateCategoryId').val(category.id);
            $('#updatename').val(category.name);
            $('#updatedescription').val(category.desc);
            $('#updatestatus').html('');
            $('#updatestatus').append('<option value="1" ' + (category.status == 1 ? 'selected' : '') + '>Active</option>');
            $('#updatestatus').append('<option value="0" ' + (category.status == 0 ? 'selected' : '') +
                '>Inactive</option>');

            var imageUrlicon = category.icon ? category.icon : config.placeholderblank;
            $('#inputWrappericon').css('background-image', 'url("' + imageUrlicon + '")');
        }

        document.getElementById('addForm').onsubmit = function(e) {
            document.getElementById('addBtn').disabled = true;
        };

        document.getElementById('updateForm').onsubmit = function(e) {
            document.getElementById('updateBtn').disabled = true;
        };
    </script>

    <!--required validation-->
    <script>
        var KTModalAdd = function() {
            var t, e, o, n, r, i;
            return {
                init: function() {
                    r = document.querySelector("#addForm"),
                        t = r.querySelector("#addBtn"),
                        n = FormValidation.formValidation(r, {
                            fields: {
                                name: {
                                    validators: {
                                        notEmpty: {
                                            message: "Name is required"
                                        },
                                        stringLength: {
                                            max: 256,
                                            message: "Name must be less than 256 characters"
                                        }
                                    }
                                },
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        }), r.querySelectorAll('.space').forEach(function(input) {
                            input.addEventListener('input', function() {
                                this.value = this.value.trimStart();
                            });
                        });

                    t.addEventListener("click", function(e) {
                        e.preventDefault();

                        // Trim spaces on all .space fields (both input and textarea)
                        r.querySelectorAll('.space').forEach(function(input) {
                            input.value = input.value.trim();
                        });

                        n && n.validate().then(function(e) {
                            console.log("validated!"),
                                "Valid" == e ? (
                                    t.disabled = !0,
                                    setTimeout(function() {
                                        e.isConfirmed && (t.disabled = !1);

                                        // Submit form
                                        r.submit();

                                    }, 0)) : Swal.fire({
                                    text: "Sorry, looks like there are some missing fields, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                        });
                    });

                    $('select').change(function() {
                        var fieldName = $(this).attr('name');
                        n.revalidateField(fieldName);
                    });
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTModalAdd.init()
        }));

        var KTModalUpdate = function() {
            var t, e, o, n, r, i;
            return {
                init: function() {
                    r = document.querySelector("#updateForm"),
                        t = r.querySelector("#updateBtn"),
                        n = FormValidation.formValidation(r, {
                            fields: {
                                name: {
                                    validators: {
                                        notEmpty: {
                                            message: "Name is required"
                                        },
                                        stringLength: {
                                            max: 256,
                                            message: "Name must be less than 256 characters"
                                        }
                                    }
                                },
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        }), r.querySelectorAll('.space').forEach(function(input) {
                            input.addEventListener('input', function() {
                                this.value = this.value.trimStart();
                            });
                        });

                    t.addEventListener("click", function(e) {
                        e.preventDefault();

                        // Trim spaces on all .space fields (both input and textarea)
                        r.querySelectorAll('.space').forEach(function(input) {
                            input.value = input.value.trim();
                        });

                        n && n.validate().then(function(e) {
                            console.log("validated!"),
                                "Valid" == e ? (
                                    t.disabled = !0,
                                    setTimeout(function() {
                                        e.isConfirmed && (t.disabled = !1);

                                        // Submit form
                                        r.submit();

                                    }, 0)) : Swal.fire({
                                    text: "Sorry, looks like there are some missing fields, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-primary"
                                    }
                                });
                        });
                    });
                    $('select').change(function() {
                        var fieldName = $(this).attr('name');
                        n.revalidateField(fieldName);
                    });
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTModalUpdate.init()
        }));
    </script>

    <!--datatable-->
    <script>
        let KTAppEcommerceCategories = function() {
            let n = () => {

            };
            return {
                init: function() {
                    (t = document.querySelector("#data_table")) && ((e = $(t).DataTable({
                        info: !1,
                        order: [],
                        pageLength: 10,

                    })).on("draw", (function() {
                        n()
                    })), document.querySelector('[data-kt-customer-table-filter="search"]').addEventListener(
                        "keyup", (function(t) {
                            e.search(t.target.value).draw()
                        })), n())
                }
            }
        }();
        KTUtil.onDOMContentLoaded((function() {
            KTAppEcommerceCategories.init()
        }));
    </script>
@endsection
