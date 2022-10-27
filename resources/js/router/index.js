import Vue from 'vue'
import VueRouter from 'vue-router'
import ExampleComponent from '../components/ExampleComponent'
import HeaderComponent from '../components/Header'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'welcome',
    component: HeaderComponent,
  },
 
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
