@extends('layouts.guest')

@section('content')
    <div class="banner" style="background-image:url({{ asset('img/banner-9.jpg') }}">
        <div class="container">
            <div class="banner-caption">
                <div class="col-md-12 col-sm-12 banner-text">
                    <h1>Browse 40,000+ Intern Jobs with <i>Career Dreams</i></h1>

                    <form method="GET" action="{{ route('results') }}" class="form-horizontal">
                        <div class="col-md-4 no-padd">
                            <div class="input-group"><input type="text" class="form-control right-bor" id="joblist" name="query"
                                                            placeholder="Skills, Designations, Companies"></div>
                        </div>
                        <div class="col-md-2 no-padd">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Search Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
