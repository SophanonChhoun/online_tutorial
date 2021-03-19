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
    .js('resources/js/hotel/create.js','public/dist/js/hotel')
    .js('resources/js/hotel/edit.js','public/dist/js/hotel')
    .js('resources/js/customer/create.js','public/dist/js/customer')
    .js('resources/js/customer/edit.js','public/dist/js/customer')
    .js('resources/js/room_type/create.js','public/dist/js/room_type')
    .js('resources/js/rooms/create.js','public/dist/js/rooms')
    .js('resources/js/rooms/edit.js','public/dist/js/rooms')
    .js('resources/js/room_type/edit.js','public/dist/js/room_type')
    .js('resources/js/about_us/edit.js','public/dist/js/about_us')
    .js('resources/js/contact_us/edit.js','public/dist/js/contact_us')
    .js('resources/js/contact_us/create.js','public/dist/js/contact_us')
    .js('resources/js/identification_type/edit.js','public/dist/js/identification_type')
    .js('resources/js/payment_type/edit.js','public/dist/js/payment_type')
    .js('resources/js/booking_type/edit.js','public/dist/js/booking_type')
    .js('resources/js/booking/create.js','public/dist/js/booking')
    .js('resources/js/booking/edit.js','public/dist/js/booking')
    .js('resources/js/sliders/edit.js','public/dist/js/sliders')
    .js('resources/js/sliders/create.js','public/dist/js/sliders')
    .js('resources/js/user/create.js','public/dist/js/user')
    .js('resources/js/user/edit.js','public/dist/js/user')
    .js('resources/js/profile/password.js','public/dist/js/profile')
    .js('resources/js/profile/avatar.js','public/dist/js/profile')
    .js('resources/js/profile/info.js','public/dist/js/profile')
    .js('resources/js/adminAuth/login.js','public/dist/js/adminAuth')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/css/profile.scss', 'public/css');
