<template>
  <div class="row">
    <h1>TOUTES LES COMPÉTENCES</h1>
    
    <a 
      title="Ajouter une compétence"
      href='/add_skill' 
        ><button type="button">
      ajouter une compétence
    </button></a
      >
    <table class="w-full border-2">
      <thead>
        <tr>
          <th>Nom</th>
          <th>Description</th>
          <th>Date de modification</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="skill in skills"
          :key="skill['@id']"
          class="text-center border"
        >
          <td v-text="skill.name"></td>
          <td v-text="skill.description"></td>
          <td v-text="skill.modificationDate"></td>
          <td class="flex justify-center py-4">
            <a title="Éditer la compétence" :href="`/skills/${skill.id}`">
              <pen-s-v-g fill-color="#1e83a3" height="26" width="26" />
            </a>
            <button v-on:click="handleDeletion(skill.id)" title="Supprimer la compétence">
              <trash-can-s-v-g fill-color="#1e83a3" height="26" width="26" /></button>
            
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";
import PenSVG from "../components/PenSVG";
import TrashCanSVG from "./TrashCanSVG.vue";
import {deleteSkill} from "../services/skill-service";

export default {
  name: "Skills",
  components: {
    PenSVG,
    TrashCanSVG,
  },
  data() {
    return {
      skills: [],
    };
  },
  props: ['name', 'description'],

  async mounted() {
    const response = await axios.get("/api/skills");
    this.skills = response.data["hydra:member"];
  },

  methods: {
    async handleDeletion(skillId) {
      let response;
      response = await deleteSkill(skillId);
      console.log(response);
    const reply = await axios.get("/api/skills");
    this.skills = reply.data["hydra:member"];
    },
  }
};
</script>
