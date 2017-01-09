@extends('layouts.app')

@section('content')

    <div class="container enrollment review">

        <div class="row">
            <div class="col-md-12 text-center">

                <h1>Step 3</h1>

            </div>
        </div>

        <!--NAV-->
        <div id="enrollment-nav" class="row">
            <div class="col-md-3 step active">
                <a href="/enroll/service/location">ACCOUNT INFORMATION</a>
            </div>
            <div class="col-md-3 step active">
                <a href="/enroll/authorized/contacts">CONTACT INFORMATION</a>
            </div>
            <div class="col-md-3 step current">
                <a href="#">PLAN REVIEW</a>
                <i class="icmn-diamond4"></i>
            </div>
            <div class="col-md-3 step">
                <a href="#">ENROLLMENT CONFIRMATION</a>
            </div>
        </div>
        <!--NAV END-->

        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">Please review your information</h2>
            </div>
        </div>


        <!--OFFER-->
        <div class="row offer">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{ $selectedOffer->name }}
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 text-center right-divider offer-col">
                                <div class="v-center">
                                    <span class="price">${{ $selectedOffer->latest_price }}</span>
                                    <span class="unit">{{ $selectedOffer->price_units }} {{ $selectedOffer->price_type }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 right-divider offer-col">
                                <p class="description">{{ $selectedOffer->description }}</p>
                            </div>
                            <div class="col-md-4 text-center attributes offer-col">
                                <p class="offer-attribute"><span class="label">Term Months:</span> {{ $selectedOffer->term_months != '' ? $selectedOffer->term_months : 'N/A' }}</p>
                                <p class="offer-attribute"><span class="label">End Date:</span> {{ $selectedOffer->term_end_date != '' ? $selectedOffer->term_end_date : 'N/A' }}</p>
                                <p class="offer-attribute"><span class="label">Early Termination Fee:</span> ${{ number_format($selectedOffer->etf_amount,2) }}</p>
                                @if($selectedOffer->contract_url = '')
                                    <p class="offer-attribute"><span class="label">Terms & Conditions:</span> N/A </p>
                                @else
                                    <p class="offer-attribute"><span class="label">Terms & Conditions:</span> <a href="{{ $selectedOffer->contract_url }}" target="_blank">Download</a></p>
                                @endif
                                {{--<button type="submit" class="btn btn-info btn-cpe">Enroll Now<span class="badge"><i class="icmn-arrow-right3"></i></span></button>--}}
                                <a href="enroll/offers" class="btn btn-info btn-cpe">Edit Plan<span class="badge"><i class="icmn-arrow-right3"></i></span></a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <!--OFFER END-->

        <!--HEADING-->
        <div class="row">
            <div class="col-md-12">
                <h3>ACCOUNT INFORMATION</h3>
            </div>
        </div>
        <!--HEADING END-->

        <!--ACCOUNT INFO-->
        <div class="row account-info">
            <div class="col-md-6">
                <p class="info-attribute"><span class="label">Service Type:</span> {{ session('SelectedSegment') }} <a href="/enroll/verify/utility"> Edit</a></p>
                <p class="info-attribute"><span class="label">Utility Name:</span> {{ session('SelectedUtility')->name }} <a href="/enroll/verify/utility"> Edit</a></p>
                <p class="info-attribute"><span class="label">Account Name:</span> {{ $serviceLocation->AccountName }} <a href="/enroll/service/location"> Edit</a></p>
                <p class="info-attribute"><span class="label">Account Number:</span> {{ $serviceLocation->AccountNumber }} <a href="/enroll/service/location"> Edit</a></p>

                @if(session('SelectedUtility')->meter_number_required == true)
                <p class="info-attribute"><span class="label">Meter Number:</span> {{ $serviceLocation->MeterNumber }} <a href="/enroll/service/location"> Edit</a></p>
                @endif
            </div>
            <div class="col-md-6">
                <p class="info-attribute"><span class="label">Service Address:</span>  {{ $serviceLocation->ServiceAddress }} <a href="/enroll/service/location"> Edit</a></p>
                <p class="info-attribute"><span class="label">City/State:</span> {{ $serviceLocation->ServiceCity }}, {{ $serviceLocation->ServiceState }} {{ $serviceLocation->ServiceZip }} <a href="/enroll/service/location"> Edit</a></p>
                <p class="info-attribute"><span class="label">Mailing Address:</span> {{ $serviceLocation->MailingAddress }} <a href="/enroll/service/location"> Edit</a></p>
                <p class="info-attribute"><span class="label">City/State:</span> {{ $serviceLocation->MailingCity }}, {{ $serviceLocation->MailingState }} {{ $serviceLocation->MailingZip }} <a href="/enroll/service/location"> Edit</a></p>
            </div>
        </div>
        <!--ACCOUNT INFO END-->

        <!--HEADING-->
        <div class="row">
            <div class="col-md-12">
                <h3>CONTACT INFORMATION</h3>
            </div>
        </div>
        <!--HEADING END-->


        <!--CONTACT INFO-->
        <div class="row contact-info" style="margin-bottom: 0px;">

            @if(session('AuthorizedContacts'))
                @foreach(session('AuthorizedContacts') AS $key => $AuthorizedContact)

                    @if($AuthorizedContact->ContactType == "PRIM")
                        <div class="col-md-4 contact">
                            <p class="info-attribute"><span class="label">{{ \App\Http\Controllers\HomeController::DisplayContactType($AuthorizedContact->ContactType) }} Contact:</span> {{ \App\Http\Controllers\HomeController::DisplayRelationshipType($AuthorizedContact->Relationship) }} <a href="/enroll/edit/authorized/contact/{{ $key }}"> Edit</a></p>
                            <p class="info-attribute"><span class="label">Name:</span>  {{ $AuthorizedContact->FirstName }} {{ $AuthorizedContact->Initial }} {{ $AuthorizedContact->LastName }} {{ $AuthorizedContact->Suffix }} <a href="/enroll/edit/authorized/contact/{{ $key }}"> Edit</a></p>
                            <p class="info-attribute"><span class="label">Email Address:</span> {{ $AuthorizedContact->Email }} <a href="/enroll/edit/authorized/contact/{{ $key }}"> Edit</a></p>
                            <p class="info-attribute"><span class="label">Phone:</span>  {{ $AuthorizedContact->Phone }} <a href="/enroll/edit/authorized/contact/{{ $key }}"> Edit</a></p>
                        </div>
                    @else
                        <div class="col-md-4 contact">
                            <p class="info-attribute"><span class="label">{{ \App\Http\Controllers\HomeController::DisplayContactType($AuthorizedContact->ContactType) }} Contact:</span> {{ \App\Http\Controllers\HomeController::DisplayRelationshipType($AuthorizedContact->Relationship) }} <a href="/enroll/edit/additional/contact/{{ $key }}"> Edit</a></p>
                            <p class="info-attribute"><span class="label">Name:</span>  {{ $AuthorizedContact->FirstName }} {{ $AuthorizedContact->Initial }} {{ $AuthorizedContact->LastName }} {{ $AuthorizedContact->Suffix }} <a href="/enroll/edit/additional/contact/{{ $key }}"> Edit</a></p>
                            <p class="info-attribute"><span class="label">Email Address:</span> {{ $AuthorizedContact->Email }} <a href="/enroll/edit/additional/contact/{{ $key }}"> Edit</a></p>
                            <p class="info-attribute"><span class="label">Phone:</span>  {{ $AuthorizedContact->Phone }} <a href="/enroll/edit/additional/contact/{{ $key }}"> Edit</a></p>
                        </div>
                    @endif

                @endforeach
            @endif
        </div>
        <!--CONTACT INFO END-->

        <div class="row border-bottom">
            <div class="col-md-12">
                <a href="enroll/additional/contact" class="btn btn-info btn-cpe" style="margin-top: 0px;">Add Additional Contact<span class="badge"><i class="icmn-plus2"></i></span></a>
            </div>
        </div>


        <!--HEADING-->
        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading" style="margin-bottom: 0px;">Terms and Conditions</h2>
            </div>
        </div>
        <!--HEADING END-->

        {!! Form::open(['url' => 'enroll/validate/terms']) !!}


        <!--ERRORS-->
        <div class="row margin-top-20">
            <div class="col-md-12">
                @if ($errors->first('Terms'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('Terms') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
        <!--ERRORS END-->

        <!--TERMS-->
        <div class="row border-bottom">
            <div class="col-md-12 padding-40 padding-bottom-0">
                @foreach($legalTerms AS $term)
                    <div class="form-group">
                        <div class="checkbox">
                            <label>

                                <input type="checkbox" name="Terms[]" >
                                <span class="term">{{ $term->content }}</span>
                            </label>
                        </div>

                        @if($loop->last)
                        <input type="hidden" name="TermCount" value="{{ $loop->count }}">
                        @endif


                    </div>
                @endforeach
            </div>
        </div>
        <!--TERMS END-->


        <!--HEADING-->
        <div class="row">
            <div class="col-md-6">
                <h2 class="section-heading" style="margin-bottom: 0px;">Verification and Electronic Signature</h2>
                <h3 class="section-sub-heading">Choose a 4-digit verification PIN. This PIN will serve as your electronic signature.</h3>
            </div>
        </div>
        <!--HEADING END-->

        <!--ERRORS-->
        <div class="row">
            <div class="col-md-12">
                @if ($errors->first('VerificationPin'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->get('VerificationPin') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
        <!--ERRORS END-->

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="VerificationPIN">Verification PIN</label>
                    <input type="text" class="form-control" id="VerificationPin" name="VerificationPin" value="{{ old('VerificationPin') }}" maxlength="4">

                </div>
            </div>
        </div>


        <!--SUBMIT-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-cpe pull-right agree">Agree and Submit<span class="badge"><i class="icmn-arrow-right3"></i></span></button>
                    <a href="/enroll/authorized/contacts" class="btn btn-info btn-cpe pull-left btn-back">Back<span class="badge"><i class="icmn-arrow-left3"></i></span></a>
                </div>
            </div>
        </div>
        <!--SUBMIT END-->

    {!! Form::close() !!}

    </div>
@endsection