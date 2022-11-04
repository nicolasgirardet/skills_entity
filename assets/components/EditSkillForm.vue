<template>
  <div>
    <a href="/"><button
      class="p-2 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm"
      >Retour</button></a>
    <p>ID de la compétence : {{ skillId }}</p>
    <p>Renommer la compétence* : <em>{{ skillName }}</em></p>
    <input 
    v-model="newName" 
    placeholder="Entrez ici le nouveau nom" 
    class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
    />
    <br />
    <p>Modifier la description : <em>{{ skillDescription }}</em></p>
    <textarea
      v-model="newDescription"
      placeholder="Entrez ici une nouvelle description"
      class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
    ></textarea>
    <br />
    <button 
    class="p-2 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm"
    @click="openModal()"
    >Mettre à jour</button>
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
import { editSkill, fetchSkillById } from "../services/skill-service";
import Modal from "./Modal";

export default {
  name: "EditSkillForm",
  components: {
    'modal' : Modal,
  },
  data() {
    return {
      newName: '',
      newDescription: '',
      skillId: this.id,
      skillName: this.name,
      skillDescription: this.description,
      skill: {
        name: '',
        description: ''
      },
      shows: false,
      action: 'la modification',
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

  mounted() {
    this.loadSkill(this.id);
  },

  methods: {
    openModal() {
      this.toggleModal();
    },

    async loadSkill(skillId) {
      const response = await fetchSkillById(skillId);
      this.skillName = response.data.name;
    },

    toggleModal() {
        this.shows = !this.shows;
      },

    async confirmAction() {
      let response;
      try {
        response = await editSkill(this.newName, this.newDescription, this.skillId);
      } catch (e) {
        console.log(e);
      } finally {
        console.log(response);
        
      }
      if (response) {
        this.skill = {
          name: '',
          description: ''
        },
        this.toggleModal();
      }
    }
  },
};
</script>
