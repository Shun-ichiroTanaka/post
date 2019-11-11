require("./bootstrap");
require("./parts/markdown");
require("./parts/step");

import Vue from "vue";
window.Vue = require("vue");
import store from './store/index';

import fontawesome from '@fortawesome/fontawesome';
import regular from '@fortawesome/fontawesome-free-solid';
import solid from '@fortawesome/fontawesome-free-regular';
import brands from '@fortawesome/fontawesome-free-brands';

fontawesome.library.add(regular);
fontawesome.library.add(solid);
fontawesome.library.add(brands);


import VueRouter from "vue-router";
Vue.use(VueRouter);


Vue.component("posts", require("./components/post/Posts.vue").default);
// Vue.component('categoryposts', require('./components/post/CategoryPosts.vue').default);
// Vue.component('newpost', require('./components/NewPost.vue').default);

// ルート
const routes = [
    { path: "/newpost", component: require("./post/NewPost.vue") }
    //   { path: '/editpost', component: require('./components/post/EditPost.vue')},
    //   { path: '/editpost', component: require('./components/post/NewPost.vue')},
];

const router = new VueRouter({
    routes // `routes: routes` の短縮表記
});

const app = new Vue({
    el: "#app",
    store,
    router
});
