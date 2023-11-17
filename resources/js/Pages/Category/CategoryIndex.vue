<template>
    <div class="card">
                <h5 class="card-header">All Category</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table table-dark">
                    <thead>
                      <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr v-for="(category, index) in categories" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>{{ category.name }}</td>
                        <td>{{ category.description }}</td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                              <img :src="category.image" alt="Avatar" class="rounded-circle">
                            </li>
                          </ul>
                        </td>
                        <td class="d-flex">
                          <div class="m-2">
                            <Link :href="`category/`+category.id+`/edit`"><i class="fa-solid fa-pen-to-square"></i></Link>
                          </div>
                           <div class="m-2">
                            <Link href=""><i class="fa-regular fa-trash-can"></i></Link>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
</template>
<script>
    import { Link } from '@inertiajs/vue3';
import Layout from '../Layout.vue';
    export default{
    layout: Layout,
    props: {
        categories: Array,
    },
    components: { Link }
}
</script>