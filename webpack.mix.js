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

$styles = [
	'resources/assets/vendors/font-awesome/css/font-awesome.min.css',
	'resources/assets/vendors/nprogress/nprogress.css',
	'resources/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
	'resources/assets/vendors/jqvmap/dist/jqvmap.min.css',
	'resources/assets/vendors/bootstrap-daterangepicker/daterangepicker.css',
	'resources/assets/vendors/animate.css/animate.min.css',
	'resources/assets/vendors/bootstrap/dist/css/bootstrap.min.css',
	'resources/assets/vendors/build/css/custom.min.css',
	'resources/assets/css/portal.css'
];

$scripts = [
	'resources/assets/vendors/jquery/dist/jquery.min.js',
	'resources/assets/vendors/bootstrap/dist/js/bootstrap.min.js',
	'resources/assets/vendors/fastclick/lib/fastclick.js',
	'resources/assets/vendors/nprogress/nprogress.js',
	'resources/assets/vendors/Chart.js/dist/Chart.min.js',
	'resources/assets/vendors/gauge.js/dist/gauge.min.js',
	'resources/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
	'resources/assets/vendors/skycons/skycons.js',
	'resources/assets/vendors/Flot/jquery.flot.js',
	'resources/assets/vendors/Flot/jquery.flot.pie.js',
	'resources/assets/vendors/Flot/jquery.flot.time.js',
	'resources/assets/vendors/Flot/jquery.flot.stack.js',
	'resources/assets/vendors/Flot/jquery.flot.resize.js',
	'resources/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js',
	'resources/assets/vendors/flot-spline/js/jquery.flot.spline.min.js',
	'resources/assets/vendors/flot.curvedlines/curvedLines.js',
	'resources/assets/vendors/DateJS/build/date.js',
	'resources/assets/vendors/jqvmap/dist/jquery.vmap.js',
	'resources/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js',
	'resources/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js',
	'resources/assets/vendors/moment/min/moment.min.js',
	'resources/assets/vendors/bootstrap-daterangepicker/daterangepicker.js',
	'resources/assets/vendors/build/js/custom.min.js',
];

mix.styles($styles, 'public/css/all.css');

mix.scripts($scripts, 'public/js/all.js');
