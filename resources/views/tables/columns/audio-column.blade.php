<div
    x-data
    x-init="
        // Prevent clicks inside the audio player from triggering Filament row actions
        $el.querySelectorAll('audio, media-theme-tailwind-audio').forEach(player => {
            ['click', 'mousedown', 'mouseup', 'dblclick', 'pointerdown'].forEach(evt => {
                player.addEventListener(evt, e => {
                    e.stopImmediatePropagation();
                    e.stopPropagation();
                    e.preventDefault();
                });
            });
        });

        // Watch for Filament dark mode toggle
        const root = document.documentElement;
        const player = $el.querySelector('media-theme-tailwind-audio');
        if (!player) return;

        const applyTheme = () => {
            if (root.classList.contains('dark')) {
                // Dark mode colors
                player.style.setProperty('--media-primary-color', '#242427');
                player.style.setProperty('--media-secondary-color', '#1a1a1d');
                player.style.setProperty('--media-accent-color', '#7c3aed'); // purple-600
            } else {
                // Light mode colors
                player.style.setProperty('--media-primary-color', '#ffffff');
                player.style.setProperty('--media-secondary-color', '#f3f4f6');
                player.style.setProperty('--media-accent-color', '#3b3653'); // original accent
            }
        };

        // Initial apply + observe mode changes
        applyTheme();
        const observer = new MutationObserver(applyTheme);
        observer.observe(root, { attributes: true, attributeFilter: ['class'] });
    "
    wire:ignore
>
    @if ($getIsNative())
        {{-- Native HTML5 Audio Player --}}
        <audio
            src="{{ asset('storage/' . $getState()) }}"
            controls
            @if ($getIsLoop()) loop @endif
            class="rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-800 transition-colors duration-300"
        ></audio>
    @else
        {{-- Tailwind Audio Player --}}
        @once
            <script type="module" src="https://cdn.jsdelivr.net/npm/player.style/tailwind-audio/+esm"></script>
        @endonce

        <media-theme-tailwind-audio
            class="w-full max-w-[280px]"
            style="--media-primary-color: #ffffff; --media-secondary-color: #f3f4f6; --media-accent-color: #3b3653;"
        >
            <audio
                slot="media"
                src="{{ asset('storage/' . $getState()) }}"
                playsinline
                crossorigin="anonymous"
                controls
                @if ($getIsLoop()) loop @endif
            ></audio>
        </media-theme-tailwind-audio>
    @endif
</div>
