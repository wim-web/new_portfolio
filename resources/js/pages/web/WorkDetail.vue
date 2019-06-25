<template>
  <div>
    <Loading v-if="loading"/>
    <div class="wrapper" v-if="!loading">
      <div class="title">
        <h3 class="title__text">{{ work.title }}</h3>
        <a :href="work.link" class="title__link" v-if="work.link" target="_brank">
          <i class="fa fa-caret-right"></i> Goto!
        </a>
      </div>
      <img class="image" :src="work.thumbnail">
      <p class="text text-font">{{ work.body }}</p>
      <h3 class="title__text">skills</h3>
      <div class="cate-wrap">
        <CateBtn/>
      </div>
      <div class="skill-wrap">
        <transition-group>
          <Skill
            v-show="category === 'all' || category === skill.category"
            v-for="skill in work.skills"
            :key="skill.id"
            :item="skill"
          />
        </transition-group>
      </div>
    </div>
  </div>
</template>

<script>
import Skill from "../../components/Skill";
import CateBtn from "../../components/CateBtn";
import Loading from "../../components/Loading";
export default {
  props: {
    id: {
      required: true
    }
  },
  data() {
    return {
      work: {},
      loading: false
    };
  },
  components: {
    Skill,
    CateBtn,
    Loading
  },
  methods: {
    async fetchWork() {
      this.loading = true;
      const response = await axios.get(`/api/works/${this.id}`);
      this.work = response.data;
      this.loading = false;
    }
  },
  computed: {
    category() {
      return this.$store.state.cate.category;
    }
  },
  created() {
    this.$store.commit("cate/resetCate");
    this.fetchWork();
  }
};
</script>

<style lang="scss" scoped>
.v-enter-active,
.v-leave-active {
  transition: opacity 1s, transform 1s;
}

.v-leave-active {
  position: absolute;
}
.v-enter {
  opacity: 0;
  transform: translateY(-10px);
}
.v-leave-to {
  opacity: 0;
  transform: translateY(20px);
}

.wrapper {
  width: 80%;
  margin: 0 auto;
  padding: 20px 0;
  max-width: 800px;
  text-align: center;
}

.image {
  width: 100%;
  margin-top: 10px;
  max-width: 250px;
}

.title {
  &__text {
    font-size: calc(45px + 1vw);
  }
  &__link {
    position: relative;
    display: inline-block;
    font-weight: bold;
    font-size: calc(22px + 0.25vw);
    margin-left: 1em;
    padding: 0.25em 0.5em;
    text-decoration: none;
    border-bottom: solid 3px rgb(46, 46, 46);
    border-left: solid 3px rgb(46, 46, 46);
    color: rgb(46, 46, 46);
    transition: 0.4s;
  }

  &__link:hover {
    padding-left: 0.7em;
    padding-right: 0.3em;
  }
}

.text {
  font-size: calc(16px + 0.25vw);
  padding: 10px;
  line-height: 34px;
  letter-spacing: 0.2em;
  color: rgb(46, 46, 46);
  white-space: pre-line;
  word-break: break-all;
  text-align: left;
}

.text-font {
  font-family: "Kosugi Maru";
}

.cate-wrap {
  text-align: center;
  max-width: 550px;
  margin: 0 auto;
}

.skill-wrap {
  padding: 10px;
  text-align: center;
  margin-top: 10px;
  max-width: 500px;
  margin: 0 auto;
}

@media screen and (min-width: 768px) {
  title {
    &__text {
      font-size: 58px;
    }
  }

  .text {
    font-size: calc(16px + 0.25vw);
    line-height: 34px;
    letter-spacing: 0.4em;
  }

  .image {
    max-width: 300px;
  }
}
</style>
