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
    <button v-on:click="handleEdition()">Mettre à jour</button>
    <Modal></Modal>
  </div>
</template>

<script>
import { editSkill, fetchSkillById } from "../services/skill-service";
import Modal from './GenericModal.vue'

export default {
  name: "EditSkillForm",
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
      title: "ce titre est un exemple",
    };
  },

  components: {
    Modal,
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
        },
        //hereunder my version
        title: {
            type: String,
            required: true,
        },
        containerStyling: {
            type: String,
            default: 'flex flex-col md:flex-row items-center md:space-x-5 md:px-5 md:pb-5',
            required: false,
        },
        isEmittingEventToParent: {
            type: Boolean,
            default: true,
            required: false,
        },

  },

  mounted() {
    this.loadSkill(this.id);
  },

  methods: {
    async handleEdition() {
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
        }
      }
    },

    async loadSkill(skillId) {
      const response = await fetchSkillById(skillId);
      //let tarte = response.data.name;
      //console.log(tarte);
      this.skillName = response.data.name;
    }
  },
};
</script>

<style>

</style>
