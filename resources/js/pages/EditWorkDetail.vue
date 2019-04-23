<template>
    <div>
        <div>edit work detail</div>
        <img :src="work.thumbnail">
        <label for="title">title</label>
        <input type="text" id="title" v-model="work.title">
        <label for="body">body</label>
        <input type="text" id="body" v-model="work.body">
        <a :href="work.link" target="_blank">link</a>
        <ul>
            <li v-for="skill in work.skills">{{skill.skill}}</li>
        </ul>
        <button @click="getWork">get work</button>
    </div>
</template>

<script>
export default {
    data () {
        return {
            work: {},

        }
    },
    props: {
        id: {
            type: String,
            required: true,
        }
    },
    methods: {
        async getWork () {
            const response = await axios.get(`/api/works/${this.id}`)
            
            const data = response.data[0]
            const work = {
                id: data.id,
                title: data.title,
                body: data.body,
                thumbnail: data.thumbnail,
                link: data.link,
            }
            this.work = response.data[0]
        }
    }
}
</script>