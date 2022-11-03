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
    v-on:click="handleEdition()"
    >Mettre à jour</button>
    <!-- LA MODALE CI-DESSOUS -->
    <br />
    <button @click="toggleModale()">Ouvre la modale</button>
    <modale
    :shows="shows"
    :toggleModale="toggleModale"
    :confirmAction="confirmAction"
    ></modale>
    <!-- FIN DE LA MODALE -->
  </div>
</template>

<script>
import { editSkill, fetchSkillById } from "../services/skill-service";
import Modale from "./Modale";

export default {
  name: "EditSkillForm",
  components: {
    'modale' : Modale,
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
    async handleEdition() {
      let response;
      // la ligne ci-dessous ouvre la modale
      this.toggleModale();
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
      this.skillName = response.data.name;
    },

    toggleModale() {
        this.shows = !this.shows;
      },

    confirmAction() {
      console.log('confirmAction');
    }
  },
};
</script>
