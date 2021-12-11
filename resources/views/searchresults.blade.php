@extends('layouts.guest')

@section('content')
    <div class="banner" style="background-image:url({{ asset('img/banner-9.jpg') }}">
        <div class="container">
            <div class="banner-caption">
                <div class="col-md-12 col-sm-12 banner-text">
                    <h1>Browse 40,000+ Intern Jobs with <i>Career Dreams</i></h1>

                    <form method="GET" action="{{ route('results') }}" class="form-horizontal">
                        @csrf
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

    <section id="resultssection" class="brows-job-category">
        <div class="container">
            <?php
                $results_per_page = 10;
                $number_of_pages = ceil($responce["hits"]["total"]["value"]/$results_per_page);
                if (!request('page')) {
                    $page = 1;
                    $rest = $_SERVER['REQUEST_URI'];
                } else {
                    $page = request('page');
                    $rest = substr($_SERVER['REQUEST_URI'], 0, -6);
                }
//            echo '<a href="' . $escaped_url . '">' . $escaped_url . '</a>';
//            echo $_SERVER['REQUEST_URI'];
//            echo $rest;
            ?>
            <?php for ($j=1;$j <= $results_per_page;$j++): ?>
            <?php $i = ($j-1)+($page-1)*10; ?>
            <div class="item-click">
                <article>
                    <div class="brows-job-list">
                        <div class="col-md-1 col-sm-2 small-padding">
                            <div class="brows-job-company-img">
                                <a href="/job-apply-detail/?id=<?php echo $responce["hits"]["hits"][$i]["_id"] ?>"><img src="<?php echo $responce["hits"]["hits"][$i]["_source"]["logoUrl"] ?>" class="img-responsive" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-5">
                            <div class="brows-job-position">
                                <a href="/job-apply-detail/?id=<?php echo $responce["hits"]["hits"][$i]["_id"] ?>"><h3><?php echo $responce["hits"]["hits"][$i]["_source"]["jobTitle"] ?></h3></a>
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
                    <li><a href="<?php echo $rest."?page=".($page-1) ?>" id="btn_prev">&laquo;</a></li>
                    <li><a href="<?php echo $rest ?>?page=1">1</a></li>
                    <li><a href="<?php echo $rest ?>?page=2">2</a></li>
                    <li><a href="<?php echo $rest ?>?page=3">3</a></li>
                    <li><a href="<?php echo $rest ?>?page=4">4</a></li>
                    <li><a href="<?php echo $rest ?>?page=5"><i class="fa fa-ellipsis-h"></i></a></li>
                    <li><a href="<?php echo $rest."?page=".($page+1) ?>" id="btn_next">&raquo;</a></li>
                </ul>
            </div>

        </div>
    </section>
@endsection






