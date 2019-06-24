<template>
  <div class="wrapper">
    <Header />
    <main class="main">
      <transition name="router" mode="out-in">
        <router-view></router-view>
      </transition>
    </main>
    <!-- スマホ用menu -->
    <button class="btn" @click="toTop">
        <i class="fas fa-home icon"></i>
    </button>
    <!-- スマホ用menu -->
  </div>
</template>

<script>

import Header from '../../components/Header'

export default {
    data () {
      return {
      }
    },
    components: {
        Header,
    },
    methods: {
      toTop () {
          this.$router.push('/');
      },
    },
}
</script>

<style lang="scss" scoped>
.router-enter,
.router-leave-to {
  opacity: 0;
}

.router-enter-active,
.router-leave-active {
  transition: opacity 0.5s;
}

.menu__link {
    text-decoration: none;
    color: #fff;
    cursor: pointer;
}

.wrapper {
  height: 100%;
}

.main {
  width: 90%;
  max-width: 800px;
  margin: 0 auto;
  margin-top: 100px;
  padding-bottom: 20px;
}

.btn {
    border-radius: 50%;
    background-color: rgba(187, 187, 187, 0.767);
    height: 50px;
    width: 50px;
    position: fixed;
    bottom: 15px;
    right: 15px;
    z-index: 100;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.12), 0 2px 2px 0 rgba(0,0,0,.24);
}

.icon {
    font-size: 20px;
    color: #fff;
}
@media screen and (min-width: 768px) {
  .btn {
    display: none;
  }
}

</style>
