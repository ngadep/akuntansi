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
/*
elixir(function(mix) {
    mix.sass('app.scss');
});

elixir(function(mix) {
 mix.scripts([
  'jquery-2.1.4.min.js',
  'bootstrap.min.js',
  'bootstrap-editable.js'
 ]);
});
*/

elixir(function(mix){
    mix.scripts(['app-journals-index.js','app-accounts-begin.js'],'public/js/app.min.js');
});