<template>
     
    <header>
        <Link href="/">My App {{ $page.props.auth.username }}</Link>
        <input type="text">
        <Nav/>
    </header>
    <main>
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