@extends('layouts.web')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
@endsection

@section('content')
    <div class="container header d-flex justify-content-between align-items-start my-5">
        <div>
            <h1>Choose a <span>Topic</span></h1>
            <p>Pick a topic for your quiz!</p>
        </div>
        <a href="{{url('/agegroup') }}" class="back-btn">← Back</a>
    </div>

    <div class="card-container">
        <div class="card" data-topic="Math">
            <h2>➗ Math</h2>
            <p>Numbers, addition, subtraction, and basic problems.</p>
            <button>Select Topic</button>
        </div>
        <div class="card" data-topic="Science">
            <h2>🔬 Science</h2>
            <p>Learn about plants, animals, and experiments.</p>
            <button>Select Topic</button>
        </div>
        <div class="card" data-topic="English">
            <h2>📚 English</h2>
            <p>Improve grammar, vocabulary, and comprehension.</p>
            <button>Select Topic</button>
        </div>
        <div class="card" data-topic="General Knowledge">
            <h2>🌍 General Knowledge</h2>
            <p>Fun facts, world, and daily life questions.</p>
            <button>Select Topic</button>
        </div>
        <div class="card" data-topic="Logical Reasoning">
            <h2>🧩 Logical Reasoning</h2>
            <p>Puzzles, patterns, and critical thinking challenges.</p>
            <button>Select Topic</button>
        </div>
        <div class="card" data-topic="Creative Skills">
            <h2>🎨 Creativity</h2>
            <p>Drawing, colors, imagination, and activities.</p>
            <button>Select Topic</button>
        </div>
        <div class="card" data-topic="Animals & Nature">
            <h2>🐾 Animals & Nature</h2>
            <p>Learn about wildlife, plants, and environment.</p>
            <button>Select Topic</button>
        </div>
        <div class="card" data-topic="Sports & Fun">
            <h2>⚽ Sports & Fun</h2>
            <p>Games, sports, and fun activities.</p>
            <button>Select Topic</button>
        </div>
    </div>

    <script>
        // Select all topic buttons
        const buttons = document.querySelectorAll(".card button");

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                const topic = btn.closest(".card").dataset.topic;
                // For now, just alert the selected topic
                alert(`You selected the topic: ${topic}`);
            });
        });
    </script>
@endsection
