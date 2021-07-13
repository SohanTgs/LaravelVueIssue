import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../components/Home.vue';
import CategoryList from '../components/category/index.vue';
import AddCategory from '../components/category/create.vue';
import EditCategory from '../components/category/edit.vue';

import ProductList from '../components/products/index.vue';
import CreateProduct from '../components/products/create.vue';
import EditProduct from '../components/products/edit.vue';

const routes = new VueRouter({
    mode: 'history',
    linkExactActiveClass: "active",
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
	    {
	        path: '/category',
	        name: 'category-list',
	        component: CategoryList,
	    },
	    {
	        path: '/create/category',
	        name: 'create-category',
	        component: AddCategory,
	    },
	    {
	        path: '/edit/category/:id',
	        name: 'edit-category',
	        component: EditCategory,
	    },
	    {
	        path: '/products',
	        name: 'product-list',
	        component: ProductList,
	    },
	    {
	        path: '/create/proudct',
	        name: 'create-product',
	        component: CreateProduct,
	    },
	    {
	        path: '/edit/proudct/:id',
	        name: 'edit-product',
	        component: EditProduct,
	    }

    ]
});


export default routes;