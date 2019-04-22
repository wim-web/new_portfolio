<template>
    <div class="login-form-wrap">
        <form @submit.prevent="login" class="login-form">
            <input type="text" name="name" class="login-form__input" placeholder="Name" required v-model="formData.name">
            <input type="password" name="password" class="login-form__input" placeholder="password" required v-model="formData.password">
            <div class="button-wrapper">
            <button class="login-form__button">
              <span class="login-form__button-text" :class="{'login-form__button--ready': checkFilledForm }">Login</span>
            </button>
            
            <button @click.prevent="toTopPage" class="login-form__button">
              <span class="login-form__button-text back-button">Back</span>
            </button>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data () {
        return {
          formData: {
              name: '',
              password: '',
          }
        }
    },
    methods: {
        toTopPage () {
            this.$router.push('/')
            this.$store.dispatch('header/resetState')
        },
        async login () {
          const response = await axios.post('/api/login', this.formData).catch(err => err.response)
          console.log(response)
          if (response.status === 200 && response.data.name) {
            this.$store.commit('auth/login')
            this.$router.push('/edit')
            return false
          } else if (response.status === 422) {
            alert(response.data.message)
          } else {
            alert('予期せぬエラー')
          }
          
          this.$router.push('/login')
          
        }
    },
    computed: {
      checkFilledForm() {
        if (this.formData.name && this.formData.password) {
          return true
        }
        return false
      }
    }
}
</script>

<style lang="scss" scoped>


@import '../../sass/_variables';

.login-form-wrap {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate3d(-50%,-50%,0);
  text-align: center;
  width: 90%;
}

.login-form {
  text-align: center;
  &__input {
    outline: 0;
    border: 0px;
    border-bottom: 1px #000 solid;
    background: transparent;
    font: {
      size: 10vw;
      family: "Cute Font";
    }
    text-align: center;
    width: 70%;
    color: #000;
    margin-bottom: 20px;
    transition: .5s;

      &:focus {
          border-bottom: 1px #ff0000 solid;
      }
  }

  &__button {
    display: inline-block;
    position: relative;
    padding: 0 1rem;
    text-decoration: none;
    color: #000;
    transition: .4s;
    margin: 0 auto;

    &-text {
      font: {
        family: "Cute Font";
        size: 7vw;
      }
      color: grey;
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
      @include before(#000)
    }

    &::after {
      @include after(#000)
    }

    &--ready {
      animation: ready 2s infinite;
    }
  }
}

.back-button {
  color: #000;
}


</style>

