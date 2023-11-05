<template>
    <ul>
        <li>
            <NavLink href="/" :active="$page.component=='Inertia/Home'">
                Home
            </NavLink>
        </li>
        <li>
            <NavLink href="/setting" :active="$page.component=='Inertia/Setting'">
                Setting
            </NavLink>
        </li>
        <li>
            <NavLink href="/user" :active="$page.component=='Inertia/User'">
                User
            </NavLink>
        </li>
        <li><Link href="/logout" method="post" as="button">Logout</Link></li>
    </ul>
</template>
<script>
import NavLink from './NavLink.vue';
    export default{
        components:{
            NavLink
        }
    }
</script>