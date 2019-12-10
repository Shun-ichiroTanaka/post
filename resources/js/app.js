window.Vue = require('vue');

import axios from "axios";

import fontawesome from '@fortawesome/fontawesome';
import regular from '@fortawesome/fontawesome-free-solid';
import solid from '@fortawesome/fontawesome-free-regular';
import brands from '@fortawesome/fontawesome-free-brands';

import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import { VueEditor, Quill } from "vue2-editor";
import VoerroTagsInput from '@voerro/vue-tagsinput';
import '@firstandthird/toc';


Vue.component('tags-input', VoerroTagsInput);
Vue.use(VueFormWizard)

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// require("./parts/markdown");

// fontawesome
fontawesome.library.add(regular);
fontawesome.library.add(solid);
fontawesome.library.add(brands);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('newpostform', require('./components/post/NewPostForm.vue').default);
Vue.component('allposts', require('./components/post/AllPosts.vue').default);

Vue.component('like', require('./components/social/Like.vue').default);
Vue.component('stock', require('./components/social/Stock.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
    el: '#app'
});