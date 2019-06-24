<template>
  <div class="wrapper">
    <Header />
    <main class="main">
      <transition leave-active-class="animated fadeOutDown" enter-active-class="animated fadeIn" mode="out-in">
        <router-view></router-view>
      </transition>
    </main>
    <!-- スマホ用menu -->
    <button class="btn" @click="toAbout">
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
      toAbout () {
          this.$router.push('/about')
          this.opened = false
      },
    },
}
</script>

<style lang="scss" scoped>
.menu__link {
    text-decoration: none;
    color: #fff;
    cursor: pointer;
}

.wrapper {
  height: 100%;
}

.main {
  background: rgba(224, 224, 224, 0.3);
  margin-top: 50px;
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
  .main {
    width: 50%;
    margin-left: 50%;
  }

  .btn {
    display: none;
  }
}

</style>
