<template>
    <div class="skill"
        :class="{ front: item.category === 'front',
                  back: item.category === 'back',
                  others: item.category === 'others'
                }">
            {{ item.skill }}
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
    display: inline-block;
    padding: 0.2em 1em;
    width: 20%;
    border-radius: 3px;
    font-size: calc(26px + 1vw);
    margin: 0 5px 5px 5px;
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
        width: 16%;
    }
}
</style>
