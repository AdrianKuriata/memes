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

mix.js('resources/js/front.js', 'public/front/js/app.js')
   .sass('resources/sass/front.scss', 'public/front/css/app.css')
   .js('resources/js/back.js', 'public/back/js/app.js')
   .sass('resources/sass/back.scss', 'public/back/css/app.css')
   .version();
