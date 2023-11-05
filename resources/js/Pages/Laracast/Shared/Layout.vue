<template>
    <header class="test">
        <h2><Link href="/">My App {{ $page.props.auth.username }}</Link></h2>
        <Nav/>
    </header>
    <main class="main-content">
        <slot/>
    </main>
</template>
<script>
    import Nav from './Nav.vue';
    export default{
        components:{
            Nav
        }
    }
</script>
<style>
.test{
    display: flex;
    justify-content: space-around;
}
li{
    list-style: none;
    margin: 10px;
}
li a{
    text-decoration: none;
}
.main-content{
    width: 60%;
    margin: auto;
}
</style>