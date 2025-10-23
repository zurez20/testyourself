@extends('layouts.admin')

@section('title')
    Customers
@endsection

@section('header')
@endsection

@section('breadcrumb')
    <h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Customers</h1>
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
        <li class="breadcrumb-item text-muted">
            <a href="{{ url('admin/dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <li class="breadcrumb-item text-dark">Customers</li>
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
    @if ($errors->any())
        <div class="col-sm-12">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <!--Excel modal start-->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog mw-550px ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import customers in bulk</h5>
                    <a href="{{ url('ExcelFiles/User/customerExcelFormat.xlsx') }}" class="btn  btn-sm btn-light-primary"
                        style="margin-right: 10px;">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path
                                        d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                        fill="currentColor" fill-rule="nonzero" opacity="0.3" />
                                    <rect fill="currentColor" opacity="0.3"
                                        transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000) "
                                        x="11" y="2" width="2" height="12" rx="1" />
                                    <path
                                        d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z"
                                        fill="currentColor" fill-rule="nonzero"
                                        transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000) " />
                                </g>
                            </svg>
                        </span>
                        Download Format
                    </a>
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
                <form action="{{ url('/admin/customer/addexcel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12 fv-row">
                            <div class="row g-9">
                                <div class="col-md-6 fv-row">
                                    <label class="required fs-6 fw-semibold">Select Excel File</label>
                                </div>
                                <div class="col-md-6 fv-row">
                                    <input type="file" class="form-control" name="excel" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary " id="kt_modal_excel_submit">
                            <span class="indicator-label">Add Excel</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Excel model end-->

    <!-- customer table -->
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <form action="{{ url('admin/customer') }}" method="get" id="filter_form">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="input-group">
                                <div class="input-group-dropdown" id="basic-addon1">
                                    <select class="form-select" data-control="select2" data-hide-search="true"
                                        data-placeholder="Select Fields" name="fields" id="fields"
                                        onchange="removeinput()" required style="padding-top: 0; padding-bottom: 0;">
                                        <option value="name"
                                            {{ request()->input('fields') === 'name' ? 'selected' : '' }}>
                                            Name</option>
                                        <option value="phone"
                                            {{ request()->input('fields') === 'phone' ? 'selected' : '' }}>
                                            Phone</option>
                                        <option value="email"
                                            {{ request()->input('fields') === 'email' ? 'selected' : '' }}>
                                            Email</option>
                                    </select>
                                </div>
                                <input type="text" id="searchInput" name="searchTerm"
                                    value="{{ request()->input('searchTerm') }}" class="form-control"
                                    placeholder="Search" aria-label="Search Fields" aria-describedby="basic-addon1"
                                    style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                <button type="submit" class="btn btn-primary py-1" aria-label="Search"
                                    style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select" data-control="select2" data-placeholder="Select Status"
                                data-hide-search="true" name="status" id="FilterStatus" onchange="this.form.submit()">
                                <option value="">Select Status</option>
                                <option value="1" {{ Request::get('status') === '1' ? 'selected' : '' }}>Active
                                </option>
                                <option value="0" {{ Request::get('status') === '0' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <button style="margin-right:10px;" type="button" class="btn btn-light-warning"
                        data-bs-toggle="modal" data-bs-target="#importModal">
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="currentColor" opacity="0.3"
                                        transform="translate(12.000000, 7.000000) rotate(-180.000000) translate(-12.000000, -7.000000) "
                                        x="11" y="1" width="2" height="12" rx="1" />
                                    <path
                                        d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z"
                                        fill="currentColor" fill-rule="nonzero" opacity="0.3" />
                                    <path
                                        d="M14.2928932,10.2928932 C14.6834175,9.90236893 15.3165825,9.90236893 15.7071068,10.2928932 C16.0976311,10.6834175 16.0976311,11.3165825 15.7071068,11.7071068 L12.7071068,14.7071068 C12.3165825,15.0976311 11.6834175,15.0976311 11.2928932,14.7071068 L8.29289322,11.7071068 C7.90236893,11.3165825 7.90236893,10.6834175 8.29289322,10.2928932 C8.68341751,9.90236893 9.31658249,9.90236893 9.70710678,10.2928932 L12,12.5857864 L14.2928932,10.2928932 Z"
                                        fill="currentColor" fill-rule="nonzero" />
                                </g>
                            </svg>
                        </span>
                        Import Excel
                    </button>
                    <a href="{{ url('admin/customer/add') }}" class="btn btn-primary">
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
                        Add Customer
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body pt-0" id="tableDiv">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
                <thead>
                    <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="text-center min-w-25px">#</th>
                        <th class="text-center min-w-100px">Full Name</th>
                        <th class="text-center min-w-100px">Email</th>
                        <th class="text-center min-w-100px">Phone</th>
                        <th class="text-center min-w-50px">Status</th>
                        <th class="text-center min-w-70px">Actions</th>
                    </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                    @if ($customers->count() == 0)
                        <tr>
                            <td colspan="8">
                                <p class="text-gray-400 fs-4 fw-semibold mb-10 text-center">No Result Found</p>
                            </td>
                        </tr>
                    @else
                        @foreach ($customers as $index => $data)
                            <tr>
                                <td class="text-center">
                                    {{ $index + 1 + ($customers->currentPage() - 1) * $customers->perPage() }}
                                </td>
                                <td class="text-center">
                                    <div class="symbol symbol-50px">
                                        <img src="{{ $data->profileImage != null ? $data->profileImage : 'assets/media/blank.png' }}"
                                            alt="" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    {{ $data->fname . ' ' . $data->lname }}
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
                                            href="{{ 'admin/customer/update?customerUid=' . $data->uid }}"
                                            style="border-radius: 50%;"><i class="fas fa-pen"></i></a>
                                        <a class="btn btn-icon btn-outline-danger has-ripple" data-bs-toggle="modal"
                                            onclick="openDeleteModal('{{ $data->uid }}')"
                                            data-bs-target="#deleteModal" style="border-radius: 50%;"><i
                                                class="far fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!--delete modal start-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Customer</h5>
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
                <form action="{{ url('admin/customer/delete') }}" id="deleteForm" method="post">
                    @csrf
                    <input type="hidden" name="customerUid" id="deleteCustomerUid">
                    <div class="modal-body">
                        <span>Are you sure you want to delete customer <span id="customerName"></span> ? <br> Action cannot
                            be reverted.</span>
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
    <!-- Modals -->
    <script>
        var customers = @json($customers);
        customers = customers.data;

        function openDeleteModal(uid) {
            var customer = customers.find(x => x.uid == uid);
            $('#deleteCustomerUid').val(customer.uid);
            $('#customerName').html(customer.fname + ' ' + customer.lname);
        }
    </script>
@endsection
             