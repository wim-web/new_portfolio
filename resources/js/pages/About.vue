<template>
<div>
    <Loading v-if="loading" />
    <div class="wrapper" v-if="!loading">
        <h3 class="title">I am ...</h3>
        <p class="text text-font">{{ desc }}</p>

        <h3 class="title">skills</h3>
        <div class="cate-wrap">
            <CateBtn />
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
        <h3 class="title">contact</h3>
        <SnsBtn />
        
    </div>
</div>
</template>

<script>
import Skill from '../components/Skill'
import CateBtn from '../components/CateBtn'
import SnsBtn from '../components/SnsButton'
import Loading from '../components/Loading'
export default {
    data () {
        return {
            desc: '',
            skills: [],
        }
    },
    components: {
        Skill,
        CateBtn,
        SnsBtn,
        Loading,
    },
    methods: {
        async getAbout () {
            this.$store.commit('loading/setLoading', true)
            const response = await axios.get('/api/about')
            const desc = response.data['user'].desc
            const skills = response.data['skill']

            this.desc = desc
            this.skills = skills

            this.$store.commit('loading/setLoading', false)
        },
    },
    computed: {
        category () {
            return this.$store.state.cate.category
        },
        loading () {
            return this.$store.state.loading.loading
        }
    },
    beforeCreate() {
        this.$store.commit('cate/resetCate')
    },
    created: function () {
        this.$store.commit('cate/resetCate')
        this.$store.dispatch('header/setIsSmall', true)
        this.$store.dispatch('header/setHeaderPlaceHolder', 'Enter top OR works')
        this.getAbout()
    },
}
</script>

<style lang="scss" scoped>
.v-enter-active, .v-leave-active, e {
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
    font-family: 'Kosugi Maru';
}

.wrapper{
    width: 80%;
    margin: 0 auto;
    padding: 20px 0;
}

.title {
    font-size: calc(45px + 1vw);
    color: rgb(46, 46, 46);
}

.text {
    font-size: calc(14px + 0.25vw);
    padding: 10px;
    line-height: calc(30px + 0.5vw);
    letter-spacing: 0.2em;
    color: rgb(46, 46, 46);
}

.cate-wrap {
    text-align: center;
}

.skill-wrap {
    padding: 10px;
}

@media screen and (min-width: 768px) {
    .wrapper {
        width: 85%;
    }
    .title {
        font-size: 52px;
    }

    .text {
        font-size: calc(14px + 0.25vw);
        line-height: 30px;
        letter-spacing: 0.4em;
    }

    .skill-wrap {
        margin-top: 10px;
    }
}

</style>
