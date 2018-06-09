
import axios from 'axios';
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


$(window).on('load', function () {

    $('.addToFav').on('click', function () {
        if($(this).hasClass('unclicked')){
            $(this).removeClass('unclicked');
        }
        else{
            $(this).addClass('unclicked');
        }
        const formData = new FormData();
        let id = $(this).attr('id');
        formData.append('job_id',id);
        axios.post('favoritejob', {job_id:id}).catch(error => {
            console.log(error.response);
        }).then(res => {
        });
    });

    $('.registerbusinessbtn').on('click',function(){
        if ($(this).attr('aria-expanded') === 'false') {
            $(this).text('Ik ben geen werkgever')
        }
        else{
            $(this).text('Ik ben een werkgever')
        }
    });
});
$("#txtDate").keyup(function (e) {
    if (e.keyCode != 193 && e.keyCode != 111) {
        console.log(e.keyCode);
        if (e.keyCode != 8) {
            if ($(this).val().length == 2) {
                $(this).val($(this).val() + "/");
            } else if ($(this).val().length == 5) {
                $(this).val($(this).val() + "/");
            }
        } else {
            var temp = $(this).val();
            if ($(this).val().length == 5) {
                $(this).val(temp.substring(0, 4));
            } else if ($(this).val().length == 2) {
                $(this).val(temp.substring(0, 1));
            }
        }
    } else {
        var temp = $(this).val();
        var tam = $(this).val().length;
        $(this).val(temp.substring(0, tam-1));
    }
});
