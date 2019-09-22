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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

// Ample admin theme
mix.copy('resources/themes/ample-admin-lite-master/plugins','public/themes/ample-admin-lite-master/plugins');
mix.copy('resources/themes/ample-admin-lite-master/html/bootstrap','public/themes/ample-admin-lite-master/bootstrap');
mix.copy('resources/themes/ample-admin-lite-master/html/js','public/themes/ample-admin-lite-master/js');
mix.copy('resources/themes/ample-admin-lite-master/html/css','public/themes/ample-admin-lite-master/css');
mix.copy('resources/themes/ample-admin-lite-master/html/less','public/themes/ample-admin-lite-master/less');