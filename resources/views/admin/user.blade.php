@extends('layouts.admin')

@section('title')
    Shop Users
@endsection

@section('header')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Shop Users</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">Shop Users</li>
    </ul>
@endsection

@section('content')
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))
            <div class="col-sm-12">
                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    {{ Session::get('alert-' . $msg) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
    @endforeach
    @if ($errors->any())
        <div class="col-sm-12">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!-- user table -->

    @if ($users->count() == 0)
        <div class="card">
            <div class="card-body p-0">
                <div class="text-center px-4">
                    <img class="mw-100 mh-300px" alt="" src="assets/media/illustrations/sketchy-1/5.png" />
                </div>
                <div class="card-px text-center py-20 ">
                    <p class="text-gray-400 fs-4 fw-semibold mb-10">Looks like you do not have any users here.
                        <br />If you want to add a user, click on the button below.
                    </p>
                    </p>
                    <a type="button" href="{{ url('admin/user/add') }}" class="btn btn-primary">
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
                        Add User
                    </a>
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
                            placeholder="Search User" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <a type="button" href="{{ url('admin/user/add') }}" class="btn btn-primary">
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
                            Add User
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0" id="tableDiv">
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                    <thead>
                        <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                            <th class="text-center min-w-25px">#</th>
                            <th class="text-center min-w-25px">Profile Image</th>
                            <th class="text-center min-w-125px">Full Name</th>
                            <th class="text-center min-w-125px">Email</th>
                            <th class="text-center min-w-125px">Phone</th>
                            <th class="text-center min-w-50px">Status</th>
                            <th class="text-center min-w-70px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        <?php $i = 1; ?>
                        @foreach ($users as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $i++ }}
                                </td>
                                <td class="text-center">
                                    <div class="symbol symbol-50px">
                                        <img src="{{ isset($data) && $data !== null && $data->profileImage != null ? $data->profileImage : 'assets/media/blank.png' }}"
                                            alt="" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $data->name }}
                                </td>
                                <td class="text-center">
                                    {{ $data->email }}
                                </td>
                                <td class="text-center">
                                    {{ $data->phone }}
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
                                        <a class="btn btn-icon btn-outline-warning has-ripple"
                                            href="{{ 'admin/user/update?userId=' . $data->id }}"
                                            style="border-radius: 50%;"><i class="fas fa-pen"></i></a>
                                        <a class="btn btn-icon btn-outline-danger has-ripple" data-bs-toggle="modal"
                                            onclick="openDeleteModal('{{ $data->id }}')"
                                            data-bs-target="#deleteModal" style="border-radius: 50%;"><i
                                                class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif


    <!--delete modal start-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete User</h5>
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
                <form action="{{ url('admin/user/delete') }}" id="deleteForm" method="post">
                    @csrf
                    <input type="hidden" name="userId" id="deleteUserId">
                    <div class="modal-body">
                        <span>Are you sure you want to delete user <span id="userName"></span> ? <br> Action cannot be
                            reverted.</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">No</button>
                        <button type="submit" id="delYes" class="btn btn-danger">
                            Yes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--delete modal end-->

@endsection

@section('scripts')
    <!-- data table  -->
    <script>
        var KTAppEcommerceCategories = function() {
            var n = () => {

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

    <!-- Modals -->
    <script>
        var users = @json($users);

        function openDeleteModal(id) {
            var user = users.find(x => x.id == id);
            $('#deleteUserId').val(user.id);
            $('#userName').html(user.fname + ' ' + user.lname);
        }
    </script>
@endsection
