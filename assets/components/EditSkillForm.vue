<template>
  <div>
    <a href="/"><button>Retour</button></a>
    <p>ID de la compétence : {{ skillId }}</p>
    <p>Renommer la compétence : <em>{{ skillName }}</em></p>
    <input v-model="newName" placeholder="Entrez ici le nouveau nom" />
    <br />
    <p>Modifier la description : <em>{{ skillDescription }}</em></p>
    <textarea
      v-model="newDescription"
      placeholder="Entrez ici une nouvelle description"
    ></textarea>
    <br />
    <button 
    v-on:click="openModal()"
    >Mettre à jour</button>
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
