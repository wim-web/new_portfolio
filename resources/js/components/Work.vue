<template>
  <div class="work">
    <router-link class="work__link" :to="`/works/${item.id}`">
      <img :src="item.thumbnail" class="work__img">
    </router-link>
    <div class="work__over">
      <span class="work__title">{{ item.title }}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
.work {
  text-align: center;
	position: relative;
	max-width: 250px;
	margin: 10px auto 0 auto;

  &__img {
    width: 100%;
    vertical-align: middle;
  }

  &__over {
    display: none;
  }
}

@media screen and (min-width: 768px) {
	
  .work {
		width: 50%;
		margin-top: 20px;
    max-width: 300px;

    &:hover .work__over {
      background-color: rgba(78, 80, 80, 0.3);
      opacity: 1;
    }
    &__over {
      display: block;
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      transition: 0.5s;
      opacity: 0;
      text-decoration: none;
      color: #fff;
      font-size: 40px;
      pointer-events: none;
    }
    &__title {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  }
}
</style>
