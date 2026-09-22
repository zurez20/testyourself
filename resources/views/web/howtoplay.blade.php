@extends('layouts.web')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/htp.css') }}">
@endsection

@section('content')

  <!-- How to Play Content -->
  <section class="bg-dark text-white text-center py-4 hero-section">
    <div class="container">
      <h1 class="mb-4 text-center display-5">🎮 How to <span class="text-warning">Play</span></h1>
      <p class="lead text-center mb-5">
        Welcome to <strong>Test Yourself</strong> – the ultimate quiz adventure where learning meets fun! Whether you're a student, professional, or curious mind, our platform is designed to challenge and entertain you.
      </p></div></section>

      <section> <div class="row">
        <div class="col-md-6">
          <h3 class="mb-3">🧩 Step-by-Step Guide</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">📚 <strong>Choose a Quiz Category:</strong> Pick a subject like Math, Science, GK.</li>
            <li class="list-group-item">📊 <strong>Select Age Group:</strong> Kids, teens, or adults.</li>
            <li class="list-group-item">🚀 <strong>Start the Quiz:</strong> Click "Start" and begin.</li>
            <li class="list-group-item">✅ <strong>Answer Carefully:</strong> Read and choose the best answer.</li>
            <li class="list-group-item">🔍 <strong>Get Feedback:</strong> Learn from explanations.</li>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">📈 <strong>View Results:</strong> Analyze performance.</li>
            <li class="list-group-item">🏆 <strong>Earn Rewards:</strong> Badges, levels, and more!</li>
          </ul>
        </div>

        <div class="col-md-6">
          <h3 class="mb-3">🔐 Notes</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">⏱️ Some quizzes are timed. Stay focused.</li>
            <li class="list-group-item">🧾 Create an account to save progress.</li>
            <li class="list-group-item">🔁 Use practice mode to improve.</li>
          </ul>
          
          <h3 class="mt-5 mb-3">🌟 Tips for Success</h3>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">🧠 Stay calm and focused.</li>
            <li class="list-group-item">📚 Practice regularly.</li>
            <li class="list-group-item">💡 Learn from mistakes.</li>
            <li class="list-group-item">🎯 Have fun while learning!</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="py-5 bg-white text-center">
    <div class="container">
      <h2 class="mb-5">💡 Why Choose <span class="text-warning">Test Yourself</span>?</h2>
      <div class="row g-4">
        <div class="col-md-3">
          <div class="p-4 shadow rounded bg-light h-100">
            <h5>📚 Library</h5>
            <p>Handrens of questions across subjects and difficulty levels.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-4 shadow rounded bg-light h-100">
            <h5>🎓 Learning + Fun</h5>
            <p>Boost your knowledge while enjoying every quiz session.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-4 shadow rounded bg-light h-100">
            <h5>📊 Track Progress</h5>
            <p>Measure growth and discover areas of improvement.</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-4 shadow rounded bg-light h-100">
            <h5>🔐 Secure & Easy</h5>
            <p>Simple, safe, and intuitive platform for all ages.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="py-5 bg-warning text-white text-center">
    <div class="container">
      <h2 class="mb-3">🚀 Ready to Test Yourself?</h2>
      <p class="mb-4">Join now and unlock a world of fun learning and knowledge!</p>
      <a href="{{url('register')}}" class="btn btn-light btn-lg text-warning fw-bold">Start Now</a>
    </div>
  </section>

@endsection