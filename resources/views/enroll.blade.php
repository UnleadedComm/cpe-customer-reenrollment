@extends('layouts.index')

@section('content')

    <div id="app">

        <!-- 00 ZIP Code -->
        <template id="zip-code">
            <div>
                <transition name="slide-fade">
                    <div class="container enrollment">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">

                                <h4>Let's Get Started</h4>
                                <p>To see which natural gas plans are available in your area,
                                    enter your ZIP code below.</p>

                                <validator name="validation1">
                                    <form method="POST" novalidate>

                                    <div class="form-group">
                                        <input v-validate:address_zip="['required']" maxlength="5" type="text" class="form-control" id="address_zip" name="address_zip" placeholder="Zip Code">

                                        <span v-if="$validation1.address_zip.required" class="error control-label" >Test Error</span>
                                    </div>

                                    <button v-if="$validation1.valid" type="submit" class="btn btn-info">Next <span class="glyphicon glyphicon-triangle-right"></span></button>
                                    <button type="submit" class="btn btn-info">Loading <i class="fa fa-circle-o-notch fa-spin"></i></button>

                                    </form>
                                </validator>


                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </template>
        <!-- END -->

        <!--Main Router View-->
        <router-view></router-view>
        <!-- END -->

    </div>

@endsection
