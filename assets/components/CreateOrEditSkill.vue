<template>
      <div>
        <input v-model="skillName" placeholder="nom de la compétence">
        <p>Le nom de la compétence est : {{ skillName }}</p>
        <br />
        <textarea v-model="skillDescription" placeholder="décrivez brièvement la compétence"></textarea>
        <p>La description de la compétence est : {{ skillDescription }}</p>
  </div>
</template>

<script>
import Skills from "./Skills.vue";

export default {
  name: 'CreateOrEditSkill',
  data() {
  return  {
    skillName: '',
    skillDescription: '',
  }
},
components: {
  Skills,
}
};


</script>
