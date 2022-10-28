import Vue from 'vue';
import App from '../pages/EditSkill.vue';


new Vue({
    render(h) {
        return h(App, {
            props: {
                id: parseInt(this.$el.getAttribute('data-id'), 10),
                slug: this.$el.getAttribute('data-slug'),
                name: this.$el.getAttribute('data-name'),
                description: this.$el.getAttribute('data-description')
            },
        });
    },
}).$mount('#editSkill');


