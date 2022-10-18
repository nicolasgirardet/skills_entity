import Vue from 'vue';
import App from '../components/CreateOrEditSkill.vue';
//import App from '../components/App.vue';
//console.log("Hello");

new Vue({
    render(h) {
        return h(App, {
            props: {
                //skillToEdit: JSON.parse(this.$el.getAttribute('data-skill-encoded')),
            },
        });
    },
}).$mount('#createOrEditSkill');
