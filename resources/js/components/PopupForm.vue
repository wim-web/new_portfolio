<template>
    <div>
        <div class="skills__item">
            <p class="skills__item--inner">
                <input type="text" name="skill" v-model="item.skill">
            </p>
            <p class="skills__item--inner">
                <select v-model="item.category">
                    <option value="front">Front</option>
                    <option value="back">Back</option>
                    <option value="others">Others</option>
                </select>
            </p>
            <p class="skills__item--inner">
                <Button @click.native="updateSkill()" :value="'submit'">submit</Button>
            </p>
            <p class="skills__item--inner">
                <Button @click.native="closeEmit" :value="'close'">close</Button>
            </p>
        </div>
    </div>
</template>

<script>
import Button from './Button'
export default {
    props: {
        skill: {
            type: Object,
            required: true,
        }
    },
    data () {
        return {
            item: {

            }
        }
    },
    components: {
        Button,
    },
    methods: {
        async updateSkill () {
            const response = await axios.put(`/api/about/skill/${this.item.id}`, this.item)
            
            this.$emit('update-skill', response.data)
            this.$emit('close-pop')
        },
        closeEmit () {
            this.$emit('close-pop')
        }
    },
    created() {
        this.item = Object.assign({}, this.skill)
    },
}
</script>

<style lang="scss" scoped>
.skills {
    &__item {
        position: relative;
        display: flex;
        align-items: baseline;
        margin-top: 10px;
        background-color: #fff;
        border-radius: 5px;
        padding: 5px 0;
        &:before {
            position: absolute;
            content: '';
            bottom: 100%;
            left: 25%;
            margin-left: -30px;
            border: 30px solid transparent;
            border-bottom: 15px solid #fff;
        }
        &--inner {
            width: 25%;
            text-align: center;
        }
        & input,
        & select {
            font-size: 13.3px;
            width: 90%;
            box-sizing: border-box;
            text-align: center;
            transition: .3s;
            border-radius: 5px;
            padding: 2px;
            &:focus {
            border: 1px solid #97efff;
            outline: none;
            box-shadow: 0 0 5px 1px rgba(89, 60, 218, 0.5);
            }
        }
        & input {
            width: 90%;
            border: 1px solid grey;
        }
        & select {
            width: 60%;
        }

    }
}
</style>


