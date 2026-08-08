<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Saya</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f9; }
        nav { background: #333; padding: 15px 40px; position: fixed; top: 0; left: 0; right: 0; z-index: 9999; }
        nav a { color: white; text-decoration: none; margin-right: 20px; font-weight: bold; }
        .container { margin-top: 80px; padding: 20px 40px; min-height: 80vh; }
        footer { background: #222; color: #fff; text-align: center; padding: 20px; margin-top: 40px; }
        footer a { color: #0d6efd; text-decoration: none; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/#about') }}">Tentang Saya</a>
        <a href="{{ url('/#skills') }}">Skills</a>
        <a href="{{ url('/#projects') }}">Projects</a>
        <a href="{{ url('/#contact') }}">Contact</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>&copy; {{ date('Y') }} Portofolio Saya. All rights reserved.</p>
        <p>
            <a href="https://github.com" target="_blank">GitHub</a> | 
            <a href="https://linkedin.com" target="_blank">LinkedIn</a>
        </p>
    </footer>

</body>
</html>