<template>
    <div class="card">
                <h5 class="card-header">All Product</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr v-for="(product, index) in all_proudct_with_images.data" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>{{ product.title }}</td>
                        <td>{{ product.description }}</td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li v-for="image in product.images" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                              <img :src="image.name" alt="Avatar" class="rounded-circle">
                            </li>
                          </ul>
                        </td>
                        <td>{{ product.category.name }}</td>
                        <td class="d-flex">
                          <div class="m-2">
                            <Link :href="`product/`+product.id+`/edit`"><i class="fa-solid fa-pen-to-square"></i></Link>
                          </div>
                           <div class="m-2">
                            <button @click="delete_product(product.id)"><i class="fa-regular fa-trash-can"></i></button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div id="paginate">
        <Paginate :links="all_proudct_with_images.links" />
    </div>
    </div>
</template>
<script>
    import { Link, router } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
import Paginate from '../Shared/Paginate.vue';
    export default{
    layout: Layout,
    props: {
        all_proudct_with_images : Object,
    },
    components: { Link, Paginate },
    methods:{
      delete_product(id){
        router.delete('/product/'+id)
      },
    }
}
</script>
<style>
 #paginate{
  text-align: right;
 }
</style>
