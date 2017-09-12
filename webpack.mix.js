const {mix} = require('laravel-mix');

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

/**
 * Core
 */

mix.scripts([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/pace-progress/pace.js',
    'resources/assets/js/app.js'
], 'public/js/app.js').version();

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/pace-progress/themes/green/pace-theme-minimal.css',
    'resources/assets/css/app.css'
], 'public/css/app.css').version();

mix.copy([
    'node_modules/font-awesome/fonts/',
    'node_modules/gentelella/vendors/bootstrap/dist/fonts'
], 'public/fonts');

/**
 * Landing Pages
 */

mix.js('resources/assets/js/landingPage.js', 'public/js')
    .sass('resources/assets/sass/landingPage.scss', 'public/css');

/**
 * Auth
 */

mix.scripts([
    'resources/assets/js/auth.js'
], 'public/js/auth.js').version();

mix.styles([
    'resources/assets/css/auth.css'
], 'public/css/auth.css').version();

/*
 * Admin Dashboard
 */

mix.scripts([
    'node_modules/gentelella/vendors/fastclick/lib/fastclick.js',
    'node_modules/gentelella/vendors/switchery/dist/switchery.min.js',
    'node_modules/dropzone/dist/dropzone.js',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.js',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.buttons.js',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.nonblock.js',
    'node_modules/gentelella/build/js/custom.js',
    'resources/assets/js/jquery.smartWizard.js',
    'resources/assets/js/mousetrap.min.js',
    'resources/assets/js/admin.js',
], 'public/js/admin.js').version();

mix.copy([
    'node_modules/ace-builds/src-min/ace.js',
    'node_modules/ace-builds/src-min/mode-css.js',
    'node_modules/ace-builds/src-min/worker-css.js',
    'node_modules/ace-builds/src-min/mode-html.js',
    'node_modules/ace-builds/src-min/worker-html.js',
    'node_modules/ace-builds/src-min/mode-javascript.js',
    'node_modules/ace-builds/src-min/worker-javascript.js',
    'node_modules/ace-builds/src-min/theme-solarized_dark.js',
    'node_modules/ace-builds/src-min/ext-language_tools.js'
], 'public/js/ace/').version();

mix.copy([
    'node_modules/ace-builds/src-min/snippets/text.js',
    'node_modules/ace-builds/src-min/snippets/html.js',
    'node_modules/ace-builds/src-min/snippets/css.js',
    'node_modules/ace-builds/src-min/snippets/javascript.js',
], 'public/js/ace/snippets').version();

mix.styles([
    'node_modules/gentelella/vendors/animate.css/animate.css',
    'node_modules/gentelella/vendors/switchery/dist/switchery.min.css',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.css',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.buttons.css',
    'node_modules/gentelella/vendors/pnotify/dist/pnotify.nonblock.css',
    'node_modules/dropzone/dist/min/dropzone.min.css',
    'node_modules/gentelella/build/css/custom.css',
    'resources/assets/css/admin.css'
], 'public/css/admin.css').version();

/*
 * Client Dashboard
 */

mix.scripts([
    'node_modules/gentelella/build/js/custom.js',
    'resources/assets/js/client.js'
], 'public/js/client.js').version();

mix.styles([
    'node_modules/gentelella/vendors/animate.css/animate.css',
    'node_modules/gentelella/build/css/custom.css',
    'resources/assets/css/client.css'
], 'public/css/client.css').version();
