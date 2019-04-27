<template>
    <div>
        <Loading v-if="loading"/>
        <template v-if="!loading">
            <Work
            v-for="work in works"
            :key="work.id"
            :item="work"
        />
        </template>
        
    </div>
</template>

<script>
import Work from '../components/Work'
import Loading from '../components/Loading'
export default {
    data () {
        return {
            works: [],
        }
    },
    components: {
        Work,
        Loading,
    },
    methods: {
        async getWorks () {
            this.$store.commit('loading/setLoading', true)
            const response = await axios.get('/api/works')
            this.works = response.data
            this.$store.commit('loading/setLoading', false)
        },
    },
    computed: {
        loading () {
            return this.$store.state.loading.loading
        }
    },
    beforeCreate() {
        this.$store.commit('header/isWork')
    },
    created: function () {
        this.$store.commit('header/setIsSmall', true)
        this.getWorks()
        
    },
}
</script>
