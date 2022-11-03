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
    <button v-on:click="openModal()">Ajouter</button>
    <!-- LA MODALE CI-DESSOUS -->
    <modal
      :shows="shows"
      :toggleModal="toggleModal"
      :confirmAction="confirmAction"
    ></modal>
    <!-- FIN DE LA MODALE -->
  </div>
</template>

<script>
import { postSkill } from "../services/skill-service";
import Modal from "./Modal";

export default {
  name: "AddSkillForm",
  components: {
    modal: Modal,
  },
  data() {
    return {
      newName: "",
      newDescription: "",
      skill: {
        name: "",
        description: "",
      },
      shows: false,
    };
  },

  methods: {
    openModal() {
      this.toggleModal();
    },

    async confirmAction() {
      let response;
      try {
        response = await postSkill(this.newName, this.newDescription);
      } catch (e) {
        console.log(e);
      } finally {
        console.log(response.data.id);
        this.skillId = response.data.id;
        this.toggleModal();
      }
    },

    toggleModal() {
      this.shows = !this.shows;
    },
  },
};
</script>
