import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";

import registration from "../views/registration.vue";
import Acceuil from "../views/Acceuil.vue";
import Reservation from "../views/Reservation.vue";
import Login from "../views/Login.vue";
// import Ajouter from "../views/Ajouter.vue";




Vue.use(VueRouter);

const routes = [

  //Home
  {
    path: "/Home",
    name: "Home",
    component: Home,
  },

  //About
  {
    path: "/about",
    name: "About",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/About.vue"),
  },

  //Registration
  {
    path: "/registration",
    name: "registration",
    component: registration,
  },

  //Acceuil
  {
    path: "/",
    name: "Acceuil",
    component: Acceuil,
  },

  //Reservation
  {
    path: "/Reservation",
    name: "Reservation",
    component: Reservation,
  },

  //Login
  {
    path: "/Login",
    name: "Login",
    component: Login,
  },


];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});
export default router;
