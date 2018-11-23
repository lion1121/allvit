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

mix.js('resources/js/app.js', 'public/js');

mix.sass('resources/sass/style.scss', 'public/css')
    .sass('resources/sass/responsive.scss', 'public/css/libs');


mix.styles([
    'resources/libs/bootstrap/bootstrap.css'
], 'public/css/bootstrap.css');

mix.styles([
    'resources/animate.css',
    'resources/libs/magnific-popup/magnific-popup.css'
], 'public/css/libs.css');