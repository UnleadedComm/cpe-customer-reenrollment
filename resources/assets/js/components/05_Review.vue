<template>

        <div class="container enrollment offers review">


            <!-- Offer Heading -->
            <div class="row margin-bottom-10 heading">
                <div class="col-md-1 text-center">

                    <i class="fa fa-gas fa-3x cpe rounded" aria-hidden="true"></i>

                </div>

                <div class="col-md-6">
                    <h4 class="margin-top-0 font-size-20">PLAN REVIEW</h4>
                    <p class="font-size-14">Great, we’re almost done. Here are all the details of your plan and account. Please review and complete the electronic signature to complete re-enrollment.</p>
                </div>

                <div class="col-md-4 pull-right text-right">
                    <p class="text-uppercase font-size-12 font-weight-300 orange">OFFER FOR ACCOUNT NUMBER: <span class="black display-block font-weight-600">{{ customer.account_number }}</span></p>
                    <p class="font-size-12 font-weight-600"><a href="http://www.centerpointenergyretail.com/contact">Need Help?</a></p>
                </div>

            </div>
            <!-- END -->

            <!-- Offers -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover text-center offers-listing">
                        <thead>
                        <tr>
                            <th class="text-left padding-left-25 product-name">Featured Product</th>
                            <th class="text-center">Term</th>
                            <th class="text-center">Features</th>
                            <th class="text-center">Rate</th>

                        </tr>
                        </thead>
                        <tbody>
                        <!-- Offer -->
                        <tr data-toggle="collapse" data-target=".demo1" class="accordion-toggle">
                            <td class="text-left">
                                <div class="row vertical-align">
                                    <i class="fa fa-4x col-md-3 col-md-offset-1 offer-icon" aria-hidden="true"><img v-bind:src="'http://cpedev2.centerpointenergyretail.com/images/offer_' + offer.price_type + '.png'"></i>
                                    <div class="col-md-8">
                                        <h5 class="font-size-14 margin-top-0 margin-bottom-5 font-weight-600">{{ offer.name }}</h5>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <template v-if="offer.term_months">
                                    <span class="display-block font-size-16 font-weight-600">{{ offer.term_months }}</span>
                                    <span class="display-block font-size-16 font-weight-600 text-uppercase">Months</span>
                                </template>

                                <template v-if="!offer.term_months">
                                    <span class="display-block font-size-16 font-weight-600 text-uppercase">Thru</span>
                                    <span class="display-block font-size-16 font-weight-600">{{ formatDate(offer.term_end_date) }}</span>
                                </template>

                            </td>
                            <td>
                                <span class="display-block font-size-16 font-weight-600 text-uppercase">{{ offer.price_type }}</span>
                                <span class="display-block font-size-12 font-weight-600"><a href="javascript: void(0)">See Details</a></span>
                            </td>
                            <td>
                                <span class="display-block font-size-30 font-weight-600 text-uppercase price">${{ offer.latest_price }}</span>
                                <span class="display-block font-size-16 font-weight-300 unit">per {{ offer.price_units }}</span>
                            </td>


                        </tr>

                        <!-- Details -->
                        <tr class="text-left details">
                            <td colspan="1" class="hidden-row">
                                <div class="accordian-body collapse demo1">
                                    <ul>
                                        <li><label>End Date: </label> {{ formatDate(offer.term_end_date) }}</li>
                                        <li><label>Early Termination Fee:</label> ${{ offer.etf_amount }}0</li>
                                        <li><label>Terms & Conditions:</label> <a v-bind:href="offer.contract_url" target="_blank">Download</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td colspan="4" class="hidden-row">
                                <div class="accordian-body collapse demo1">
                                    <ul style="padding-left: 0px;">
                                        <li><h5 class="font-size-14 margin-top-0 margin-bottom-5 font-weight-600">Product Details</h5></li>
                                        <li class="font-size-12">{{ offer.description }}</li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <!-- END -->
                        <!-- END -->





                        </tbody>
                    </table>
                </div>
            </div>

            <hr />

            <!-- Section Heading -->
            <div class="row section-heading margin-top-40 margin-bottom-20">
                <div class="col-md-6">
                    <h4 class="font-size-20 text-uppercase display-inline"><span class="badge font-size-20 display-inline">1</span> Account Information</h4>
                </div>
            </div>
            <!-- END -->

            <div class="row attributes margin-top-30">
                <div class="col-md-6">
                    <p><label>Customer Type: </label> {{ customer.segment }} </p>
                    <p><label>Account Name: </label> {{ customer.account_name }}</p>
                    <p><label>Contact First Name: </label> {{ enrollment.contacts_attributes[0].first_name }}</p>
                    <p><label>Contact Last Name: </label> {{ enrollment.contacts_attributes[0].last_name }}</p>
                    <p><label>Account Number: </label> {{ customer.account_number }}</p>
                    <p v-if="customer.meter_number"><label>Meter Number: </label> {{ customer.meter_number }}</p>
                </div>
                <div class="col-md-6">
                    <p><label>Service Address: </label> {{ customer.service_street }}</p>
                    <p><label>City/State/ZIP: </label> {{ customer.service_city }}, {{ customer.service_state }} {{ customer.service_zip }}</p>
                    <p class="margin-top-20"><label>Phone: </label> {{ enrollment.contacts_attributes[0].phone }} <a class="text-uppercase" v-on:click="$router.push({ path: '/reenroll/account/information' })" href="javascript:void(0)">(Edit)</a></p>
                    <p><label>Email: </label> {{ enrollment.contacts_attributes[0].email }} <a class="text-uppercase" v-on:click="$router.push({ path: '/reenroll/account/information' })" href="javascript:void(0)">(Edit)</a></p>
                </div>
            </div>


            <hr />

            <!-- Section Heading -->
            <div class="row section-heading margin-top-40 margin-bottom-30">
                <div class="col-md-6">
                    <h4 class="font-size-20 text-uppercase display-inline"><span class="badge font-size-20 display-inline">2</span> Terms And Conditions</h4>
                </div>
            </div>
            <!-- END -->

            <div class="form-group display-block margin-bottom-40">
                <span v-show="verify.$dirty && verify.checkedTerms.required" class="error control-label text-danger" >You must agree to the terms below to continue.</span>
                <span v-show="verify.$dirty && verify.checkedTerms.minLength" class="error control-label text-danger" >You must agree to all terms to continue.</span>
                <template v-for="term in terms">
                    <div class="checkbox">
                        <label>
                            <input v-model="checkedTerms" v-bind:value="term.id" type="checkbox">
                            <span class="term">{{ term.content }}</span>
                        </label>
                    </div>
                </template>

            </div>


            <hr />

            <form v-on:submit.prevent="validate">

            <!-- Section Heading -->
            <div class="row section-heading margin-top-40 margin-bottom-30">
                <div class="col-md-12">
                    <h4 class="font-size-20 text-uppercase display-inline"><span class="badge font-size-20 display-inline">3</span> VERIFICATION AND ELECTRONIC SIGNATURE</h4>
                </div>
            </div>
            <!-- END -->

            <div class="row">
                <div class="col-md-4">
                    <p>Choose a 4-digit verification PIN. This PIN wlll serve as your electronic signature.</p>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.tpv_code.$valid }">
                    <label class="font-weight-100" for="tpv_code">Verification PIN*</label>
                    <input v-model="tpv_code" maxlength="4" type="text" class="form-control" id="tpv_code" name="tpv_code" placeholder="">
                    <span v-show="verify.$dirty && verify.tpv_code.required" class="error control-label" >Please provide a 4-digit verification PIN.</span>
                    <span v-show="verify.$dirty && verify.tpv_code.minLength" class="error control-label" >Verification PIN must be 4 digits.</span>



                </div>
            </div>

           <div class="row">
               <div class="col-md-12">
                   <span v-for="(error,index) in enrollment_errors" class="error control-label text-danger">
                        {{ error }}
                    </span>
               </div>
           </div>


            <div class="row form-group margin-top-40 margin-bottom-40">
                <div class="col-md-12">
                    <button v-on:click="$router.push({ path: '/reenroll/offers' })" type="button" class="btn btn-primary btn-cpe large pull-left">Back <i class="fa fa-angle-left fa-2x pull-left" aria-hidden="true"></i></button>
                    <button v-show="!isAppLoading" type="submit" class="btn btn-primary btn-cpe large pull-right">Agree and Enroll <i class="fa fa-angle-right fa-2x pull-right" aria-hidden="true"></i></button>
                    <button v-show="isAppLoading" type="button" class="btn btn-primary btn-cpe large pull-right">Loading <i class="fa fa-circle-o-notch fa-spin pull-right" aria-hidden="true"></i></button>
                </div>
            </div>

            </form>

        </div>

</template>

<script>

    import { mapGetters, mapActions } from 'vuex';



    export default {
        name: 'Review',
        methods: {
            formatDate(date){

                return moment(date).format('M-DD-YYYY');

            },
            validate(e){

                this.verify.$dirty = true;
                var _self = this;

                if(this.verify.$valid){

                    _self.appLoading(true);

                    this.enrollment.tpv_code = this.tpv_code;

                    /* Adjust Enrollment for Phone */
                    /******************************************************/
                    var adjustedEnrollment = this.enrollment;
                    _.forEach(adjustedEnrollment.contacts_attributes, function(value, key){
                        value.phone = value.phone.replace('-', '');
                    });
                    /******************************************************/


                    Vue.http.post('/reenroll/complete', { enrollment: adjustedEnrollment }).then((response) => {
                        console.log(response.data);
                        var response = response.json();
                        if(!response.errors) {
                            this.$store.commit('updateCompletedEnrollment', response);
                            setTimeout(function () {
                                _self.appLoading(false);
                                _self.$router.push({path: '/reenroll/done'});
                            }, 1500);
                        } else {
                            _self.appLoading(false);
                            console.log(response.errors.base);
                            _self.enrollment_errors = response.errors.base;
                        }
                    }, (response) => {
                        // error callback
                    });


                }

            },
            appLoading(isLoading){
                this.$store.commit('updateAppIsLoading', isLoading);
            }

        },
        computed: {
            isAppLoading(){
                return this.$store.getters.isAppLoading
            }
        },
        data(){
            return {
                tpv_code: '',
                terms: [],
                checkedTerms: [],
                enrollment: {},
                offer: {},
                enrollment_errors: [],
                customer: {}
            }
        },
        created: function(){




            //Get Selected Plan
            var selectedPlanId = this.$store.getters.getSelectedPlanId;
            var availableOffers = this.$store.getters.getAvailableOffers;

            var actualOffer = _.find(availableOffers, { 'id': selectedPlanId });

            this.offer = actualOffer;

            this.terms = this.$store.getters.getTerms;

            this.customer = this.$store.getters.getCurrentCustomer;
            this.enrollment = this.$store.getters.getEnrollment;

            this.enrollment.account_number = this.customer.account_number;



            //Validation Rules
            var rules = {
                tpv_code: {
                    required: true,
                    minLength: 4
                },
                checkedTerms: {
                    required: true,
                    minLength: 4
                }
            };

            this.$verify(rules);

            window.scrollTo(0, 0);


        }
    }
</script>
