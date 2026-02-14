<!DOCTYPE html>
<html lang="es">
<head>
    @include('partials.head')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <!-- Header usando partial -->
    @include('partials.header')

    <!-- Notificaciones Flash -->
    @include('partials.flash-messages')
    
    <!-- Contenido principal -->
    <main class="min-h-screen">
        @yield('content')
    </main>
    
    <!-- Footer usando partial -->
    @include('partials.footer')

    @stack('scripts')
</body>
</html>