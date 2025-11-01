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
    "
    wire:ignore
>
    @if ($getIsNative())
        {{-- Native HTML5 Audio Player --}}
        <audio
            src="{{ asset('storage/' . $getState()) }}"
            controls
            @if ($getIsLoop()) loop @endif
        ></audio>
    @else
        {{-- Tailwind Audio Player --}}
        @once
            <script type="module" src="https://cdn.jsdelivr.net/npm/player.style/tailwind-audio/+esm"></script>
        @endonce

        <media-theme-tailwind-audio>
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
