<template>
   <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <h2 class="text-center">Add Product</h2>
                    <div class="card-body">
                      <form @submit.prevent="edit_product" method="post">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" v-model="form.title" class="form-control" id="basic-default-name" placeholder="Red Ross" />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Description</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              class="form-control"
                              id="basic-default-company"
                              placeholder="raw from field"
                              v-model="form.description"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-email">Price</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="basic-default-email"
                                class="form-control"
                                placeholder="Current price"
                                aria-label="john.doe"
                                aria-describedby="basic-default-email2"
                                v-model="form.price"
                              />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Old Price</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              id="basic-default-phone"
                              class="form-control phone-mask"
                              placeholder="Previous price"
                              aria-label="658 799 8941"
                              aria-describedby="basic-default-phone"
                              v-model="form.old_price"
                            />
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Category</label>
                           <div class="col-sm-10">
                            <select v-model="form.category_id" class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                              <option v-for="category in categories" :key="category.id" :value="category.id" :selected="category.id == product.category_id">{{ category.name }}</option>
                            </select>
                           </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Unit</label>
                           <div class="col-sm-10">
                            <select v-model="form.unit" class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                              <option selected="">Choose...</option>
                              <option value="pc">pc</option>
                            </select>
                           </div>
                        </div>
                        <div class="card-body border">
                            <!-- Example of a form that Dropzone can take over -->
                            <div id="myId" ref="imageDropzone" class="dropzone"></div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
    
              </div>
</template>
<script>
import Layout from '../Layout.vue';

export default{
    layout :Layout,
    data(){
        return{
            form:{
                title : this.product.title,
                description : this.product.description,
                price : this.product.price,
                old_price : this.product.old_price,
                category_id: this.product.category_id
            }
        }
    },
    props:{
        product:Object,
        categories:Object
    },
    methods:{
        edit_product(){

        }
    }
}
</script>