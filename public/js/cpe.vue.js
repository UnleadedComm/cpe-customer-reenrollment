Vue.use('vue-validator');

/* Create New Enrollment Store */
/********************************************/
const store = new Vuex.Store({
    state: {
        enrollment: {
            "product_id": '',
            "promotion_id": '',
            "enrollment_type": "new",
            "channel": "web",
            "vendor": "rpm",
            "agent": "Unleaded",
            "mailing_street": "",
            "mailing_city": "",
            "mailing_state": "",
            "mailing_zip": "",
            "security_passcode": "",
            "tpv_code": "",
            "language": "en",
            "signedup_at": "",
            "contacts_attributes": [{
                "contact_type": "PRIM",
                "contact_relationship": "account_holder",
                "first_name": "",
                "middle_initial": "",
                "last_name": "",
                "name_suffix": "",
                "email": "",
                "phone": ""
            }],
            "service_locations_attributes": [{
                "account_number": "",
                "account_name": "",
                "meter_number": "",
                "address_street": "",
                "address_city": "",
                "address_state": "",
                "address_zip": "",
            }]
        },
        app_is_loading: false,
        selected_service_type: '',
        options_service_type: [
            {text: "Residential", value: 'RES'},
            {text: "Small Commercial", value: 'SCOM'},
            {text: "Large Commercial", value: 'LCOM'}
        ],
        selected_utility: '',
        options_utilities: []
    },
    mutations: {

        updateZip: function(state, zip){
            state.enrollment.service_locations_attributes[0].address_zip = zip
        },
        updateUtilitiesForZip: function(state, utilities){
            state.utilities_for_zip = utilities
        },
        updateAppIsLoading: function(state, isLoading){
            state.app_is_loading = isLoading
        }


    },
    getters: {
        getZip: function(state){
            return state.enrollment.service_locations_attributes[0].address_zip
        },
        isAppLoading: function(state){
            return state.app_is_loading
        }

    }

});

/********************************************/

/* Components */
/********************************************/

const Enroll = Vue.extend({
    template: 'zip-code'
});

const Utility = Vue.extend({
    template: '<h1>Utility!</h1>'
});

/********************************************/


/* Routes */
/********************************************/
const routes = [
    { path: '/', redirect: '/enroll' },
    { path: '/enroll', component: Enroll },
    { path: '/enroll/utility', component: Utility }
];

const router = new VueRouter({ routes: routes });

/********************************************/

const app = new Vue({
    router: router,
}).$mount('#app');

