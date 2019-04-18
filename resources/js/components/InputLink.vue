<template>
    <div>
        <p v-show="!inputText">{{ headerText }}</p>
        <p>{{ inputText }}</p>
        <form @submit.prevent="ActionByInput">
            <input type="text" v-model="inputText" placeholder="Enter about OR works">
            <button>OK</button>
        </form>
    </div>
</template>

<script>

import { mapState } from 'vuex'

export default {
    data () {
        return {
            inputText: '',
        }
    },
    methods: {
        ActionByInput () {
            if (this.inputText === 'login') {
                this.$router.push('/tjisl45iront')
            } else if (this.inputText.match(/about/i)) {
                this.$router.push('/about')
                this.$store.dispatch('header/setHeaderText', this.inputText)
            } else if (this.inputText.match(/works/i)) {
                this.$router.push('/works')
                this.$store.dispatch('header/setHeaderText', this.inputText)
            }
            
            this.resetInputText()
            
        },
        resetInputText () {
            this.inputText = ''
        }
    },
    computed: {
        headerText() {
            return this.$store.state.header.headerText
        }
    }
}
</script>