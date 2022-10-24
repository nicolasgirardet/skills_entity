<template>
  <div>
    <p>ID de la compétence : {{ my_id }}</p>
    <input v-model="skillName" placeholder="nom de la compétence" />
    <p>Le nom de la compétence est : {{ skillName }}</p>
    <br />
    <textarea
      v-model="skillDescription"
      placeholder="décrivez brièvement la compétence"
    ></textarea>
    <p>La description de la compétence est : {{ skillDescription }}</p>
    <button v-on:click="handleValidation()">Valider</button>
    <button v-on:click="handleDeletion()">Supprimer</button>
  </div>
</template>

<script>
import { postSkill, deleteSkill } from "../services/skill-service";

export default {
  name: "SkillForm",
  data() {
    return {
      skillName: "",
      skillDescription: "",
      //skillId: null,
    };
  },

  methods: {
    async handleValidation() {
      //console.log(this.skillName);

      let response;
      try {
        response = await postSkill(this.skillName, this.skillDescription);
      } catch (e) {
        console.log(e);
      } finally {
        console.log(response.data.id);
      }
    },

    async handleDeletion() {
      let response;
      let url = window.location.href;
      let url_split = url.split("/");
      let my_id_location = url_split.length - 1;
      let my_id = url_split[my_id_location];
      //console.log(my_id );
      response = await deleteSkill(my_id);
        console.log(response);
      }
    }
  }
</script>
