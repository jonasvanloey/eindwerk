
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});


import axios from 'axios';

$(window).on('load', function () {

    console.log('loaded');
    $('.addToFav').on('click', function () {
        const formData = new FormData();
        let id = $(this).attr('id');
        formData.append('job_id',id);
        console.log(formData);
        axios.post('favoritejob', formData).catch(error => {
            console.log(error);
        }).then(res => {
            console.log(res);
        });
    });
});

