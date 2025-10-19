<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Log in</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

</head>
<body class="auth-body">

  <main class="auth-main">
    <div class="auth-card">

      <h1 class="auth-title">Log in</h1>

      {{-- Session status --}}
      @if (session('status'))
        <div class="auth-status">
          {{ session('status') }}
        </div>
      @endif

      {{-- Validation errors --}}
      @if ($errors->any())
        <div class="auth-errors">
          <ul class="auth-error-list">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div>
          <label for="email" class="auth-label">Email</label>
          <input id="email" name="email" type="email" required autofocus autocomplete="username"
                 value="{{ old('email') }}"
                 class="auth-input"
                 placeholder="you@example.com">
        </div>

        <div>
          <label for="password" class="auth-label">Password</label>
          <input id="password" name="password" type="password" required autocomplete="current-password"
                 class="auth-input"
                 placeholder="••••••••">
        </div>

        <div class="auth-remember-row">
          <label for="remember" class="auth-checkbox-label">
            <input id="remember" name="remember" type="checkbox" class="auth-checkbox">
            Remember me
          </label>

          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="auth-link">
              Forgot password?
            </a>
          @endif
        </div>

        <div class="auth-actions">
          <a href="{{ route('register') }}" class="auth-link">
            Create account
          </a>
          <button type="submit" class="navbar-add-btn">Log in</button>
        </div>
      </form>

    </div>
  </main>
</body>
</html>
