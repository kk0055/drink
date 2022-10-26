
import Router from "vue-router";
// Vue Routerを読み込む
import ExampleComponent from "./components/ExampleComponent.vue"
// Componentsを読み込む

export default new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [{
        path: "/",
        component: ExampleComponent,
        name: "home"
    }]
})