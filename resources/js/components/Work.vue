<template>
    <div>
        <div class="work">
            <router-link class="work__link" :to="`/works/${item.id}`">
                <img :src="item.thumbnail" class="work__img">
            </router-link>
            <div class="work__over">
                <span class="work__title">{{ item.title }}</span>
            </div>
        </div>
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

.work {
    text-align: center;
    margin-top: 5px;
    position: relative;

    &__img {
        width: 100%;
        max-width: 400px;
        vertical-align: middle;
    }

    &__over {
        display: none;
    }
}

@media screen and (min-width: 768px) {
    .work {
        width: 100%;
        max-width: 480px;
        margin: 0 auto 5px auto;

        &:hover .work__over {
            background-color: rgba(78, 80, 80, 0.3);
            opacity: 1;
        }

        &__img {
            width: 100%;
            max-width: 480px;
        }
        &__over {
            display: block;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            transition: .5s;
            opacity: 0;
            text-decoration: none;
            color: #fff;
            font-size: 40px;
            pointer-events: none;
        }
        &__title {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    }
}
</style>
