<template>
  <div>
    <Loading v-if="loading"/>
    <div v-if="!loading">
      <h3 class="title">I am ...</h3>
      <p class="text text-font">{{ desc }}</p>

      <h3 class="title">skills</h3>
      <div class="cate-wrap">
        <CateBtn/>
      </div>
      <div class="skill-wrap">
        <transition-group>
            <Skill
            v-show="category === 'all' || category === skill.category"
            v-for="skill in skills"
            :key="skill.id"
            :item="skill"
            />
        </transition-group>
      </div>
      <h3 class="title">works</h3>
      <div class="work-wrap">
        <Work v-for="work in works" :key="work.id" :item="work"/>
      </div>
    </div>
  </div>
</template>

<script>
import Work from "../../components/Work";
import Skill from "../../components/Skill";
import CateBtn from "../../components/CateBtn";
import Loading from "../../components/Loading";
export default {
  data() {
    return {
      desc: "",
      skills: [],
      works: []
    };
  },
  components: {
    Skill,
    CateBtn,
    Loading,
    Work
  },
  methods: {
    async getAbout() {
      this.$store.commit("loading/setLoading", true);
      const response = await axios.get("/api/about");
      const desc = response.data["user"].desc;
      const skills = response.data["skill"];

      this.desc = desc;
      this.skills = skills;

      this.$store.commit("loading/setLoading", false);
    },
    async getWorks() {
      this.$store.commit("loading/setLoading", true);
      const response = await axios.get("/api/works");
      this.works = response.data;
      this.$store.commit("loading/setLoading", false);
    }
  },
  computed: {
    category() {
      return this.$store.state.cate.category;
    },
    loading() {
      return this.$store.state.loading.loading;
    }
  },
  beforeCreate() {
    this.$store.commit("header/isAbout");
    this.$store.commit("cate/resetCate");
  },
  created: function() {
    this.$store.commit("cate/resetCate");
    this.$store.commit("header/setIsSmall", true);
    this.getAbout();
    this.getWorks();
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

.text-font {
  font-family: "Kosugi Maru";
}

.title {
  font-size: calc(45px + 1vw);
  color: rgb(46, 46, 46);
  text-align: center;
}

.text {
  font-size: calc(18px + 0.25vw);
  padding: 10px;
  line-height: calc(30px + 0.5vw);
  letter-spacing: 0.2em;
  color: rgb(46, 46, 46);
  white-space: pre-line;
  word-break: break-all;
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
.work-wrap {
  max-width: 800px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}
@media screen and (min-width: 768px) {

  .title {
    font-size: 58px;
    margin-top: 15px;
  }

  .text {
    font-size: calc(18px + 0.25vw);
    line-height: 30px;
    letter-spacing: 0.4em;
  }
}
</style>
