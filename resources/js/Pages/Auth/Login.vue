<template>
      <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <form @submit.prevent="login" id="formAuthentication" class="mb-3" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Email or Username</label>
                  <input
                    type="text"
                    class="form-control"
                    id="email"
                    v-model="form.email"
                    name="email-username"
                    placeholder="Enter your email or username"
                    autofocus
                  />
                  <p class="text-danger" v-show="$page.props.errors.email" v-text="$page.props.errors.email"></p>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      v-model="form.password"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                  </div>
                  <p class="text-danger" v-show="$page.props.errors.password" v-text="$page.props.errors.password"></p>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <p class="text-danger" v-show="$page.props.errors[0]" v-text="$page.props.errors[0]"></p>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

              <p class="text-center">
                <span>New on our platform?</span>
                <Link href="/user/register">
                  <span>Create an account</span>
                </Link>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
</template>
<script>
  import { Link } from '@inertiajs/vue3';
  import { router } from '@inertiajs/vue3';
  export default{
    data(){
      return {
        form:{
          email : '',
          password : ''
        }
      }
    },
    components:{
      Link
    },
    methods:{
      login(){
       this.$inertia.post('/user/login', this.form);
      }
    }
  }
</script>