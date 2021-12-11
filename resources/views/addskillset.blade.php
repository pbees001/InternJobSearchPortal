@extends('layouts.signedin')


@section('content')
    <!-- Header Title Start -->
    <section class="inner-header-title blank">
        <div class="container">
            <h1>Create Profile</h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Header Title End -->

    <!-- full detail SetionStart-->

    <section class="full-detail">
        <form class="form-inline" method="get" action="/home">
        <div class="container">

            <div class="row bottom-mrg extra-mrg">
                    <h2 class="detail-title">Add Skills</h2>
                    <div class="extra-field-box">
                        <div class="multi-box">
                            <div class="dublicat-box">

                                <div class="col-md-12 col-sm-12">
                                    <input type="text" class="form-control" placeholder="Skills, e.g. Css, Html...">
                                </div>

                                <div class="col-md-12 col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control" placeholder="85%">
                                    </div>
                                </div>

                                <button type="button" class="btn remove-field">Remove</button>
                            </div>
                        </div>
                        <button type="button" class="add-field" >Add field</button>


                    </div>
            </div>
            <div class="row bottom-mrg extra-mrg">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success btn-primary small-btn">Submit your skillset</button>
                    </div>
            </div>
        </div>
        </form>
    </section>
    <!-- full detail SetionStart-->

@endsection

