<template>
  <div class="content">
    <transition enter-active-class="animated fadeIn">
      
        <router-view></router-view>
      
    </transition>
  </div>
</template>

<script>

export default {
  
}
</script>

<style lang="scss" scoped>
.content {
  max-width: 1024px;
  height: 100%;
  margin: 0 auto;
}
</style>

