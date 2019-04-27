<template>
    <header
        class="header"
        :class="{ 'header--small': isSmall }">
        <div class="header-wrapper">
            <!-- <InputLink /> -->
            <p>
                <a @click="toTop" class="link link--active">Welcome</a>
            </p>
            <router-link to="/about"
                class="link"
                :class="{'link--active': isAbout}">
                About
            </router-link>
            <router-link to="/works"
                class="link"
                :class="{'link--active': isWork}">
                Works
            </router-link>
        </div>
    </header>
</template>

<script>

import InputLink from './InputLink'

export default {
    data () {
        return {
        }
    },
    components: {
        InputLink,
    },
    methods: {
        toTop() {
            this.$store.dispatch('header/resetState')
            this.$router.push('/')
        }
    },
    computed: {
        isSmall () {
            return this.$store.state.header.isSmall
        },
        isWork () {
            return this.$store.state.header.isWork
        },
        isAbout () {
            return this.$store.state.header.isAbout
        }
    }
}
</script>

<style lang="scss" scoped>

@import '../../sass/_variables';

.header{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgb(46, 46, 46);
    color: #fff;
    transition: 2s;

    &-wrapper {
        width: 100%;
        text-align: center;
    }
    
    &--small {
        height: calc(150px + 10vw);
    }
}

.title {
    font-size: 60px;
}

.link {
    display: inline-block;
    font-size: calc(42px + 2.5vw);
    text-decoration: none;
    color: gray;
    padding: 0 10px;
    transition: .3s;
    cursor: pointer;
    &--active {
        color: #fff;
    }
}

@media screen and (min-width: $tab) {
    .header {
        &--small {
            height: 100%;
            width: 50%;
            position: fixed;
            top: 0;
            left: 0;
        }

        &__menu {
            font-size: 55px;
            padding: 15px 10px;
        }
    }
    .link {
        font-size: 60px;
    }
}
@media screen and (min-width: $pc) {
    .header {
        &--small {
            width: 512px;
            left: calc(calc(100% - 1024px) / 2);
        }
    }
}
</style>
