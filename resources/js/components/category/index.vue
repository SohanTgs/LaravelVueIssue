<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center d-flex">                
                        Product Category component
                        <router-link :to="{name: 'create-category'}" class="btn btn-primary">Add categroy</router-link>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(category, index) in categories" :key="category.id">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ category.id }} </td>
                                    <td>{{ category.name }}</td>
                                    <td>{{ category.slug }}</td>
                                    <td>
                                        <router-link :to="{name: 'edit-category', params:{id: category.id}}" class="btn btn-primary">Edit</router-link>
                                        <a @click.prevent="deleteCategory(category)" href="#" class="btn btn-danger">Delete</a>
                                    </td>
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
    export default {

        data(){
            return {
                categories: [],
            }
        },

        methods: {

            loadCategories(){
                axios.get('/api/getData').then(response => {
                    this.categories = response.data;
                });
            },

            deleteCategory(category){

                axios.post('/api/delete', {id: category.id}).then(response=> {
                    let index = this.categories.indexOf(category);
                    this.categories.splice(index, 1);
                });
                
            }

        },

        mounted() {
            this.loadCategories();
        }
    }
</script>
