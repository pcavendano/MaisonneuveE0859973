const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/bootstrap.js', 'public/js');
mix.js('resources/js/app.js', 'public/js/app.js');
mix.browserSync('http://127.0.0.1/cadriciel_21647/tp1_laravel/MaisonneuveE0859973/public/');
mix.sass('resources/sass/app.scss', 'public/css').sourceMaps();
