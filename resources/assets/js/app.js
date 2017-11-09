

require('./bootstrap');

// import vSelect from 'vue-select';

Vue.config.debug = true;
Vue.config.devtools = true;

const Enroll = Vue.extend(require('./components/00_ZipCode.vue'));
const AccountInformation = Vue.extend(require('./components/01_AccountInformation.vue'));
const Offers = Vue.extend(require('./components/02_Offers.vue'));
const Review = Vue.extend(require('./components/05_Review.vue'));
const Done = Vue.extend(require('./components/06_Done.vue'));

const store = require('./store.js');

const routes = [
    { path: '/', redirect: '/reenroll' },
    { path: '/reenroll', component: Enroll },
    { path: '/retail/:zip/:account', component: Enroll },
    { path: '/reenroll/account/information', component: AccountInformation },
    { path: '/reenroll/offers', component: Offers },
    { path: '/reenroll/review', component: Review },
    { path: '/reenroll/done', component: Done }  

]; 

const router = new VueRouter({ routes: routes });


const BoxesChecks = Vue.extend({
    props: ['boxIndex', 'boxName', 'boxChecked', 'boxContent'],
    template: '<div class="checkbox"><label><input type="checkbox" :value="boxIndex" :id="boxName" :checked="boxChecked" @click="changeStatus" /><span class="term">{{ boxContent }}</span></label></div>',
    methods: {
        changeStatus: function(){
            this.boxChecked = !this.boxChecked; 
        }
    }
});

Vue.component('boxes-checks', BoxesChecks);
// Vue.component('v-select', vSelect);

//Scroll to top of window before each route change
router.beforeEach((to, from, next) => {
    // window.scrollTo(0, 0);
    next();
});


const app = new Vue({
    router: router,
    store
}).$mount('#app');

