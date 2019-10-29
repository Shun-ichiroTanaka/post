require('./bootstrap');

window.Vue = require('vue');

import { VueEditor } from "vue2-editor";

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('AllPosts-Component', require('./components/AllPostsComponent.vue').default);
Vue.component('NewPost-Component', require('./components/NewPostComponent.vue').default);



const app = new Vue({
    el: '#app',
});
