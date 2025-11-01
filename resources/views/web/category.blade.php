@extends('layouts.web')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-5">Choose a <span class="text-warning">Quiz Category</span></h1>
            <p class="lead mt-2">Challenge your mind across multiple subjects and age groups.</p>
        </div>
    </section>

    <!-- Category Cards -->
    <section class="m-4">
        <div class="container">
            <div class="row g-4">

                @foreach ($categories as $category)
                    <div class="col-md-4">
                        <div class="card category-card shadow-sm h-100">
                            <div class="card-body text-center">
                                @if ($category->icon)
                                    <img src="{{ asset($category->icon) }}" alt="{{ $category->name }} icon" class="mb-3"
                                        style="width:40px; height:40px;">
                                @endif
                                <span class="card-title fs-4 text-warning">{{ $category->name }}</span>
                                <p class="card-text">{{ $category->desc }}</p>
                                <a href="{{ url('/agegroup/' . $category->id) }}" class="btn btn-sm btn-outline-warning">Start Quiz</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
@endsection
