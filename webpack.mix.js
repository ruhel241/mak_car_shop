const mix = require('laravel-mix');

mix.setPublicPath('assets');
mix.setResourceRoot('./');

// js style



// sass style
mix.sass('src/css/style.scss', 'assets/style.css');


