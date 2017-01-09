@extends('layouts.app')

@section('content')

    <div class="container enrollment contact-information">

        <div class="row">
            <div class="col-md-12 text-center">

                <h1>Step 2</h1>

            </div>
        </div>

        <!--NAV-->
        <div id="enrollment-nav" class="row">
            <div class="col-md-3 step active">
                <a href="/enroll/service/location">ACCOUNT INFORMATION</a>
            </div>
            <div class="col-md-3 step current">
                <a href="#">CONTACT INFORMATION</a>
                <i class="icmn-diamond4"></i>
            </div>
            <div class="col-md-3 step">
                <a href="#">PLAN REVIEW</a>
            </div>
            <div class="col-md-3 step">
                <a href="#">ENROLLMENT CONFIRMATION</a>
            </div>
        </div>
        <!--NAV END-->

        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">Contact Information</h2>
            </div>
        </div>



        @if(session()->has('AuthorizedContacts'))
                <!--AUTHORIZED CONTACTS-->
        <div class="row authorized-contacts-list">

            @foreach(session('AuthorizedContacts') AS $key => $AuthorizedContact)
                <div class="col-md-4 contact">
                    <h3>{{ \App\Http\Controllers\HomeController::DisplayContactType($AuthorizedContact->ContactType) }} Contact</h3>
                    <h4>{{ \App\Http\Controllers\HomeController::DisplayRelationshipType($AuthorizedContact->Relationship) }}</h4>
                    <p><span class="label">Name:</span> {{ $AuthorizedContact->FirstName }} {{ $AuthorizedContact->Initial }} {{ $AuthorizedContact->LastName }} {{ $AuthorizedContact->Suffix }}</p>
                    <p><span class="label">Email:</span> {{ $AuthorizedContact->Email }}</p>
                    <p><span class="label">Phone:</span> {{ $AuthorizedContact->Phone }}</p>

                    @if($AuthorizedContact->ContactType == "PRIM")
                        <a href="/enroll/edit/authorized/contact/{{ $key }}">EDIT</a>
                    @else
                        <a href="/enroll/edit/additional/contact/{{ $key }}">EDIT</a>
                    @endif

                    @if($AuthorizedContact->Relationship != "account_holder" )
                        <a href="/enroll/remove/authorized/contact/{{ $key }}">DELETE</a>
                    @endif
                </div>
            @endforeach

        </div>
        <!--AUTHORIZED CONTACTS END-->
        @endif



        <!--SUBMIT BUTTONS-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">

                        <button type="submit" class="btn btn-info btn-cpe pull-left btn-add-contact">Add Contact<span class="badge"><i class="icmn-plus2"></i></span></button>

                </div>
            </div>
        </div>
        <!--SUBMIT BUTTONS END-->



        @if(isset($selectedContact))
            {!! Form::open(['url' => 'enroll/update/additional/contact']) !!}
        @else
            {!! Form::open(['url' => 'enroll/validate/additional/contact']) !!}
        @endif

        <!--WRAP-->
        <div id="contact-form-wrap" style="display:none;">

        @if(isset($selectedContact))
            <div class="row open-update-form">
                <div class="col-md-12">
                    <h2 class="section-heading">Update Contact</h2>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    <h2 class="section-heading">Additional Contact</h2>
                </div>
            </div>
        @endif

                    <!--ERRORS-->
            <div class="row">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <!--ERRORS END-->


            <!--CONTACT INFORMATION-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FirstName">First Name*</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" value="{{ $selectedContact->FirstName or old('FirstName') }}">
                    </div>

                    <div class="form-group">
                        <label for="Initial">Initial</label>
                        <input type="text" class="form-control" id="Initial" name="Initial" value="{{ $selectedContact->Initial or old('Initial') }}">
                    </div>

                    <div class="form-group">
                        <label for="LastName">Last Name*</label>
                        <input type="text" class="form-control" id="LastName" name="LastName" value="{{ $selectedContact->LastName or old('LastName') }}">
                    </div>

                    <div class="form-group">
                        <label for="Suffix">Suffix</label>
                        <input type="text" class="form-control" id="Suffix" name="Suffix" value="{{ $selectedContact->Suffix or old('Suffix') }}">
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="Email">E-Mail*</label>
                        <input type="text" class="form-control" id="Email" name="Email" value="{{ $selectedContact->Email or old('Email') }}">
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" id="Phone" name="Phone" value="{{ $selectedContact->Phone or old('Phone') }}">
                    </div>


                    {{--<div class="form-group">--}}
                    {{--<label for="Relationship">Contact Type*</label>--}}
                    {{--@if(isset($selectedContact))--}}
                    {{--{{ Form::select('ContactType', config('app.available_contact_type'), $selectedContact->ContactType, array('class' => 'form-control', 'placeholder' => 'Select One')) }}--}}
                    {{--@else--}}
                    {{--{{ Form::select('ContactType', config('app.available_contact_type'), old('ContactType'), array('class' => 'form-control', 'placeholder' => 'Select One')) }}--}}
                    {{--@endif--}}
                    {{--</div>--}}

                    <input type="hidden" name="ContactType" value="SCND">

                    <div class="form-group">
                    <label for="Relationship">Relationship to Account Holder*</label>
                    @if(isset($selectedContact))
                    {{ Form::select('Relationship', config('app.available_relationship'), $selectedContact->Relationship, array('id' => 'Relationship', 'class' => 'form-control', 'placeholder' => 'Select One')) }}
                    @else
                    {{ Form::select('Relationship', config('app.available_relationship'), old('Relationship'), array('id' => 'Relationship', 'class' => 'form-control', 'placeholder' => 'Select One')) }}
                    @endif
                    </div>
                </div>

            </div>
            <!--CONTACT INFORMATION END-->

            <!--SUBMIT BUTTONS-->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        @if(isset($selectedContact))
                            <input type="hidden" name="index" value="{{ $index }}">
                            <button type="submit" class="btn btn-primary btn-cpe pull-left margin-top-10 margin-bottom-10">Update contact <span class="badge"><i class="icmn-checkmark"></i></span></button>
                            <a href="/enroll/review" class="btn btn-info btn-cpe pull-right btn-update-cancel">Cancel<span class="badge"><i class="icmn-cross2"></i></span></a>
                        @else
                            <button type="submit" class="btn btn-info btn-cpe pull-left">Save Contact<span class="badge"><i class="icmn-checkmark"></i></span></button>
                            <button type="button" class="btn btn-info btn-cpe pull-right btn-cancel">Cancel<span class="badge"><i class="icmn-cross2"></i></span></button>

                        @endif
                    </div>
                </div>
            </div>
            <!--SUBMIT BUTTONS END-->

            </div>
            <!--WRAP END-->

            <div class="row border-bottom"></div>



            <div class="row">
                <div class="col-md-7">
                    <h2 class="section-heading">Security Password</h2>
                    <h3>What is this?</h3>
                    <p class="font-size-18 margin-bottom-40">This security password will be used to verify the account holder’s identity when speaking with a CenterPoint Energy representative. It is not an online password.</p>
                </div>
            </div>

            <!--ERRORS-->
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->first('SecurityPassword') || $errors->first('SecurityPasswordHint'))
                        <div class="alert alert-danger">
                            <ul>
                                @if($errors->first('SecurityPassword'))
                                    <li>{{ $errors->first('SecurityPassword') }}</li>
                                @endif

                                @if($errors->first('SecurityPasswordHint'))
                                    <li>{{ $errors->first('SecurityPasswordHint') }}</li>
                                @endif
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
            <!--ERRORS END-->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="SecurityPassword">Security Password*</label>
                        <input type="text" class="form-control" id="SecurityPassword" name="SecurityPassword" value="{{ old('SecurityPassword')  ? old('SecurityPassword') : session('Security.SecurityPassword') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="SecurityPasswordHint">Security Password Hint*</label>
                        <input type="text" class="form-control" id="SecurityPasswordHint" name="SecurityPasswordHint" value="{{ old('SecurityPasswordHint') ? old('SecurityPasswordHint') : session('Security.SecurityPasswordHint') }}">
                    </div>
                </div>
            </div>

            {{--@if(session('AuthorizedContacts'))--}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">

                        <button type="submit" class="btn btn-info btn-cpe pull-right">Next<span class="badge"><i class="icmn-arrow-right3"></i></span></button>
                        <a href="/enroll/service/location" class="btn btn-info btn-cpe pull-left btn-back">Back<span class="badge"><i class="icmn-arrow-left3"></i></span></a>
                    </div>
                </div>
            </div>
            {{--@endif--}}

            {!! Form::close() !!}

    </div>
@endsection