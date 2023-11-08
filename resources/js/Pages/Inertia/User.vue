<template>
    <Head title="User"/>
        <h1>User</h1>
        <div class="usermake">
            <input type="text" @input="test" placeholder="Search" v-model="search">
            <Link href="/user/create">User Create</Link>
        </div>
        <ul class="users">
            <li v-for="user in users.data"  :key="user.id">
               <div>
                <h4 v-text="user.name"></h4>
                <a href="">Edit</a>
               </div>
               <hr>
            </li>
        </ul>
      <Paginate :links="users.links" />
</template>
<script>
import Layout from './Shared/Layout.vue';
import Paginate from './Shared/Paginate.vue'
import debounce from 'lodash/debounce'
export default{     
    data(){
        return{
            search:this.filter.search
        }
    },
    layout : Layout,
    props:{
        users:Object,
        filter:Object
    },
    methods:{
        test: debounce(function () {
      this.$inertia.get('/user', { search: this.search }, {
        preserveState: true,
        replace: true,
      });
    }, 3000),
       
    },
    components:{
        Layout,
        Paginate
    }
}
</script>
<style>
    .users li div, .usermake{
        display: flex;
        place-items: center;
        justify-content: space-between;
    }
    .link a,span{
        padding: 8px;
        margin: 10px;
        background-color: brown;
        border-radius: 30%;
        color: #fff;
    }

    .active{
        background-color: black!important;
    }
</style>