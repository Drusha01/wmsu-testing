<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

@include('student-components.student-navigation')

@include('student-components.student-navtabs')

        <!-- Results Tab Content -->
        <div role="tabpanel" class="tab-pane" id="results">
        <section class="results-section">
    <div class="container">
        <h2 class="section-title">Exam Results</h2>
        <ul class="result-links">
            <li class="result-link">
                <a href="path-to-result-pdf-1.pdf" target="_blank" class="result-pdf-link">CET Result PDF 1</a>
            </li>
            <li class="result-link">
                <a href="path-to-result-pdf-2.pdf" target="_blank" class="result-pdf-link">NAT Result PDF 2</a>
            </li>
            <li class="result-link">
                <a href="path-to-result-pdf-3.pdf" target="_blank" class="result-pdf-link">Eat Result PDF 3</a>
            </li>
            <!-- Add more result links as needed -->
        </ul>
    </div>
</section>
        </div>





<!-- Include Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>