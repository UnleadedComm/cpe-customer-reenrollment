//noinspection JSAnnotator
export default new Vuex.Store({
    state: {
        enrollment:
        {
            "product_id": '',
            "promotion_id": '',
            "enrollment_type": "renewal",
            "channel": "web",
            "vendor": "CenterPoint",
            "agent": "Unleaded",
            "tpv_code": "",
            "signedup_at": "",
            "account_number": "",
            "contacts_attributes": [{
                "first_name": "",
                "last_name": "",
                "email": "",
                "phone": ""
            }],
        },
        customer: {
            "id": '',
            "account_number": '',
            "account_name": '',
            "meter_number": '',
            "service_street": '',
            "service_city": '',
            "service_state": '',
            "service_zip": '',
            "segment": '',
            "url": ''
        },
        promocode: '',
        app_is_loading: false,
        available_offers: [],
        selected_offer_id: null, 
        terms: null,
        completed_enrollment:''
    },
    mutations: {

        updateCustomer(state, results){
            state.customer = results[0];
        },
        updateContactsAttributes(state, ContactsAttributes){
          state.enrollment.contacts_attributes[0] = ContactsAttributes;
        },
        updateAppIsLoading(state, isLoading){
            state.app_is_loading = isLoading;
        },
        updateOffers(state, offers){
            state.available_offers = offers;
        },
        updateSelectedOffer(state, id){
            state.selected_offer_id = id;
            state.enrollment.product_id = id;
        },
        updateTerms(state, terms){
            state.terms = terms;
        },
        updateTpvCode(state, tpv_code){
            state.enrollment.tpv_code = tpv_code;
        },
        updateCompletedEnrollment(state, completed_enrollment){

            state.completed_enrollment = completed_enrollment;
        },
        updatePromoCode(state, promoCode){
            state.promocode = promoCode;
        }
    },
    getters: {
        isAppLoading(state){
            return state.app_is_loading;
        },
        getCurrentCustomer(state){
            return state.customer;
        },
        getOffers(state){
            return state.available_offers;
        },
        getSelectedPlanId(state){
            return state.selected_offer_id;
        },
        getAvailableOffers(state){
            return state.available_offers;
        },
        getTerms(state){
            return state.terms;
        },
        getEnrollment(state){
            return state.enrollment;
        },
        updateTpvCode(state, tpv_code){
            state.enrollment.tpv_code = tpv_code;
        },
        getCompletedEnrollment(state){
            return state.completed_enrollment;
        },
        getPromoCode(state){
            return state.promocode;
        }
    }
});
