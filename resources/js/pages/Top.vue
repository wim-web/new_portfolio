<template>
  <div class="wrapper">
    <Header />
    <main>
      <transition leave-active-class="animated fadeOutDown" enter-active-class="animated fadeIn">
        <router-view></router-view>
      </transition>
        
      
    </main>
  </div>
</template>

<script>

import Header from '../components/Header'

export default {
    components: {
        Header,
    },
}
</script>

<style lang="scss" scoped>

</style>
