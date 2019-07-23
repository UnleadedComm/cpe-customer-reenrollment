<template>

        <div class="container enrollment offers">
            <!-- Offer Heading -->
            <div class="row justify-content-center margin-bottom-10 heading">
                <div class="col-md-2 col-lg-1 text-center">

                    <i class="fa fa-gas fa-3x cpe rounded" aria-hidden="true"></i>

                </div>

                <div class="col-md-6 col-lg-7">
                    <h4 class="margin-top-20 font-size-20">AVAILABLE PLANS</h4>
                    <!--<p class="font-size-14">Enrolling is fast and easy.  Get started by choosing a plan below.-->
                        <!--Remember to have your utility account number available.</p>-->
                </div>

                <div class="col-md-4 pull-right text-right text-md-right">
                    <p class="text-uppercase font-size-12 font-weight-300 orange">OFFERS FOR ACCOUNT NUMBER: <span class="black display-block font-weight-600">{{ customer.account_number }}</span></p>
                    <p class="font-size-12 font-weight-600"><a href="http://www.centerpointenergyretail.com/contact">Need Help?</a></p>
                </div>

            </div>
            <!-- END -->

            <!--Invalid Promo-->
            <div v-show="invalid_promo_code" class="row">
                <div class="col-md-12">
                    <p class="text-danger control-label margin-top-10" >Viverra maecenas accumsan lacus vel facilisis volutpat est velit egestas dui id ornare arcu odio ut sem nulla pharetra diam.</p>
                </div>
            </div>
            <!--END-->

            <!-- Offers -->
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover text-center offers-listing">
                        <thead>
                        <tr>
                            <th class="text-left padding-left-25 product-name">Featured Product</th>
                            <th class="text-center">Term</th>
                            <th class="text-center">Features</th>
                            <th class="text-center">Rate</th>
                            <th class="text-center">Sign Up</th>
                        </tr>
                        </thead>
                        <tbody>


                        <template  v-for="(offer, index) in offers">
                            <!-- Offer -->
                            <tr v-bind:class="isOddEven(index)">
                                <td class="one">
                                    <div class="row justify-content-center vertical-align text-lg-center">
                                            <i class="fa fa-4x col-sm-12 col-md-5 offer-icon" aria-hidden="true"><img v-bind:src="'http://cpedev2.centerpointenergyretail.com/images/offer_' + offer.price_type + '.png'"></i>

                                            <div class="col-sm-12 col-md-8">
                                                <h5 class="font-size-14 margin-top-0 margin-bottom-5 font-weight-600">{{ offer.name }}</h5>

                                            </div>
                                    </div>
                                </td>
                                <td class="two">
                                    <template v-if="offer.term_months">
                                        <span class="display-block font-size-16 font-weight-600">{{ offer.term_months }}</span>
                                        <span class="display-block font-size-16 font-weight-600 text-uppercase">Months</span>
                                    </template>

                                    <template v-if="!offer.term_months">
                                        <span class="display-block font-size-16 font-weight-600 text-uppercase">Thru</span>
                                        <span class="display-block font-size-16 font-weight-600">{{ formatDate(offer.term_end_date) }}</span>

                                    </template>

                                </td>
                                <td class="three">
                                    <span class="display-block font-size-16 font-weight-600 text-uppercase">{{ offer.price_type }}</span>
                                    <span class="display-block font-size-12 font-weight-600"><a href="javascript: void(0)" data-toggle="collapse" v-bind:data-target="'.offer-' + offer.id" class="accordion-toggle">See Details</a></span>
                                </td>
                                <td class="four">
                                    <span class="display-block font-size-30 font-weight-600 text-uppercase price">${{ offer.latest_price }}</span>
                                    <span class="display-block font-size-16 font-weight-300 unit">per {{ offer.price_units }}</span>
                                </td>
                                <td class="five"><button class="btn btn-primary btn-cpe" v-on:click.stop="enroll(offer.id, offer.utility_id)">Enroll Now</button></td>

                            </tr>

                            <!-- Details -->
                            <tr class="text-left details" v-bind:class="isOddEven(index)">
                                <td colspan="1" class="hidden-row">
                                    <div class="accordian-body collapse" v-bind:class="'offer-' + offer.id">
                                        <ul>

                                            <template v-if="offer.term_type == 'Month to Month'">
                                                <li>{{ offer.term_type }}</li>
                                            </template>
                                            <template v-else>
                                                <template v-if="offer.term_months">
                                                    <li><label>Term: </label> {{ offer.term_months }} Months</li>
                                                </template>
                                                <template v-if="!offer.term_months">
                                                    <li><label>Thru </label> {{ formatDate(offer.term_end_date) }}</li>
                                                </template> 
                                            </template>


                                            <li><label>Early Termination Fee:</label> ${{ offer.etf_amount }}0</li>
                                            <li><label>Terms & Conditions:</label> <a v-bind:href="offer.contract_url" target="_blank">Download</a></li>
                                        </ul>
                                    </div>
                                </td>
                                <td colspan="4" class="hidden-row">
                                    <div class="accordian-body collapse" v-bind:class="'offer-' + offer.id">
                                        <ul class="padding-left-0">
                                            <li><h5 class="font-size-14 margin-top-0 margin-bottom-5 font-weight-600">Product Details</h5></li>
                                            <li class="font-size-12">{{ offer.description }}</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- END -->
                            <!-- END -->
                        </template>


                        </tbody>
                    </table>
                </div>
            </div>

            <hr />


            <!-- Offer Heading -->
            <div class="row margin-bottom-10 heading">
                <div class="mb-4 col-md-2 col-lg-1 mr-lg-4 mr-xl-3 text-center">

                    <i class="fa fa-file-text-o fa-3x cpe rounded" aria-hidden="true"></i>

                </div>

                <div class="col-md-10">
                    <h4 class="margin-top-0 font-size-20">ABOUT PLANS</h4>
                    <p class="font-size-14">At CenterPoint Energy Services, we strive to provide competitive rates and a variety of plan options, so you can choose what works best for you.</p>
                </div>

            </div>
            <!-- END -->

            <!-- About Offers -->
            <div class="row justify-content-center plan-overviews">
                <div class="col col-10 col-md-4 text-center">
                    <div class="overview">
                        <i class="fa offer-icon-large fa-10x" aria-hidden="true"><img src="http://cpedev2.centerpointenergyretail.com/images/offer_Fixed.png"></i>
                        <h4 class="margin-top-0 font-size-20 margin-top-10">FIXED RATE</h4>
                        <!--<p class="font-size-14 margin-bottom-5 font-weight-600">Mauris viverra dolor ipsum</p>-->
                        <p class="font-size-12">CenterPoint’s Fixed Price plan gives you security and stability regardless of what happens to market prices. For the term of your contract, you can rest assured you have will a fair, fixed price you can plan on.
                        </p>
                        <!--<button class="btn btn-primary btn-cpe margin-top-10">Learn More</button>-->
                    </div>
                </div>

                <div class="col col-10 col-md-4 text-center">
                    <div class="overview">
                        <i class="fa offer-icon-large fa-10x" aria-hidden="true"><img src="http://cpedev2.centerpointenergyretail.com/images/offer_Managed.png"></i>
                        <h4 class="margin-top-0 font-size-20 margin-top-10">MANAGED RATE</h4>
                        <!--<p class="font-size-14 margin-bottom-5 font-weight-600">Mauris viverra dolor ipsum</p>-->
                        <p class="font-size-12">With a Managed Price plan, CenterPoint Energy Managers monitor the market to deliver a competitive rate all year long—reducing your exposure to increases in market prices and letting you take advantage of price decreases.</p>
                        <!--<button class="btn btn-primary btn-cpe margin-top-10">Learn More</button>-->
                    </div>
                </div>

                <div class="col col-10 col-md-4 text-center">
                    <div class="overview">
                        <i class="fa offer-icon-large fa-10x" aria-hidden="true"><img src="http://cpedev2.centerpointenergyretail.com/images/offer_Index.png"></i>
                        <h4 class="margin-top-0 font-size-20 margin-top-10">INDEX RATE</h4>
                        <!--<p class="font-size-14 margin-bottom-5 font-weight-600">Mauris viverra dolor ipsum</p>-->
                        <p class="font-size-12">The Index Price plan gives you the freedom of a rate that tracks with the market cost of gas. Your natural gas rate may change monthly - so if the market index decreases, your rate goes down with it. If you think the market will be increasing, you can always lock in a Fixed Price plan.</p>
                        <!--<button class="btn btn-primary btn-cpe margin-top-10">Learn More</button>-->
                    </div>
                </div>


            </div>
            <!-- END -->


        </div>

</template>


<script>

    import { mapGetters, mapActions } from 'vuex';


    export default {
        name: "Offers",
        methods: {
            appLoading(isLoading){
                this.$store.commit('updateAppIsLoading', isLoading);
            },
            enroll(id, utility_id){

                var _self = this;
                this.$store.commit('updateSelectedOffer', id);

                /* Get Legal Terms for Utility */
                /****************************************/
                Vue.http.get('/reenroll/utilities/' + utility_id + '/legal_terms' ).then((response) => {
                    console.log(response.json());
                    _self.updateTerms(response.json());
                    _self.$router.push({path: '/reenroll/review'});
                }, (response) => {
                    // error callback
                });
                /****************************************/




            },
            isOddEven(index){

                if (index % 2) {

                    return 'even';

                } else {

                    return 'odd';

                }

            },
            formatDate(date){

                return moment(date).format('M-DD-YYYY');

            },
            updateTerms(terms){
                this.$store.commit('updateTerms', terms);
            }
        },
        computed: {
            isAppLoading(){
                return this.$store.getters.isAppLoading
            },
            detailsClassName(id){
                return 'demo'+id
            }
        },
        data(){
            return {
                offers: this.$store.getters.getOffers,
                customer: '',
                invalid_promo_code: false
            }
        },
        created: function(){

            this.customer = this.$store.getters.getCurrentCustomer;
            this.invalid_promo_code = this.$store.getters.getPromoCodeStatus;

            $(function(){
                $('.overview').matchHeight();
            });

            window.scrollTo(0, 0);
        }
    }
</script>
