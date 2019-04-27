<template>
  <div class="wrapper">
    <Header />
    <main class="main">
      <transition leave-active-class="animated fadeOutDown" enter-active-class="animated fadeIn">
        <router-view></router-view>
      </transition>
    </main>
    <transition enter-active-class="animated fadeIn" leave-active-class="animated fadeOut">
    <div class="layer" v-show="opened">
      <div class="menu">
          <p><a class="menu__link" @click="toTop">TOP</a></p>
          <p><a class="menu__link"  @click="toAbout">ABOUT</a></p>
          <p><a class="menu__link" @click="toWorks">WORKS</a></p>
      </div>
    </div>
    </transition>
    <button class="btn" @click="toggle" :class="{'btn--close': opened}" v-if="this.$store.state.header.isSmall">
        <i class="fas fa-bars icon"></i>
    </button>
  </div>
</template>

<script>

import Header from '../components/Header'

export default {
    data () {
      return {
        opened: false
      }
    },
    components: {
        Header,
    },
    methods: {
      toggle () {
          this.opened = !this.opened
      },
      toTop () {
          this.$store.dispatch('header/resetState')
          this.$router.push('/')
          this.opened = false
      },
      toAbout () {
          this.$router.push('/about')
          this.opened = false
      },
      toWorks () {
          this.$router.push('/works')
          this.opened = false
      }
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
}

.btn {
    border-radius: 50%;
    // border: 1px solid grey;
    background-color: rgba(187, 187, 187, 0.767);
    height: 50px;
    width: 50px;
    margin-top: 20px;
    position: fixed;
    bottom: 15px;
    right: 15px;
    transition: .5s;
    z-index: 100;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.12), 0 2px 2px 0 rgba(0,0,0,.24);
    &--close {
      transform: rotate(90deg)
    }
}

.layer {
  height: 100%;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background-color: rgba(46, 46, 46, 0.75);
  z-index: 99;
}

.menu {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate3d(-50%,-50%,0);
    border: 1px solid #fff;
    text-align: center;
    border-radius: 5px;
    padding: 10px;
    width: 60%;
    margin: 0 auto;
    max-width: 350px;
    font-size: calc(30px + 2.5vw);
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
