const mix = require('laravel-mix');

mix.setPublicPath('assets');
mix.setResourceRoot('./');

// js 
mix.js('src/js/app.js', 'assets/app.js');
mix.js('src/js/tinymce-button.js', 'assets/tinymce-button.js');

// sass style
mix.sass('src/css/style.scss', 'assets/style.css');
mix.sass('src/css/tinymce-button.scss', 'assets/tinymce-button.css');

