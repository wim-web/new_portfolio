<template>
  <transition enter-active-class="animated fadeIn">
    <div class="content">
      <router-view></router-view>
    </div>
  </transition>
</template>

<script>

export default {
  
}
</script>

<style lang="scss" scoped>
.content {
  max-width: 1024px;
  margin: 0 auto;
  background: rgba(224, 224, 224, 0.3);
  height: 100%;
}
</style>

