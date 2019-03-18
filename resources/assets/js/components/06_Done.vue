<template>


        <div class="container enrollment offers done">

            <div class="row">

                <div class="col-md-12 pull-right text-right">
                    <p class="font-size-12 font-weight-600"><a href="http://www.centerpointenergyretail.com/contact">Need Help?</a></p>
                </div>
            </div>

            <!-- Enrollment Navigation -->
            <!--<div class="row breadcrumb text-center">-->
                <!--<div class="col col-md-12 active">-->
                    <!--<p>You're Done!</p>-->
                    <!--<i class="fa fa-sort-desc fa-2x" aria-hidden="true"></i>-->
                <!--</div>-->
            <!--</div>-->
            <!-- END -->


            <!-- Offer Heading -->
            <div class="row margin-bottom-10 heading">
                <div class="col-md-2 mb-4 col-lg-1">

                    <i class="fa fa-confirmation fa-3x cpe rounded" aria-hidden="true"></i>

                </div>

                <div class="col-md-10 pl-md-0 pl-lg-4">
                    <h4 class="margin-top-0 font-size-20">CONFIRMATION</h4>
                    <p class="font-size-14">That’s it! You’re re-enrolled. Please save or print this page for your records. Thanks for once again choosing CenterPoint Energy. We look forward to serving you.</p>

                </div>



            </div>
            <!-- END -->




            <div class="row confirmation-number">
                <div class="col-md-12">
                    <div class="well">
                        <span>CONFIRMATION NUMBER: {{ completed_enrollment.order_number }}</span>
                    </div>
                </div>
            </div>


            <!-- OVERVIEW -->
            <div class="row">
                <div class="col-md-12">
                    <div class="well done-well even">
                        <div class="row">

                            <!-- CONTACT -->
                            <div class="col-12 col-md-3 col text-center">
                                <i class="fa fa-5x"><img src="http://cpedev2.centerpointenergyretail.com/images/icon_account.png"></i>
                                <h5>Account Information</h5>
                            </div>
                            <!-- END -->

                            <!-- CONTACT -->
                            <div class="col-12 col-md-5 col">
                                <p><label>Utility: </label> {{ offer.utility_name }}</p>
                                <p><label>Customer Type: </label> {{ offer.segment }}</p>
                                <p><label>Account Name: </label> {{ completed_enrollment.service_locations[0].account_name }}</p>
                                <p><label>Account Number: </label> {{ completed_enrollment.service_locations[0].account_number }}</p>
                                <p><label>Contact First Name: </label> {{ completed_enrollment.contacts[0].first_name }}</p>
                                <p><label>Contact Last Name: </label> {{ completed_enrollment.contacts[0].last_name }}</p>
                                <p v-if="completed_enrollment.service_locations[0].meter_number"><label>Meter Number: </label> {{ completed_enrollment.service_locations[0].meter_number }}</p>
                            </div>
                            <!-- END -->

                            <!-- CONTACT -->
                            <div class="col-12 col-md-3 col last">
                                <p><label>Service Address: </label> {{ completed_enrollment.service_locations[0].address_street }}</p>
                                <p><label>City/State/ZIP: </label> {{ completed_enrollment.service_locations[0].address_city }}, {{ completed_enrollment.service_locations[0].address_state }} {{ completed_enrollment.service_locations[0].address_zip }}</p>
                                <p><label>Phone: </label> {{ completed_enrollment.contacts[0].phone }}</p>
                                <p><label>Email: </label> {{ completed_enrollment.contacts[0].email }}</p>
                            </div>
                            <!-- END -->



                        </div>
                    </div>
                </div>

            </div>





            <!-- OVERVIEW -->
            <div class="row">
                <div class="col-md-12">
                    <div class="well done-well even text-center">
                        <div class="row">

                            <!-- CONTACT -->
                            <div class="col-12 col-md-3 col vcenter">
                                <div class="display-block">
                                    <i class="fa fa-5x"><img src="http://cpedev2.centerpointenergyretail.com/images/icon_plan.png"></i>
                                    <h5>Plan Information</h5>
                                </div>
                            </div>
                            <!-- END -->

                            <!-- CONTACT -->
                            <div class="col-12 col-md-3 col vcenter">
                                <h4>{{ offer.name }}</h4>
                            </div>
                            <!-- END -->



                            <template v-if="offer.term_months">
                                <!-- CONTACT -->
                                <div class="col-12 col-md-2 col vcenter">
                                    <div class="display-block">
                                        <p class="font-size-16 font-weight-600">{{ offer.term_months }}</p>
                                        <p class="font-size-16 font-weight-600">MONTHS</p>
                                    </div>
                                </div>
                                <!-- END -->
                            </template>

                            <template v-if="!offer.term_months">
                                <!-- CONTACT -->
                                <div class="col-12 col-md-2 col vcenter">
                                    <div class="display-block">
                                        <p class="font-size-16 font-weight-600">THRU</p>
                                        <p class="font-size-16 font-weight-600">{{ formatDate(offer.term_end_date) }}</p>
                                    </div>
                                </div>
                                <!-- END -->
                            </template>



                            <!-- CONTACT -->
                            <div class="col-12 col-md-2 col vcenter">
                                <div class="display-block">
                                    <p class="font-size-16 font-weight-600 text-uppercase">{{ offer.price_type }}</p>
                                    <p class="font-size-14"><a target="_blank" v-bind:href="offer.contract_url">Download Terms</a></p>
                                </div>
                            </div>
                            <!-- END -->


                            <!-- CONTACT -->
                            <div class="col-12 col-md-2 col last vcenter">
                                <div class="display-block">
                                <p class="font-size-30 font-weight-600">${{ offer.latest_price }}</p>
                                <p class="font-size-16 font-weight-300 unit">Per {{ offer.price_units }}</p>
                                </div>
                            </div>
                            <!-- END -->


                        </div>
                    </div>
                </div>

            </div>


            <hr />

            <!-- Offer Heading -->
            <div class="row margin-bottom-10 heading"> 
                <div class="col-md-2 mb-3 col-lg-1">

                    <i class="fa fa-phone fa-3x cpe rounded" aria-hidden="true"></i>

                </div>

                <div class="col-md-10 pl-md-0 pl-lg-4">
                    <h4 class="margin-top-0 font-size-20">QUESTIONS</h4>
                    <p class="font-size-14">If you have questions about your new natural gas plan or service, please contact
                        customer service at 888-200-3788 between 7am and 7pm Central Time, Monday through Friday.</p>
                </div>



            </div>
            <!-- END -->


            <div class="row form-group margin-top-40 margin-bottom-40 text-center">
                <div class="col-md-12">
                    <a href="http://www.centerpointenergyretail.com" class="btn btn-primary btn-cpe large">Home <i class="fa fa-angle-right fa-2x pull-right" aria-hidden="true"></i></a>
                </div>
            </div>




        </div>

</template>


<script>

    import { mapGetters, mapActions } from 'vuex';



    export default {
        methods: {
            formatDate(date){

                return moment(date).format('M-DD-YYYY');

            },
            validate(e){


            },
            appLoading(isLoading){
                this.$store.commit('updateAppIsLoading', isLoading);
            },
            goHome(){
                this.$router.push({ path: '/reenroll' });
            }

        },
        computed: {
            isAppLoading(){
                return this.$store.getters.isAppLoading
            }
        },
        data(){
            return {
                completed_enrollment: undefined,
                offer: undefined,
            }
        },
        created: function(){

            this.completed_enrollment = this.$store.getters.getCompletedEnrollment;

            //Get Selected Plan
            var selectedPlanId = this.$store.getters.getSelectedPlanId;
            var availableOffers = this.$store.getters.getAvailableOffers;

            var actualOffer = _.find(availableOffers, { 'id': selectedPlanId });

            this.offer = actualOffer;

            $(function(){
                $('.col').matchHeight();
            });

            window.scrollTo(0, 0);

        },
        mounted: function(){
            //this.$store.commit('resetState');

            window.dataLayer.push({
                'event': 'reenrollmentConversion',
                'order_number': this.completed_enrollment.order_number,
                'utility_name': this.offer.utility_name,
                'segment': this.completed_enrollment.segment,
                'account_number': this.completed_enrollment.service_locations[0].account_number,
                'address_zip': this.completed_enrollment.service_locations[0].address_zip,
                'plan_name': this.offer.name,
                'term_months': this.offer.term_months,
                'latest_price': this.offer.latest_price
            });

        }

    }

</script>
