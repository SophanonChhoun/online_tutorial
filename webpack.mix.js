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
mix.js('resources/js/axios.js', 'public/dist/js')
    .js('resources/js/app.js','public/dist/js')
    .js('resources/js/customer/create.js','public/dist/js/customer')
    .js('resources/js/user/create.js','public/dist/js/user')
    .js('resources/js/user/edit.js','public/dist/js/user')
    .js('resources/js/profile/password.js','public/dist/js/profile')
    .js('resources/js/profile/avatar.js','public/dist/js/profile')
    .js('resources/js/profile/info.js','public/dist/js/profile')
    .js('resources/js/adminAuth/login.js','public/dist/js/adminAuth')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/css/profile.scss', 'public/css');
