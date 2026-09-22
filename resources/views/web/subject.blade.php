@extends('layouts.web')

@section('style')
    <link rel="sheet" href="{{ asset('assets/css/subject.css') }}">
@endsection
<!-- Back Button -->
<a href=".{{ url('/') }}" class="back-btn">← Back to Home</a>

<!-- Subjects Section -->
<section class="subjects-section">
    <div class="container">
        <h1 class="subjects-heading">Explore <span>Plenty of Subjects</span></h1>
        <p class="subjects-text">
            Our platform is your gateway to a wide array of learning areas. Whether you're interested in core academics
            or modern technologies, we’ve got you covered!
        </p>
        <ul class="subjects-list">
            <li><strong>🖥 Computer Languages:</strong> Python, Java, C++, HTML, JavaScript, and more</li>
            <li><strong>⚙ Engineering Subjects:</strong> Electronics, Mechanics, Data Structures, Operating Systems</li>
            <li><strong>🔬 Science & Maths:</strong> Physics, Chemistry, Biology, Algebra, Trigonometry</li>
            <li><strong>🌍 Social Studies:</strong> History, Geography, Civics, Environmental Science</li>
            <li><strong>🧠 Aptitude & Reasoning:</strong> Logical reasoning, puzzles, mental math</li>
            <li><strong>📱 Digital Literacy:</strong> Cybersecurity, online safety, digital tools</li>
            <li><strong>🎨 Creativity:</strong> Art, design basics, general knowledge</li>
        </ul>
        <p class="subjects-text">
            New subjects and topics are regularly added to keep you updated and challenged.
        </p>
    </div>
</section>
@endsection
