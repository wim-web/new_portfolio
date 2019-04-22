<template>
    <div>
        <form @submit.prevent="updateDesc">
            <label for="desc">desc</label>
            <textarea id="desc" cols="30" rows="10" v-model="desc" name="desc"></textarea>
            <button>Update</button>
        </form>
        <form>
            <select v-model="category">
                <option value="all">All</option>
                <option value="front">Front</option>
                <option value="back">Back</option>
                <option value="others">Others</option>
            </select>
            <table>
                <tr>
                    <th>skill</th>
                    <th>percent</th>
                    <th>category</th>
                </tr>
                <template v-for="skill in skills">
                    <tr :key='skill.id' v-show="skill.category === category || category === 'all'">
                        <td>
                            <input type="text" v-model="skill.skill">
                        </td>
                        <td>
                            <input type="number" v-model="skill.percent">
                        </td>
                        <td>
                            <select v-model="skill.category">
                                <option value="all">All</option>
                                <option value="front">Front</option>
                                <option value="back">Back</option>
                                <option value="others">Others</option>
                            </select>
                        </td>
                        <td>
                            <button @click.prevent="updateSkill(skill,skill.id)">Update</button>
                        </td>
                        <td>
                            <button @click.prevent="deleteSkill(skill.id)">Delete</button>
                        </td>
                    </tr>
                </template>
            </table>
        </form>
        <form @submit.prevent="registerSkill">
            <input type="text" v-model="skill.skill">
            <input type="number" v-model="skill.percent">
            <select v-model="skill.category">
                <option value="front">Front</option>
                <option value="back">Back</option>
                <option value="others">Others</option>
            </select>
            <button>register</button>
        </form>
        
    </div>
</template>

<script>
export default {
    data () {
        return {
            desc: '',
            skills: [],
            category: 'all',
            skill: {
                skill: '',
                percent: 0,
                category: '',
            }
        }
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
        async updateSkill (skill, id) {
            const response = await axios.put(`/api/about/skill/${id}`, skill)
            alert('update success')
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
                percent: 0,
                category: '',
            })
            alert('register success')
        }
    },
    created() {
        this.getAbout()
    },
    
}
</script>