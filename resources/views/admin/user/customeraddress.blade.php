@extends('layouts.admin')

@section('title')
CustomerAddress
@endsection

@section('header')
@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Addresses of {{$customer->fname}} {{$customer->lname}}</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/customer')}}" class="text-muted text-hover-primary">Customers</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Customer Addresses</li>
</ul>
@endsection

@section('content')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
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

<!-- customer address table -->

<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                    </svg>
                </span>
                <input type="text" data-kt-customer-table-filter="search" class="form-control w-250px ps-15" placeholder="Search Address " />
            </div>
        </div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                @if (in_array('add-user-customeraddress', config('addPermissions')))
                <a href="{{'admin/customer/customeraddress/add?customerUid='.$customer->uid}}" class="btn btn-primary">
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                        </svg>
                    </span>
                    Add Address
                </a>
                @endif
            </div>
        </div>
    </div>

    <div class="card-body pt-0" id="tableDiv">
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="data_table">
            <thead>
                <tr class="text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                    <th class="text-center min-w-25px">#</th>
                    <th class="text-center min-w-125px">Address</th>
                    <th class="text-center min-w-100px">State</th>
                    <th class="text-center min-w-100px">City</th>
                    <th class="text-center min-w-100px">Pincode</th>
                    <th class="text-center min-w-100px">Type</th>
                    <th class="text-center min-w-100px">Status</th>
                    @if (in_array('update-user-customeraddress', config('updatePermissions')) || in_array('delete-user-customeraddress',config('deletePermissions')))
                    <th class="text-center min-w-100px">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">
                <?php $i = 1; ?>
                @foreach ($customerAddresses as $data)
                <tr>
                    <td class="text-center">
                        {{ $i++ }}
                    </td>

                    <td class="text-center">
                        {{ $data->googleAddress }}
                    </td>
                    <td class="text-center">
                        {{ $data->state }}
                    </td>
                    <td class="text-center">
                        {{ $data->city }}
                    </td>
                    <td class="text-center">
                        {{ $data->pincode }}
                    </td>
                    <td class="text-center">
                        {{ $data->type }}
                    </td>
                    <td class="text-center">
                        @if($data->status == 1)
                        <div class="badge badge-light-success">
                            Active
                        </div>
                        @else
                        <div class="badge badge-light-danger">
                            Inactive
                        </div>
                        @endif
                    </td>
                    @if (in_array('update-user-customeraddress', config('updatePermissions')) || in_array('delete-user-customeraddress',config('deletePermissions')))
                    <td class="text-center">
                        <div class="align-middle text-center">
                            @if (in_array('update-user-customeraddress', config('updatePermissions')))
                            <a class="btn btn-icon btn-outline-warning has-ripple" href="{{ url('admin/customer/customeraddress/update?customerUid=' . $data->customerUid . '&customeraddressUid=' . $data->uid) }}" style="border-radius: 50%;"><i class="fas fa-pen"></i></a>
                            @endif
                            @if (in_array('delete-user-customeraddress',config('deletePermissions')))
                            <a class="btn btn-icon btn-outline-danger has-ripple" data-bs-toggle="modal" onclick="openDeleteModal('{{ $data->uid }}')" data-bs-target="#deleteModal"><i class="far fa-trash-alt" style="border-radius: 50%;"></i></a>
                            @endif
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Delete Modal Start -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Address</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <form action="{{ url('admin/customer/customeraddress/delete') }}" id="deleteForm" method="post">
                @csrf
                <input type="hidden" id="deleteCustomerAddressUid" name="deleteCustomerAddressUid">
                <div class="modal-body">
                    <span>Are you sure you want to delete this address ?<br> This action cannot be reverted.</span>
                </div>
                <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-light me-3">No</button>
                    <button type="submit" id="delYes" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                })), document.querySelector('[data-kt-customer-table-filter="search"]').addEventListener("keyup", (function(t) {
                    e.search(t.target.value).draw()
                })), n())
            }
        }
    }();
    KTUtil.onDOMContentLoaded((function() {
        KTAppEcommerceCategories.init()
    }));
</script>

<!-- Delete Modal End -->
<script>
    var customerAddresses = @json($customerAddresses);

    function openDeleteModal(uid, customerUid) {
        $('#deleteCustomerAddressUid').val(uid);
        $('#customerUid').val(customerUid);
    }
</script>
@endsection