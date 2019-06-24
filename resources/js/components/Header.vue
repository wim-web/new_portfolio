<template>
  <header class="header">
    <h1 class="header__left">
      <router-link to="/about" class="title">techx2</router-link>
    </h1>
    <ul class="header__right">
      <li>
        <a href="https://twitter.com/wim_web" target="_brank">
          <i class="fab fa-twitter icon twitter"></i>
        </a>
      </li>
      <li>
        <a href="https://github.com/wim-web" class="github" target="_brank">
          <i class="fab fa-github icon github"></i>
        </a>
      </li>
      <li>
        <a href="https://qiita.com/wim" class="qiita" target="_brank">
          <i class="fab fa-quora icon qiita"></i>
        </a>
      </li>
    </ul>
  </header>
</template>

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
		padding-right: 10px;
  }

  &__left {
    padding-left: 10px;
  }
}

.title {
  font-size: calc(42px + 2.5vw);
  text-decoration: none;
  cursor: pointer;
  color: #fff;
}

.icon {
  color: #fff;
  margin-right: 10px;
  font-size: 25px;
}

li:last-child .icon {
	margin-right: 0;
}

@media screen and (min-width: $tab) {
	.twitter {
		transition: .5s;
	}
	.twitter:hover {
		color: #67c5ff;
	}
	.github {
		transition: .5s;
	}
	.github:hover {
		color: #fde509;
	}
	.qiita {
		transition: .5s;
	}
	.qiita:hover {
		color: #24fa24;
	}

	.header__left {
		padding-left: 20px;
	}

	.header__right {
		padding-right: 20px;
	}

	.icon {
		margin-right: 15px;
		font-size: 30px;
	}

	li:last-child .icon {
		margin-right: 0;
	}

  .title {
    font-size: 60px;
  }
}
@media screen and (min-width: 1025px) {
	.icon {
		margin-right: 30px;
	}

	li:last-child .icon {
		margin-right: 0;
	}

}
</style>
