<template>
    <div class="edit-wrapper">
        <div class="tab">
            <button
                class="tab__btn"
                :class="{ 'tab__btn--current': currentTab === 'about' }"
                @click="changeTab('about')">
                About
            </button>
            <button
                class="tab__btn"
                :class="{ 'tab__btn--current': currentTab === 'works' }"
                @click="changeTab('works')">
                Works
            </button>
        </div>
        <div class="edit-field">
            <router-view></router-view>
        </div>
        <div class="logout">
            <Button :value="'logout'" @click.native="logout">logout</Button>
        </div>
    </div>
</template>

<script>
import Button from '../components/Button'
export default {
    data () {
        return {
            currentTab: 'about',
        }
    },
    components: {
        Button,
    },
    methods: {
        async logout () {
            await axios.post('/api/logout')
            this.$store.commit('auth/logout')
            this.$router.push('/')
            this.$store.dispatch('header/resetState')
        },
        changeTab (tab) {
            this.currentTab = tab
            if (tab === 'about') {
                this.$router.push('/edit/about')
            }
            if (tab === 'works') {
                this.$router.push('/edit/works')
            }

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
    font-family: "Kosugi Maru";
    background-color: rgba(182, 182, 182, 0.2);
    min-height: 100%;
}

.tab {
    text-align: center;
    padding-top: 10px;
    &__btn {
        font-size: 20px;
        color: #808080;
        border-bottom: 1px solid #808080;
        padding: 3px;
        transition: .5s;
        &--current {
            color: #000;
            border-bottom: 1px solid #000;
        }
    }
}

.edit-field {
    width: 90%;
    margin: 10px auto 0 auto;
}

.logout {
    text-align: center;
    margin-top: 10px;
}

</style>
