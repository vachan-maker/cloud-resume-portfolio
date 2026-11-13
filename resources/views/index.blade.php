<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vachan — Portfolio</title>
    <link rel="stylesheet" href="{{ asset('css/pico.min.css') }}">
    <style>
        .portfolio-grid {
            display: grid;
            gap: var(--pico-spacing);
            grid-template-columns: repeat(auto-fill, minmax(min(100%, 22rem), 1fr));
        }

        .portfolio-grid > article {
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        .portfolio-grid > article > img {
            width: 100%;
            aspect-ratio: 16 / 10;
            object-fit: cover;
        }

        .portfolio-grid > article > footer {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: auto;
        }

        .portfolio-grid > p {
            grid-column: 1 / -1;
        }
    </style>
</head>
<body>
    <header class="container">
        <nav>
            <ul>
                <li><strong>Vachan</strong></li>
            </ul>
            <ul>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#">Resume</a></li>
                <li><a href="#">GitHub</a></li>
            </ul>
        </nav>
    </header>

    <main class="container" id="portfolio">
        <h2>Portfolio</h2>

        <div class="portfolio-grid">
            @forelse ($projects as $project)
                <article>
                    <header>
                        <h3>{{ $project->name }}</h3>
                    </header>

                    @if ($imageUrl = $project->imageTemporaryUrl())
                        <img src="{{ $imageUrl }}" alt="Screenshot of {{ $project->name }}" loading="lazy">
                    @endif

                    <p>{{ $project->description }}</p>

                    <footer>
                        @if ($project->live_url)
                            <a href="{{ $project->live_url }}" role="button" target="_blank" rel="noopener noreferrer">
                                Live site
                            </a>
                        @endif

                        @if ($project->github_url)
                            <a href="{{ $project->github_url }}" role="button" class="secondary" target="_blank" rel="noopener noreferrer">
                                GitHub
                            </a>
                        @endif
                    </footer>
                </article>
            @empty
                <p>No projects yet.</p>
            @endforelse
        </div>
    </main>
</body>
</html>
