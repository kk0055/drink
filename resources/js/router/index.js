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
    name: 'drinks',
    component: Drink,
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
    path: '/:drinkId',
    name: 'drinkDetails',
    meta: {
      backPath: { name: 'drinks' },
    },
    props: true,
    component: () => import('../src/views/Drinks/Drink.vue'),
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
