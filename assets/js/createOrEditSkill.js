import Vue from 'vue';
import App from '../pages/CreateOrEditSkill.vue';


new Vue({
    render(h) {
        return h(App, {
            props: {
                id: parseInt(this.$el.getAttribute('data-id'), 10),
                name: this.$el.getAttribute('data-name'),
                description: this.$el.getAttribute('data-description')
            },
        });
    },
}).$mount('#createOrEditSkill');


