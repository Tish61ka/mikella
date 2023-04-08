import './bootstrap';
import IndexComponent from './views/main/IndexView.vue';
import router from './router';
import {createApp} from 'vue';
import store from './components/store';

createApp(IndexComponent).use(router).use(store).mount('#app');