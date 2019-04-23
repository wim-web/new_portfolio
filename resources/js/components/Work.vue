<template>
    <div>
        <router-link :to="`/works/${item.id}`">
            <div class="img-wrap">
                <img :src="item.thumbnail" class="work__img">
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true,
        }
    },
}
</script>

<style lang="scss" scoped>
.img-wrap {
    text-align: center;
    margin-top: 5px;
}

.work {
    &__img {
        width: 100%;
        max-width: 400px;
        vertical-align: middle;
    }
}
</style>
