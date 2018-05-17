let mix = require('laravel-mix');

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

mix.styles([
    'resources/assets/css/bootstrap.min.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/css/blog-home.css'
], 'public/css/front.css');

mix.scripts([
    'resources/assets/js/jquery.min.js',
    'resources/assets/js/popper.min.js',
    'resources/assets/js/bootstrap.min.js',
    'resources/assets/js/app.js'
], 'public/js/app.js');

mix.styles([
    'resources/assets/admin/css/bootstrap.min.css',
    'resources/assets/admin/css/metisMenu.min.css',
    'resources/assets/admin/css/sb-admin-2.min.css',
    'resources/assets/css/font-awesome.min.css',
    'resources/assets/admin/css/dataTables.bootstrap.css',
    'resources/assets/admin/css/dataTables.responsive.css',
    'resources/assets/admin/css/select2.min.css',
    'resources/assets/admin/css/styles.css'
], 'public/css/admin.css');

mix.scripts([
    'resources/assets/admin/js/jquery.min.js',
    'resources/assets/admin/js/bootstrap.min.js',
    'resources/assets/admin/js/metisMenu.min.js',
    'resources/assets/admin/js/jquery.dataTables.min.js',
    'resources/assets/admin/js/dataTables.bootstrap.min.js',
    'resources/assets/admin/js/dataTables.responsive.js',
    'resources/assets/admin/js/select2.full.min.js',
    'resources/assets/admin/js/uploadPreview.js',
    'resources/assets/admin/js/sb-admin-2.min.js',
    'resources/assets/admin/js/scripts.js'
], 'public/js/admin.js');

mix.copy(
    'resources/assets/fonts',
    'public/fonts'
);

mix.copy(
    'resources/assets/fonts',
    'public/fonts'
);
