<template>
    <div>
        <template v-for="work in works">
            <img :src="work.thumbnail" width="200px" height="200px">
            <p>{{ work.title }}</p>
        </template>
        <button @click="getWorks">get works</button>
    </div>
</template>

<script>
export default {
    data () {
        return {
            works: [],
        }
    },
    methods: {
        async getWorks () {
            const response = await axios.get('/api/works')
            this.works = response.data
            console.log(response)
        }
    }
}
</script>
