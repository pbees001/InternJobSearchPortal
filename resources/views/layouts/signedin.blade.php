<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs==================================================-->
    <title>Career Dreams</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS==================================================-->
    <link rel="stylesheet" href="{{ asset('plugins/css/plugins.css') }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="{{ asset('css/colors/green-style.css') }}">

</head>
<body>
<div class="Loader"></div>
<div class="wrapper">
    <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                    class="fa fa-bars"></i></button>
            <div class="navbar-header"><a class="navbar-brand" href="{{ route('start') }}"><img src="{{ asset('img/careerdreamslogo.png') }}"
                                                                                                class="logo logo-display" height="50px" width="50px"
                                                                                                alt=""><img
                        src="{{ asset('img/careerdreamslogo.png') }}" class="logo logo-scrolled" height="50px" width="50px" alt=""></a></div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="left-br"><a><?php echo \Illuminate\Support\Facades\Auth::user()->name?></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="clearfix"></div>
    @yield('content')

    <footer class="footer">
        <div class="row copyright">
            <div class="container">
                <p><a target="_blank" >Career Dreams</a></p>
            </div>
        </div>
    </footer>
    <div class="clearfix"></div>
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign
                                    In</a></li>
                            <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                        </ul>
                        <div class="tab-content" id="myModalLabel2">
                            <div role="tabpanel" class="tab-pane fade in active" id="login">
                                <img src="{{ asset('img/logo.png') }}" class="img-responsive" alt=""/>

                                <div class="subscribe wow fadeInUp">
                                    <form class="form-inline" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="email" id="email" name="email" class="form-control"
                                                       placeholder="Username" required=""><input type="password" id="password"
                                                                                                 name="password"
                                                                                                 class="form-control"
                                                                                                 placeholder="Password"
                                                                                                 required="">

                                                <div class="center">
                                                    <button type="submit" id="login-btn" class="submit-btn"> Login
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="register">
                                <img src="{{ asset('img/logo.png') }}" class="img-responsive" alt=""/>

                                <form class="form-inline" method="post">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control" placeholder="Your Name"
                                                   required=""><input type="email" name="email" class="form-control"
                                                                      placeholder="Your Email" required=""><input
                                                type="email" name="email" class="form-control" placeholder="Username"
                                                required=""><input type="password" name="password" class="form-control"
                                                                   placeholder="Password" required="">

                                            <div class="center">
                                                <button type="submit" id="subscribe" class="submit-btn"> Create
                                                    Account
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts==================================================-->
    <script type="text/javascript" src="{{ asset('plugins/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/viewportchecker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/bootsnav.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/wysihtml5-0.3.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/bootstrap-wysihtml5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/datedropper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/loader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/gmap3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugins/js/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/jQuery.style.switcher.js') }}"></script>
    <script type="text/javascript">$(document).ready(function () {
            $('#styleOptions').styleSwitcher();
        });</script>
    <script>function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }
        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }</script>
    <script>
        var finalskills='';
        function getskills(){
            console.log("inside");
            var skills = document.getElementById("skill");
            finalskills = finalskills.value.concat(skills.value);
            console.log(finalskills.value);
        }
    </script>

</div>
</body>

</html>
<?php
