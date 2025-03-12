<main class="container-story-play story-viewer" id="storyViewer">
    <div>
        <main class="card-story-content">
            <div class="progress-bar" id="progressBar">
                <div id="progressFill"></div>
            </div>
            <div>
                <button class="btn-story-close" onclick="closeStory()">
                    <i class='bx bx-x'></i>
                </button>
                <figure class="story-content-main">
                    <span>
                        <button class="btn-change prev-btn" onclick="changeStory(-1)">❮</button>
                        <button class="btn-change next-btn" onclick="changeStory(1)">❯</button>
                    </span>
                    <div class="story-content" id="storyContent"></div>
                </figure>
            </div>
        </main>
    </div>
</main>