<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        if (localStorage.getItem("theme") === "dark") {
                document.documentElement.classList.add("dark");
            }
    </script>
    <title>Rizdatha</title>
</head>

<body>
    @session('success')
    <section id="alert" class="alert" role="alert">
        <div>
            <h3>success</h3>
            <h4>{{ $value }}</h4>
        </div>
    </section>
    @endsession
    @include('component.storyPlay')
    @include('component.profileEdit')
    <div class="wrapper-page">
        @include('component.profileDetail')
        @include('component.sidebar')
        <main class="container-main">
            <div>
                <nav class="header-nav">
                    <figure class="nav-search">
                        <div>
                            <i class='bx bx-search'></i>
                            <input type="text" placeholder="Sesrch data...">
                        </div>
                        <button class="btn-src">
                            <h4>search</h4>
                        </button>
                    </figure>
                </nav>
                <nav class="nav-title">
                    <article>
                        <h1>hi, {{ Auth::user()->nama }}</h1>
                        <h4>Selamat datang di halaman Dashboard Rizdatha</h4>
                    </article>
                </nav>
                @include('component.story')
                @include('component.category')
                <footer class="container-footer">
                    <div></div>
                </footer>
                <footer class="footer">
                    <div>
                        <p>Desaign by Rifky</p>
                    </div>
                </footer>
            </div>
        </main>
    </div>
    @include('component.allscript')
</body>

</html>