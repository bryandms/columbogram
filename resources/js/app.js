
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import store from './store';

Vue.use(BootstrapVue);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('columbogram-component', require('./components/ColumbogramComponent.vue'));
Vue.component('contact-component', require('./components/ContactComponent.vue'));
Vue.component('contact-list-component', require('./components/ContactListComponent.vue'));
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue'));
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue'));
Vue.component('status-component', require('./components/StatusComponent.vue'));
Vue.component('profile-component', require('./components/ProfileComponent.vue'));
Vue.component('contact-form-component', require('./components/ContactFormComponent.vue'));

const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout() {
            document.getElementById('logout-form').submit();
        }
    }
});
