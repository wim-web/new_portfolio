<template>
    <div>
        <div class="category">
            <button class="category__btn" :class="{'all': category === 'all'}" @click="changeAll">
                All
            </button>
            <button class="category__btn" :class="{'front': category === 'front'}" @click="changeFront">
                Front
            </button>
            <button class="category__btn" :class="{'back': category === 'back'}" @click="changeBack">
                Back
            </button>
            <button class="category__btn" :class="{'others': category === 'others'}" @click="changeOthers">
                Others
            </button>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        changeAll () {
            this.$store.commit('cate/setCate', 'all')
            this.$emit('close-pop')
        },
        changeFront () {
            this.$store.commit('cate/setCate', 'front')
            this.$emit('close-pop')
        },
        changeBack () {
            this.$store.commit('cate/setCate', 'back')
            this.$emit('close-pop')
        },
        changeOthers () {
            this.$store.commit('cate/setCate', 'others')
            this.$emit('close-pop')
        }
    },
    computed: {
        category () {
            return this.$store.state.cate.category
        }
    }
}
</script>

<style lang="scss" scoped>
.category {
    margin-top: 10px;
    &__btn {
        font-family: "Cute Font";
        display: inline-block;
        text-decoration: none;
        border-radius: 3px;
        width: 23%;
        color: grey;
        border: solid 2px grey;
        font-size: calc(25px + 1vw);
    }
}


.all {
    color: #000;
    border: solid 2px #000;
}

.front {
    color: #67c5ff;
    border: solid 2px #67c5ff;
}

.back {
    color: #ff67d9;
    border: solid 2px #ff67d9;
}

.others {
    color: #67ff88;
    border: solid 2px #67ff88;
}
@media screen and (min-width: 768px) {
    .category {
    &__btn {
        font-size: 36px;
    }
}
}
</style>
