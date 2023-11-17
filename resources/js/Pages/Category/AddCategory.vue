<template>
    <div class="container-xxl flex-grow-1 container-p-y">
           <div class="row">
               <!-- Basic Layout -->
               <div class="col-xxl">
                 <div class="card mb-4">
                   <div class="card-header d-flex align-items-center justify-content-center">
                     <h2 class="mb-0">Create Category</h2>
                   </div>
                   <div class="card-body">
                     <form @submit.prevent="create" method="post">
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
                       </div>
                       <div class="row justify-content-end">
                         <div class="col-sm-10">
                           <button type="submit" class="btn btn-primary">Create</button>
                         </div>
                       </div>
                     </form>
                   </div>
                 </div>
               </div>
               <!-- Basic with Icons -->
   
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
                    name: '',
                    description:'',
                    image: null
                }
            }
        },
       layout : Layout,
       methods:{
        handleImageUploade(event){
            this.form.image = event.target.files[0]
        },
        create(){
            router.post('/category', this.form)
        }
       }
   }
</script>