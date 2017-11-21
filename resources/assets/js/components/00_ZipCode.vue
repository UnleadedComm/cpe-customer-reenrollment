<template>

        <div class="container enrollment">

            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <!-- Offer Heading -->
                    <div class="row margin-bottom-10 heading">
                        <div class="col-md-3">

                            <i class="fa fa-utility fa-3x cpe rounded" aria-hidden="true"></i>

                        </div>

                        <div class="col-md-9">
                            <h4 class="margin-top-0 font-size-20">LET'S GET STARTED</h4>
                            <p class="font-size-14">
                                Re-enrolling only takes a few minutes. First, please enter your service address ZIP code and current utility account number below (you can find this number on your bill).</p>
                        </div>


                    </div>
                    <!-- END -->


                    <form method="POST" v-on:submit.prevent="validate">

                        <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.service_zip.$valid }">

                            <label class="font-size-12">ZIP Code*</label>
                            <input v-model="service_zip" maxlength="5" type="text" class="form-control" id="service_zip" name="address_zip" placeholder="">


                            <!--<span v-show="verify.$dirty && verify.service_zip.required" class="error control-label" >Your 5-digit ZIP code is required.</span>-->
                            <!--<span v-show="verify.service_zip.minLength" class="error control-label" >Must be 5 characters.</span>-->
                            <span v-show="NoService" class="error text-danger control-label">Thank you for your inquiry. It appears we could not find the account number and ZIP code provided.</span>
                            <span v-show="NotResidential" class="error text-danger control-label">This account cannot be re-enrolled online at this time.  Please contact a service representative toll-free at <b>1-888-200-3788</b>.</span>
                        </div>

                        <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.service_zip.$valid }">

                            <label class="font-size-12">Account Number*</label>
                            <input v-model="account_number" maxlength="25" type="text" class="form-control" id="account_number" name="account_number" placeholder="">

                            <!--<span v-show="verify.$dirty && verify.account_number.required" class="error control-label" >Your account number is required.</span>-->
                            <!--<span v-show="NoService" class="error text-danger control-label">Thank you for your inquiry. It appears we currently do not have any offers in your area.</span>-->
                        </div>


                        <div class="row form-group margin-top-40 margin-bottom-40">
                            <div class="col-md-12">
                                <button style="margin-bottom: 20px;" v-show="NoService" v-on:click="goHome" type="button" class="btn btn-primary btn-cpe large center-block">Home <i class="fa fa-angle-left fa-2x pull-left" aria-hidden="true"></i></button>
                                <button v-show="!isAppLoading && !MeterNumberRequired" type="submit" class="btn btn-primary btn-cpe large center-block">Next <i class="fa fa-angle-right fa-2x pull-right" aria-hidden="true"></i></button>
                                <button v-show="isAppLoading" type="button" class="btn btn-primary btn-cpe large center-block">Loading <i class="fa fa-circle-o-notch fa-spin pull-right" aria-hidden="true"></i></button>
                            </div>
                        </div>


                    </form>


                </div>
            </div>

            <!--METER NUMBER-->
            <div class="row meter-number-note" v-show="MeterNumberRequired">
                <div class="col col-md-10 col-md-offset-1">

                    <div class="row">
                        <div class="col-md-1">
                            <i class="fa fa-note fa-3x cpe rounded" aria-hidden="true"></i>
                        </div>
                        <div class="col-md-6">
                            <h4 class="margin-top-0">NOTE</h4>
                            <p>It appears you have more than one meter associated with this account. Please enter the meter number for the location you'd like to re-enroll.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 col-md-offset-1 same-height">
                            <div class="form-group" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.service_zip.$valid }">

                                <label class="font-size-12">Meter Number*</label>
                                <input v-model="meter_number" maxlength="25" type="text" class="form-control" id="meter_number" name="meter_number" placeholder="">
                                <span v-show="NoMeterProvided" class="error text-danger control-label">Please provide a valid meter number.</span>
                                <span v-show="NoMeter" class="error text-danger control-label">Thank you for your inquiry. It appears we could not find the meter number you provided.</span>
                                <span v-show="NotResidential" class="error text-danger control-label">This account cannot be re-enrolled online at this time.  Please contact a service representative toll-free at <b>1-888-200-3788</b>.</span>

                            </div>
                        </div>

                        <div class="col-md-6 same-height">
                            <button v-on:click="validateMeterNumber" v-show="!isAppLoading" type="submit" class="btn btn-primary btn-cpe large center-block">Submit <i class="fa fa-angle-right fa-2x pull-right" aria-hidden="true"></i></button>
                            <button v-show="isAppLoading" type="button" class="btn btn-primary btn-cpe large center-block">Loading <i class="fa fa-circle-o-notch fa-spin pull-right" aria-hidden="true"></i></button>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                            <p>If you’d like to re-enroll all locations associated with this account, please call customer service at 888.200.3788.</p>
                        </div>
                    </div>


                </div>
            </div>
            <!--METER NUMBER END-->


        </div>

</template>


<script>

    import { mapGetters, mapActions } from 'vuex';




    export default {
        name: 'ZIP-Code',
        methods: {
            goHome() {
              window.location.href = 'http://dev.centerpointenergyretail.com';
            },
            validate(e){

                this.verify.$dirty = true;

                this.NoService = false;

                if(this.verify.$valid){

                    var _self = this;
                    _self.appLoading(true);
                    e.preventDefault();

                    this.account_number = this.account_number.trim();

                    Vue.http.get('/reenroll/' + this.service_zip + '/' + this.account_number).then((response) => {

                    var results = response.json();


                    if(!_.isEmpty(results)){

                        if(results[0].segment == 'Residential') {

                            console.log(results);
                            console.log(results.length);

                            _self.$store.commit('updateCustomer', results);

                            setTimeout(function () {
                                _self.appLoading(false);
                                _self.$router.push({path: '/reenroll/account/information'});

                            }, 1000);

                        } else {

                            setTimeout(function(){

                                $('.same-height').matchHeight();

                            }, 100);

                            _self.appLoading(false);
                            this.NotResidential = true;

                        }

                    } else {

                        _self.appLoading(false);
                        this.NoService = true;

                    }



                }, (response) => {
                        console.log('error: ');
                        console.log(response.json());
                        var result = response.json();

                        if(result.errors.RuntimeError){
                            _self.MeterNumberRequired = true;
                            _self.appLoading(false);

                            setTimeout(function(){
                                $('html, body').animate({
                                    scrollTop: $(".meter-number-note").offset().top
                                }, 1000);
                            }, 100);
                        }


                    });


                }//END if



            },
            validateFromRetail(){

                this.verify.$dirty = true;

                this.NoService = false;

                if(this.verify.$valid){

                    var _self = this;
                    _self.appLoading(true);


                    this.account_number = this.account_number.trim();

                    Vue.http.get('/reenroll/' + this.service_zip + '/' + this.account_number).then((response) => {

                        var results = response.json();


                        if(!_.isEmpty(results)){

                            if(results[0].segment == 'Residential') {

                                console.log(results);
                                console.log(results.length);

                                _self.$store.commit('updateCustomer', results);

                                setTimeout(function () {
                                    _self.appLoading(false);
                                    _self.$router.push({path: '/reenroll/account/information'});

                                }, 1000);

                            } else {

                                setTimeout(function(){

                                    $('.same-height').matchHeight();

                                }, 100);

                                _self.appLoading(false);
                                this.NotResidential = true;

                            }

                        } else {

                            _self.appLoading(false);
                            this.NoService = true;

                        }



                    }, (response) => {
                        console.log('error: ');
                        console.log(response.json());
                        var result = response.json();

                        if(result.errors.RuntimeError){
                            _self.MeterNumberRequired = true;
                            _self.appLoading(false);

                            setTimeout(function(){
                                $('html, body').animate({
                                    scrollTop: $(".meter-number-note").offset().top
                                }, 1000);
                            }, 100);
                        }


                    });


                }//END if



            },
            validateMeterNumber(){

                var _self = this;
                _self.appLoading(true);
                this.NoMeterProvided = false;
                this.NoMeter = false;


                if(!_.isEmpty(this.meter_number)){

                    Vue.http.get('/reenroll/' + this.service_zip + '/' + this.account_number + '/' + this.meter_number).then((response) => {

                        var results = response.json();


                        if(!_.isEmpty(results)){

                            if(results[0].segment == 'Residential') {
                                _self.$store.commit('updateCustomer', results);

                                setTimeout(function () {
                                    _self.appLoading(false);
                                    _self.$router.push({path: '/reenroll/account/information'});

                                }, 1000);

                            } else {

                                setTimeout(function(){

                                    $('.same-height').matchHeight();

                                }, 100);

                                _self.appLoading(false);
                                this.NotResidential = true;

                            }

                        } else {

                            setTimeout(function(){

                                $('.same-height').matchHeight();

                            }, 100);

                            _self.appLoading(false);
                            this.NoMeter = true;

                        }



                }, (response) => {

                    });




                } else {

                    this.NoMeterProvided = true;
                    _self.appLoading(false);

                    setTimeout(function(){

                        $('.same-height').matchHeight();

                    }, 100);



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
                service_zip: '',
                account_number: '',
                meter_number: '',
                loaded: false,
                NoService: false,
                NoMeter: false,
                MeterNumberRequired: false,
                NoMeterProvided: false,
                NotResidential: false
            }
        },
        watch: {
        },
        created: function(){

            this.$verify({
                service_zip: {
                    required: true,
                    minLength: 5
                },
                account_number: {
                    required: true
                }

            });

            $(function(){
                $('.same-height').matchHeight();
            });

            window.scrollTo(0, 0);

        },
        mounted: function(){
            this.loaded = true;

            if(this.$route.params.zip) {
                this.service_zip = this.$route.params.zip;
                this.account_number = this.$route.params.account;

                var _self = this;
                setTimeout(function(){
                    _self.validateFromRetail();
                }, 1000);
            }


        }


    }
</script>
