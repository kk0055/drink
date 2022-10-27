import Vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from '../components/ExampleComponent'
import HeaderComponent from '../components/Header'
import Drink from '../src/views/Drink'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: Drink,
  },
 
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
