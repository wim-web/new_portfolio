<template>
    <div>
        <div>register work</div>
        <input type="file" @change="onFileChange">
        <output v-if="preview">
            <img :src="preview" alt="" width="100px" height="100px">
        </output>
        
        <label for="title">title</label>
        <input type="text" id="title" v-model="work.title">
        <label for="body">body</label>
        <input type="text" id="body" v-model="work.body">
        <a :href="work.link" target="_blank">link</a>
        <template v-for="skill in work.skills">
            <input type="checkbox" :id="skill.id" :value="skill.id" v-model="checkedSkills">
            <label :for="skill.id">{{skill.skill}}</label>
        </template>

        <input type="file" @change="test">
        <input type="file" @change="test">
        <input type="file" @change="test">

        {{work.images}}

        <button>register images</button>
        
        
    </div>
</template>

<script>
export default {
    data () {
        return {
            work: {
                title: '',
                body: '',
                link: '',
                thumbnail: '',
                skills: [],
                images: [],
            },
            checkedSkills: [],
            preview: null,
            
        }
    },
    methods: {
        async getSkills () {
            const response = await axios.get('/api/about')
            const skills = response.data['skill']
            this.work.skills = skills
            console.log(this.work.skills)
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
            }
            
            reader.readAsDataURL(event.target.files[0])
            
        },
        test (event) {
            const reader = new FileReader()

            reader.onload = e => {
                this.work.images.push(e.target.result)
            }

            reader.readAsDataURL(event.target.files[0])
        }
    },
    created () {
        this.getSkills()
    }
}
</script>
