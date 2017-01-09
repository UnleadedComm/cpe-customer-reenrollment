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
                <div class="col col-md-4">
                    <p>Account Information</p>

                </div>
                <div class="col col-md-4 bordered active">
                    <p>Contact Information</p>
                    <i class="fa fa-sort-desc fa-2x" aria-hidden="true"></i>
                </div>
                <div class="col col-md-4">
                    <p>Plan Review</p>
                </div>
            </div>
            <!-- END -->

            <!-- Section Heading -->
            <div class="row section-heading margin-top-40 margin-bottom-20">
                <div class="col-md-6">
                    <h4 class="font-size-20 text-uppercase display-inline"><span class="badge font-size-20 display-inline">1</span> Contact Information</h4>
                </div>
            </div>
            <!-- END -->


            <!-- CONTACTS LIST -->
            <template v-if="hasContacts">
            <div class="row">
                <div class="col-md-12">
                    <div class="well contacts-list">
                        <div class="row">

                            <template v-for="(contact, index) in this.$store.getters.existingContacts">
                            <!-- CONTACT -->
                            <div class="col-md-4 contact">

                                <h5 v-if="contact.contact_type == 'PRIM'" class="margin-top-0 font-size-18">Primary Contact</h5>
                                <h5 v-if="contact.contact_type == 'SCND'" class="margin-top-0 font-size-18">Secondary Contact</h5>

                                <span class="attribute"><label class="font-size-12">Name:</label> {{ contact.first_name + ' ' + contact.middle_initial + ' ' + contact.last_name + ' ' + contact.name_suffix }}</span>
                                <span class="attribute"><label class="font-size-12">Email:</label> {{ contact.email }}</span>
                                <span v-if="contact.phone" class="attribute"><label class="font-size-12">Phone:</label> {{ contact.phone }}</span>
                                <span v-if="!contact.phone" class="attribute"><label class="font-size-12">Phone:</label> Not Provided</span>
                                <span class="attribute"><label class="font-size-12">Relationship:</label> {{ ActualString(contact.contact_relationship) }}</span>
                                <span class="attribute text-uppercase font-size-12">

                                    <a class="margin-right-10" v-on:click.stop="editContact(index)" href="javascript:void(0)">Edit</a>

                                    <a v-if="contact.contact_type == 'SCND'" v-on:click.stop="deleteContact(index)" href="javascript:void(0)">Delete</a>
                                </span>
                            </div>
                            <!-- END -->
                            </template>


                        </div>
                    </div>
                </div>

            </div>
            </template>



            <!-- END -->


            <div class="row service-location">
                <div class="col-md-12">

                    <form v-on:submit.prevent="validate">
                        <div class="row form-group">
                            <div class="col-md-4" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.first_name.$valid }">
                                <label for="first_name">First Name*</label>
                                <input v-model="first_name" type="text" class="form-control" id="first_name" name="first_name" placeholder="">
                                <span v-show="verify.$dirty && verify.first_name.required" class="error control-label" >Your first name is required.</span>
                                <span v-show="verify.$dirty && verify.first_name.blank" class="error control-label" >Your first name is required.</span>
                            </div>
                            <div class="col-md-1">
                                <label for="middle_initial">M.I.</label>
                                <input v-model="middle_initial" type="text" maxlength="2" class="form-control" id="middle_initial" name="middle_initial" placeholder="">
                            </div>
                            <div class="col-md-4" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.last_name.$valid }">
                                <label for="last_name">Last Name*</label>
                                <input v-model="last_name" type="text" class="form-control" id="last_name" name="last_name" placeholder="">
                                <span v-show="verify.$dirty && verify.last_name.required" class="error control-label" >Your last name is required.</span>
                                <span v-show="verify.$dirty && verify.last_name.blank" class="error control-label" >Your last name is required.</span>
                            </div>
                            <div class="col-md-3">
                                <label for="name_suffix">Suffix</label>

                                <div class="select-style">
                                    <select v-model="name_suffix" class="form-control" name="name_suffix" id="name_suffix">
                                        <option v-for="suffix in options_suffix" v-bind:value="suffix.value">{{ suffix.text }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-8" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.email.$valid }">
                                <label for="email">Email Address*</label>
                                <input v-model="email" type="text" class="form-control" id="email" name="email" placeholder="">
                                <span v-show="verify.$dirty && verify.email.required" class="error control-label" >Your e-mail address is required.</span>
                                <span v-show="verify.$dirty && verify.email.email" class="error control-label" >Please provide a valid e-mail address.</span>
                            </div>
                            <div class="col-md-4">
                                <label for="phone">Telephone Number</label>
                                <input v-model="phone" data-masked-input="999-999-9999" type="text" class="form-control" id="phone" name="phone" placeholder="">
                                <p v-show="verify.$dirty && verify.phone.required" class="text-danger control-label margin-top-10" >Your phone number is required.</p>
                                <p v-show="verify.$dirty && verify.phone.blank" class="text-danger control-label margin-top-10" >Your phone number is required.</p>
                                <p v-show="verify.$dirty && verify.phone.phone" class="text-danger control-label margin-top-10" >Please provide a valid 10-digit phone number.</p>
                            </div>
                        </div>

                        <div v-if="showForSecondaryContact && isEditingSecondaryContact" class="row form-group">

                            <div class="col-md-4" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.contact_relationship.$valid }">
                                <label for="contact_relationship">Relationship to account holder*</label>
                                <div class="select-style">
                                    <select v-model="contact_relationship" class="form-control" name="contact_relationship" id="contact_relationship">
                                        <option v-for="option in options_contact_relationship" v-bind:value="option.value">{{ option.text }}</option>
                                    </select>
                                </div>
                                <span v-show="verify.$dirty && verify.contact_relationship.required" class="error control-label" >Your relationship to account holder is required.</span>
                            </div>

                        </div>

                        <div class="row form-group margin-top-20">

                            <div class="col-md-4">
                                <button v-show="!is_editing_contact && !hasContacts" v-on:click="validateContact" class="btn btn-primary btn-cpe large btn-add-contact" type="button">Add another contact <i class="fa fa-plus margin-left-5"></i></button>
                                <button v-show="!is_editing_contact && hasContacts" v-on:click="validateContact" class="btn btn-primary btn-cpe large btn-add-contact" type="button">Save Contact <i class="fa fa-check-square-o margin-left-5"></i></button>
                                <button v-show="is_editing_contact" v-on:click="saveContact" class="btn btn-primary btn-cpe large btn-add-contact" type="button">Save Contact <i class="fa fa-check-square-o margin-left-5"></i></button>
                            </div>

                        </div>

                        <hr class="margin-top-30 margin-bottom-25" />



                        <div class="row form-group">

                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="font-size-20 text-uppercase display-block margin-top-10">Security Passcode</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.security_passcode.$valid }">
                                        <label for="security_passcode">Passcode*</label>
                                        <input v-model="security_passcode" type="text" class="form-control" id="security_passcode" name="security_passcode" placeholder="">
                                        <span v-show="verify.$dirty && verify.security_passcode.required" class="error control-label" >Please provide a security passcode.</span>
                                        <span v-show="verify.$dirty && verify.security_passcode.blank" class="error control-label" >Please provide a security passcode.</span>
                                    </div>
                                    <div class="col-md-6" v-bind:class="{ 'has-error' : verify.$dirty&&!verify.security_passcode_hint.$valid }">
                                        <label for="security_hint">Passcode Hint*</label>
                                        <input v-model="security_passcode_hint" type="text" class="form-control" id="security_hint" name="security_hint" placeholder="">
                                        <span v-show="verify.$dirty && verify.security_passcode_hint.required" class="error control-label" >Please provide a passcode hint.</span>
                                        <span v-show="verify.$dirty && verify.security_passcode_hint.blank" class="error control-label" >Please provide a passcode hint.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">

                                <div class="well help-block">
                                    <p class="black font-size-12"><span class="font-weight-900">What is this?</span> This security passcode will be used to verify the account holder’s identity when speaking with a CenterPoint Energy representative. It is not an online password.</p>
                                </div>

                            </div>

                        </div>



                        <div class="row form-group margin-top-40 margin-bottom-40">
                            <div class="col-md-12">
                                <button v-on:click="$router.push({ path: '/enroll/service/location' })" type="button" class="btn btn-primary btn-cpe large pull-left">Back <i class="fa fa-angle-left fa-2x pull-left" aria-hidden="true"></i></button>
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
        name: 'Contact-Information',
        methods: {
            ActualString(relationshipValue){


                var options = this.options_contact_relationship;
                var newValue = undefined;

                _.forEach(options, function(value, key){

                    if(value.value != undefined) {

                        if (relationshipValue == value.value) {
                            newValue = value.text;
                        }

                    }

                });

                if(newValue == undefined)
                    newValue = 'Account Holder';


                return newValue;

            },
            validate(e){

                    if(!this.hasPrimaryContact()){



                        if(this.verify.$valid) {

                            console.log('HERE!');

                            var newContact = {
                                "contact_type": "PRIM",
                                "contact_relationship": this.contact_relationship,
                                "first_name": this.first_name,
                                "middle_initial": this.middle_initial,
                                "last_name": this.last_name,
                                "name_suffix": this.name_suffix,
                                "email": this.email,
                                "phone": this.phone
                            };

                            this.$store.commit('addNewContact', newContact);
                            this.$store.commit('updatePasscode', this.security_passcode);
                            this.$store.commit('updatePasscodeHint', this.security_passcode_hint);

                            this.first_name = "";
                            this.last_name = "";
                            this.middle_initial = "";
                            this.name_suffix = "";
                            this.contact_relationship = undefined;
                            this.email = "";
                            this.phone = "";

                            console.log(newContact);

                            this.$router.push({path: '/enroll/review'});


                        } else {

                            this.verify.$dirty = true;

                        }




                    } else {

                        //If passcode and passcode hint provided
                        if(this.verify.security_passcode.$valid && this.verify.security_passcode_hint.$valid){

                            this.$store.commit('updatePasscode', this.security_passcode);
                            this.$store.commit('updatePasscodeHint', this.security_passcode_hint);

                            //Check entire form for completion
                            if(this.verify.$valid && this.isEditingSecondaryContact){

                                //Add Secondary contact
                                var newContact = {
                                    "contact_type": "SCND",
                                    "contact_relationship": this.contact_relationship,
                                    "first_name": this.first_name,
                                    "middle_initial": this.middle_initial,
                                    "last_name": this.last_name,
                                    "name_suffix": this.name_suffix,
                                    "email": this.email,
                                    "phone": this.phone
                                };

                                //Add Contact to Session
                                //this.$store.commit('addNewContact', newContact);

                                //Store updated passcode and hint
                                this.$store.commit('updatePasscode', this.security_passcode);
                                this.$store.commit('updatePasscodeHint', this.security_passcode_hint);


                                this.$router.push({path: '/enroll/review'});

                            } else {

                                //Store updated passcode and hint
                                this.$store.commit('updatePasscode', this.security_passcode);
                                this.$store.commit('updatePasscodeHint', this.security_passcode_hint);


                                this.$router.push({path: '/enroll/review'});

                            }


                        } else {


                            this.verify.$dirty = true;

                        }

                    }

            },
            validateContact(event){

                var _self = this;


                if(!this.hasPrimaryContact()){



                        this.contact_relationship = "account_holder"

                        if(this.verify.first_name.$valid && this.verify.last_name.$valid && this.verify.email.$valid){


                            var newContact = {
                                "contact_type": "PRIM",
                                "contact_relationship": this.contact_relationship,
                                "first_name": this.first_name,
                                "middle_initial": this.middle_initial,
                                "last_name": this.last_name,
                                "name_suffix": this.name_suffix,
                                "email": this.email,
                                "phone": this.phone
                            };

                            this.$store.commit('addNewContact', newContact);


                            this.first_name = "";
                            this.last_name = "";
                            this.middle_initial = "";
                            this.name_suffix = "";
                            this.contact_relationship = undefined;
                            this.email = "";
                            this.phone = "";

                            setTimeout(function(){ _self.verify.$dirty = false; }, 700);

                            //Show Relationship Dropdown
                            this.isEditingSecondaryContact = true;

                        } else {

                            this.verify.$dirty = true;

                        }






                } else {



                        if (this.verify.first_name.$valid && this.verify.last_name.$valid && this.verify.email.$valid && this.verify.contact_relationship.$valid) {


                            var newContact = {
                                "contact_type": "SCND",
                                "contact_relationship": this.contact_relationship,
                                "first_name": this.first_name,
                                "middle_initial": this.middle_initial,
                                "last_name": this.last_name,
                                "name_suffix": this.name_suffix,
                                "email": this.email,
                                "phone": this.phone
                            };

                            this.$store.commit('addNewContact', newContact);


                            this.first_name = "";
                            this.last_name = "";
                            this.middle_initial = "";
                            this.name_suffix = "";
                            this.contact_relationship = undefined;
                            this.email = "";
                            this.phone = "";

                            setTimeout(function () {
                                _self.verify.$dirty = false;
                            }, 700);

                        } else {
                            this.verify.$dirty = true;
                        }
                    }




            },
            deleteContact(index){

                this.$store.commit('deleteContact', index);

            },
            editContact(index){
                console.log("Editing: ");
                console.log(index);
                var currentContacts = this.$store.getters.existingContacts;

                var thisContact = currentContacts[index];

                console.log(thisContact);

                if(thisContact.contact_relationship != 'account_holder'){
                    this.isEditingSecondaryContact = true;
                } else {
                    this.isEditingSecondaryContact = false;
                }

                this.first_name = thisContact.first_name;
                this.last_name = thisContact.last_name;
                this.middle_initial = thisContact.middle_initial;
                this.name_suffix = thisContact.name_suffix;
                this.contact_relationship = thisContact.contact_relationship;
                this.email = thisContact.email;
                this.phone = thisContact.phone;

                this.is_editing_contact = true;
                this.editing_index = index;


            },
            saveContact(index){

                console.log('Saving: ' + this.editing_index);
                var _self = this;

                if(this.contact_relationship != 'account_holder'){

                    if(this.verify.first_name.$valid && this.verify.last_name.$valid && this.verify.email.$valid && this.verify.contact_relationship.$valid){

                        var updatedContact = {
                            contact: {
                                "contact_type": "SCND",
                                "contact_relationship": this.contact_relationship,
                                "first_name": this.first_name,
                                "middle_initial": this.middle_initial,
                                "last_name": this.last_name,
                                "name_suffix": this.name_suffix,
                                "email": this.email,
                                "phone": this.phone
                            },
                            index: this.editing_index
                        };

                        console.log('Saving Secondary Contact');

                        this.$store.commit('updateContact', updatedContact);

                        this.first_name = "";
                        this.last_name = "";
                        this.middle_initial = "";
                        this.name_suffix = "";
                        this.contact_relationship = undefined;
                        this.email = "";
                        this.phone = "";

                        setTimeout(function(){ _self.verify.$dirty = false; }, 700);

                        //Show Relationship Dropdown
                        this.isEditingSecondaryContact = true;

                    } else {
                        this.verify.$dirty = true;
                    }

                } else {

                    if(this.verify.first_name.$valid && this.verify.last_name.$valid && this.verify.email.$valid) {


                        var updatedContact = {
                            contact: {
                                "contact_type": "PRIM",
                                "contact_relationship": 'account_holder',
                                "first_name": this.first_name,
                                "middle_initial": this.middle_initial,
                                "last_name": this.last_name,
                                "name_suffix": this.name_suffix,
                                "email": this.email,
                                "phone": this.phone
                            },
                            index: this.editing_index
                        };

                        console.log('Saving Primary Contact');

                        this.$store.commit('updateContact', updatedContact);

                        this.first_name = "";
                        this.last_name = "";
                        this.middle_initial = "";
                        this.name_suffix = "";
                        this.contact_relationship = undefined;
                        this.email = "";
                        this.phone = "";

                        setTimeout(function(){ _self.verify.$dirty = false; }, 700);

                        //Show Relationship Dropdown
                        this.isEditingSecondaryContact = true;

                    } else {
                        this.verify.$dirty = true;
                    }




                }


                this.is_editing_contact = false;

            },
            hasPrimaryContact(){

                var existingContacts = this.$store.getters.existingContacts;
                var primary = false;

                if(!_.isEmpty(existingContacts)){

                    console.log(existingContacts);

                    _.forEach(existingContacts, function(value, key){

                        if(value.contact_type == "PRIM"){

                            primary = true;
                        }

                    });

                }
                return primary;

            },
            appLoading(isLoading){
                this.$store.commit('updateAppIsLoading', isLoading);
            },
            resetContactValidationRules(){


                var rules = {
                    security_passcode: {
                        required: true
                    },
                    security_passcode_hint: {
                        required: true
                    }
                };

                this.$verify(rules);

            }

        },
        computed: {
            isAppLoading(){
                return this.$store.getters.isAppLoading
            },
            hasContacts(){

                var contacts = this.$store.getters.existingContacts;

                return !_.isEmpty(contacts);


            },
            showForSecondaryContact(){

                if(this.hasPrimaryContact()){

                    return true;

                } else {

                    return false;

                }

            }

        },
        created: function(){


            console.log('Service Component created.');

            var currentPasscode = this.$store.getters.getPasscode;
            var currentPasscodeHint = this.$store.getters.getPasscodeHint;


            this.security_passcode = currentPasscode;
            this.security_passcode_hint = currentPasscodeHint;

            this.options_contact_relationship = this.$store.getters.getContactRelationshipOptions;

            this.options_suffix = this.$store.getters.getSuffixOptions;


            //Set Relationship drop down for Primary Contact
            if(!this.hasPrimaryContact()){
                this.contact_relationship = "account_holder";
            } else {
                this.isEditingSecondaryContact = true;
            }

            var rules = {
                first_name: {
                    required: true,
                    blank: true
                },
                last_name: {
                    required: true,
                    blank: true
                },
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
                contact_relationship: {
                    required: true
                },
                security_passcode: {
                    required: true,
                    blank: true
                },
                security_passcode_hint: {
                    required: true,
                    blank: true
                }
            };

            this.$verify(rules);


            //If editing from query
            if(this.$route.query.id != undefined){
                this.editContact(this.$route.query.id);
            }


            window.scrollTo(0, 0);


        },
        data(){
            return {
                middle_initial: '',
                first_name: '',
                last_name: '',
                name_suffix: '',
                phone: '',
                email: '',
                contact_relationship: undefined,
                contact_type: '',
                security_passcode: '',
                security_passcode_hint: '',
                options_contact_relationship: undefined,
                options_suffix: undefined,
                is_editing_contact: false,
                editing_index: undefined,
                isEditingSecondaryContact: false
            }
        },
        mounted: function(){

            console.log('mounted');




        }
    }
</script>
