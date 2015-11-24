var gulp = require('gulp');
var elixir = require('laravel-elixir');
var del = require('del');

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

elixir.extend('clean', function (dirs) {
    dirs = dirs || [
        'public/css',
        'public/js',
        'public/fonts',
        'public/img'
    ];

    return gulp.task('clean', function (cb) {
        del(dirs, cb);
    });
});

elixir(function(mix) {
    mix.clean()
        .copy('bower_components/jquery/dist/jquery.min.js', 'resources/assets/js/jquery/jquery.min.js')
        .copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'resources/assets/js/bootstrap/bootstrap.min.js')
        .copy('bower_components/angular/angular.min.js', 'resources/assets/js/angular/angular.min.js')
        .copy('bower_components/datatables/media/js/jquery.dataTables.min.js', 'resources/assets/js/datatable/jquery.datatables.min.js')
        .copy('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js', 'resources/assets/js/datatable/datatables.bootstrap.min.js')
        .copy('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css', 'public/css/dataTables.bootstrap.css')

        .copy('bower_components/pickadate/lib/compressed/picker.js', 'resources/assets/js/pickadate/picker.js')
        .copy('bower_components/pickadate/lib/compressed/picker.date.js', 'resources/assets/js/pickadate/picker.date.js')
        .copy('bower_components/pickadate/lib/compressed/picker.time.js', 'resources/assets/js/pickadate/picker.time.js')
        .copy('bower_components/pickadate/lib/themes/**', 'public/css/pickadate/themes/')

        .copy('bower_components/selectize/dist/js/standalone/selectize.min.js', 'resources/assets/js/selectize/selectize.min.js')
        .copy('bower_components/selectize/dist/css/**', 'public/css/selectize/')

        .copy('bower_components/bootstrap/fonts/', 'public/fonts/bootstrap/')
        .copy('resources/assets/img/', 'public/img')
        .copy('resources/assets/js/tinymce', 'public/js/tinymce')
        .sass('app.scss')
        .sass('admin.scss')
        .sass('style.scss')
        .scripts([
            'jquery/jquery.min.js',
            'angular/angular.min.js',
            'bootstrap/bootstrap.min.js',
            'datatable/jquery.datatables.min.js',
            'datatable/datatables.bootstrap.min.js',
            'pickadate/picker.js',
            'pickadate/picker.date.js',
            'pickadate/picker.time.js',
            'selectize/selectize.min.js'
            ], 'public/js/vendor.js'
        ).scripts([
            'admin.js'
        ], 'public/js/admin.js')
        .scripts([
            'scripts.js'
        ], 'public/js/scripts.js');
});
