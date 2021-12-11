@extends('layouts.signedin')

@section('content')
    <!-- Title Header Start -->
    <section class="inner-header-title no-br advance-header-title" style="background-image:url({{ asset('/img/banner-10.jpg') }})">
        <div class="container">
            <h2><span>Career Dreams.</span> Find the dream job</h2>
            <p><span><?php echo rand(100, 1000) ?></span> new jobs in the last <span><?php echo rand(4, 10) ?></span> days.</p>
        </div>
    </section>
    <div class="clearfix"></div>
    <!-- Title Header End -->

    <!-- bottom form section start -->
    <form method="GET" action="{{ route('home') }}" class="bt-form">
    <section class="bottom-search-form">
        <div class="container">
                <div class="col-md-3 col-sm-6">
                    <input type="text" class="form-control" placeholder="Skills, Designations, Keyword" id="joblist" name="query" value="{{ old("query") }}">
                </div>
                <div class="col-md-3 col-sm-6">
                </div>
                <div class="col-md-3 col-sm-6">
                </div>
                <div class="col-md-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">Search Job</button>
                </div>
        </div>
    </section>
    <!-- Bottom Search Form Section End -->

    <!-- ========== Begin: Brows job Category ===============  -->
    <section class="brows-job-category gray-bg">
        <div class="container">
            <div class="col-md-9 col-sm-12">
                <div class="full-card">

                    <div class="card-body">
                        <?php
                        $results_per_page = 5;
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
                        <?php $i = ($j-1)+($page-1)*$results_per_page; ?>

                        <article class="advance-search-job">
                            <div class="row no-mrg">
                                <div class="col-md-6 col-sm-6">
                                    <a href="/job-apply-details/?id=<?php echo $responce["hits"]["hits"][$i]["_id"] ?>" title="job Detail">
                                        <div class="advance-search-img-box">
                                            <img src="<?php echo $responce["hits"]["hits"][$i]["_source"]["logoUrl"] ?>" class="img-responsive" alt="">
                                        </div>
                                    </a>
                                    <div class="advance-search-caption">
                                        <a href="/job-apply-details/?id=<?php echo $responce["hits"]["hits"][$i]["_id"] ?>" title="Job Dtail"><h4><?php echo $responce["hits"]["hits"][$i]["_source"]["jobTitle"] ?></h4></a>
                                        <span><?php echo $responce["hits"]["hits"][$i]["_source"]["companyName"] ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="advance-search-job-locat">
                                        <p><i class="fa fa-map-marker"></i><?php echo $responce["hits"]["hits"][$i]["_source"]["location"] ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <a href="<?php echo $responce["hits"]["hits"][$i]["_source"]["applyUrl"] ?>"  class="btn advance-search" title="apply">Apply</a>
                                </div>
                            </div>
                        </article>
                            <?php endfor ?>

                    </div>
                </div>

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

            <!-- Sidebar Start -->
            <div class="col-md-3 col-sm-12">
                <div class="sidebar right-sidebar">

                    <div class="side-widget">
                        <h2 class="side-widget-title">Company</h2>
                        <div class="widget-text padd-0">
                            <ul>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="company1" id="1" value="Amazon" checked>
												<label for="1"></label>
											</span>
                                    Amazon
                                </li>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="company2" id="2" value="Microsoft" checked>
												<label for="2"></label>
											</span>
                                    Microsoft
                                </li>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="company3" value="Google" id="3" checked>
												<label for="3"></label>
											</span>
                                    Google
                                </li>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="company4" value="Facebook" id="4" checked>
												<label for="4"></label>
											</span>
                                    Facebook
                                </li>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="company5" value="Adobe" id="5" checked>
												<label for="5"></label>
											</span>
                                    Adobe
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="side-widget">
                        <h2 class="side-widget-title"><a href="#designation" data-toggle="collapse">Designation<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
                        <div class="widget-text padd-0 collapse" id="designation">
                            <ul>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="designation1" value="Designer" id="1" checked>
												<label for="1"></label>
											</span>
                                    Designer
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="designation2" value="Software Developer" id="2" checked>
												<label for="2"></label>
											</span>
                                    Software Developer
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="designation3" value="Manager" id="3" checked>
												<label for="3"></label>
											</span>
                                    Manager
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="designation4" value="Data Scientist" id="4" checked>
												<label for="4"></label>
											</span>
                                    Data Scientist
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="designation5" value="Research Engineer" id="5" checked>
												<label for="5"></label>
											</span>
                                    Research Engineer
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="designation6" value="Electrical Developer" id="6" checked>
												<label for="6"></label>
											</span>
                                    Electrical Engineer
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="side-widget">
                        <h2 class="side-widget-title"><a href="#job-location" data-toggle="collapse">Location<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
                        <div class="widget-text padd-0 collapse" id="job-location">
                            <ul>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="location1" value="United States" id="1" checked>
												<label for="1"></label>
											</span>
                                    United States
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="location2" value="United Kingdom" id="2" checked>
												<label for="2"></label>
											</span>
                                    United Kingdom
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="location3" value="India" id="3" checked>
												<label for="3"></label>
											</span>
                                    India
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="location4" value="Sweden" id="4" checked>
												<label for="4"></label>
											</span>
                                    Sweden
                                </li>

                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="location5" value="Mexico" id="5" checked>
												<label for="5"></label>
											</span>
                                    Mexico
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="side-widget">
                        <h2 class="side-widget-title"><a href="#job-type" data-toggle="collapse">Job type<i class="pull-right fa fa-angle-double-down" aria-hidden="true"></i></a></h2>
                        <div class="widget-text padd-0 collapse" id="job-type">
                            <ul>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="jobtype1" value="Full-time" id="1" checked>
												<label for="1"></label>
											</span>
                                    Full Time
                                </li>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="jobtype2" value="Part-time" id="2" checked>
												<label for="2"></label>
											</span>
                                    Part Time
                                </li>
                                <li>
											<span class="custom-checkbox">
												<input type="checkbox" name="jobtype3" value="Internship" id="3" checked>
												<label for="3"></label>
											</span>
                                    Internship
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Sidebar End -->

        </div>
    </section>
    </form>

    <!-- ========== Begin: Brows job Category End ===============  -->

@endsection
