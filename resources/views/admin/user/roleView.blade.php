@extends('layouts.admin')

@section('title','Role Details')

@section('header')

@endsection

@section('breadcrumb')
<h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0">Role Details</h1>
<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 pt-1">
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/dashboard')}}" class="text-muted text-hover-primary">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-muted">
        <a href="{{url('/admin/role')}}" class="text-muted text-hover-primary">Roles</a>
    </li>
    <li class="breadcrumb-item">
        <span class="bullet bg-gray-200 w-5px h-2px"></span>
    </li>
    <li class="breadcrumb-item text-dark">Role Details</li>
</ul>
@endsection

@section('content')

<div class="d-flex flex-column flex-lg-row">
    <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
        <div class="card card-flush">
            <div class="card-header">
                <div class="card-title">
                    <h2 class="mb-0">{{$role->name}}</h2>
                </div>
            </div>
            @if (in_array('update-user-role', config('updatePermissions')))
            <div class="card-footer pt-0">
                <a href="{{url('/admin/role/viewUpdate')}}/{{$role->slug}}" class="btn btn-light btn-active-primary w-100">Update Role</a>
            </div>
            @endif
        </div>
    </div>
    <div class="flex-lg-row-fluid ms-lg-10">
        <div class="card card-flush mb-6 mb-xl-9">
            <div class="card-header pt-5">
                <div class="card-title">
                    <h2 class="d-flex align-items-center">Users Assigned
                        <span class="text-gray-600 fs-6 ms-1">({{$users->count()}})</span>
                    </h2>
                </div>

            </div>
            <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-50px text-center ">#</th>
                            <th class="min-w-150px">User</th>
                            <th class="min-w-125px text-center ">Joined Date</th>
                        </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                        @foreach ($users as $data)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="d-flex align-items-center">
                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                    <div class="symbol-label">
                                        <img src="{{$data->profilePhoto != null ? Storage::disk('s3')->url($data->profilePhoto) : '' }} " alt="" onerror="src='/assets/media/blank.png'" class="w-100"/>

                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <a class="text-gray-800 text-hover-primary mb-1">{{$data->fullName}}</a>
                                    <span>{{$data->email}}</span>
                                    <span>{{$data->phone}}</span>
                                </div>
                            </td>

                            <td class="text-center">{{date('d M, Y', strtotime($data->created_at))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

@endsection