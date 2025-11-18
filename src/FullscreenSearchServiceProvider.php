<?php

namespace Rapidez\FullscreenSearch;

use Illuminate\Support\ServiceProvider;

class FullscreenSearchServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this
            ->bootViews()
            ->bootPublishables();
    }

    public function bootViews() : self
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'rapidez-fullscreen-search');

        return $this;
    }

    public function bootPublishables() : self
    {
        $this->publishes([
            __DIR__ . '/../resources/core-overwrites' => resource_path('views/vendor/rapidez'),
        ], 'core-overwrites');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez-fullscreen-search'),
        ], 'rapidez-fullscreen-search-views');

        return $this;
    }
}
