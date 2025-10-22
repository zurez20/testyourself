@extends('layouts.error')

@section('title', '403 Error')

@section('content')
<div class="error error-3 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(/assets/media/error/404.jpg);">
    <div class="px-10 px-md-30 py-md-0 d-flex flex-column">
        <a href="{{('admin/dashboard')}}" class="btn btn-primary btn-lg mt-5">Back to the dashboard</a>
    </div>
</div>
@endsection 