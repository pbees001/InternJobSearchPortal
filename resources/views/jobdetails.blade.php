@extends('layouts.guest')

@section('content')
    <section class="inner-header-title" style="background-image:url({{ asset('/img/banner-10.jpg') }});">
        <div class="container">
            <h1><?php echo $responce["hits"]["hits"][0]["_source"]["companyName"] ?></h1>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- Job Detail Start -->
    <section class="detail-desc">
        <div class="container white-shadow">

            <div class="row">

                <div class="detail-pic">
                    <img src="<?php echo $responce["hits"]["hits"][0]["_source"]["logoUrl"] ?>" class="img" alt="" />
                    <a href="#" class="detail-edit" title="edit" ><i class="fa fa-pencil"></i></a>
                </div>

                <div class="detail-status">
                    <span>Job ID: <?php echo $responce["hits"]["hits"][0]["_id"] ?></span>
                </div>

            </div>

            <div class="row bottom-mrg">
                <div class="col-md-8 col-sm-8">
                    <div class="detail-desc-caption">
                        <h4><?php echo $responce["hits"]["hits"][0]["_source"]["jobTitle"] ?></h4>
                        <span class="designation"><?php echo $responce["hits"]["hits"][0]["_source"]["jobIndustries"] ?></span>
                        <p></p>
                        <br>
                        <ul>
                            <li><i class="fa fa-briefcase"></i><span><?php echo $responce["hits"]["hits"][0]["_source"]["jobType"] ?></span></li>
                            <li><i class="fa fa-flask"></i><span><?php echo ($responce["hits"]["hits"][0]["_source"]["isRemote"]=="TRUE") ? "Remote" : "Inperson" ?></span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="get-touch">
                        <ul>
                            <li><i class="fa fa-map-marker"></i><span><?php echo $responce["hits"]["hits"][0]["_source"]["location"] ?></span></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="row no-padd">
                <div class="detail pannel-footer">

                    <div class="col-md-7 col-sm-7">
                        <div class="detail-pannel-footer-btn pull-right">
                            <a href="<?php echo $responce["hits"]["hits"][0]["_source"]["applyUrl"] ?>" class="footer-btn grn-btn" title="">Quick Apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Job Detail End -->

    <!-- Job full detail Start -->
    <section class="full-detail-description full-detail">
        <div class="container">
            <div class="row row-bottom">
                <h2 class="detail-title">Job Description</h2>
                <p><?php echo $responce["hits"]["hits"][0]["_source"]["jobDescription"] ?></p>
            </div>

            <div class="row row-bottom">
                <h2 class="detail-title">Job Functions</h2>
                <p><?php echo $responce["hits"]["hits"][0]["_source"]["jobFunctions"] ?></p>
            </div>

        </div>
    </section>
@endsection
