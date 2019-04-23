<template>
    <div class="wrapper">
        <h2 class="title">I am ...</h2>
        <p class="text text-font">{{ desc }}</p>

        <h2 class="title">skills</h2>
        <div class="category">
            <button class="category__btn" :class="{'all': category === 'all'}" @click="changeAll">
                All
            </button>
            <button class="category__btn" :class="{'front': category === 'front'}" @click="changeFront">
                Front
            </button>
            <button class="category__btn" :class="{'back': category === 'back'}" @click="changeBack">
                Back
            </button>
            <button class="category__btn" :class="{'others': category === 'others'}" @click="changeOthers">
                Others
            </button>
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
    </div>
</template>

<script>
import Skill from '../components/Skill'
export default {
    data () {
        return {
            desc: '',
            skills: [],
            category: 'all',
        }
    },
    components: {
        Skill,
    },
    methods: {
        async getAbout () {
            const response = await axios.get('/api/about')
            const desc = response.data['user'].desc
            const skills = response.data['skill']

            this.desc = desc
            this.skills = skills
        },
        changeAll () {
            this.category = 'all'
        },
        changeFront () {
            this.category = 'front'
        },
        changeBack () {
            this.category = 'back'
        },
        changeOthers () {
            this.category = 'others'
        }
       
    },
    
    created: function () {
        this.$store.dispatch('header/setIsSmall', true)
        this.$store.dispatch('header/setHeaderPlaceHolder', 'Enter top OR works')
        this.getAbout();
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
    margin: 20px auto 0 auto;
}

.title {
    font-size: 12vw;
    color: rgb(46, 46, 46);
}

.text {
    font-size: 5vw;
    padding: 10px;
    line-height: 8vw;
    letter-spacing: 0.2em;
    color: rgb(46, 46, 46);
}

.skill-wrap {
    padding: 10px;
}
.category {
    margin-top: 10px;
    &__btn {
        font-family: "Cute Font";
        display: inline-block;
        padding: 0.2em 0.5em;
        text-decoration: none;
        border-radius: 3px;
        width: 24%;
        color: grey;
        border: solid 2px grey;
        font-size: 5vw;
    }
}


.all {
    color: #000;
    border: solid 2px #000;
}

.front {
    color: #67c5ff;
    border: solid 2px #67c5ff;
}

.back {
    color: #ff67d9;
    border: solid 2px #ff67d9;
}

.others {
    color: #67ff88;
    border: solid 2px #67ff88;
}

</style>
