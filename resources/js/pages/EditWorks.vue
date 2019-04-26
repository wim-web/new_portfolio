<template>
    <div class="edit-works">
        <p><Button @click.native="ToRegister()" :value="'register'">Register</Button></p>
        <template v-for="work in works">
            <div :key="work.id" class="work">
                <p class="work__title">{{ work.title }}</p>
                <img class="work__img" :src="work.thumbnail">
                <p>
                    <Button :value="'update'" @click.native="EditWork()">Edit</Button>
                    <Button :value="'delete'" @click.native="DeleteWork(work.id)">Delete</Button>
                </p>
            </div>
        </template>
        
    </div>
</template>

<script>
import Button from '../components/Button'
export default {

    data () {
        return {
            works: [],
        }
    },
    components: {
        Button,
    },
    methods: {
        async getWorks () {
            const response = await axios.get('/api/works')
            this.works = response.data
        },
        ToRegister () {
            this.$router.push("/edit/works/register")
        },
        EditWork () {
            this.$router.push("`/edit/works/${work.id}`")
        },
        DeleteWork (id) {
            const flg = confirm('削除しますか？')
            if (flg) {
                alert('delete')
            }
        }
    },
    created() {
        this.getWorks();
    },
}
</script>

<style lang="scss" scoped>
.edit-works {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
    text-align: center;
}

.work {
    margin: 20px 0;
    &__img {
        width: 300px;
        margin: 10px 0;
    }
    &__title {
        font-size: 22px;
    }
}
</style>

