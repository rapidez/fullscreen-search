# Rapidez Fullscreen Search

## Installation

```
composer require rapidez/fullscreen-search
```

To use the views from this package instead of the default ones, you'll need to publish the "core overwrite views" with the following command:
```
php artisan vendor:publish --provider="Rapidez\FullscreenSearch\FullscreenSearchServiceProvider" --tag=core-overwrites
```

## Configuration

Don't forget to add this to your config:

tailwind.config.js
```
'header-autocomplete-popup': '40',
```

config/rapidez/frontend.php
```
'autocomplete' => [
    'additionals' => [
        'history'            => [],
        'search-suggestions' => [],
        'categories'         => [
            'defaultValues' => fn () => config('rapidez.models.category')::where('parent_id', config('rapidez.root_category_id'))
                ->limit(config('rapidez.frontend.autocomplete.additionals.categories.size', config('rapidez.frontend.autocomplete.size', 4)))
                ->get(),
        ],
        'popular-products' => ['size' => 4],
        'products' => [
            'size' => 4,
        ],
    ],
    'size' => 4,
],
```

## Views

You can publish the views with:
```
php artisan vendor:publish --tag=rapidez-fullscreen-search-views
```

## License

GNU General Public License v3. Please see [License File](LICENSE) for more information.
