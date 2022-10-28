
require('./bootstrap');
window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router/index.js'
import App from './src/App.vue';
// import HeaderComponent from './components/Header'
// import vuetify from "./vuetify";
import '../css/app.css' 
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('favorite-btn', require('./components/Favorite.vue').default);
Vue.component('App', App);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    // vuetify,
    router,
  render:(h) => h(App)
}).$mount('#app')

