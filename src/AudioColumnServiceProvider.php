<?php

namespace Mayakhan719\FilamentAudioColumn;

use Illuminate\Support\ServiceProvider;

class FilamentAudioColumnServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'mayakhan719');
    }
}