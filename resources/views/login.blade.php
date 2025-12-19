<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.login') }} - Gestion des Étudiants</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-header">
            <h1><i class="fas fa-graduation-cap"></i> {{ __('messages.welcome') }}</h1>
            <p>{{ __('messages.login') }} pour accéder au système</p>
            <p style="color: #666; font-size: 14px; margin-top: 10px;">
                Test: admin / admin123
            </p>
        </div>
        
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
            
            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                </div>
            @endif
            
            <div class="form-group">
                <label for="username">
                    <i class="fas fa-user"></i> {{ __('messages.username') }}
                </label>
                <input type="text" 
                       id="username" 
                       name="username" 
                       value="{{ old('username') }}"
                       required 
                       autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i> {{ __('messages.password') }}
                </label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> {{ __('messages.login_button') }}
            </button>
        </form>
        
        <div class="language-switcher-login">
            <form action="{{ route('language.change') }}" method="get" class="language-form">
                <select name="lang" onchange="this.form.submit()">
                    <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>
                        🇫🇷 Français
                    </option>
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                        🇬🇧 English
                    </option>
                </select>
            </form>
        </div>
    </div>
</body>
</html>