@extends('layouts.app')

@section('content')

    <div class="container enrollment complete">
        <div class="row">
            <div class="col-md-12 text-center">

                <h1>Step 4</h1>

            </div>
        </div>

        <!--NAV-->
        <div id="enrollment-nav" class="row">
            <div class="col-md-3 step">
                <a href="#">ACCOUNT INFORMATION</a>
            </div>
            <div class="col-md-3 step">
                <a href="#">CONTACT INFORMATION</a>
            </div>
            <div class="col-md-3 step">
                <a href="#">PLAN REVIEW</a>
            </div>
            <div class="col-md-3 step current">
                <a href="#">ENROLLMENT CONFIRMATION</a>
                <i class="icmn-diamond4"></i>
            </div>
        </div>
        <!--NAV END-->

        <div class="row margin-top-80 border-bottom">
            <div class="col-md-12 text-center">

                <h1 class="margin-top-40 margin-bottom-40">You're Done!</h1>
                <h2 class="done">Please make note of your confirmation number, or print this page for your records.
                    You should also receive a confirmation email shortly. If you have questions about your
                    new natural gas plan or service, please contact Customer Service at {{ session('SelectedUtility')->customer_service_phone }}. 
                    Thanks for choosing CenterPoint Energy.</h2>

            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h2 class="section-heading">Confirmation</h2>
            </div>
        </div>


        <!--ACCOUNT INFO-->
        <div class="row account-info">
            <div class="col-md-6">
                <p class="info-attribute"><span class="label">Confirmation Number:</span> {{ session('complete')->order_number }} </p>
            </div>

        </div>
        <!--ACCOUNT INFO END-->

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
                <p class="info-attribute"><span class="label">Service Type:</span> {{ session('SelectedSegment') }} </p>
                <p class="info-attribute"><span class="label">Utility Name:</span> {{ session('SelectedUtility')->name }} </p>
                <p class="info-attribute"><span class="label">Account Name:</span> {{ $serviceLocation->AccountName }} </p>
                <p class="info-attribute"><span class="label">Account Number:</span> {{ $serviceLocation->AccountNumber }} </p>

                @if(session('SelectedUtility')->meter_number_required == true)
                    <p class="info-attribute"><span class="label">Meter Number:</span> {{ $serviceLocation->MeterNumber }} </p>
                @endif
            </div>
            <div class="col-md-6">
                <p class="info-attribute"><span class="label">Service Address:</span>  {{ $serviceLocation->ServiceAddress }} </p>
                <p class="info-attribute"><span class="label">City/State:</span> {{ $serviceLocation->ServiceCity }}, {{ $serviceLocation->ServiceState }} {{ $serviceLocation->ServiceZip }} </p>
                <p class="info-attribute"><span class="label">Mailing Address:</span> {{ $serviceLocation->MailingAddress }} </p>
                <p class="info-attribute"><span class="label">City/State:</span> {{ $serviceLocation->MailingCity }}, {{ $serviceLocation->MailingState }} {{ $serviceLocation->MailingZip }} </p>
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
        <div class="row contact-info style="margin-bottom: 0px;">

            @if(session('AuthorizedContacts'))
                @foreach(session('AuthorizedContacts') AS $key => $AuthorizedContact)

                    @if($AuthorizedContact->ContactType == "PRIM")
                        <div class="col-md-4 contact">
                            <p class="info-attribute"><span class="label">{{ \App\Http\Controllers\HomeController::DisplayContactType($AuthorizedContact->ContactType) }} Contact:</span> {{ \App\Http\Controllers\HomeController::DisplayRelationshipType($AuthorizedContact->Relationship) }} </p>
                            <p class="info-attribute"><span class="label">Name:</span>  {{ $AuthorizedContact->FirstName }} {{ $AuthorizedContact->Initial }} {{ $AuthorizedContact->LastName }} {{ $AuthorizedContact->Suffix }} </p>
                            <p class="info-attribute"><span class="label">Email Address:</span> {{ $AuthorizedContact->Email }} </p>
                            <p class="info-attribute"><span class="label">Phone:</span>  {{ $AuthorizedContact->Phone }} </p>
                        </div>
                    @else
                        <div class="col-md-4 contact">
                            <p class="info-attribute"><span class="label">{{ \App\Http\Controllers\HomeController::DisplayContactType($AuthorizedContact->ContactType) }} Contact:</span> {{ \App\Http\Controllers\HomeController::DisplayRelationshipType($AuthorizedContact->Relationship) }} </p>
                            <p class="info-attribute"><span class="label">Name:</span>  {{ $AuthorizedContact->FirstName }} {{ $AuthorizedContact->Initial }} {{ $AuthorizedContact->LastName }} {{ $AuthorizedContact->Suffix }} </p>
                            <p class="info-attribute"><span class="label">Email Address:</span> {{ $AuthorizedContact->Email }} </p>
                            <p class="info-attribute"><span class="label">Phone:</span>  {{ $AuthorizedContact->Phone }} </p>
                        </div>
                    @endif

                @endforeach
            @endif
        </div>
        <!--CONTACT INFO END-->





        <!--HOME-->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group text-center">
                    {{--<button type="submit" class="btn btn-info btn-cpe pull-right">Agree and Submit<span class="badge"><i class="icmn-arrow-right3"></i></span></button>--}}
                    <a href="/enroll/done" class="btn btn-info btn-cpe">Home<span class="badge"><i class="icmn-arrow-right3"></i></span></a>
                </div>
            </div>
        </div>
        <!--HOME END-->

    </div>
@endsection