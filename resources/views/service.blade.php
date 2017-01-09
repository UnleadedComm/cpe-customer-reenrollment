@extends('layouts.app')

@section('content')

<div class="container enrollment account-information">

<div class="row">
    <div class="col-md-12 text-center">

        <h1>Step 1</h1>

    </div>
</div>

<!--NAV-->
<div id="enrollment-nav" class="row">
    <div class="col-md-3 step current">
        <a href="#">ACCOUNT INFORMATION</a>
        <i class="icmn-diamond4"></i>
    </div>
    <div class="col-md-3 step">
        <a href="#">CONTACT INFORMATION</a>
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
         <h2 class="section-heading">Service Location</h2>
     </div>
 </div>

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

 {!! Form::open(['url' => 'enroll/validate/service/location']) !!}

<!--SERVICE LOCATION-->
<div class="row border-bottom">
    <div class="col-md-6">
        <div class="form-group">
            <label for="AccountName">Account Name <i class="font-size-18" style="color: gray;">(as stated on bill)*</i></label>
            <input type="text" class="form-control" id="AccountName" name="AccountName" value="{{ old('AccountName') ? old('AccountName') : session('ServiceLocation.AccountName') }}">
        </div>

        <div class="form-group">

            @if(session('SelectedUtility')->account_number_label == '')
                <label for="AccountNumber">Account Number*</label>
            @else
                <label for="AccountNumber">{{ session('SelectedUtility')->account_number_label }}*</label>
            @endif
            <input type="text" class="form-control" id="AccountNumber" name="AccountNumber" value="{{ old('AccountNumber') ? old('AccountNumber') : session('ServiceLocation.AccountNumber') }}">
        </div>

        @if(session('SelectedUtility')->meter_number_required == true)
        <div class="form-group">
            <label for="MeterNumber">Meter Number*</label>
            <input type="text" class="form-control" id="MeterNumber" name="MeterNumber" value="{{ old('MeterNumber') ? old('MeterNumber') : session('ServiceLocation.MeterNumber') }}">
        </div>
        @endif

    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="ServiceAddress">Service Address*</label>
            <input type="text" class="form-control" id="ServiceAddress" name="ServiceAddress" value="{{ old('ServiceAddress')  ? old('ServiceAddress') : session('ServiceLocation.ServiceAddress') }}">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="ServiceCity">City*</label>
            <input type="text" class="form-control" id="ServiceCity" name="ServiceCity" value="{{ old('ServiceCity') ? old('ServiceCity') : session('ServiceLocation.ServiceCity') }}">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="ServiceState">State*</label>
            {{ Form::select('ServiceState', config('app.available_states'), old('ServiceState')  ? old('ServiceState') : session('ServiceLocation.ServiceState'), array('id' => 'ServiceState', 'class' => 'form-control', 'placeholder' => 'Select State')) }}
        </div>
        <div class="form-group">
            <label class="form-control-label" for="ServiceZip">ZIP*</label>
            <input maxlength="5" type="text" class="form-control" id="ServiceZip" name="ServiceZip" value="{{ session('ProvidedZipCode') }}" readonly>
        </div>
    </div>

</div>
<!--SERVICE LOCATION END-->


<div class="row">
    <div class="col-md-12">
        <h2 class="section-heading">Mailing Address</h2>
    </div>
</div>

 <div class="row">
    <div class="col-md-12">
       <div class="form-group">
            <label class="form-control-label">
            {{ Form::checkbox('sameas', 'true', false,['id'=>'sameas']) }}
            <p class="display-inline-block font-size-16 margin-left-5">Check if mailing address is the same as service location address.</p>
            </label>
        </div>
    </div>
 </div>

<!--MAILING ADDRESS-->
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="MailingAddress">Mailing Address*</label>
            <input type="text" class="form-control" id="MailingAddress" name="MailingAddress" value="{{ old('MailingAddress')  ? old('MailingAddress') : session('ServiceLocation.MailingAddress') }}">
        </div>
        <div class="form-group">
            <label class="form-control-label" for="MailingCity">City*</label>
            <input type="text" class="form-control" id="MailingCity" name="MailingCity" value="{{ old('MailingCity') ? old('MailingCity') : session('ServiceLocation.MailingCity') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-control-label" for="ServiceState">State*</label>
            {{ Form::select('MailingState', config('app.available_states'), old('MailingState') ? old('MailingState') : session('ServiceLocation.MailingState'), array('id' => 'MailingState', 'class' => 'form-control', 'placeholder' => 'Select State')) }}
        </div>
        <div class="form-group">
            <label class="form-control-label" for="MailingZip">ZIP*</label>
            <input maxlength="5" type="text" class="form-control" id="MailingZip" name="MailingZip" value="{{ old('MailingZip') ? old('MailingZip') : session('ServiceLocation.MailingZip') }}">
        </div>
    </div>
</div>
<!--MAILING ADDRESS END-->

<div class="row">
    <div class="col-md-12">
        <button type="submit" class="btn btn-info btn-cpe pull-right">Next<span class="badge"><i class="icmn-arrow-right3"></i></span></button>
        <a href="/enroll/offers" class="btn btn-info btn-cpe pull-left btn-back">Back<span class="badge"><i class="icmn-arrow-left3"></i></span></a>
    </div>
</div>


{!! Form::close() !!}


</div>
@endsection