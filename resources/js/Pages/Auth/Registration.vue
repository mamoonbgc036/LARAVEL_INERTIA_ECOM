<template>
       <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <form @submit.prevent="register" method="post" id="formAuthentication" class="mb-3">
                <div class="mb-3">
                  <label for="username" class="form-label">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="form.name"
                    id="username"
                    name="username"
                    required
                    placeholder="Enter your username"
                    autofocus
                  />
                  <p v-if="$page.props.errors.name" v-text="$page.props.errors.name" class="text-danger"></p>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" v-model="form.email" required class="form-control" id="email" name="email" placeholder="Enter your email" />
                  <p v-if="$page.props.errors.email" v-text="$page.props.errors.email" class="text-danger"></p>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      required
                      v-model="form.password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <p v-if="$page.props.errors.password" v-text="$page.props.errors.password" class="text-danger"></p>
                  </div>
                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" v-model="terms" type="checkbox" id="terms-conditions" name="terms" />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                  <p v-show="terms_warning" v-text="terms_warning" class="text-danger"></p>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <Link href="/user/login">
                  <span>Sign in instead</span>
                </Link>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>
</template>
<script>
  import {Link} from '@inertiajs/vue3'
  import { router } from '@inertiajs/vue3'
  export default{
    components:{
      Link,
      router
    },
    data(){
      return{
        form : {
          name: '',
          email : '',
          password : ''
        },
        terms : '',
        terms_warning : ''
      }
    },
    methods:{
      register(){
        if(this.terms){
          router.post('/user/register',this.form)
        } else{
          this.terms_warning = 'please check the checkbox !!!!'
        }
      }
    }
  }
</script>