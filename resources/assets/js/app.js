
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import router from './routes';

require('vue2-animate/dist/vue2-animate.min.css');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('nav-bar', require('./components/NavBar'));
Vue.component('post-header', require('./components/PostHeader'));
Vue.component('posts-list', require('./components/PostsList'));
Vue.component('posts-list-item', require('./components/PostsListItem'));
Vue.component('category-link', require('./components/CategoryLink'));
Vue.component('tag-link', require('./components/TagLink'));
Vue.component('post-link', require('./components/PostLink'));
Vue.component('disqus-comments', require('./components/DisqusComments'));
Vue.component('paginator', require('./components/Paginator'));
Vue.component('pagination-links', require('./components/PaginationLinks'));
Vue.component('social-links', require('./components/SocialLinks'));
Vue.component('contact-form', require('./components/ContactForm'));


const app = new Vue({
    el: '#app',
    router
});
