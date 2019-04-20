<template>
    <div class="input-link">
        <p v-show="!inputText" class="input-link__text">{{ headerText }}</p>
        <p v-show="inputText" class="input-link__text">{{ inputText }}</p>
        <form class="input-link__form" @submit.prevent="ActionByInput">
            <input type="text" class="input-link__input" v-model="inputText" :placeholder="headerPlaceHolder">
            <button class="input-link__button" :class="{ 'input-link__button--ready': inputText }">
                <span class="input-link__button-text" v-show="!inputText">Cannot Press</span>
                <span class="input-link__button-text" v-show="inputText">Press!!!</span>
            </button>
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
                this.$router.push('/login')
            } else if (this.inputText.match(/^about$/i)) {
                this.$router.push('/about')
                this.$store.dispatch('header/setHeaderText', this.inputText)
            } else if (this.inputText.match(/^works$/i)) {
                this.$router.push('/works')
                this.$store.dispatch('header/setHeaderText', this.inputText)
            } else if (this.inputText.match(/^top$/i)) {
                this.$router.push('/')
                this.$store.dispatch('header/resetState')
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
        },
        headerPlaceHolder() {
            return this.$store.state.header.headerPlaceHolder
        }
    }
}
</script>

<style lang="scss" scoped>

@import '../../sass/_variables';

.input-link{

  text-align: center;

  //text
  &__text {
    font-size: 13vw;
  }

  //input
  &__input {
    outline: 0;
    border: 0px;
    border-bottom: 1px #fff solid;
    background: transparent;
    font: {
      size: 10vw;
      family: "Cute Font";
    }
    text-align: center;
    width: 70%;
    color: grey;
    margin-bottom: 20px;
    transition: .5s;
  }

  &__input:focus {
    border-bottom: 1px #ff0000 solid;
  }

  //button
  &__button {
    display: block;
    position: relative;
    padding: 0 1rem;
    text-decoration: none;
    color: #fff;
    transition: .4s;
    margin: 0 auto;

    &-text {
      font: {
        family: "Cute Font";
        size: 7vw;
      }
    }

    &:before,
    &:after {
      position: absolute;
      top: 0;
      content:'';
      width: 8px;
      height: 100%;
      display: inline-block;
    }

    &::before {
      @include before(#fff)
    }

    &::after {
      @include after(#fff)
    }

    &--ready {
      animation: ready 2s infinite;
    }
  }
}

</style>
