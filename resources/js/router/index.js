import Vue from "vue";
import VueRouter from "vue-router";
import ExampleComponent from "../components/ExampleComponent";
import Drinks from "../src/views/Drinks";
import App from "../src/App.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        name: "drinks",
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
        ]
    },
    {
        path: "/drinks/ranking",
        name: "drinkRanking",
        component: () => import("../src/views/Ranking.vue")
    },
    {
        path: "/drink",
        name: "createDrink",
        // meta: {
        //   backPath: { name: 'drinks' },
        // },
        props: true,
        component: () => import("../src/views/Drinks/DrinkCreate.vue")
    },
    {
        path: "/search",
        name: "search",
        meta: {
          backPath: { name: 'drinks' },
        },
        props: true,
        component: () => import("../src/views/SearchResults.vue")
    },
    {
        path: "/drinks/:drinkId",
        name: "drinkDetails",
        component: () => import("../src/views/Drinks/Drink.vue")
    },

    {
        path: "/register",
        name: "register",
        component: () => import("../src/views/Register.vue")
    },
    {
        path: "/login",
        name: "login",
        component: () => import("../src/views/Login.vue")
    },
    {
        path: "*",
        name: "notFound",
        component: () => import("../src/views/NotFound.vue")
    }
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});
router.onError(error => {
    console.error(error);
    Vue.prototype.$log.error('Failure Reason: ', error.message, error);
    if (/ChunkLoadError:.*failed./i.test(error.message)) {
      Vue.prototype.$log.error('Reloading Window 1');
      window.location.reload();
    }
    else if (/Loading.*chunk.*failed./i.test(error.message)) {
      Vue.prototype.$log.error('Reloading Window 2');
      window.location.reload();
    }
  });
export default router;
