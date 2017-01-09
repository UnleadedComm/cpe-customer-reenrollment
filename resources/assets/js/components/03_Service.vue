<template>

        <div class="container enrollment service">


            <div class="row">
                <div class="col-md-3">
                    <p class="font-size-12 text-uppercase"><span class="orange">ZIP Code: </span><span class="black font-weight-600">{{ this.$store.getters.getZip }}</span></p>
                </div>
                <div class="col-md-3 pull-right text-right">
                    <p class="font-size-12 font-weight-600"><a href="#">Need Help?</a></p>
                </div>
            </div>

            <!-- Enrollment Navigation -->
            <div class="row breadcrumb text-center">
                <div class="col col-md-4 active">
                    <p>Account Information</p>
                    <i class="fa fa-sort-desc fa-2x" aria-hidden="true"></i>
                </div>
                <div class="col col-md-4 bordered">
                    <p>Contact Information</p>
                </div>
                <div class="col col-md-4">
                    <p>Plan Review</p>
                </div>
            </div>
            <!-- END -->

            <!-- Section Heading -->
            <div class="row section-heading margin-top-40 margin-bottom-20">
                <div class="col-md-6">
                    <h4 class="font-size-20 text-uppercase display-inline"><span class="badge font-size-20 display-inline">1</span> Service Location</h4>
                </div>
            </div>
            <!-- END -->


            <div class="row service-location">
                <div class="col-md-12">

                    <form v-on:submit.prevent="validate">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.account_name.$valid }">
                                    <label for="account_name">Account name (as stated on utility bill)*</label>
                                    <input v-model="account_name" type="text" class="form-control" id="account_name" name="account_name" placeholder="">


                                        <span v-show="verify.$dirty && verify.account_name.required" class="error control-label" >Your account name is required.</span>
                                        <span v-show="verify.$dirty && verify.account_name.blank" class="error control-label" >Your account name is required.</span>

                                </div>
                            </div>
                            <div v-bind:class="{ 'col-md-3': is_meter_required, 'col-md-6': !is_meter_required }">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.account_number.$valid }">
                                    <label for="account_number">{{ account_number_label }} number*</label>
                                    <input v-model="account_number" type="text" class="form-control" id="account_number" name="account_number" placeholder="">

                                        <span v-show="verify.$dirty && verify.account_number.required" class="error control-label" >Your account number is required.</span>
                                        <span v-show="verify.$dirty && verify.account_number.blank" class="error control-label" >Your account number is required.</span>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div v-if="is_meter_required" class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.meter_number.$valid }">
                                    <label for="meter_number">Meter number*</label>
                                    <input v-model="meter_number" type="text" class="form-control" id="meter_number" name="meter_number" placeholder="">
                                    <span v-show="verify.$dirty && verify.meter_number.required" class="error control-label" >Your meter number is required.</span>
                                    <span v-show="verify.$dirty && verify.meter_number.blank" class="error control-label" >Your meter number is required.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.address_street.$valid }">
                                    <label for="address_street">Street address*</label>
                                    <input v-model="address_street" type="text" class="form-control" id="address_street" name="address_street" placeholder="">
                                    <span v-show="verify.$dirty && verify.address_street.required" class="error control-label" >Your service street address.</span>
                                    <span v-show="verify.$dirty && verify.address_street.blank" class="error control-label" >Your service street address.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.address_city.$valid }">
                                    <label for="address_city">City*</label>
                                    <input v-model="address_city" type="text" class="form-control" id="address_city" name="address_city" placeholder="">
                                    <span v-show="verify.$dirty && verify.address_city.required" class="error control-label" >Your service city is required.</span>
                                    <span v-show="verify.$dirty && verify.address_city.blank" class="error control-label" >Your service city is required.</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.address_state.$valid }">
                                    <label for="address_state">State*</label>
                                    <div class="select-style">
                                        <select v-model="address_state" class="form-control" name="address_state" id="address_state" disabled>
                                            <option v-for="state in state_options" v-bind:value="state.abbreviation">{{ state.name }}</option>
                                        </select>
                                    </div>
                                    <span v-show="verify.$dirty && verify.address_state.required" class="error control-label" >Your service state is required.</span>
                                    <span v-show="verify.$dirty && verify.address_state.blank" class="error control-label" >Your service state is required.</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.address_zip.$valid }">
                                    <label for="address_zip">ZIP*</label>
                                    <input v-model="address_zip" type="text" maxlength="5" class="form-control" id="address_zip" name="address_zip" placeholder="" disabled>
                                    <span v-show="verify.$dirty && verify.address_zip.required" class="error control-label" >Service ZIP  is required.</span>
                                    <span v-show="verify.$dirty && verify.address_zip.blank" class="error control-label" >Service ZIP is required.</span>
                                </div>
                            </div>
                        </div>

                        <hr class="margin-top-25 margin-bottom-25" />

                        <!-- Section Heading -->
                        <div class="row section-heading margin-top-40 margin-bottom-20">
                            <div class="col-md-6">
                                <h4 class="font-size-20 text-uppercase display-inline"><span class="badge font-size-20 display-inline">2</span> Mailing Address</h4>
                            </div>
                            <div class="col-md-5 pull-right text-right">
                                <div class="checkbox">
                                    <label>
                                        <input v-model="same_as" name="same_as" id="same_as" type="checkbox"> Check if mailing address is the same as service location.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- END -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.mailing_street.$valid }">
                                    <label for="mailing_street">Street address*</label>
                                    <input v-model="mailing_street" type="text" class="form-control" id="mailing_street" name="mailing_street" placeholder="">
                                    <span v-show="verify.$dirty && verify.mailing_street.required" class="error control-label" >Your street address is required.</span>
                                    <span v-show="verify.$dirty && verify.mailing_street.blank" class="error control-label" >Your street address is required.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.mailing_city.$valid }">
                                    <label for="mailing_city">City*</label>
                                    <input v-model="mailing_city" type="text" class="form-control" id="mailing_city" name="mailing_city" placeholder="">
                                    <span v-show="verify.$dirty && verify.mailing_city.required" class="error control-label" >Your mailing city is required.</span>
                                    <span v-show="verify.$dirty && verify.mailing_city.blank" class="error control-label" >Your mailing city is required.</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.mailing_state.$valid }">
                                    <label for="mailing_state">State*</label>
                                    <div class="select-style">
                                        <select  v-model="mailing_state" class="form-control" name="mailing_state" id="mailing_state">
                                            <option v-for="state in state_options" v-bind:value="state.abbreviation">{{ state.name }}</option>
                                        </select>
                                    </div>
                                    <span v-show="verify.$dirty && verify.mailing_state.required" class="error control-label" >Your mailing state is required.</span>
                                    <span v-show="verify.$dirty && verify.mailing_state.blank" class="error control-label" >Your mailing state is required.</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.mailing_zip.$valid }">
                                    <label for="mailing_zip">ZIP*</label>
                                    <input v-model="mailing_zip" type="text" maxlength="5" class="form-control" id="mailing_zip" name="mailing_zip" placeholder="">
                                    <span v-show="verify.$dirty && verify.mailing_zip.required" class="error control-label" >Your mailing zip is required.</span>
                                    <span v-show="verify.$dirty && verify.mailing_zip.blank" class="error control-label" >Your mailing zip is required.</span>
                                </div>
                             </div>
                        </div>

                        <div class="row form-group margin-top-40 margin-bottom-40">
                            <div class="col-md-12">
                                <button v-on:click="$router.push({ path: '/enroll/offers' })" type="button" class="btn btn-primary btn-cpe large pull-left">Back <i class="fa fa-angle-left fa-2x pull-left" aria-hidden="true"></i></button>
                                <button type="submit" class="btn btn-primary btn-cpe large pull-right">Next <i class="fa fa-angle-right fa-2x pull-right" aria-hidden="true"></i></button>
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
        name: 'Service-Location',
        methods: {
            updateZip(e){
                this.$store.commit('updateZip', e.target.value);
            },
            updateUtilitiesForZip(utilities){
                this.$store.commit('updateUtilitiesForZip', utilities);
            },
            validate(e){

                this.verify.$dirty = true;

                if(this.verify.$valid){

                    console.log('Form validated!');

                    e.preventDefault();

                    var AccountInformation = {
                        account_name: this.account_name,
                        account_number: this.account_number,
                        meter_number: this.meter_number,
                        address_street: this.address_street,
                        address_city: this.address_city,
                        address_state: this.address_state,
                        address_zip: this.address_zip,
                        mailing_street: this.mailing_street,
                        mailing_city: this.mailing_city,
                        mailing_state: this.mailing_state,
                        mailing_zip: this.mailing_zip
                    }


                    this.$store.commit('updateAccountInformation', AccountInformation);

                    this.$router.push({ path: '/enroll/contact/information' });


                }//END if


            },
            appLoading(isLoading){
                this.$store.commit('updateAppIsLoading', isLoading);
            }

        },
        computed: {
            getZip(){
                return this.$store.getters.getZip
            },
            isAppLoading(){
                return this.$store.getters.isAppLoading
            }
        },
        data(){
            return {
                account_name: '',
                account_number: '',
                meter_number: '',
                address_street: '',
                address_city: '',
                address_state: undefined,
                address_zip: '',
                mailing_street: '',
                mailing_city: '',
                mailing_state: undefined,
                mailing_zip: '',
                same_as: false,
                state_options: undefined,
                is_meter_required: false,
                account_number_label: 'Utility account number'

            }
        },
        created: function(){

            console.log('Service Component created.');

            //Get Account Number Label
            this.account_number_label = this.$store.getters.getAccountNumberLabel;

            var currentAccountInformation = this.$store.getters.getAccountInformation;

            this.account_name = currentAccountInformation.account_name;
            this.account_number = currentAccountInformation.account_number;
            this.meter_number = currentAccountInformation.meter_number;
            this.address_street = currentAccountInformation.address_street;
            this.address_city = currentAccountInformation.address_city;
            this.address_state = currentAccountInformation.address_state;
            this.address_zip = currentAccountInformation.address_zip;
            this.mailing_street = currentAccountInformation.mailing_street;
            this.mailing_state = currentAccountInformation.mailing_state;
            this.mailing_zip = currentAccountInformation.mailing_zip;
            this.mailing_city = currentAccountInformation.mailing_city;

            this.state_options = this.$store.getters.getStateOptions;

            /* Setup Validation Rules */
            var isMeterNumberRequired = this.$store.getters.isMeterNumberRequired;

            this.is_meter_required = isMeterNumberRequired;

            var rules = {
                account_name: {
                    required: true,
                    blank: true
                },
                account_number: {
                    required: true,
                    blank: true
                },
                address_street: {
                    required: true,
                    blank: true
                },
                address_city: {
                    required: true,
                    blank: true
                },
                address_state: {
                    required: true,
                    blank: true
                },
                address_zip: {
                    required: true,
                    blank: true
                },
                mailing_street: {
                    required: true,
                    blank: true
                },
                mailing_city: {
                    required: true,
                    blank: true
                },
                mailing_state: {
                    required: true,
                    blank: true
                },
                mailing_zip: {
                    required: true,
                    blank: true
                }


            };

            if(isMeterNumberRequired){

                rules.meter_number = {
                    required: true,
                    blank: true
                };

            }

            this.$verify(rules);

            window.scrollTo(0, 0);

        },
        watch: {
            same_as: function(){

                if(this.same_as){

                    this.mailing_street = this.address_street;
                    this.mailing_city = this.address_city;
                    this.mailing_state = this.address_state;
                    this.mailing_zip = this.address_zip;

                } else {

                    this.mailing_street = "";
                    this.mailing_city = "";
                    this.mailing_state = "";
                    this.mailing_zip = "";

                }

            }
        }
    }
</script>
