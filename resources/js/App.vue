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
  min-height: 100vh;
  margin: 0 auto;
  background: rgba(224, 224, 224, 0.3);
}
</style>

