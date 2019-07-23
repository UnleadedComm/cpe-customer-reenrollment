<template>

    <div class="container enrollment service">


        <!-- Offer Heading -->
        <div class="row  margin-bottom-10 heading">
            <div class="col-md-2 col-lg-1 text-center mb-4">

                <i class="fa fa-account-info fa-3x cpe rounded" aria-hidden="true"></i>

            </div>

            <div class="col-md-8 pl-md-0 col-lg-9 pl-lg-4">
                <h4 class="margin-top-0 font-size-20">ACCOUNT INFORMATION</h4>
                <p class="font-size-14">Please verify the service information for this account. A valid phone number and email are required to complete online re-enrollment. If any information is incorrect, please call customer care at 888-200-3788 to complete your re-enrollment.</p>
            </div>

            <div class="col-md-2 pull-right text-right">
                <p class="font-size-12 font-weight-600"><a href="http://www.centerpointenergyretail.com/contact">Need Help?</a></p>
            </div>

        </div>
        <!-- END -->




        <div class="row service-location">
            <div class="col-md-12">

                <form v-on:submit.prevent="validate">
                    <div class="row">
                        <div class="col-md-4">

                            <div class="form-group">
                                <label for="account_name">Account name (as stated on utility bill)*</label>
                                <input v-model="customer.account_name" type="text" class="form-control" id="account_name" name="account_name" placeholder="" disabled>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="account_number">Account number*</label>
                                <input v-model="customer.account_number" type="text" class="form-control" id="account_number" name="account_number" placeholder="" disabled>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="meter_number">Meter number*</label>
                                <input v-model="customer.meter_number" type="text" class="form-control" id="meter_number" name="meter_number" placeholder="" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.first_name.$valid }">
                            <div class="form-group">
                                <label for="service_street">Contact First Name*</label>
                                <input v-model="first_name" type="text" class="form-control" id="first_name" name="first_name" placeholder="" >
                                <p v-show="verify.$dirty && verify.first_name.required" class="text-danger control-label margin-top-10" >Your contact first name is required.</p>
                                <p v-show="verify.$dirty && verify.first_name.blank" class="text-danger control-label margin-top-10" >Your contact first name is required.</p>
                            </div>
                        </div>
                        <div class="col-md-6" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.last_name.$valid }">
                            <div class="form-group">
                                <label for="service_street">Contact Last Name*</label>
                                <input v-model="last_name" type="text" class="form-control" id="last_name" name="last_name" placeholder="" >
                                <p v-show="verify.$dirty && verify.last_name.required" class="text-danger control-label margin-top-10" >Your contact last name is required.</p>
                                <p v-show="verify.$dirty && verify.last_name.blank" class="text-danger control-label margin-top-10" >Your contact last name is required.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_street">Service Street Address*</label>
                                <input v-model="customer.service_street" type="text" class="form-control" id="service_street" name="service_street" placeholder="" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="service_city">City*</label>
                                <input v-model="customer.service_city" type="text" class="form-control" id="service_city" name="service_city" placeholder="" disabled>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="service_state">State*</label>
                                <input v-model="customer.service_state" type="text" maxlength="5" class="form-control" id="service_state" name="service_state" placeholder="" disabled>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="service_zip">ZIP*</label>
                                <input v-model="customer.service_zip" type="text" maxlength="5" class="form-control" id="service_zip" name="service_zip" placeholder="" disabled>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.phone.$valid }">
                            <div class="form-group">
                                <label for="phone">Phone*</label>
                                <input v-model="phone" data-masked-input="999-999-9999" type="text" class="form-control" id="phone" name="phone" placeholder="">
                                <p v-show="verify.$dirty && verify.phone.required" class="text-danger control-label margin-top-10" >Your phone number is required.</p>
                                <p v-show="verify.$dirty && verify.phone.blank" class="text-danger control-label margin-top-10" >Your phone number is required.</p>
                                <p v-show="verify.$dirty && verify.phone.phone" class="text-danger control-label margin-top-10" >Please provide a valid 10-digit phone number.</p>
                            </div>
                        </div>

                        <div class="col-md-6" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.email.$valid }">
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input v-model="email" type="text" class="form-control" id="email" name="email" placeholder="">
                                <p v-show="verify.$dirty && verify.email.required" class="error control-label text-danger" >Your e-mail address is required.</p>
                                <p v-show="verify.$dirty && verify.email.email" class="error control-label text-danger" >Please provide a valid e-mail address.</p>
                            </div>
                        </div>
                    </div>



                    <div class="row form-group margin-top-40 margin-bottom-40">
                        <div class="col-md-12">
                            <button v-on:click="$router.push({ path: '/reenroll' })" type="button" class="btn btn-primary btn-cpe large pull-left">Back <i class="fa fa-angle-left fa-2x pull-left" aria-hidden="true"></i></button>
                            <button v-show="!isAppLoading" type="submit" class="btn btn-primary btn-cpe large pull-right">Next <i class="fa fa-angle-right fa-2x pull-right" aria-hidden="true"></i></button>
                            <button v-show="isAppLoading" type="button" class="btn btn-primary btn-cpe large pull-right">Loading <i class="fa fa-circle-o-notch fa-spin pull-right" aria-hidden="true"></i></button>
                        </div>
                    </div>

                </form>




            </div>
        </div>



    </div>

</template>

<script>

    import { mapGetters, mapActions } from 'vuex';



    export default {
        name: 'Account-Information',
        methods: {
            validate(e){


                if(this.selected_offer_id != null){
                    var _self = this;0
                    _self.appLoading(true);
                    var ContactsAttributes = {first_name: this.first_name, last_name: this.last_name, email: this.email, phone: this.phone};
                    this.$store.commit('updateContactsAttributes', ContactsAttributes);

                    setTimeout(function () {
                        _self.appLoading(false);
                        _self.$router.push({path: '/reenroll/review'});
                    }, 800);


                } else {


                    var _self = this;

                    this.verify.$dirty = true;

                    if (this.verify.$valid) {

                        console.log('Form validated!');
                        _self.appLoading(true);
                        e.preventDefault();

                        var ContactsAttributes = {first_name: this.first_name, last_name: this.last_name, email: this.email, phone: this.phone};
                        this.$store.commit('updateContactsAttributes', ContactsAttributes);

                        Vue.http.get('/reenroll/products/' + this.customer.service_zip + '/' + this.customer.segment + '/' + this.customer.utility_id + '/' + this.getPromoCode).then((response) => {

                            var results = response.json();
                            this.offer_count = response.json().length;

                            console.log(results);

                            if(this.offer_count == 0 && this.promocode) {

                                this.getDefaultOffers();

                            } else {

                                _self.$store.commit('updateOffers', results);

                                setTimeout(function () {
                                    _self.appLoading(false);
                                    _self.$router.push({path: '/reenroll/offers'});
                                }, 1200);

                            }

                        },(response) =>
                        {


                        });


                    }//END if

                }

            },
            getDefaultOffers() {

                var _self = this;

                Vue.http.get('/reenroll/products/' + this.customer.service_zip + '/' + this.customer.segment + '/' + this.customer.utility_id).then((response) => {

                    var results = response.json();
                    this.offer_count = response.json().length;

                    console.log(results);

                    _self.$store.commit('updateOffers', results);
                    _self.$store.commit('updatePromoCodeStatus', true);
                    _self.$store.commit('updatePromoCode', '');

                    setTimeout(function () {
                        _self.appLoading(false);
                        _self.$router.push({path: '/reenroll/offers'});
                    }, 1200);



                },(response) =>
                {


                });
            },
            appLoading(isLoading){
                this.$store.commit('updateAppIsLoading', isLoading);
            }

        },
        computed: {
            isAppLoading(){
                return this.$store.getters.isAppLoading
            },
            getPromoCode(state) {
                return this.$store.getters.getPromoCode
            }
        },
        data(){
            return {
                customer: {
                    account_name: '',
                    account_number: '',
                    id: '',
                    meter_number: '',
                    segment: '',
                    service_street: '',
                    service_city: '',
                    service_state: '',
                    service_zip: '',
                    url: ''
                },
                first_name: '',
                last_name: '',
                phone: '',
                email: '',
                selected_offer_id: null,
                enrollment: '',
                promocode: '',
                offer_count: ''
            }
        },
        created: function(){


            var customer = this.$store.getters.getCurrentCustomer;
            this.enrollment = this.$store.getters.getEnrollment;

            this.phone = this.enrollment.contacts_attributes[0].phone;
            this.email = this.enrollment.contacts_attributes[0].email;


            this.selected_offer_id = this.$store.getters.getSelectedPlanId;

            this.customer = customer;

            var rules = {
                email: {
                    required: true,
                    blank: true,
                    email: true
                },
                phone: {
                    required: true,
                    blank: true,
                    phone: true
                },
                first_name: {
                    required: true,
                    blank: true
                },
                last_name: {
                    required: true,
                    blank: true
                }
            };

            this.$verify(rules);


            window.scrollTo(0, 0);

        },
        mounted: function(){

            this.promocode = this.getPromoCode;

        },
        watch: {

        }
    }
</script>
