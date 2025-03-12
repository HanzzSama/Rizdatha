<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/welcome.css" />
    <title>Rizdatha</title>
</head>

<body>
    <div>
        <nav class="container-nav">
            <div>
                <main class="nav-main">
                    <figure class="nav-item">
                        <div>
                            <i class="bx bx-bowl-rice"></i>
                            <h4>rizdatha</h4>
                            <h5>welcome</h5>
                        </div>
                    </figure>
                    <figure class="nav-item">
                        <div>
                            <i class="bx bx-search"></i>
                            <input type="text" placeholder="Search. . ." />
                        </div>
                    </figure>
                    @auth
                    <figure class="nav-item user">
                        <div>
                            <h4>{{ Auth::user()->username }}</h4>
                        </div>
                    </figure>
                    <form action="{{ route('logout') }}" method="POST" class="nav-item">
                        @csrf
                        <button>
                            <h4>log out</h4>
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}">
                        <figure class="nav-item">
                            <div>
                                <h4>login</h4>
                            </div>
                        </figure>
                    </a>
                    <a href="{{ route('register') }}">
                        <figure class="nav-item">
                            <div>
                                <h4>register</h4>
                            </div>
                        </figure>
                    </a>
                    @endauth
                    <figure class="nav-item">
                        <div>
                            <i class="bx bx-question-mark"></i>
                        </div>
                    </figure>
                </main>
            </div>
        </nav>
        <header class="container-header">
            <div>
                <aside class="head-item">
                    <main class="head-img">
                        <div>
                            <section class="head-img-subtitle">
                                <h4>Nikmati Rasa, Hanya di RIZDATHA!</h4>
                                <h2>rizdatha</h2>
                            </section>
                            <img src="/img/food1.png" alt="" />
                        </div>
                    </main>
                </aside>
                <aside class="head-item">
                    <section class="head-bar">
                        <article class="head-item-bar">
                            <i class="bx bxl-whatsapp"></i>
                        </article>
                        <article class="head-item-bar">
                            <i class="bx bxl-instagram"></i>
                        </article>
                    </section>
                    <main class="head-text">
                        <div>
                            <article class="title-web">
                                <h2>rizdatha</h2>
                            </article>
                            <article class="subtitle-web">
                                <h4>
                                    Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Deleniti perferendis
                                    praesentium, incidunt autem vero eveniet
                                    nisi? Distinctio blanditiis ipsam
                                    suscipit itaque repudiandae excepturi
                                    nam. Nostrum est blanditiis
                                    reprehenderit excepturi vero.
                                </h4>
                            </article>
                            <article class="btn-open">
                                <button>
                                    <h4>yuk!!, buruan pesan</h4>
                                </button>
                            </article>
                        </div>
                    </main>
                </aside>
                <span class="cover-title">
                    <div>
                        <h2>rizdatha</h2>
                        <h2>rizdatha</h2>
                    </div>
                </span>
            </div>
        </header>
        <main class="container-main submenu">
            <div>
                <figure class="menu-food">
                    <main class="list-menu">
                        <article class="title-menu">
                            <div>
                                <h3>menu <b>makan</b></h3>
                            </div>
                        </article>
                        <main class="list-food">
                            <div>
                                <section class="food">
                                    <span></span>
                                    <div class="food-name">
                                        <h4>ayam goreng</h4>
                                        <hr />
                                    </div>
                                    <div class="food-price">
                                        <h4>12k</h4>
                                    </div>
                                </section>
                                <section class="food">
                                    <span></span>
                                    <div class="food-name">
                                        <h4>ayam goreng</h4>
                                        <hr />
                                    </div>
                                    <div class="food-price">
                                        <h4>12k</h4>
                                    </div>
                                </section>
                                <section class="food">
                                    <span></span>
                                    <div class="food-name">
                                        <h4>ayam goreng</h4>
                                        <hr />
                                    </div>
                                    <div class="food-price">
                                        <h4>12k</h4>
                                    </div>
                                </section>
                            </div>
                        </main>
                    </main>
                </figure>
                <figure class="menu-img">
                    <div>
                        <article class="title-img-menu">
                            <div>
                                <h3>ayam</h3>
                                <h2>bakar</h2>
                            </div>
                        </article>
                    </div>
                    <div>
                        <img src="/img/food1.jpeg" alt="" />
                    </div>
                </figure>
            </div>
        </main>
        <main class="container-history-food">
            <div>
                <article class="title-history-food">
                    <h3>history makanan</h3>
                </article>
                <main class="history-food">
                    <div>
                        <figure class="card-history-food">
                            <div>
                                <div class="history-food-title">
                                    <article>
                                        <h3>ayam bakar</h3>
                                    </article>
                                </div>
                                <div class="history-food-img">
                                    <img src="/img/food1.jpeg" alt="" />
                                </div>
                            </div>
                        </figure>
                        <figure class="card-history-food">
                            <div>
                                <div class="history-food-title">
                                    <article>
                                        <h3>ayam bakar</h3>
                                    </article>
                                </div>
                                <div class="history-food-img">
                                    <img src="/img/food1.jpeg" alt="" />
                                </div>
                            </div>
                        </figure>
                        <figure class="card-history-food">
                            <div>
                                <div class="history-food-title">
                                    <article>
                                        <h3>ayam bakar</h3>
                                    </article>
                                </div>
                                <div class="history-food-img">
                                    <img src="/img/food1.jpeg" alt="" />
                                </div>
                            </div>
                        </figure>
                    </div>
                </main>
            </div>
        </main>
        <footer class="container-footer">
            <div class="footer-main">
                <figure class="icon-footer">
                    <img src="/img/food1.png" alt="" />
                </figure>
                <article class="footer-desc">
                    <h1>Nikmati Rasa,</h1>
                    <h1>Hanya di RIZDATHA!</h1>
                </article>
                <section class="footer-input">
                    <div>
                        <i class="bx bx-user"></i>
                        <input type="text" placeholder="Enter your email" name="" id="" />
                    </div>
                    <div>
                        <button>
                            <h4>send</h4>
                        </button>
                    </div>
                </section>
                <section class="footer-media">
                    <div>
                        <i class="bx bxl-instagram"></i>
                        <i class="bx bxl-whatsapp"></i>
                    </div>
                </section>
                <article class="footer-menu">
                    <h4>tentang kami</h4>
                    <h4>teams</h4>
                    <h4>privacy</h4>
                </article>
            </div>
        </footer>
    </div>
</body>

</html>