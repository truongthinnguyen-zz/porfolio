var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('admin.scss');
    mix.sass('style.scss');

    mix.copy('bower_components/jquery/dist/jquery.js', 'resources/assets/js/jquery.js');
    mix.copy('bower_components/bootstrap/dist/js/bootstrap.js', 'resources/assets/js/bootstrap.js');
    mix.copy('bower_components/datatables/media/jquery.dataTables.js', 'resources/assets/js/jquery.dataTables.js');
    mix.copy('bower_components/jquery/dist/jquery.js', 'resources/assets/js/jquery.js');

    mix.scripts([
        'jquery.js',
        'bootstrap.js'
    ], 'public/js/vendor.js');

    mix.copy('resources/assets/js/admin.js', 'public/js/admin.js');
    mix.copy('resources/assets/js/scripts.js', 'public/js/scripts.js');
});
