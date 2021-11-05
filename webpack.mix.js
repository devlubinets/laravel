const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/layouts/basket.js', 'public/js/layouts')
    .js('resources/assets/js/layouts/BtnTopFunction', 'public/js/layouts');

mix.sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/layouts/basket.scss', 'public/css/layouts')
    .sass('resources/assets/sass/layouts/starter-template.scss', 'public/css/layouts');
