<template>

<div>
  <input type="text" :value="value" @input="$emit('input', $event.target.value)" placeholder="Rechercher une question du livre pour lui ajouter la compétence"></input>
  <div v-for="question in filteredList()" :key="question">
    <p>{{question}}</p>
  </div>
</div>

</template>

<script>

export default {
    name: 'QuestionSearchTool',
    props: ['questions', 'value', 'filteredList'],
    /*computed: {
    inputVal: {
      get() {
        return this.value;
      },
      set(val) {
        this.$emit('input', val);
      }
    }
  }*/
}

</script>