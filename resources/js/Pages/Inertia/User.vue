<template>
    <Head title="User"/>
        <h1>User</h1>
        <input type="text" @input="test" placeholder="Search" v-model="search">
        <ul>
            <li v-for="user in users" v-text="user" :key="user.id"></li>
        </ul>
</template>
<script>
import Layout from './Shared/Layout.vue';
export default{
    data(){
        return{
            search:''
        }
    },
    layout : Layout,
    props:{
        users:Array
    },
    methods:{
        test(){
            this.$inertia.get('/user', {search: this.search})
        }
    },
    components:{
        Layout
    }
}
</script>