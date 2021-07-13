<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center d-flex">                
                        Product Component
                        <router-link :to="{name: 'create-product'}" class="btn btn-primary">Add Product</router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody v-if="products.length">
                                <tr v-for="(product, index) in products">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ product.id }} </td>
                                    <td>
                                        <div>
                                            <img :src="product.image" height="100" width="150" alt="">
                                        </div>
                                    </td>
                                    <td>{{ product.name }}</td>
                                    <td>{{ product.slug }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-product', params:{id: product.id}}" class="btn btn-primary">Edit</router-link>
                                        <a @click.prevent="deleteProduct(product)" href="#" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="100%" class="text-center">No products Found</td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{

        data(){
            return {
                products: [],
            }
        },
        methods: {
            loadProducts(){
                axios.get('/api/getProduct').then(response =>{
                    this.products = response.data;
                });
            },
            deleteProduct(product){
                axios.get(`/api/deleteProduct/${product.id}`).then(response =>{
                    let index = this.products.indexOf(product);
                    this.products.splice(index, 1);
                });
            }
        },
        mounted() {
            this.loadProducts();
        }

    }
</script>