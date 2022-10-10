<template>
  <div class="row">
    TOUTES LES COMPÉTENCES
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
    class="text-center border">
    <td
    v-text="skill.name"
    >
  </td>
  <td
    v-text="skill.description"
    >
  </td>
  <td
    v-text="skill.modificationDate"
    >
  </td>
  </tr>
  </tbody>
  </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Skills",
  data() {
    return {
      skills: [],
    };
  },
  async mounted() {
    const response = await axios.get("/api/skills");

    this.skills = response.data["hydra:member"];
  },
};
</script>
