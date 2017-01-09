@extends('layouts.app')

@section('content')
<div class="container enrollment zipcode">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 text-center">

                <h1>Let's Get Started</h1>
                <h2>To see which natural gas plans are available in your area,
                    enter your ZIP code below.</h2>


                    <form method="POST" action="/enroll/zip/validate">


                        <div class="form-group">
                            {{--<label for="input-zip">Zip Code</label>--}}

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <input maxlength="5" type="text" class="form-control" id="input-zip" name="zipcode" placeholder="Zip Code" value="{{ old('zipcode') }}">
                        </div>

                        <button type="submit" class="btn btn-info btn-cpe">Next<span class="badge"><i class="icmn-arrow-right3"></i></span></button>

                        {{ csrf_field() }}

                    </form>


        </div>
    </div>
</div>
@endsection
