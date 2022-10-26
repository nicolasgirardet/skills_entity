<template>
  <div class="row">
    <h1>TOUTES LES COMPÉTENCES</h1>
    
    <button type="button">
      <a 
      title="Ajouter une compétence"
      href='/skills' 
        >ajouter une compétence</a
      >
    </button>
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
            <a title="Supprimer la compétence" :href="`/skills/${skill.id}`">
              <trash-can-s-v-g fill-color="#1e83a3" height="26" width="26" />
            </a>
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
};
</script>
