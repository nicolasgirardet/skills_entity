<template>
  <div>
    <a href="/"
      ><button
        class="p-2 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm"
      >
        Retour
      </button></a
    >
    <p>ID de la compétence : {{ skillId }}</p>
    <p>
      Renommer la compétence* : <em>{{ skillName }}</em>
    </p>
    <input
      v-model="newName"
      placeholder="Entrez ici le nouveau nom"
      class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
    />
    <br />
    <p>
      Modifier la description : <em>{{ skillDescription }}</em>
    </p>
    <textarea
      v-model="newDescription"
      placeholder="Entrez ici une nouvelle description"
      class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
    ></textarea>
    <br />
    <h2>Titre du livre ayant la compétence</h2>
    <br />
    <div v-if="books[0] != null">
      <b>{{ books[0].title }}</b>
      <div v-for="question in books[0].question">
        - {{ question.intitule }}
      </div>
    </div>
    <div v-if="books[1] != null">
      <b>{{ books[1].title }}</b>
      <div v-for="question in books[1].question">
        - {{ question.intitule }}
      </div>
    </div>
    <div v-if="books[2] != null">
      <b>{{ books[2].title }}</b>
      <div v-for="question in books[2].question">
        - {{ question.intitule }}
      </div>
    </div>
    <div v-if="books[3] != null">
      <b>{{ books[3].title }}</b>
      <div v-for="question in books[3].question">
        - {{ question.intitule }}
      </div>
    </div>
    <div v-if="books[4] != null">
      <b>{{ books[4].title }}</b>
      <div v-if="books[4] != null" v-for="question in books[4].question">
        - {{ question.intitule }}
      </div>
    </div>
   <br/>
    

    <button
      class="p-2 flex items-center border-tualuBlue hover:text-white hover:bg-tualuBlue text-tualuBlue cursor-pointer text-center font-montserrat rounded font-bold border-2 text-sm"
      @click="openModal()"
    >
      Mettre à jour
    </button>
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
    modal: Modal,
  },
  data() {
    return {
      newName: "",
      newDescription: "",
      skillId: this.id,
      skillName: this.name,
      skillDescription: this.description,
      skill: {
        name: "",
        description: "",
      },
      shows: false,
      action: "la modification",
      books: {},
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
    },
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
      this.books = response.data.book;
    },

    toggleModal() {
      this.shows = !this.shows;
    },

    async confirmAction() {
      let response;
      try {
        response = await editSkill(
          this.newName,
          this.newDescription,
          this.skillId
        );
      } catch (e) {
        console.log(e);
      } finally {
        console.log(response);
      }
      if (response) {
        (this.skill = {
          name: "",
          description: "",
        }),
          this.toggleModal();
      }
    },
  },
};
</script>
