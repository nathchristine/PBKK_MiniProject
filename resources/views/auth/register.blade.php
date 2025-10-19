<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Register</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="auth-body">

  <main class="auth-main">
    <div class="auth-card">

      <h1 class="auth-title">Create your account</h1>

      @if ($errors->any())
        <div class="auth-errors">
          <ul class="auth-error-list">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div>
          <label for="name" class="auth-label">Name</label>
          <input id="name" name="name" type="text" required autofocus autocomplete="name"
                 value="{{ old('name') }}"
                 class="auth-input"
                 placeholder="Your name">
        </div>

        <div>
          <label for="email" class="auth-label">Email</label>
          <input id="email" name="email" type="email" required autocomplete="username"
                 value="{{ old('email') }}"
                 class="auth-input"
                 placeholder="you@example.com">
        </div>

        <div>
          <label for="password" class="auth-label">Password</label>
          <input id="password" name="password" type="password" required autocomplete="new-password"
                 class="auth-input"
                 placeholder="••••••••">
        </div>

        <div>
          <label for="password_confirmation" class="auth-label">Confirm Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                 class="auth-input"
                 placeholder="••••••••">
        </div>

        <div class="auth-actions">
          <a href="{{ route('login') }}" class="auth-link">
            Already registered?
          </a>
          <button type="submit" class="navbar-add-btn">Register</button>
        </div>
      </form>

    </div>
  </main>
</body>
</html>
