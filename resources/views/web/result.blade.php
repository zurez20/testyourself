@extends('layouts.web')

@section('style')
@endsection

@section('content')
    <section class="bg-light py-5">
        <div class="container">

            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">🎯 Quiz Results</h2>
                <p class="text-muted">Here’s how you performed in the quiz!</p>
            </div>

            <!-- Score Summary -->
            <div class="row justify-content-center mb-5">
                <div class="col-md-6">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body py-4">
                            <h3 class="fw-bold text-success mb-3">Your Score: <span
                                    class="text-dark">{{ $results->correctAnswers }}/{{ $results->totalQuestions }}</span>
                            </h3>
                            <p class="text-muted mb-4">Great job! You’re improving with every quiz attempt.</p>

                            <!-- Simple Progress Bar -->
                            <div class="progress mb-3" style="height: 25px;">
                                <div class="progress-bar bg-warning" role="progressbar"
                                    style="width: {{ $results->score }}%;" aria-valuenow="{{ $results->score }}"
                                    aria-valuemin="0" aria-valuemax="100">
                                    {{ $results->score }}%
                                </div>
                            </div>
                            @php
                                $score = (float) $results->score;

                                $low = [
                                    'Congrats — you invented a new low. Try your age-range questions next time.',
                                    'Lmao, did you randomly click answers, stupid? Even a toddler could do better.',
                                    'Epic fail. Did you even read the questions or just guess like a clown?',
                                ];

                                $mid = [
                                    'Barely passed? That\'s just failure in disguise, you hack.',
                                    'Mediocre mess. You aimed low and still missed—brutal.',
                                    'Half-assed? More like no-assed. Choke artist supreme.',
                                ];

                                $high = [
                                    'Look at you, Mr. Know-it-all. Bet you feel real smart now.',
                                    'Great job—are you sure you didn’t Google it, genius?',
                                    'Try your range questions next time. Anyone can solve kid-level stuff.',
                                ];

                                if ($score <= 30) {
                                    $accuracy = $low[array_rand($low)];
                                    $level = 'Beginner';
                                    $color = 'text-danger';
                                } elseif ($score <= 70) {
                                    $accuracy = $mid[array_rand($mid)];
                                    $level = 'Almost Smart';
                                    $color = 'text-warning';
                                } else {
                                    $accuracy = $high[array_rand($high)];
                                    $level = 'Expert';
                                    $color = 'text-success';
                                }
                            @endphp

                            <p class="text-secondary small">
                                Accuracy Level:
                                <span class="fw-semibold {{ $color }}">{{ $level }}</span><br>
                                <span class="text-muted fst-italic">{{ $accuracy }}</span>
                            </p>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Answers -->
            <div class="row justify-content-center">
                <div class="col-md-10">

                    @foreach ($results->playeranswer as $playeranswer)
                        <div class="card mb-3 shadow-sm">
                            <div class="card-body">
                                <h5 class="fw-semibold">Q{{ $loop->iteration }}. {{ $playeranswer->question->question }}
                                </h5>
                                <p class="mb-1"><strong>Your Answer:</strong> {{ $playeranswer->selectedAnswer->answer }}
                                </p>
                                <p class="mb-1"><strong>Correct Answer:</strong>
                                    {{ $playeranswer->correctAnswer->answer }} ✅</p>
                                @if ($playeranswer->isCorrect)
                                    <p class="text-success fw-semibold mb-0">✔ Correct</p>
                                @else
                                    <p class="text-danger fw-semibold mb-0">✖ Incorrect</p>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center mt-5">
                <a href="{{ url('/category') }}" class="btn btn-outline-dark me-2">Back to Categories</a>
                <a href="{{ url('/questionanswer/' . $results->categoryId . '/' . $results->ageRangeId) }}" class="btn btn-warning">Try Again</a>
            </div>

        </div>
    </section>
@endsection
