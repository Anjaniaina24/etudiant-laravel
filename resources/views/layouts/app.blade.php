<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Étudiants</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @include('layouts.header')
    
    <main class="container">
        @if(session('message'))
            <div class="alert alert-{{ session('message_type', 'success') }}">
                {{ session('message') }}
            </div>
        @endif
        
        @yield('content')
    </main>
    
    @include('layouts.footer')
    
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>