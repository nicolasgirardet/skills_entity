<template>
  <div>
    <a href="/"><button
      class="p-2 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm"
      >Retour</button></a>
    <p>Nom de cette nouvelle compétence* :</p>
    <input 
    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
    v-model="newName" 
    placeholder="Entrez ici le nom" />
    <br />
    <p>Saisissez une description :</p>
    <textarea
    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
      v-model="newDescription"
      placeholder="Entrez ici une description"
    ></textarea>
    <br />
    <button
    class="p-2 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm" 
    v-on:click="openModal()"
    >Ajouter</button>
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
      action: 'l\'ajout',
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
