@extends('layouts.app')

@section('content')
    <div class="container enrollment">
        <div class="row">


            <form method="POST" action="/enroll/validate/utility">




            <!--VERIFY UTILITY-->
            <div class="col-md-6 col-md-offset-3 text-center">




                <h1>Service and Utility</h1>
                <h2 style="margin-top: 40px; margin-bottom: 60px;">Please select your service type and utility.</h2>



                            <div class="form-group">

                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif


                                {{ Form::select('segment', config('app.customer_segments'), old('segment'), array('class' => 'form-control', 'placeholder' => 'Service Type')) }}


                                {{ Form::select('utility', $Utilities, old('utility'), array('class' => 'form-control', 'placeholder' => 'Select Your Utility')) }}

                            </div>

                            <button type="submit" class="btn btn-info btn-cpe">See Plans<span class="badge"><i class="icmn-arrow-right3"></i></span></button>

                            {{ csrf_field() }}




            </div>

            </form>


        </div>
    </div>
@endsection
