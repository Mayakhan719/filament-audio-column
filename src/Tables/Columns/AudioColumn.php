<?php

namespace Mayakhan719\FilamentAudioColumn\Tables\Columns;

use Filament\Tables\Columns\Column;

class AudioColumn extends Column
{
    protected string $view = 'mayakhan719::tables.columns.audio-column';

    protected bool $native = true; // default native player
    protected bool $isLoop = false; // default loop disabled

    // ─── Configuration ──────────────────────────────
    public function native(bool $state = true): static
    {
        $this->native = $state;
        return $this;
    }

    public function loop(bool $state = true): static
    {
        $this->isLoop = $state;
        return $this;
    }

    // ─── Getters ────────────────────────────────────
    public function getIsNative(): bool
    {
        return $this->native;
    }

    public function getIsLoop(): bool
    {
        return $this->isLoop;
    }
}
