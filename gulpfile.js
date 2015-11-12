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
    mix.copy('bower_components/jquery/dist/jquery.js', 'resources/assets/js/jquery.js');
    mix.copy('bower_components/bootstrap/dist/js/bootstrap.js', 'resources/assets/js/bootstrap.js');
    mix.copy('bower_components/datatables/media/js/jquery.dataTables.js', 'resources/assets/js/jquery.dataTables.js');
    mix.copy('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js', 'resources/assets/js/dataTables.bootstrap.js');

    mix.copy('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css', 'public/css/dataTables.bootstrap.css');
    mix.copy('bower_components/bootstrap/fonts/', 'public/fonts/bootstrap/');

    mix.sass('app.scss');
    mix.sass('admin.scss');
    mix.sass('style.scss');

    mix.scripts([
        'jquery.js',
        'bootstrap.js',
        'jquery.dataTables.js',
        'dataTables.bootstrap.js'
    ], 'public/js/vendor.js');

    mix.scripts([
        'admin.js'
    ], 'public/js/admin.js');

    mix.scripts([
        'scripts.js'
    ], 'public/js/scripts.js');
});
