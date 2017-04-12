
var elixir = require('laravel-elixir');

    elixir(function(mix) {
        mix.webpack('app.js');
        mix.sass('app.scss');

    });