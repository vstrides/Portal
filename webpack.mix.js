const { mix } = require('laravel-mix');

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
$copystyles = [
	'resources/assets/vendors/font-awesome/css/font-awesome.min.css',
	'resources/assets/vendors/dropzone/dist/min/dropzone.min.css',
	'resources/assets/vendors/select2/dist/css/select2.min.css',
];

$copyscripts = [
	'resources/assets/vendors/dropzone/dist/min/dropzone.min.js',
	'resources/assets/vendors/select2/dist/js/select2.min.js',
	'resources/assets/vendors/moment/src/moment.js',
	'node_modules/bootbox/bootbox.min.js',
	'node_modules/vue/dist/vue.min.js'
];

$styles = [
	'resources/assets/vendors/animate.css/animate.min.css',
	'resources/assets/vendors/bootstrap/dist/css/bootstrap.min.css',
	'resources/assets/css/custom.css',
	'resources/assets/css/portal.css'
];

$scripts = [
	'resources/assets/vendors/jquery/dist/jquery.min.js',
	'resources/assets/vendors/bootstrap/dist/js/bootstrap.min.js',
	'resources/assets/js/custom.min.js',
];

mix.styles($styles, 'public/css/all.css');

mix.scripts($scripts, 'public/js/all.js');

mix.copy($copystyles, 'public/css');

mix.copy($copyscripts, 'public/js');