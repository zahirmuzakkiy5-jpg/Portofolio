<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title', 'Portfolio Saya')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        h2 {
            margin-top: 0;
            color: #007bff;
        }
    </style>
</head>
<body>

    <nav style="margin-bottom: 20px; padding: 15px; background: #f8f9fa; border-radius: 8px; position: sticky; top: 0; z-index: 100; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <a href="/" style="margin-right: 15px;">Home</a>
        <a href="/#about" style="margin-right: 15px;">Tentang Saya</a>
        <a href="/#skills" style="margin-right: 15px;">Skills</a>
        <a href="/#projects" style="margin-right: 15px;">Projects</a>
        <a href="/#contact">Contact</a>
    </nav>

    @yield('content')

</body>
</html>