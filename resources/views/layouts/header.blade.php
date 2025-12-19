<header>
    <nav class="navbar">
        <div class="nav-brand">
            <h1><i class="fas fa-graduation-cap"></i> {{ __('messages.dashboard') }}</h1>
        </div>
        
        @auth
        <div class="nav-menu">
            <a href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i> {{ __('messages.dashboard') }}
            </a>
            <a href="{{ route('students.index') }}">
                <i class="fas fa-users"></i> {{ __('messages.students') }}
            </a>
            <a href="{{ route('students.create') }}">
                <i class="fas fa-user-plus"></i> {{ __('messages.add_student') }}
            </a>
        </div>
        @endauth
        
        <div class="nav-actions">
            <div class="language-switcher">
                <form action="{{ route('language.change') }}" method="get" class="language-form">
                    <select name="lang" onchange="this.form.submit()">
                        <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>
                            🇫🇷 {{ __('messages.french') }}
                        </option>
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                            🇬🇧 {{ __('messages.english') }}
                        </option>
                    </select>
                </form>
            </div>
            
            @auth
            <span class="user-info">
                <i class="fas fa-user"></i> {{ Auth::user()->username }}
            </span>
            <a href="{{ route('logout') }}" class="btn-logout">
                <i class="fas fa-sign-out-alt"></i> {{ __('messages.logout') }}
            </a>
            @endauth
        </div>
    </nav>
</header>