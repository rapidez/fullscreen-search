<?php

namespace Rapidez\FullscreenSearch;

use Illuminate\Support\ServiceProvider;

class FullscreenSearchServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/rapidez/fullscreen-search.php', 'rapidez.fullscreen-search');
    }

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
            __DIR__.'/../resources/views' => resource_path('views/vendor/rapidez-fullscreen-search'),
        ], 'rapidez-fullscreen-search-views');

        $this->publishes([
            __DIR__.'/../config/rapidez/fullscreen-search.php' => config_path('rapidez/fullscreen-search.php'),
        ], 'rapidez-fullscreen-search-config');

        return $this;
    }
}
