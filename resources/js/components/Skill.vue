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
    font-size: 8vw;
    margin-bottom: 5px;
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
    .skill {
        font-size: 4vw;
        margin-bottom: 10px;
    }
}
</style>
