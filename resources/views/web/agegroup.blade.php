@extends('layouts.web')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/age_group.css') }}">
@endsection
@section('content')
    <div class="header d-flex justify-content-center align-items-center flex-column ">
        <div>
            <h1>Choose an <span>Age Group</span></h1>
            <p>Pick your age to get quizzes made just for you!</p>
        </div>
        <a href="{{ url('/') }}" class="back-btn">← Back to Home</a>
    </div>

    <div class="card-containers">
        @foreach ($agegroups as $agegroup)
            <div class="card">
                @if ($agegroup->icon)
                    <img src="{{ asset($agegroup->icon) }}" alt="{{ $agegroup->name }} icon" class="mb-3"
                        style="width:40px; height:40px;">
                @endif
                <h2>👦 {{ $agegroup->name }}</h2>
                <p>{{ $agegroup->desc }}</p>
                <a href="{{ url('questionanswer/' . $category->id . '/' . $agegroup->id) }}">
                    <button>Start Quiz</button>
                </a>
            </div>
        @endforeach
    </div>
@endsection
