<main class="container-profile-detail modal" id="profileDetail">
    <div>
        <figure class="card-profile-detail">
            <div>
                <figure class="profile-detail-img">
                    <div>
                        @if (Auth::user()->profile == null)
                        <img class="profile-img" src="/img/user.jpeg">
                        @else
                        <img class="profile-img" src="{{ asset('storage/' . Auth::user()->profile) }}">
                        @endif
                    </div>
                </figure>
            </div>
            <div>
                <main class="profile-detail-txt">
                    <article class="profile-detail">
                        <h3>{{ Auth::user()->username }}</h3>
                        <h4>{{ Auth::user()->nama }}</h4>
                    </article>
                    <article class="profile-detail">
                        <h4>{{ Auth::user()->email }}</h4>
                    </article>
                    <section class="profile-detail-btn">
                        <button type="submit" id="btnEdit" onclick="showEditForm()">
                            <i class='bx bxs-edit-alt'></i>
                        </button>
                        <button>
                            <i class='bx bx-check-shield'></i>
                        </button>
                    </section>
                </main>
            </div>
        </figure>
    </div>
</main>