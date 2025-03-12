<nav class="container-nav" id="nav-page">
    <div class="nav-main">
        <div class="wrapper-nav">
            <figure class="nav-icon">
                <img class="ico-nav" id="btn-nav" src="/img/icon.jpeg" alt="">
            </figure>
            <nav class="nav-menu">
                <figure class="nav-list">
                    <div>
                        <article class="btn-nav-menu">
                            <a onclick="toggleContent(['home', 'searchForm'])">
                                <div>
                                    <i class='bx bxs-home-alt-2'></i>
                                    <h4>dashboard</h4>
                                </div>
                            </a>
                        </article>
                        @if (Auth::user()->role == 'admin')
                        <article class="btn-nav-menu">
                            <a onclick="toggleContent(['data-analyzing'])">
                                <div>
                                    <i class='bx bxs-data'></i>
                                    <h4>data</h4>
                                </div>
                            </a>
                        </article>
                        @else

                        @endif
                        <article class="btn-nav-menu">
                            <a onclick="toggleContent(['history'])">
                                <div>
                                    <i class='bx bxs-time-five'></i>
                                    <h4>my order</h4>
                                </div>
                            </a>
                        </article>
                        <article class="btn-nav-menu">
                            <a>
                                <div>
                                    <i class="bx bx-question-mark"></i>
                                    <h4>-</h4>
                                </div>
                            </a>
                        </article>
                    </div>
                    <div>
                        @if (Auth::user()->role == 'admin')
                        <article class="btn-nav-menu">
                            <a onclick="toggleContent(['formAdd'])">
                                <div>
                                    <i class='bx bxs-folder-plus'></i>
                                    <h4>add siswa</h4>
                                </div>
                            </a>
                        </article>
                        @else

                        @endif
                        <article class="btn-nav-menu" id="toggleDarkMode">
                            <a href="">
                                <div id="theme">
                                    <div>
                                        <i class="bx bxs-moon"></i>
                                        <i class="bx bxs-sun"></i>
                                    </div>
                                    <div>
                                        <h4 id="dark"><b>Dark</b></h4>
                                        <h4 id="light"><b>Light</b> Mode</h4>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                </figure>
                <figure class="nav-profile">
                    <div>
                        <form method="post" action="{{ route('logout') }}" class="btn-nav-menu">
                            @csrf
                            <button type="submit">
                                <i class='bx bx-log-out-circle'></i>
                                <h4>log out</h4>
                            </button>
                        </form>
                        <article class="pp-img">
                            @if (Auth::user()->profile == null)
                            <img class="profile-img" src="/img/user.jpeg" alt="" id="btnDetail">
                            @else
                            <img class="profile-img" src="{{ asset('storage/' . Auth::user()->profile) }}" alt=""
                                id="btnDetail">
                            @endif
                        </article>
                    </div>
                </figure>
            </nav>
        </div>
    </div>
</nav>
