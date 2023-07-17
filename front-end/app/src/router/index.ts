import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../pages/HomePage.vue'
import LandingPage from "../pages/LandingPage.vue"

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
      component: HomeView
    },
    {
      path: '/',
      component: LandingPage
    }
  ]
})

export default router
