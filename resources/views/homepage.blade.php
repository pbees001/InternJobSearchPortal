@extends('layouts.signedin')

@section('content')
    <div class="banner" style="background-image:url({{ asset('img/banner-9.jpg') }}">
        <div class="container">
            <div class="banner-caption">
                <div class="col-md-12 col-sm-12 banner-text">
                    <h1>40,000+ Browse Jobs</h1>

                    <form method="GET" action="{{ route('results') }}" class="form-horizontal">
                        @csrf
                        <div class="col-md-4 no-padd">
                            <div class="input-group"><input type="text" class="form-control right-bor" id="joblist" name="query"
                                                            placeholder="Skills, Designations, Companies"></div>
                        </div>
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select id="choose-filter" class="form-control">
                                    <option>Choose Filter</option>
                                    <option>Chandigarh</option>
                                    <option>London</option>
                                    <option>England</option>
                                    <option>Pratapcity</option>
                                    <option>Ukrain</option>
                                    <option>Wilangana</option>
                                </select>
                            </div>
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
    <div class="clearfix"></div>
    <section id="resultssection" class="brows-job-category">
        <div class="container">
            <?php for ($i=0;$i < $responce["hits"]["total"]["value"] && $i < 5;$i++): ?>
            <div class="item-click">
                <article>
                    <div class="brows-job-list">
                        <div class="col-md-1 col-sm-2 small-padding">
                            <div class="brows-job-company-img">
                                <a href="{{ route('jobdetails') }}"><img src="<?php echo $responce["hits"]["hits"][$i]["_source"]["logoUrl"] ?>" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-5">
                            <div class="brows-job-position">
                                <a href="{{ route('jobdetails') }}"><h3><?php echo $responce["hits"]["hits"][$i]["_source"]["jobTitle"] ?></h3></a>
                                <p>
                                    <span><?php echo $responce["hits"]["hits"][$i]["_source"]["companyName"] ?></span><span class="brows-job-sallery"></span>
                                    <span class="job-type cl-success bg-trans-success"><?php echo $responce["hits"]["hits"][$i]["_source"]["jobType"] ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="brows-job-location">
                                <p><i class="fa fa-map-marker"></i><?php echo $responce["hits"]["hits"][$i]["_source"]["location"] ?></p>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <div class="brows-job-link">
                                <a href="<?php echo $responce["hits"]["hits"][$i]["_source"]["applyUrl"] ?>" class="btn btn-default">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endfor ?>


        <!--/.row-->
            <div class="row">
                <ul class="pagination">
                    <li><a href="#">&laquo;</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>

        </div>
    </section>
@endsection

