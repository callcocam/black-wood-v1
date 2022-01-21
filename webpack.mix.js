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
 mix
 .js('resources/js/app.js', 'public/js')
 .js('vendor/callcocam/packages-tall/tall-theme/resources/js/app.js', 'public/js/assets')
     .postCss('resources/css/app.css', 'public/css', [
         require('postcss-import'),
         require('tailwindcss'),
     ])
     .postCss('vendor/callcocam/packages-tall/tall-theme/resources/css/app.css', 'public/css/assets', [
         require('postcss-import'),
         require('tailwindcss'),
     ])
     .copy('vendor/callcocam/packages-tall/tall-theme/resources/js/scroll.js', 'public/js/assets/scroll.js')
     .react();
 
 if (mix.inProduction()) {
     mix.version();
 }