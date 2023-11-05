<template>
    <Head>
        <title>Home</title>
    </Head>
        <h1 class="home">Home</h1>
        <p class="mar">The time is {{ time }}</p>
        <Link href="/" as="button" preserve-scroll>Refresh</Link>
</template>
<script>
import Layout from './Shared/Layout.vue';
   export default{
    layout : Layout,
    props:{
        time:String
    },
    components:{
        Layout,
    },
   }
</script>
<style>
    .mar{
        margin-top: 850px;
    }
</style>