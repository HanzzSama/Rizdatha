<main class="container-story">
    <div>
        <article class="title-story">
            <h3>story food</h3>
        </article>
        <main class="story-main">
            <div>
                @foreach ($stories as $index => $story)
                <figure class="card-story box" onclick="openStory({{ $index }})">
                    <div>
                        <figure class=" story-profile">
                            <div>
                                <div>
                                    <img src="/img/user.jpeg" alt="">
                                </div>
                                <span>
                                    <h5>ayam bakar</h5>
                                </span>
                            </div>
                        </figure>
                        <figure class="story-img">
                            @if ($story->type === 'image')
                            <img src="{{ asset($story->file_path) }}" alt="Story {{ $index + 1 }}">
                            @else
                            <video src="{{ asset($story->file_path) }}" muted></video>
                            @endif
                        </figure>
                    </div>
                </figure>
                @endforeach
            </div>
        </main>
    </div>
</main>