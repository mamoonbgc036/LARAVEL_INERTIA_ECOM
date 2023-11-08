<template>
    <div class="usermake">
        <h1>User Create</h1>
        <form @submit.prevent="submit" method="post">
            <div>
            <label for="name">Name</label>
            <input type="text" v-model="formData.name">
            <p v-if="errors.name" class="error" v-text="errors.name"></p>
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" v-model="formData.email">
            <p v-if="errors.email" class="error" v-text="errors.email"></p>
        </div>
        <div>
            <label for="name">Name</label>
            <input type="text" v-model="formData.password">
            <p v-if="errors.password" class="error" v-text="errors.password"></p>
        </div>
        <div>
            <input type="submit" as="button" v-text="Create">
        </div>
        </form>
    </div>
</template>
<script>
    export default{
        data(){
            return{
                formData:{
                    name:'',
                    email: '',
                    password: ''
                }
            }
        },
        props:{
            errors:Object
        },
        methods:{
            submit(){
                this.$inertia.post('/usermake', this.formData)
            }
        }
    }
</script>
<style>
    .error{
        color: red;
        font-weight: 500;
    }
</style>