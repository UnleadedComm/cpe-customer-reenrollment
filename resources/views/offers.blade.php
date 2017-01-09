@extends('layouts.app')

@section('content')
    <div class="container enrollment offers">

        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <h1>Available Plans</h1>
                <h2 style="margin-top: 40px; margin-bottom: 60px;">Enrolling is fast and easy. Get started by choosing a plan below. Remember to have your utility account number available.</h2>
            </div>
        </div>

        @foreach($ActualOffers as $Offer)
        <!--OFFER-->
        <div class="row offer">
            <div class="col-md-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{ $Offer->name }}
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4 text-center right-divider offer-col">
                                <div class="v-center">
                                    <span class="price">${{ $Offer->latest_price }}</span>
                                    <span class="unit">{{ $Offer->price_units }} {{ $Offer->price_type }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 right-divider offer-col">
                                <p class="description">{{ $Offer->description }}</p>
                            </div>
                            <div class="col-md-4 text-center attributes offer-col">
                                <p class="offer-attribute"><span class="label">Term Months:</span> {{ $Offer->term_months != '' ? $Offer->term_end_date : 'N/A' }}</p>
                                <p class="offer-attribute"><span class="label">End Date:</span> {{ $Offer->term_end_date != '' ? $Offer->term_end_date : 'N/A' }}</p>
                                <p class="offer-attribute"><span class="label">Early Termination Fee:</span> ${{ number_format($Offer->etf_amount, 2) }}</p>
                                @if($Offer->contract_url == '')
                                    <p class="offer-attribute"><span class="label">Terms & Conditions:</span> N/A </p>
                                @else
                                    <p class="offer-attribute"><span class="label">Terms & Conditions:</span> <a href="{{ $Offer->contract_url }}" target="_blank">Download</a></p>
                                @endif
                                    {{--<button type="submit" class="btn btn-info btn-cpe">Enroll Now<span class="badge"><i class="icmn-arrow-right3"></i></span></button>--}}
                                <a href="enroll/select/offer/{{ $Offer->id }}" class="btn btn-info btn-cpe">Enroll Now<span class="badge"><i class="icmn-arrow-right3"></i></span></a>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <!--OFFER END-->
        @endforeach

                <!--SUBMIT-->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <a href="/enroll/verify/utility" class="btn btn-info btn-cpe btn-back">Back<span class="badge"><i class="icmn-arrow-left3"></i></span></a>
                </div>
            </div>
        </div>
        <!--SUBMIT END-->

    </div>
@endsection
