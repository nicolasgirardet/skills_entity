<template>
  <div class="row">
    <h1
      class="font-black font-montserrat uppercase italic px-4 text-center text-tualuBlue md:text-xl"
    >
      TOUTES LES COMPÉTENCES
    </h1>

    <a title="Ajouter une compétence" href="/add_skill"
      ><button
        class="p-3 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center uppercase font-montserrat rounded font-bold border-2 text-sm"
        type="button"
      >
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
        <tr v-for="skill in skills" :key="skill.id" class="text-center border">
          <td v-text="skill.name"></td>
          <td v-text="skill.description"></td>
          <td v-text="skill.modificationDate"></td>
          <td class="flex justify-center py-4">
            <a title="Éditer la compétence" :href="`/skills/${skill.slug}`">
              <pen-s-v-g fill-color="#1e83a3" height="29" width="29" />
            </a>
            <button
              v-on:click="openModal(skill.id)"
              title="Supprimer la compétence"
            >
              <trash-can-s-v-g fill-color="#ee0000" height="22" width="22" />
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  <!-- LA MODALE CI-DESSOUS -->
  <modal
      :shows="shows"
      :action="action"
      :toggleModal="toggleModal"
      :confirmAction="confirmAction"
    ></modal>
    <!-- FIN DE LA MODALE -->
  </div>
</template>

<script>
import axios from "axios";
import PenSVG from "../components/PenSVG";
import TrashCanSVG from "./TrashCanSVG.vue";
import { deleteSkill } from "../services/skill-service";
import Modal from "./Modal";

export default {
  name: "Skills",
  components: {
    PenSVG,
    TrashCanSVG,
    modal: Modal,
  },
  data() {
    return {
      skills: [],
      shows: false,
      action: "la suppression",
      selectSkill: "",
    };
  },
  props: ["name", "description"],

  async created() {
    const response = await axios.get("/api/skills");
    this.skills = response.data["hydra:member"];
  },

  methods: {
    setDeleteDialog(skillId) {
      this.selectSkill = skillId;
    },

    openModal(skillId) {
      this.setDeleteDialog(skillId);
      this.toggleModal();
    },

    toggleModal() {
      this.shows = !this.shows;
    },

    async confirmAction() {
      let response;
      try {
        console.log(this.selectSkill);
        response = await deleteSkill(this.selectSkill);
      } catch (e) {
        console.log(e);
      } finally {
        console.log(response);
      }
      if (response) {
        this.toggleModal();
        const reply = await axios.get("/api/skills");
        this.skills = reply.data["hydra:member"];
      }
    },
  },
};
</script>
