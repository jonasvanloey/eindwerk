
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// Import TinyMCE
import tinymce from 'tinymce/tinymce';

// A theme is also required
import 'tinymce/themes/modern/theme';

// Any plugins you want to use has to be imported
import 'tinymce/plugins/paste';
import 'tinymce/plugins/link';
import 'tinymce/plugins/advlist';

// Initialize the app
tinymce.init({
    selector: '#reason',
    menubar: false,
    plugins: ['paste', 'link','advlist'],
    advlist_bullet_styles: 'circle'
});
tinymce.init({
    selector: '#description',
    plugins: ['paste', 'link','advlist'],
    advlist_bullet_styles: 'circle'
});

import StarRating from 'vue-star-rating'
require('./bootstrap');
window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('star-rating', StarRating);
Vue.component('image-cropper', require('./components/ImageUpload.vue'));

const app = new Vue({
    el: '#app',
    data: {
        messages: [],
        destid:'',

    },

    created() {
        this.destid = this.getid()
        this.fetchMessages(this.getid());
        Echo.private('chat')
            .listen('MessageSent', (e) => {
            this.messages.push({
            message: e.message.message,
            user: e.user
        });
    });
    },

    methods: {
        fetchMessages(tid) {
            axios.get('/messages/'+tid).then(response => {
                this.messages = response.data;
        });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages/'+this.destid, message).then(response => {
                console.log(response.data);
        });
        },
        getid(){
           return $('.hid').attr('id');
        }
    }

});
