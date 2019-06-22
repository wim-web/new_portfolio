<template>
    <div>
        <div class="desc">
            <form @submit.prevent="updateDesc">
                    <label for="desc" class="title">desc</label>
                    <textarea id="desc" rows="10" v-model="desc" name="desc" class="desc__text">
                    </textarea>
                <Button :value="'update'">update</Button>
            </form>
        </div>
        <div class="skills">
            <p class="title">skills</p>
            <div class="category"><CateBtn @close-pop="closePop()"/></div>
                <template v-for="skill in skills">
                    <div class="skills__item" :key='skill.id' v-show="skill.category === category || category === 'all'">
                        <p class="skills__item--inner">
                            {{ skill.skill }}
                        </p>
                        <p class="skills__item--inner">
                            {{ skill.category }}
                        </p>
                        <p class="skills__item--inner">
                            <Button @click.native="Popup(skill.id)" :value="'update'">update</Button>
                        </p>
                        <p class="skills__item--inner">
                            <Button @click.native="deleteSkill(skill.id)" :value="'delete'">delete</Button>
                        </p>
                    </div>
                    <Popup :skill="skill" v-show="popup === skill.id" :key="skill.id" @close-pop="closePop" @update-skill="updateSkill"/>
                </template>
            <form class="skills__item" @submit.prevent="registerSkill">
                <p class="skills__item--inner">
                <input type="text" v-model="skill.skill" required>
                </p>
                <p class="skills__item--inner">
                <select v-model="skill.category" required>
                    <option value="front">Front</option>
                    <option value="back">Back</option>
                    <option value="others">Others</option>
                </select>
                </p>
                <p class="skills__item--inner">
                <Button :value="'register'">register</Button>
                </p>
                <p class="skills__item--inner">
                </p>
            </form>
        </div>
        
    </div>
</template>

<script>
import Button from '../../components/Button'
import CateBtn from '../../components/CateBtn'
import Popup from '../../components/PopupForm'
export default {
    data () {
        return {
            desc: '',
            skills: [],
            popup: '',
            skill: {
                skill: '',
                category: '',
            }
        }
    },
    components: {
        Button,
        CateBtn,
        Popup,
    },
    methods: {
        async getAbout () {
            const response = await axios.get('/api/about')
            const desc = response.data['user'].desc
            const skills = response.data['skill']

            this.desc = desc
            this.skills = skills
        },
        async updateDesc () {
            const response = await axios.put('/api/about/desc', {
                desc: this.desc,
            })
            this.desc = response.data.desc
            alert('success')
        },
        async deleteSkill (id) {
            const response = await axios.delete(`/api/about/skill/${id}`)
            this.skills = response.data
        },
        async registerSkill () {
            const response = await axios.post('/api/about/skill', this.skill)
            this.skills = response.data
            this.skill = Object.assign({}, this.skill, {
                skill: '',
                category: '',
            })
        },
        Popup (id) {
            this.popup = id
        },
        closePop () {
            this.popup = ''
        },
        updateSkill (skills) {
            this.skills = skills
        }
    },
    computed: {
        category () {
            return this.$store.state.cate.category
        }
    },
    created() {
        this.getAbout()
    },
    
}
</script>

<style lang="scss" scoped>
.desc {
    max-width: 500px;
    margin: 0 auto;
    &__text {
        width: 100%;
        resize: none;
        padding: 10px;
        transition: .3s;
        border-radius: 5px;
        box-sizing: border-box;
        &:focus {
            border: 1px solid #97efff;
            outline: none;
            box-shadow: 0 0 5px 1px rgba(89, 60, 218, 0.5);
        }
    }
}

.title {
    font-size: 26px;
}

.skills {
    max-width: 500px;
    margin: 10px auto;
    &__item {
        display: flex;
        align-items: baseline;
        margin-top: 10px;
        &--inner {
            width: 25%;
            text-align: center;
        }
        & input,
        & select {
            width: 90%;
            padding: 2px;
            box-sizing: border-box;
            text-align: center;
            transition: .3s;
            border-radius: 5px;
            &:focus {
            border: 1px solid #97efff;
            outline: none;
            box-shadow: 0 0 5px 1px rgba(89, 60, 218, 0.5);
            }
        }
        & input {
            width: 90%;
            border: 1px solid grey;
        }
        & select {
            width: 60%;
        }

    }
}


.category {
    width: 100%;
}

</style>
