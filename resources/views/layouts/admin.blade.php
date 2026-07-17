<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Riam Kanan Explorer</title>

    <link rel="stylesheet" href="/css/style.css?v=999">
</head>
<body>
    <div class="layout">
        <aside class="sidebar">
            <div class="brand">
                <div class="logo">🌊</div>
                <b>
                    Riam Kanan<br>
                    <small>EXPLORER</small>
                </b>
            </div>

            <nav>
                <a href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>

                <a href="{{ route('destinations.index') }}">
                    Destinasi
                </a>

                <a href="{{ route('categories.index') }}">
                    Kategori
                </a>

                <a href="{{ route('islands.index') }}">
                    Pulau
                </a>

                <a href="{{ route('boats.index') }}">
                    Kelotok
                </a>

                <a href="{{ route('galleries.index') }}">
                    Galeri
                </a>

                <a href="{{ route('reviews.index') }}">
                    Review
                </a>

                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        <main class="main">
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>