@extends('layouts.web')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}">
@endsection
@section('content')
    <!-- ✅ Hero Section -->
    <section class="bg-dark text-white text-center py-5 hero-section">
        <div class="container">
            <h1 class="display-5">Welcome to <span class="text-warning">Test Yourself</span></h1>
            <p class="lead mt-2">Playful quizzes. Serious learning. Fun for all ages!</p>
        </div>
    </section>

    <!-- ✅ About Content -->
    <section class="py-5">
        <div class="container">
            <p><strong>Test Yourself</strong> is a fun and interactive quiz platform designed to make learning exciting for
                all age groups. Whether you're a curious child, a passionate teenager, or a knowledge-seeking adult —
                there's something here for everyone.</p>

            <p class="mt-3">We believe that education should be engaging. That's why our quizzes are crafted to be more
                than just questions and answers. Each quiz is a journey filled with interesting facts, thoughtful
                explanations, and challenges that test your mind.</p>

            <ul class="list-group list-group-flush my-4">
                <li class="list-group-item">🎯 A wide variety of subjects and topics</li>
                <li class="list-group-item">🧠 Thought-provoking questions with detailed feedback</li>
                <li class="list-group-item">🏆 Reward-based systems to motivate and inspire</li>
                <li class="list-group-item">📊 Progress tracking and performance insights</li>
            </ul>

            <h3 class="text-center my-4">🎯 Our Mission</h3>
            <p class="text-center">To promote lifelong learning through playful and interactive quizzes. We aim to create a
                space where learning happens naturally — without pressure, without stress, and with lots of fun.</p>

            <h3 class="text-center my-5">📚 What We Offer</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-">



                            <h5 class="card-title text-warning">📘 Wide Range of Topics</h5>
                            <p class="card-text">From math and science to art and digital literacy, we cover it all.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-warning">🎯 Age-Appropriate Content</h5>
                            <p class="card-text">Quizzes are designed by age group for a better experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-warning">🏅 Reward-Based Learning</h5>
                            <p class="card-text">Earn scores, badges, and achievement levels as you learn.</p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-center my-5">🧠 Why Choose Test Yourself?</h3>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item">✨ Learning becomes exciting and personalized</li>
                <li class="list-group-item">📚 Helps students improve academic performance</li>
                <li class="list-group-item">🔍 Encourages critical thinking and problem-solving</li>
                <li class="list-group-item">💪 Builds self-confidence through small wins</li>
                <li class="list-group-item">💻 Promotes healthy screen time by combining fun and knowledge</li>
            </ul>
        </div>
    </section>
@endsection
