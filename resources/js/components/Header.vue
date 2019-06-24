<template>
  <header class="header">
    <h1 class="header__left">
        <router-link to="/about" class="title">techx2</router-link>
    </h1>
    <ul class="header__right">
        <li>
        <a href="https://twitter.com/wim_web" class="twitter" target="_brank">
            <i class="fab fa-twitter icon"></i>
        </a>
        </li>
        <li>
        <a href="https://github.com/wim-web" class="github" target="_brank">
            <i class="fab fa-github icon"></i>
        </a>
        </li>
        <li>
        <a href="https://qiita.com/wim" class="github" target="_brank">
            <i class="fab fa-quora icon"></i>
        </a>
        </li>
    </ul>
  </header>
</template>

<script>

export default {
  data() {
    return {};
  },
};
</script>

<style lang="scss" scoped>
@import "../../sass/_variables";
.header {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 9999;
    width: 100%;
    display: flex;
    justify-content: space-between;
    background-color: rgb(46, 46, 46);
    color: #fff;
    padding: 10px 0;

    &__right {
        list-style: none;
        display: flex;
        align-items: center;
    }

    &__left {
        padding-left: 10px;
    }
}

.title {
  font-size: calc(42px + 2.5vw);
  text-decoration: none;
  cursor: pointer;
  color: #fff;;
}

.icon {
    color: #fff;
    margin-right: 10px;
    font-size: 25px;
}

@media screen and (min-width: $tab) {

  .title {
    font-size: 60px;
  }
}

</style>
