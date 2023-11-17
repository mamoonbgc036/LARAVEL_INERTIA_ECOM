<template>
     <div class="row">
               <!-- Basic Layout -->
               <div class="col-xxl">
                 <div class="card mb-4">
                   <div class="card-header d-flex align-items-center justify-content-center">
                     <h2 class="mb-0">Create Category</h2>
                   </div>
                   <div class="card-body">
                     <form @submit.prevent="edit" method="post">
                       <div class="row mb-3">
                         <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                         <div class="col-sm-10">
                           <input type="text" v-model="form.name" class="form-control" id="basic-default-name" placeholder="Bonsai" />
                         </div>
                       </div>
                       <div class="row mb-3">
                         <label class="col-sm-2 col-form-label" for="basic-default-company">Description</label>
                         <div class="col-sm-10">
                           <input
                             type="text"
                             class="form-control"
                             v-model="form.description"
                             id="basic-default-company"
                             placeholder="ACME Inc."
                           />
                         </div>
                       </div>
                       <div class="row mb-3">
                            <label for="formFile" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input @change="handleImageUploade" class="form-control" type="file" id="basic-default-name" />
                            </div>
                            <div v-show="category_to_edit.image" class="align-items-center justify-content-center w-25">
                                <img :src="category_to_edit.image" alt="" class="w-25 rounded">
                            </div>
                       </div>
                       <div class="row justify-content-end">
                         <div class="col-sm-10">
                           <button type="submit" class="btn btn-primary">Edit</button>
                         </div>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
             </div>
</template>
<script>
import { router } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
    export default{
        data(){
           return{
            form:{
                name: this.category_to_edit.data.name,
                description: this.category_to_edit.data.description,
            },
            image: null
           }
        },
        layout: Layout,
        props:{
            category_to_edit : Object
        },
        methods:{
          handleImageUploade(event){
            this.image = event.target.files[0]
          },
          edit(){
            let formData = new FormData();
            formData.append('image', this.image);
            formData.append('data', JSON.stringify(this.form));
            formData.append('_method', 'put');
            router.post('/category/'+this.category_to_edit.data.id , formData)
          }
        }
    }
</script>