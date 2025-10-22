@extends('layouts.error')

@section('title', '404 Error')

@section('content')
<div class="error error-3 d-flex flex-row-fluid bgi-size-cover bgi-position-center" style="background-image: url(/assets/media/error/404.jpg);">
    <div class="px-10 px-md-30 py-md-0 d-flex flex-column">
        <a href="{{ str_contains(request()->path(), 'admin') ? url('admin/dashboard') : url('/') }}" class="btn btn-primary btn-lg mt-5">
            {{ str_contains(request()->path(), 'admin') ? 'Back to Dashboard ' : 'Back to Home' }}
        </a>
    </div>
</div>
@endsection