<template>
    <div>
      <a href="/"><button>Retour</button></a>
      <p>Nom de cette nouvelle compétence :</p>
      <input v-model="newName" placeholder="Entrez ici le nom" />
      <br />
      <p>Saisissez une description :</p>
      <textarea
        v-model="newDescription"
        placeholder="Entrez ici une nouvelle description"
      ></textarea>
      <br />
      <button v-on:click="handleValidation()">Ajouter</button>
    </div>
  </template>
  
  <script>
  import { postSkill } from "../services/skill-service";
  
  export default {
    name: "AddSkillForm",
    data() {
      return {
        newName: "",
        newDescription: "",
        skill: {
          name: '',
          description: ''
        },
      };
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
    },
  };
  </script>