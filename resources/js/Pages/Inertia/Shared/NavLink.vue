<template>
    <Link :class="{'running': active}">
        <slot/>
    </Link>
</template>
<script setup>
    import { Link } from '@inertiajs/vue3';
    defineProps({
        active:Boolean
    })
</script>