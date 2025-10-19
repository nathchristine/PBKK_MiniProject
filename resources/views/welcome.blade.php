<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Review</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="welcome-body">

    <main class="welcome-main">
        <div class="welcome-card">

            <h1 class="welcome-title">
                🍿 Welcome to Movie Review 🍿
            </h1>

            <p class="welcome-description">
                Your go-to place for movie ratings and reviews!
            </p>

            <div class="welcome-actions">
                <a href="{{ url('/movies') }}" class="welcome-btn">
                    View Movies
                </a>
            </div>

        </div>
    </main>

</body>
</html>
