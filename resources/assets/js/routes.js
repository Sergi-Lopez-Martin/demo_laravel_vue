window.Vue = require('vue');
import Router from 'vue-router';


Vue.use(Router);

export default new Router({
  routes: [
    {
      name: 'home',
      path: '/',
      component: require('./views/Home')
    },
    {
      name: 'contact',
      path: '/contacto',
      component: require('./views/Contact')
    },
    {
      name: 'archive',
      path: '/archivo',
      component: require('./views/Archive')
    },
    {
      name: 'about',
      path: '/nosotros',
      component: require('./views/About')
    },
    {
      name: 'posts_show',
      path: '/blog/:url',
      component: require('./views/PostsShow'),
      props: true
    },
    {
      name: 'category_posts',
      path: '/categorias/:category',
      component: require('./views/CategoryPosts'),
      props: true
    },
    {
      name: 'tags_posts',
      path: 'etiquetas/:tag',
      component: require('./views/TagsPosts'),
      props: true
    },
    {
      path: '*',
      component: require('./views/404')
    }
  ],
  linkExactActiveClass: 'active',
  mode: 'history',
  scrollBehavior(){
    return {x:0, y:0};
  }
});
