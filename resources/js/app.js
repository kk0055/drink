
require('./bootstrap');
window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './router/index.js'
import App from './src/App.vue';
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import Vuelidate from 'vuelidate'
import Vue2TouchEvents from 'vue2-touch-events'


import '../css/app.css' 
Vue.use(VueRouter);
Vue.use(Toast);
Vue.use(Vuelidate)
Vue.use(Vue2TouchEvents)

Vue.component('favorite-btn', require('./components/Favorite.vue').default);
Vue.component('App', App);


new Vue({
    // vuetify,
    router,
  render:(h) => h(App)
}).$mount('#app')

