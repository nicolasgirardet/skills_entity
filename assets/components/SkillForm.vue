<template>
  <div>
    <a href="/"><button>Retour</button></a>
    <p>ID de la compétence : {{ skillId }}</p>
    <input v-model="newName" placeholder="Nom de la compétence" />
    <p>Le nom de la compétence est : {{ newName }}</p>
    <br />
    <textarea
      v-model="newDescription"
      placeholder="Description"
    ></textarea>
    <p>La description de la compétence est : {{ newDescription }}</p>
    <button v-on:click="handleValidation()">Ajouter</button>
    <button v-on:click="handleDeletion()">Supprimer</button>
    <button v-on:click="handleEdition()">Mettre à jour</button>
  </div>
</template>

<script>
import { postSkill, deleteSkill, editSkill } from "../services/skill-service";

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

    async handleDeletion() {
      let response;
      let url = window.location.href;
      let url_split = url.split("/");
      let my_id_location = url_split.length - 1;
      let my_id = url_split[my_id_location];
      //console.log(my_id );
      response = await deleteSkill(my_id);
      console.log(response);
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
