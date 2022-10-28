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
        //hereunder my version
        /*
        title: {
            type: String,
            required: true,
        },
        containerStyling: {
            type: String,
            default: 'flex flex-col md:flex-row items-center md:space-x-5 md:px-5 md:pb-5',
            required: false,
        },
        isEmittingEventToParent: {
            type: Boolean,
            default: true,
            required: false,
        },*/
        },
};


</script>
