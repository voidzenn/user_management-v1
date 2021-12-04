require('./bootstrap');

window.Vue = require('vue').default;

import router from './routes';

Vue.component(
    'main-component',
    require('./components/Main.vue').default);

const app = new Vue({
    el: '#app',
    router,
});
