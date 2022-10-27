import Vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from '../components/ExampleComponent'
// import HeaderComponent from '../components/Header'
import Drink from '../src/views/Drink'
import App from '../src/App.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'drink',
    component: Drink,
    // children: [
    //   {
    //     path: '',
    //     name: 'drink',
    //     component: Drink,
    //   },
    // ]
  },
 
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
