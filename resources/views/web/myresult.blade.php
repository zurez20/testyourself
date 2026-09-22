@extends('layouts.web')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="fw-bold mb-4 text-center">📊 My Quiz Results</h2>

            @if ($attempts->isEmpty())
                <p class="text-center text-muted">You haven't taken any quizzes yet. Go ahead and test your knowledge!</p>
                <div class="text-center">
                    <a href="{{ url('/category') }}" class="btn btn-primary">Take a Quiz Now</a>
                </div>
            @else
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Category</th>
                            <th>Age Range</th>
                            <th>Score</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attempts as $attempt)
                            <tr>
                                <td>{{ $attempt->category->name }}</td>
                                <td>{{ $attempt->ageRange->name }}</td>
                                <td>{{ $attempt->score }} / {{ $attempt->total_questions }}</td>
                                <td>{{ $attempt->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ url('/result/' . $attempt->id) }}" class="btn btn-sm btn-warning">View
                                        Result</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
