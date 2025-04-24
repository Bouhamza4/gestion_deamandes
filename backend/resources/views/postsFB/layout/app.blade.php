<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ...existing CSS... -->
</head>
<body>
    <nav>
        <!-- Minimal Navbar -->
        <ul>
            <li><a href="{{ route('PostsFB.index') }}">Home</a></li>
            <li><a href="{{ route('PostsFB.create') }}">Create Post</a></li>
            <li><a href="{{ route('login') }}" class="btn1 btn-login">Login</a></li>
            <li><a href="{{ route('register') }}" class="btn1 btn-register">Register</a></li>
            <!-- Add more navigation items as needed -->
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <!-- Minimal Footer -->
        <p>&copy; {{ date('Y') }} My Website. All rights reserved.</p>
    </footer>
</body>
</html>
