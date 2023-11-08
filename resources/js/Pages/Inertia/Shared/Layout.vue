<template>
     
    <header>
        <Link href="/">My App</Link>
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
<style>
header{
    display: flex;
    justify-content: space-around;
    place-items: center;
}
main{
    width: 60%;
    margin: 0 auto;
}
</style>