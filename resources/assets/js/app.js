
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap');

var main = document.querySelector('main');
var pages = {
    home: require('./pages/home'),
    review: require('./pages/review')

};

if (main) {

    if (typeof pages[main.id] != 'undefined') {
        var page = pages[main.id];

        page();
    }

}
