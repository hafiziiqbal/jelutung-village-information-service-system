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

mix.browserSync('http://jelutung-village-information-service-system.test/');
mix.browserSync({
    proxy: 'http://jelutung-village-information-service-system.test/',
    https: {
        cert: "./cert/localhost.crt",
        key: "./cert/localhost.decrypted.key"
    }
});

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
