@extends('layouts.web')

@section('style')
@endsection

@section('content')
    <section class="bg-light py-5">
        <div class="container">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">🧠 General Knowledge Quiz</h2>
                <p class="text-muted">Select the correct answer for each question below.</p>
            </div>

            <form action="{{ url('/submit-quiz/' . $category->id . '/' . $agerange->id) }}" method="POST">
                @csrf
                <!-- Question List -->
                <div class="row justify-content-center">
                    <div class="col-md-10">

                        @foreach ($questionanswers as $questionanswer)
                            <div class="card mb-4 shadow-sm">
                                <div class="card-body">
                                    <h5 class="fw-semibold mb-3">{{ $questionanswer->question }}</h5>

                                    @foreach ($questionanswer->answers as $answer)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio"
                                                name="answers[{{ $questionanswer->id }}]" id="answer_{{ $answer->id }}"
                                                value="{{ $answer->id }}">
                                            <label class="form-check-label" for="answer_{{ $answer->id }}">
                                                {{ $answer->answer }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach


                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-warning btn-lg px-5">Submit Quiz</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
