import Vue from 'vue'
import App from '../pages/App.vue'

new Vue({ 
    render(h) {
        return h(App, {
            props: {
            },
        });
    },
}).$mount('#all-skills')