<template>
    <form class="wrapper" @submit.prevent="registerWork()">
        <div class="title mb-10">
            <p class="text"><label for="title">title</label></p>
            <input class="input" type="text" id="title" v-model="work.title" required>
        </div>
        <div class="link mb-10">
            <p class="text"><label for="link">link</label></p>
            <input class="input" type="url" id="link" v-model="work.link">
        </div>
        <div class="file mb-10">
            <input type="file" @change="onFileChange" required>
            <output v-if="preview">
                <img class="file__image" :src="preview" alt="">
            </output>
        </div>
        <div class="body mb-10">
            <p class="text"><label for="body">body</label></p>
            <textarea class="body__text input" type="text" id="body" v-model="work.body" required rows="10"></textarea>
        </div>
        <template v-for="skill in this.skills">
            <div class="skill" :key="skill.id">
                <input class="checkbox" type="checkbox" :id="skill.id" :value="skill.id" v-model="work.checkedSkills">
                <label class="checklabel" :class="skill.category" :for="skill.id">{{skill.skill}}</label>
            </div>
        </template>
        <p class="btn"><Button :value="'submit'">submit</Button></p>
    </form>
    
</template>

<script>
import Button from '../components/Button'
export default {
    data () {
        return {
            work: {
                title: '',
                body: '',
                link: '',
                thumbnail: '',
                checkedSkills: [],
            },
            skills: [],
            preview: null,
            image: null,
            
        }
    },
    components: {
        Button,
    },
    methods: {
        async getSkills () {
            const response = await axios.get('/api/about')
            const skills = response.data['skill']
            this.skills = skills
        },
        onFileChange (event) {
            if (event.target.files.length === 0) {
                return false
            }
            
            if (! event.target.files[0].type.match('image.*')) {
                return false
            }

            const reader = new FileReader()

            reader.onload = e => {
                this.preview = e.target.result
                this.work.thumbnail = e.target.result
                
            }
            
            reader.readAsDataURL(event.target.files[0])

            this.image = event.target.files[0]
        },
        async registerWork () {
            // const data = new FormData()
            // data.append('image', this.image)
            // data.append('title', this.work.title)
            
            // let response = await axios.post('/api/image', data)
            // const file = response.data
            // this.$set(this.work, 'thumbnail', '/storage/works/' + file)
            const response = await axios.post('/api/works', this.work)

            alert('success')
            this.$el.querySelector('input[type="file"]').value = null
            this.work = Object.assign({}, this.work, {
                title: '',
                body: '',
                link: '',
                thumbnail: '',
                checkedSkills: [],
            })
            this.image = null
            this.preview = null
        }
    },
    created () {
        this.getSkills()
    }
}
</script>

<style lang="scss" scoped>
.wrapper {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.body {
    &__text {
        resize: none;
    }
}

.input {
    width: 90%;
    padding: 2px;
    box-sizing: border-box;
    text-align: center;
    transition: .3s;
    border-radius: 5px;
    border: 1px grey solid;
    &:focus {
    border: 1px solid #97efff;
    outline: none;
    box-shadow: 0 0 5px 1px rgba(89, 60, 218, 0.5);
    }
}

.text {
    font-size: 22px;
}

.file__image {
    width: 200px;
}

.skill {
    display: inline-block;
    margin: 5px 5px 0 0;
}

.checkbox {
    display: none;
}

.checklabel {
    display: inline-block;
    border: 2px solid rgba(128, 128, 128, 0.5);
    color: rgba(128, 128, 128, 0.5);
    padding: 5px;
    font-size: 22px;
    background-color: #fff;
    transition: .3s;
    border-radius: 5px;
}

.checkbox:checked + .front {
    color: #005d97;
    border: solid 2px #005d97;
}

.checkbox:checked + .back {
    color: #ff26c9;
    border: solid 2px #ff26c9;
}

.checkbox:checked + .others {
    color: #19be3d;
    border: solid 2px #19be3d;
}

.mb-10 {
    margin-bottom: 10px;
}

.btn {
    margin-top: 10px;
    text-align: right;
}
</style>
