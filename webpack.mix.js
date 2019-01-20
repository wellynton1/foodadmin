let mix = require('laravel-mix');

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

mix.js('resources/assets/js/enterprise/accompanying/create.js', 'public/js/enterprise/accompanying')
   .js('resources/assets/js/enterprise/protein/create.js', 'public/js/enterprise/protein')
   .js('resources/assets/js/enterprise/order/create.js', 'public/js/enterprise/order')
   .js('resources/assets/js/enterprise/menu/create.js', 'public/js/enterprise/menu');
