<main class="container-profile-edit modal" id="profileEdit">
    <div>
        <form class="form-profile-edit" id="updateProfileForm" action="{{ route('user.update') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST">
            <figure gure class="form-edit-profile-img">
                <div>
                    <section class="input-profile-img">
                        <input type="file" name="profile" id="image-input" accept="image/*" />
                        <img src="{{ Auth::user()->profile ? asset('storage/' . Auth::user()->profile) : '/img/user.jpeg' }}"
                            id="image-preview" />
                    </section>
                </div>
            </figure>
            <figure class="form-edit-profile-name">
                <div>
                    <span class="edit-close" id="closeEdit"><i class='bx bx-x'></i></span>
                    <article class="title-profile-edit">
                        <h3>edit profile</h3>
                    </article>
                    <main class="input-profile">
                        <div>
                            <input type="text" name="nama" placeholder="Name. . ." value="{{ Auth::user()->nama }}">
                        </div>
                        <div>
                            <input type="text" name="username" placeholder="Username. . ."
                                value="{{ Auth::user()->username }}">
                        </div>
                        <div>
                            <input type="text" name="no_telp" placeholder="No. Telp. . ."
                                value="{{ Auth::user()->no_telp }}">
                        </div>
                        <div>
                            <input type="email" name="email" placeholder="Email. . ." value="{{ Auth::user()->email }}">
                        </div>
                        <div>
                            <input type="text" name="jns_klmn" placeholder="Name. . ."
                                value="{{ Auth::user()->jns_klmn }}">
                        </div>
                        <div>
                            <textarea name="alamat" id=""
                                placeholder="Alamat. . .">{{ Auth::user()->alamat }}</textarea>
                        </div>
                        <div>
                            <button type="submit" id="submitButton">Simpan Perubahan</button>
                        </div>
                    </main>
                </div>
            </figure>
        </form>
        <div id="updateMessage" style="display: none;"></div>
    </div>
</main>
