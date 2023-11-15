<template>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

    
        <!-- / Menu -->
        <Aside />
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <Nav />
          <div class="content-wrapper">
            <!-- Content -->

              <slot />
            <!-- / Content -->
          </div>
        </div>
        <!-- / Layout page -->
      </div>
    </div>
</template>
<script>
import Aside from './Shared/Aside.vue'
import Nav from './Shared/Nav.vue'
export default{
    components:{
        Aside,
        Nav
    },
}
</script>
