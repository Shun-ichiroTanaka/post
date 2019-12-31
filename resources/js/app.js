window.Vue = require('vue');

import axios from "axios";
import { VueEditor, Quill } from "vue2-editor";
import '@firstandthird/toc';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// require("./parts/markdown");


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Vue.component('newpostform', require('./components/post/NewPostForm.vue').default);
// Vue.component('newposttag', require('./components/post/NewPostTag.vue').default);

// Vue.component('editpost', require('./components/post/EditPost.vue').default);
Vue.component('allposts', require('./components/post/AllPosts.vue').default);

Vue.component('like', require('./components/social/Like.vue').default);
Vue.component('stock', require('./components/social/Stock.vue').default);
Vue.component('challenge', require('./components/social/Challenge.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
    el: '#app'
});