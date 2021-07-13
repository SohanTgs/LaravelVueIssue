<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5>Create category</h5>
					<router-link :to="{name: 'category-list'}" class='btn btn-primary'>Category list</router-link>
				</div>
				<div class="card-body">
					<form @submit.prevent="createCategory()">
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
									<input type='submit'  value="Submit" class="btn btn-success w-100">
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
		        name: ''
		      })
		    }

		},
		methods: {
			createCategory(){

				// axios.post('/api/sohan', {name: this.name}).then(response=> {
				// 	console.log(response);
				// })

				this.form.post('/api/sohan').then(({ data }) => {

				 	if(data.success){
				 		this.form.name = '';

				 		this.$toast.success({
						    title:'Success',
						    message:'Saved'
						})
				 	}

				})

			}
		}

	}
</script>

