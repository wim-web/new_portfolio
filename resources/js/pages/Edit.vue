<template>
    <div class="edit-wrapper">
        <router-link to="/edit/about">About</router-link>
        <router-link to="/edit/works">Works</router-link>
        <div>
            <router-view></router-view>
        </div>
        <a href="" @click.prevent="logout">logout</a>
    </div>
</template>

<script>
export default {
    methods: {
        async logout () {
            await axios.post('/api/logout')
            this.$store.commit('auth/logout')
            this.$router.push('/')
            this.$store.dispatch('header/resetState')
        }
    },
    beforeCreate() {
        this.$router.push('/edit/about')
    },
}
</script>

<style lang="scss" scoped>
a {
    text-decoration: none;
    color: #000;
}

.edit-wrapper {
    font-size: 18px;
    font-family: "Kosugi Maru";
}
</style>
