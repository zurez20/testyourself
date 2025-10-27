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

                <!-- Category 1 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🧮 Math</h5>
                            <p class="card-text">Test your skills in arithmetic, algebra, geometry, and more.</p>
                        </div>
                    </div>
                </div>

                <!-- Category 2 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🔬 Science</h5>
                            <p class="card-text">Explore biology, physics, chemistry, and environmental science.</p>
                        </div>
                    </div>
                </div>

                <!-- Category 3 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🌍 General Knowledge</h5>
                            <p class="card-text">How much do you know about the world around you?</p>
                        </div>
                    </div>
                </div>

                <!-- Category 4 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🎨 Art & Creativity</h5>
                            <p class="card-text">Test your knowledge in art, design, and creative thinking.</p>
                        </div>
                    </div>
                </div>

                <!-- Category 5 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">💻 Digital Literacy</h5>
                            <p class="card-text">Learn about cybersecurity, online tools, and safe internet use.</p>
                        </div>
                    </div>
                </div>

                <!-- Category 6 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🧠 Logical Reasoning</h5>
                            <p class="card-text">Sharpen your problem-solving and logical thinking skills.</p>
                        </div>
                    </div>
                </div>
                <!-- Category 7 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🧮 Math</h5>
                            <p class="card-text">Test your skills in arithmetic, algebra, geometry, and more.</p>
                        </div>
                    </div>
                </div>

                <!-- Category 8 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🔬 Drawing</h5>
                            <p class="card-text">Explore Colours.</p>
                        </div>
                    </div>
                </div>

                <!-- Category 9 -->
                <div class="col-md-4">
                    <div class="card category-card shadow-sm h-100">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">🌍 General Knowledge</h5>
                            <p class="card-text">How much do you know about the world around you?</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </section>
@endsection
