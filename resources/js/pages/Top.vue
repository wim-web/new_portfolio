<template>
  <div class="wrapper">
    <Header />
    <main class="main">
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
.wrapper {
  height: 100%;
}

.main {
  background: rgba(224, 224, 224, 0.3);
}
@media screen and (min-width: 768px) {
  .main {
    width: 50%;
    margin-left: 50%;
  }
}

</style>
