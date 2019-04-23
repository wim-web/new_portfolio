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
        },
        changeFront () {
            this.$store.commit('cate/setCate', 'front')
        },
        changeBack () {
            this.$store.commit('cate/setCate', 'back')
        },
        changeOthers () {
            this.$store.commit('cate/setCate', 'others')
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
        padding: 0.2em 0.2em;
        text-decoration: none;
        border-radius: 3px;
        width: 24%;
        color: grey;
        border: solid 2px grey;
        font-size: 5vw;
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
</style>
