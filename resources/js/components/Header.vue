<template>
    <header
        class="header"
        :class="{ 'header--small': isSmall }">
        <div class="header-wrapper">
            <InputLink />
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
    computed: {
        isSmall () {
            return this.$store.state.header.isSmall
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
    transition: 3s;

    &-wrapper {
        width: 100%;
    }
    
    &--small {
        height: calc(200px + 10vw);
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
    }
}
</style>
