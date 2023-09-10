import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    
    {
      path: '/',
      name: 'productList',
      
      component: () => import('../components/ProductsList.vue')
    },
    {
      path: '/product/create',
      name: 'about',
      
      component: () => import('../components/CreateProductView.vue')
    }
  ]
})

export default router
