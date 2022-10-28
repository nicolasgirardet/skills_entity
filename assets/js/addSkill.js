import Vue from 'vue';
import App from '../pages/AddSkill.vue';


new Vue({
    render(h) {
        return h(App, {
            props: {
            },
        });
    },
}).$mount('#addSkill');


