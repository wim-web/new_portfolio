<template>
    <div>
        <router-link to="/edit/works/register">register work</router-link>
        <template v-for="work in works">
            <div :key="work.id">
                <img :src="work.thumbnail" width="200px" height="200px">
                <p>{{ work.title }}</p>
                <router-link :to="`/edit/works/${work.id}`">
                    edit
                </router-link>
                </div>
        </template>
        
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
    },
    created() {
        this.getWorks();
    },
}
</script>
