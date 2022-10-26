<template>
  <div>
    <a href="/"><button>Retour</button></a>
    <p>ID de la compétence : {{ skillId }}</p>
    <p>TEST / Nom de la compétence : {{ skillName }}</p>
    <p>TEST / Description de la compétence : {{ skillDescription }}</p>
    <input v-model="newName" placeholder="Nom de la compétence" />
    <p>Le nom de la compétence est : {{ newName }}</p>
    <br />
    <textarea
      v-model="newDescription"
      placeholder="Description"
    ></textarea>
    <p>La description de la compétence est : {{ newDescription }}</p>
    <button v-on:click="handleValidation()">Ajouter</button>
    <button v-on:click="handleEdition()">Mettre à jour</button>
  </div>
</template>

<script>
import { postSkill, editSkill } from "../services/skill-service";

export default {
  name: "SkillForm",
  data() {
    return {
      newName: "",
      newDescription: "",
      skillId: this.id,
      skillName: this.name,
      skillDescription: this.description
      
    };
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
        }
  },

  methods: {
    async handleValidation() {
      let response;
      try {
        response = await postSkill(this.newName, this.newDescription);
      } catch (e) {
        console.log(e);
      } finally {
        console.log(response.data.id);
        this.skillId = response.data.id;
      }
    },

    async handleEdition() {
      let response;
      try {
        response = await editSkill(this.skill);
      } catch (e) {
        console.log(e);
      } finally {
        console.log(response);
      }
    },
  },
};
</script>
