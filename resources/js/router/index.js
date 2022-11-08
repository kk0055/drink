import Vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from '../components/ExampleComponent'
// import HeaderComponent from '../components/Header'
import Drinks from '../src/views/Drinks'
import App from '../src/App.vue';

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'drinks',
    component: Drinks,
    children: [
      // {
      //   path: ':drinkId',
      //   name: 'drinkDetails',
      //   meta: {
      //     backPath: { name: 'drinks' },
      //   },
      //   component: () => import('../src/views/Drinks/Drink.vue'),
      // },
    ],
  },
  {
    path: '/drink',
    name: 'createDrink',
    // meta: {
    //   backPath: { name: 'drinks' },
    // },
    props: true,
    component: () => import('../src/views/Drinks/DrinkCreate.vue'),
  },
  {
    path: '/drinks/:drinkId',
    name: 'drinkDetails',
    component: () => import('../src/views/Drinks/Drink.vue'),
  },
  {
    path: '/register',
    name: 'register',
    component: () => import('../src/views/Register.vue'),
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('../src/views/Login.vue'),
  },

]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
