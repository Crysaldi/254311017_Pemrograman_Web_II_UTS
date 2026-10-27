
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Panel Admin') · SDG7 Learn</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header style="background:#123d2b; color:#fff; padding:18px 24px;">
        <div style="max-width:1200px; margin:auto; display:flex; justify-content:space-between; align-items:center; gap:16px; flex-wrap:wrap;">
            <strong>SDG7 Learn · Panel Admin</strong>
            <a href="{{ route('informasi-energi.index') }}"
               style="color:#fff; text-decoration:none;">
                Lihat Halaman Publik ↗
            </a>
        </div>
    </header>

    <main style="max-width:1200px; margin:auto; padding:32px 20px;">
        @yield('content')
    </main>
</body>
</html>
