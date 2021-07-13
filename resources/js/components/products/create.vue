<template>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5>Create Product</h5>
					<router-link :to="{name: 'product-list'}" class='btn btn-primary'>Product list</router-link>
				</div>
				<div class="card-body">
					<form @submit.prevent="addProduct()" enctype="multipart/form-data"> 
						<div class="row">
							<div class="col-lg-6 m-auto">
								<div class="form-group">
									<label>Product name</label>
									<input type="text" v-model="form.name" class="form-control" name="name"
									:class="{ 'is-invalid': form.errors.has('name') }"
									>
									<has-error :form="form" field="name"></has-error>
								</div>
								<div class="form-group">
									<label>Product price</label>
									<input type="number" v-model="form.price" class="form-control" name="price"
									:class="{ 'is-invalid': form.errors.has('price') }"
									>
									<has-error :form="form" field="price"></has-error>
								</div>
								<div class="form-group">
									<label>Product image</label>
									<input type="file" @change="onImageChange" class="form-control" name="image"
									:class="{ 'is-invalid': form.errors.has('image') }"
									>
									<has-error :form="form" field="image"></has-error>
								</div>
								<div class="form-group">
									<label>Product description</label>
									<textarea class="form-control" name="description" v-model="form.description"
									:class="{ 'is-invalid': form.errors.has('description') }"></textarea>
									<has-error :form="form" field="description"></has-error>
								</div>
								<div class="form-group">
									<input type='submit' value="Submit" class="btn btn-success w-100">
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
	import { objectToFormData } from 'object-to-formdata';

	export default {

		data(){

		    return {
		      form: new Form({
		        name: '',
		        price: '',
		        image: '',
		        description: '',
		      })
		    }

		},
		methods: {

			addProduct(){

				this.form.post('/api/addProduct', {
                    transformRequest: [function (data, headers) {
                        return objectToFormData(data)
                    }],
                    onUploadProgress: e => {
                        // console.log(e)
                    }
                }).then(({ data }) => {

				 	if(data.success){
				 		this.form.reset();
				 		this.$toast.success({
						    title:'Success',
						    message:data.message
						})
				 	}

				})

			},

			 onImageChange(e) {
	            const file = e.target.files[0];
	            this.form.image = file;
	        }

		}

	}
</script>

