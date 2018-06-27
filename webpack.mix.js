const mix = require('laravel-mix');

mix.setPublicPath('assets');
mix.setResourceRoot('./');

// js 
mix.js('src/js/app.js', 'assets/app.js');

// sass style
mix.sass('src/css/style.scss', 'assets/style.css');

