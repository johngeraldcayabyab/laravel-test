const mix = require('laravel-mix');

mix.options({
    legacyNodePolyfills: false
});

mix.js('resources/js/app.js', 'public/js').react();
