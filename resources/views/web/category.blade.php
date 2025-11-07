@extends('layouts.web')

@section('style')
    <style>
        .category-card {
            transition: all 0.3s ease;
            background-color: #fff;
        }

        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .category-card img {
            transition: transform 0.3s ease;
        }

        .category-card:hover img {
            transform: scale(1.1);
        }
    </style>
    <link rel="stylesheet" href="{{ asset('assets/css/category.css') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-5 fw-bold">Explore <span class="text-warning">Quiz Categories</span></h1>
            <p class="lead mt-3 text-light opacity-75">
                Challenge your knowledge across different subjects and age groups.
            </p>
        </div>
    </section>

    <!-- Category Cards -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4 justify-content-center">

                @foreach ($categories as $category)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card border-0 shadow-sm h-100 rounded-4 category-card transition-all">
                            <div class="card-body text-center p-4">
                                @if ($category->icon)
                                    <img src="{{ asset($category->icon) }}" alt="{{ $category->name }} icon" class="mb-3"
                                        style="width:50px; height:50px;">
                                @endif
                                <h5 class="card-title fw-semibold text-dark mb-2">{{ $category->name }}</h5>
                                <p class="card-text text-muted small mb-4">
                                    {{ Str::limit($category->desc, 80) }}
                                </p>
                                <a href="{{ url('/agegroup/' . $category->id) }}"
                                    class="btn btn-warning text-white fw-semibold px-4 py-2 rounded-pill shadow-sm">
                                    Start Quiz
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection