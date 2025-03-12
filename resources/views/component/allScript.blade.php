<script>
    document.addEventListener("DOMContentLoaded", () => {
            const btnProfileDetail = document.getElementById("btnDetail");
            const btnProfileEdit = document.getElementById("btnEdit");
            const cardDetail = document.getElementById("profileDetail");
            const cardEdit = document.getElementById("profileEdit");
            const closeModal = document.getElementById("closeModal");
            const closeEdit = document.getElementById("closeEdit");

            function showProfile() {
                cardDetail.classList.toggle("open-detail");
                cardEdit.classList.remove("open-edit");
            }

            // function hideProfile() {
            // cardDetail.classList.remove("open-detail");
            // }

            function showEditForm() {
                cardDetail.classList.remove("open-detail");
                cardEdit.classList.add("open-edit");
            }

            function hideEditForm() {
                cardEdit.classList.remove("open-edit");
                cardDetail.classList.add("open-detail");
            }

            if (btnProfileDetail) {
                btnProfileDetail.addEventListener("click", showProfile);
            }
            if (btnProfileEdit) {
                btnProfileEdit.addEventListener("click", showEditForm);
            }
            if (closeModal) {
                closeModal.addEventListener("click", hideProfile);
            }
            if (closeEdit) {
                closeEdit.addEventListener("click", hideEditForm);
            }

            window.addEventListener("click", (e) => {
                if (e.target === cardDetail) {
                    hideProfile();
                }
                if (e.target === cardEdit) {
                    hideEditForm();
                }
            });
        });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
            const toggleDarkMode = document.getElementById("toggleDarkMode");

            // Cek mode dari localStorage
            if (localStorage.getItem("theme") === "dark") {
                document.documentElement.classList.add("dark");
            }

            toggleDarkMode.addEventListener("click", function () {
                if (document.documentElement.classList.contains("dark")) {
                    document.documentElement.classList.remove("dark");
                    localStorage.setItem("theme", "light");
                } else {
                    document.documentElement.classList.add("dark");
                    localStorage.setItem("theme", "dark");
                }
            });
        });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const alertBox = document.getElementById("alert");

        // Auto-hide setelah 3 detik
        setTimeout(() => {
        alertBox.classList.add("hidden");
        setTimeout(() => alertBox.style.display = "none", 500);
        }, 3000); // 3000ms = 3 detik

        // Klik untuk menutup manual
        alertBox.addEventListener("click", function () {
        alertBox.classList.add("hidden");
        setTimeout(() => alertBox.style.display = "none", 500);
        });
        });
</script>
<script>
    const cardDetail = document.getElementById("profileDetail");
    let nav = document.querySelector("#nav-page");
    let btn_nav = document.querySelector("#btn-nav");

    btn_nav.onclick = function(){
        cardDetail.classList.remove('open-detail');
        nav.classList.toggle("open-sidebar");
    }
</script>
<script>
    function toggleContent(activeIds) {
        let allContents = document.querySelectorAll('.content');

        // Sembunyikan semua content terlebih dahulu
        allContents.forEach(content => {
        content.classList.remove('active');
        });

        // Tampilkan hanya content yang dipilih
        activeIds.forEach(id => {
        let element = document.getElementById(id);
        if (element) {
        element.classList.add('active');
        }
        });
        }

        // Set default active saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
        toggleContent(['home', 'searchForm']);
        });
</script>
<script>
    document.getElementById('image-input').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            console.log("File ditemukan:", file.name); // Debugging
            const reader = new FileReader();
            reader.onload = function(e) {
                console.log("File berhasil dibaca"); // Debugging
                const preview = document.getElementById('image-preview');
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            console.log("Tidak ada file yang dipilih"); // Debugging
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#updateProfileForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}'); // Tambahkan CSRF token

            let submitButton = $('#submitButton'); // Ambil tombol submit
            submitButton.prop('disabled', true).text('Menyimpan...'); // Nonaktifkan tombol & ubah teks

            $.ajax({
                url: "{{ route('user.update') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    alert(response.message);
                    location.reload(); // Reload halaman setelah update
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                    console.log(xhr.responseJSON);
                    submitButton.prop('disabled', false).text('Simpan Perubahan'); // Aktifkan kembali tombol
                }
            });
        });
    });
</script>
<script>
    let currentStoryIndex = 0;
    let storyTimeout, progressInterval, videoElement;

    const stories = @json($stories->map(fn($story) => [
        'type' => $story->type,
        'url'  => asset($story->file_path)
    ]));

    function openStory(index) {
        if (index < 0 || index >= stories.length) return closeStory();
        currentStoryIndex = index;

        const story = stories[index];
        let content = "";

        if (story.type === 'image') {
            content = `<img src="${story.url}" alt="Story" style="width:100%; max-height:90vh;">`;
            document.getElementById("storyContent").innerHTML = content;
            startProgress(10); // Gambar tampil selama 10 detik
        } else {
            content = `<video id="storyVideo" src="${story.url}" autoplay style="width:100%; max-height:90vh;"></video>`;
            document.getElementById("storyContent").innerHTML = content;
            setupVideoProgress();
        }

        document.getElementById("storyViewer").classList.add('status');
    }

    function setupVideoProgress() {
        videoElement = document.getElementById("storyVideo");

        videoElement.addEventListener("loadedmetadata", () => {
            let duration = Math.min(videoElement.duration, 30); // Maksimal 30 detik
            startProgress(duration);

            progressInterval = setInterval(() => {
                let maxDuration = Math.min(videoElement.duration, 30);
                let progress = (videoElement.currentTime / maxDuration) * 100;
                document.getElementById("progressFill").style.width = `${progress}%`;

                if (videoElement.currentTime >= maxDuration) {
                    changeStory(1); // Pindah ke story berikutnya
                }
            }, 100);
        });

        videoElement.addEventListener("ended", () => changeStory(1));
    }

    function startProgress(duration) {
        document.getElementById("progressFill").style.transition = "none";
        document.getElementById("progressFill").style.width = "0%";

        setTimeout(() => {
            document.getElementById("progressFill").style.transition = `width ${duration}s linear`;
            document.getElementById("progressFill").style.width = "100%";
        }, 50);

        storyTimeout = setTimeout(() => changeStory(1), duration * 1000);
    }

    function changeStory(step) {
        hideStory();
        openStory(currentStoryIndex + step);
    }

    function hideStory() {
        document.getElementById("storyViewer").classList.remove('status');
        document.getElementById("progressFill").style.width = "0%";
        document.getElementById("storyContent").innerHTML = "";

        if (videoElement) videoElement.pause();
        clearTimeout(storyTimeout);
        clearInterval(progressInterval);
    }

    function closeStory() {
        hideStory();
    }
</script>