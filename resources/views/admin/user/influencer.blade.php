@extends('layouts.admin')

@section('title')
Influencers
@endsection

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Influencers</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Influencers</li>
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

<!-- influencer table -->

<div class="card">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <form action="{{ url('admin/influencer') }}" method="get" id="filter_form">
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-group">
                            <div class="input-group-dropdown" id="basic-addon1">
                                <select class="form-select" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select Fields" name="fields" id="fields" onchange="removeinput()"
                                    required style="padding-top: 0; padding-bottom: 0;">
                                    <option value="name" {{ request()->input('fields') === 'name' ? 'selected' : '' }}>
                                        Name</option>
                                    <option value="phone" {{ request()->input('fields') === 'phone' ? 'selected' : '' }}>
                                        Phone</option>
                                    <option value="email" {{ request()->input('fields') === 'email' ? 'selected' : '' }}>
                                        Email</option>
                                </select>
                            </div>
                            <input type="text" id="searchInput" name="searchTerm"
                                value="{{ request()->input('searchTerm') }}" class="form-control" placeholder="Search"
                                aria-label="Search Fields" aria-describedby="basic-addon1"
                                style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                            <button type="submit" class="btn btn-primary py-1" aria-label="Search"
                                style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" data-control="select2" data-placeholder="Select Status" data-hide-search="true" name="status" id="FilterStatus" onchange="this.form.submit()">
                            <option value="">Select Status</option>
                            <option value="1" {{ Request::get('status') === '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ Request::get('status') === '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <?php
                    $startDateFor7 = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
                    $startDateFor30 = date('Y-m-d', strtotime('-30 days', strtotime(date('Y-m-d'))));
                    $startDateFor90 = date('Y-m-d', strtotime('-90 days', strtotime(date('Y-m-d'))));
                    $currentYear = date('Y');
                    $startDateForFinancialYear = (date('m') >= 4) ? date($currentYear . '-04-01') : date(($currentYear - 1) . '-04-01');
                    ?>
                    <div class="col-md-3">
                        <select class="form-select" data-control="select2" data-placeholder="Select Duration" data-hide-search="true" id="date_range" onchange="dateFilterChanged()">
                            <option value=""></option>
                            <option value="{{$startDateFor7}}" {{ Request::get('startDate') === $startDateFor7 ? 'selected' : '' }}>Last 7 Days</option>
                            <option value="{{$startDateFor30}}" {{ Request::get('startDate') === $startDateFor30 ? 'selected' : '' }}>Last 30 Days</option>
                            <option value="{{$startDateFor90}}" {{ Request::get('startDate') === $startDateFor90 ? 'selected' : '' }}>Last 90 Days</option>
                            <option value="{{$startDateForFinancialYear}}" {{ Request::get('startDate') === $startDateForFinancialYear ? 'selected' : '' }}>Financial Year</option>
                            <option value="custom" {{ Request::get('startDate') === 'custom' ? 'selected' : '' }}>Custom</option>
                        </select>
                        <input type="hidden" name="startDate" id="startDateInput" value="{{Request::get('startDate')}}">
                        <input type="hidden" name="endDate" id="endDateInput" value="{{Request::get('endDate')}}">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                @if (in_array('add-user-influencer', config('addPermissions')))
                <a type="button" href="{{url('admin/influencer/add')}}" class="btn btn-primary">
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1" transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                        </svg>
                    </span>
                    Add Influencer
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
                    <th class="text-center min-w-25px">Profile Image</th>
                    <th class="text-center min-w-125px">Full Name</th>
                    <th class="text-center min-w-125px">Email</th>
                    <th class="text-center min-w-125px">Phone</th>
                    <th class="text-center min-w-125px">Status</th>
                    @if (in_array('update-user-influencer', config('updatePermissions')) || in_array('delete-user-influencer',config('deletePermissions')))
                    <th class="text-center min-w-125px">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody class="fw-semibold text-gray-600">

                @if($influencers->count() == 0)
                <tr>
                    <td colspan="8">
                        <p class="text-gray-400 fs-4 fw-semibold mb-10 text-center">No Result Found</p>
                    </td>
                </tr>
                @else
                @foreach ($influencers as $index => $data)
                <tr>
                    <td class="text-center">{{ $index + 1 + ($influencers->currentPage() - 1) * $influencers->perPage() }}
                    </td>
                    <td class="text-center">
                        <div class="symbol symbol-50px">
                            <img src="{{$data->profileImage != null ? $data->profileImage : 'assets/media/blank.png'}}" alt="" />
                        </div>
                    </td>
                    <td class="text-center">
                        {{ $data->fname . ' ' . $data->lname }} <br>
                        @if (in_array('update-user-influencer', config('updatePermissions')))
                        @if($data->rolee->panelFlag == 1)
                        <a href="{{url('/admin/user/permissions?userUID='.$data->uid. '&type=influencer')}}"
                            class="badge badge-primary" style="text-decoration: none; color: white;">View Permissions
                        </a>
                        @else
                        <span class="badge badge-light-danger">No panel access for influencer </span>
                        @endif
                        @endif
                    </td>
                    <td class="text-center">
                        {{ $data->email }}
                    </td>
                    <td class="text-center">
                        {{ $data->phone }}
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
                    @if (in_array('update-user-influencer', config('updatePermissions')) || in_array('delete-user-influencer',config('deletePermissions')))
                    <td class="text-center">
                        <div class="align-middle text-center">
                            @if (in_array('update-user-influencer', config('updatePermissions')))
                            <a class="btn btn-icon btn-outline-warning has-ripple" href="{{'admin/influencer/update?userUid='.$data->uid}}" style="border-radius: 50%;"><i class="fas fa-pen"></i></a>
                            @endif
                            @if (in_array('delete-user-influencer',config('deletePermissions')))
                            <a class="btn btn-icon btn-outline-danger has-ripple" data-bs-toggle="modal" onclick="openDeleteModal('{{$data->uid}}')" data-bs-target="#deleteModal" style="border-radius: 50%;"><i class="far fa-trash-alt"></i></a>
                            @endif
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="mt-5" id="pagination">
            {{ $influencers->appends(request()->query())->links() }}
        </div>

    </div>
</div>

<!-- custom modal -->
<div class="modal modal-sm" id="customModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Custom</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/influencer') }}" method="get" id="customForm">
                    <div class="row g-3 mb-3">
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Start Date</label>
                            <input type="date" class="form-control" placeholder="Enter Start Date" id="startDate" name="startDate" required value="{{Request::get('startDate')}}">
                        </div>
                        <div class="col-md-12 fv-row">
                            <label class="fs-6 fw-semibold mb-2">End Date</label>
                            <input type="date" class="form-control" placeholder="Enter End Date" id="endDate" name="endDate" required value="{{Request::get('endDate')}}">
                        </div>
                        <input type="hidden" name="fields" id="hiddenFields" value="{{ Request::get('fields') }}">
                        <input type="hidden" name="searchTerm" id="hiddenSearchTerm" value="{{ Request::get('searchTerm') }}">
                        <input type="hidden" name="status" id="hiddenStatus" value="{{ Request::get('status') }}">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="submitBtn">
                                <span class="indicator-label">Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--delete modal start-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Influencer</h5>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
            <form action="{{ url('admin/influencer/delete') }}" id="deleteForm" method="post">
                @csrf
                <input type="hidden" name="influencerUid" id="deleteInfluencerUid">
                <div class="modal-body">
                    <span>Are you sure you want to delete influencer <span id="influencerName"></span> ? <br> Action cannot be reverted.</span>
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
    var influencers = @json($influencers);
    influencers = influencers.data;

    var config = {
        placeholderblank: 'assets/media/blank.png'
    };

    function openDeleteModal(uid) {
        var influencer = influencers.find(x => x.uid == uid);
        $('#deleteInfluencerUid').val(influencer.uid);
        $('#influencerName').html(influencer.fname + ' ' + influencer.lname);
    }
</script>

<!-- date filter -->
<script>
    document.getElementById('date_range').addEventListener('change', function() {
        document.getElementById('dateRangeForm').submit();
    });
</script>

<script>
    function removeinput() {
        $('#searchInput').val('')
    }

    function dateFilterChanged() {
        var dateRangeField = $('#date_range');
        var startDateInput = $('#startDateInput');
        var endDateInput = $('#endDateInput');
        var selectBox = document.getElementById("date_range");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        console.log(selectedValue);

        if (selectedValue !== 'custom') {
            startDateInput.val(selectedValue);
            $('#filter_form').submit();
        } else {
            $('#date_range').val('Custom')
            var hiddenFields = $('#fields').val();
            var hiddenSearchTerm = $('#searchInput').val();
            var hiddenStatus = $('#FilterStatus').val();

            $('#hiddenFields').val(hiddenFields);
            $('#hiddenSearchTerm').val(hiddenSearchTerm);
            $('#hiddenStatus').val(hiddenStatus);
            $('#customModal').modal('show');
        }
    }
</script>

<!-- Date Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("customForm").addEventListener("submit", function(event) {
            var startDate = document.getElementById("startDate").value;
            var endDate = document.getElementById("endDate").value;

            if (startDate && endDate) {
                var start = new Date(startDate);
                var end = new Date(endDate);

                if (end < start) {
                    event.preventDefault(); // Form submit hone se roke
                    toastr.error("End Date should be after Start Date.");
                    document.getElementById("endDate").classList.add("is-invalid");
                } else {
                    document.getElementById("endDate").classList.remove("is-invalid");
                }
            }
        });
    });
</script>


@endsection