<template>
    <form class="flex flex-col" @submit.prevent="submitComment">
        <textarea class="border rounded p-3 mb-3" v-model="comment"></textarea>
        <button type="submit" class="border rounded py-2">Commenter</button>
    </form>
</template>

<script>
//import { postNewSkill, editSkill} from '../js/skill-service';

import axios from 'axios';

export default {
    name: 'SkillForm',
    data() {
        return {
            comment: '',
        }
    },
    methods: {
        submitComment() {
            axios.post('/',  {
                content: this.comment
            })

            console.log(this.comment)
        },
    },
};

</script>