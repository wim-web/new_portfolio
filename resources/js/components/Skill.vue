<template>
    <div>
        <p  v-if="item.category === 'front'"
            class="skill front"
        >
            {{ item.skill }}
        </p>
        <p  v-else-if="item.category === 'back'"
            class="skill back"
        >
            {{ item.skill }}
        </p>
        <p  v-else-if="item.category === 'others'"
            class="skill others"
        >
            {{ item.skill }}
        </p>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            required: true,
        }
    }
}
</script>

<style lang="scss" scoped>
.skill {
    display: block;
    padding: 0.2em 1em;
    text-decoration: none;
    border-radius: 3px;
    font-size: calc(26px + 1vw);
    margin-bottom: 5px;
}

.front {
    color: #005d97;
    border: solid 2px #005d97;
}

.back {
    color: #ff26c9;
    border: solid 2px #ff26c9;
}

.others {
    color: #19be3d;
    border: solid 2px #19be3d;
}

@media screen and (min-width: 768px) {
    .skill {
        font-size: 34px;
        margin-bottom: 10px;
    }
}
</style>
