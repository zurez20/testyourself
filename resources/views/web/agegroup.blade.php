@extends('layouts.web')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/age_group.css') }}">
@endsection
@section('content')
    <div class="header d-flex justify-content-between align-items-start">
        <div>
            <h1>Choose an <span>Age Group</span></h1>
            <p>Pick your age to get quizzes made just for you!</p>
        </div>
        <a href="{{url('/')  }}" class="back-btn">← Back to Home</a>
    </div>

    <div class="card-containers">
        <div class="card">
            <h2>👦 7 – 9 Years</h2>
            <p>Fun and educational quizzes for growing minds.</p>
            <a href="../agewise 7-9/topics7_9.html"><button>Start Quiz</button></a>
        </div>
        <div class="card">
            <h2>👧 10 – 12 Years</h2>
            <p>Challenge your knowledge in multiple subjects.</p>
            <a href="../agewise10-12/topics_10_12.html"><button>Start Quiz</button></a>
        </div>
        <div class="card">
            <h2>🧑 13 – 15 Years</h2>
            <p>Practice logic, reasoning, and subject-based questions.</p>
            <a href="../agewise13-15/topics_13_15.html"><button>Start Quiz</button></a>
        </div>
    </div>
@endsection