<template>
     <edit-skill-form
     :id="this.id"
     :name="this.name"
     :description="this.description"
    
     />
</template>

<script>
import EditSkillForm from "../components/EditSkillForm.vue";

export default {
  name: 'EditSkill',
components: {
    EditSkillForm,
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
