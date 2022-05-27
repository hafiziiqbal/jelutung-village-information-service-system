const mix = require('laravel-mix');
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
