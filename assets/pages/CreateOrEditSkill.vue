<template>
     <skill-form
     :id="this.id"
     :name="this.name"
     :description="this.description"
     />
</template>

<script>
import SkillForm from "../components/SkillForm.vue";

export default {
  name: 'CreateOrEditSkill',
components: {
    SkillForm,
},
props: {
        id: {
            type: Number,
            required: true,
            default: null,
        },

        name: {
          type: String,
          required: true,
          default: "",
        },

        description: {
          type: String,
          required: false,
          default: "",
        },
        },
};


</script>
