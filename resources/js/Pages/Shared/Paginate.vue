<template>
    <ul id="paginate">
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            v-html="link.label"
            :href="link.url"
            :class="{'active' : link.active}"
            preserve-scroll
        >
        </Component>
    </ul>
</template>
<script>
    export default{
        props:{
            links: Array
        }
    }
</script>
<style>
    #paginate{
        margin-top: 5px;
    }
    #paginate>a, #paginate>span{
        padding: 8px;
        border: 1px solid black;
    }
</style>