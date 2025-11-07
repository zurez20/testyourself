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

            <form id="quizForm" action="{{ url('/submit-quiz/' . $category->id . '/' . $agerange->id) }}" method="POST">
                @csrf
                <!-- Question List -->
                <div class="row justify-content-center">
                    <div class="col-md-10">

                        @foreach ($questionanswers as $questionanswer)
                            <div class="card mb-4 shadow-sm question-card">
                                <div class="card-body">
                                    <h5 class="fw-semibold mb-3">Q{{ $loop->iteration }}: {{ $questionanswer->question }}
                                    </h5>
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

                                    <!-- Validation message placeholder -->
                                    <div class="text-danger small mt-2 d-none error-msg">
                                        Please select an answer for this question.
                                    </div>
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

@section('script')
    <script>
        document.getElementById('quizForm').addEventListener('submit', function(e) {
            const questionCards = document.querySelectorAll('.question-card');
            let allAnswered = true;

            questionCards.forEach(card => {
                const radios = card.querySelectorAll('input[type="radio"]');
                const isAnswered = Array.from(radios).some(radio => radio.checked);
                const errorMsg = card.querySelector('.error-msg');

                if (!isAnswered) {
                    allAnswered = false;
                    errorMsg.classList.remove('d-none');
                } else {
                    errorMsg.classList.add('d-none');
                }
            });

            if (!allAnswered) {
                e.preventDefault();
                toastr.error('Please answer all questions before submitting.');
            } else {
                // ✅ Disable the button and change text to prevent double clicks
                submitBtn.disabled = true;
                submitBtn.innerText = 'Submitting...';
            }

        });
    </script>
@endsection
