<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5>Edit category {{ form.name }}</h5>
					<router-link :to="{name: 'category-list'}" class='btn btn-primary'>Category list</router-link>
				</div>
				<div class="card-body">
					<form @submit.prevent="updateCategory()">
						<div class="row">
		
							<div class="col-lg-6 m-auto">
								<div class="form-group">
									<label>Category name</label>
									<input type="text" v-model="form.name" class="form-control" name="name"
									:class="{ 'is-invalid': form.errors.has('name') }"
									>
									<has-error :form="form" field="name"></has-error>
								</div>
								<div class="form-group">
									<input type='submit'  value="Update" class="btn btn-success w-100">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import { Form } from 'vform';

    export default {

        data(){
            return {
		      form: new Form({
		        name: '',
		        id: ''
		      })
		    }
        },

        methods: {
        	
        	updateCategory(){
				let id = this.$route.params.id;
				this.form.id = id;
				this.form.post('/api/edit', {id: this.id}).then(response=> {
	
					if(response.data.success){
				 		this.$toast.success({
						    title:'Success',
						    message:'Updated'
						})
				 	}

				});

			},

            loadCategory(){
            	let id = this.$route.params.id;

                axios.get(`/api/edit/${id}`).then(response => {
                    this.form.name = response.data.name;
                });
            }
        },

        mounted() {
            this.loadCategory();
        }
    }
</script>

