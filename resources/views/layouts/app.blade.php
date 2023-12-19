<!DOCTYPE html>
<html>
<head>
    <title>Sokoni Kwetu</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    @yield('styles')
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/products">Products</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer content here -->
    </footer>
</body>
</html>
