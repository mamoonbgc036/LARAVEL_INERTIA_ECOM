<template>
      <ul class="link">
            <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            v-html="link.label"
            :href="link.url"
            :class="{'active': link.active}"
        preserve-scroll></Component>
        </ul>
</template>
<script>
    export default{
        props:{
            links:Array
        }
    }
</script>