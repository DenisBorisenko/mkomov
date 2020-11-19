import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('@/views/Home'),
        },
        {
            path: '/articles',
            name: 'article-catalog',
            component: () => import('@/views/ArticleCatalog'),
        },
        {
            path: '/articles/:id',
            name: 'article-view',
            component: () => import('@/views/ArticleView'),
        },
    ],
})

export default router
