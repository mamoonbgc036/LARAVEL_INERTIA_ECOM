<template>
    <Head title="User"/>
        <h1>User</h1>
        <ul>
            <li v-for="user in users" v-text="user" :key="user.id"></li>
        </ul>
</template>
<script>
import Layout from './Shared/Layout.vue';
export default{
    layout : Layout,
    props:{
        users:Array
    },
    components:{
        Layout
    }
}
</script>