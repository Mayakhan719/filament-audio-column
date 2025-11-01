@php
    $audioUrl = $getState();
@endphp

<div {{ $getExtraAttributeBag() }} class="flex items-center justify-center">
    @if ($audioUrl)
        <audio controls class="w-40">
            <source src="{{ asset('storage/'. $audioUrl) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    @else
        <span class="text-gray-400 italic">No audio</span>
    @endif
</div>
