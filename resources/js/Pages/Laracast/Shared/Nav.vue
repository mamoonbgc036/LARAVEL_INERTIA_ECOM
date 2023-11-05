<template>
    <ul class="test">
        <li>
            <NavLink href="/" :active="$page.component=='Laracast/Home'">
                Home
            </NavLink>
        </li>
        <li><NavLink href="/setting" :active="$page.component=='Laracast/Setting'">Setting</NavLink></li>
        <li><NavLink href="/user" :active="$page.component=='Laracast/User'">User</NavLink></li>
        <li><Link href="/logout" method="post" as="button">Logout</Link></li>
    </ul>
</template>
<script>
    import NavLink from './NavLink.vue'
    export default{
        components:{
            NavLink,
        }
    }
</script>
<style>
    .running{
       font-style: italic;
       text-decoration: underline;
    }
</style>