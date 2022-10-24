import Vue from 'vue';
import App from '../pages/CreateOrEditSkill.vue';
//import App from '../components/App.vue';
//console.log("Hello");

new Vue({
    render(h) {
        return h(App, {
            props: {
            },
        });
    },
}).$mount('#createOrEditSkill');


