<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beautiful Bangladesh | Home</title>

    <!-- Bootstrap Core CSS -->
    <!-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">

    <!-- Custom CSS -->
    <!-- <link href="{{asset('css/business-casual.css')}}" rel="stylesheet"> -->
    <!-- <link href="./css/business-casual.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo asset('css/business-casual.css')?>" type="text/css">

    <!-- <link href="css/freelancer.css" rel="stylesheet"> -->

    <!--ghuri.com customized style-->
    <!-- <link href="{{asset('css/ghuri.css')}}" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo asset('css/ghuri.css')?>" type="text/css">

    <!--for Login form right list fa-check-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">


<!--     <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
 -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">ghuri.com</div>
    <div class="address-bar">Land of Dreams</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="blog.php">Blog</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="img/_home/slide-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/_home/slide-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="img/_home/slide-3.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">Beautiful Bangladesh</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>By
                            <strong>ghuri.com</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Start Your Trip
                        <strong>Right Here</strong>
                    </h2>
                    <hr>

                    <div class="col-sm-2">

                    </div>
                    
                    <div class="col-sm-8">

                    <div class="trip_plan_search">
                        <ul class="nav nav-tabs test-trip">
                          <li class="active"><a class="icon_tab" data-toggle="tab" title="Tourist Spot" href="#tour_spot"><img 
                            src="icons/tourist_spot.PNG" alt="Tourist Spot"></a></li>
                          <li><a class="icon_tab" data-toggle="tab" title="Accommodation" href="#accommodation"><img 
                            src="icons/accommodation.PNG" alt="Accommodation"></a></li>
                          <li><a class="icon_tab" data-toggle="tab" title="Transport" href="#transport"><img 
                            src="icons/transport.PNG" alt="Transport"></a></li>
                          <li><a class="icon_tab" data-toggle="tab" title="Restaurant" href="#restaurant"><img 
                            src="icons/restaurant.PNG" alt="Restaurant"></a></li>
                          <li><a class="icon_tab" data-toggle="tab" title="Event" href="#event"><img 
                            src="icons/event.PNG" alt="Event"></a></li>
                        </ul>
                    
                        <div class="tab-content">
                          <div id="tour_spot" class="tab-pane fade in active">
                            <h3>Find a Tourist Spot</h3>
                            @include('forms.test')
                            <!-- @include('forms.search_tourist_spot_form') -->
                            <!-- include(app_path().'/forms/search_tourist_spot_form.php'); -->
                            <?php //include("forms/search_tourist_spot_form.php");?>
                          </div>
                          
                          <div id="accommodation" class="tab-pane fade">
                            <h3>Find an Accommodation</h3>
                            <?php //include("forms/search_accommodation_form.php");?>            
                          </div>

                          <div id="transport" class="tab-pane fade">
                            <h3>Find a Transport</h3>
                            <?php //include("forms/search_transport_form.php");?>            
                          </div>

                          <div id="restaurant" class="tab-pane fade">
                            <h3>Find a Restaurant</h3>
                            <?php //include("forms/search_restaurant_form.php");?>
                          </div>
                          <div id="event" class="tab-pane fade">
                            <h3>Find out What's Happening!</h3>
                            <?php //include("forms/search_event_form.php");?>
                          </div>
                        </div>
                    </div><!--trip plan search complete-->

                    </div>

                    <div class="col-sm-2">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Blogs
                        <strong>People are Talking about</strong>
                    </h2>
                    <hr>
                    
                    <div class="col-sm-12 blog-preview">
                        <img class="img-circle img-responsive img-center pull-left" src="img/recent_blogs/blog-1.jpg" alt="">
                        <a href="#"><h2>A Spiritual Awakening
                                            <small>Bandarban</small>
                                    </h2>
                        </a>
                        <p>At this time, many things are changing in the world. We live a time of awakening 
                            and desire to change, never seen before. Many people now want to take their lives 
                            back into their own hands and escape the model imposed by society in order to really
                            know happiness and live the life they truly want to live. </p>
                            <a href="#">Read More</a>
                    </div>
                    <hr>
                    <div class="col-sm-12 blog-preview">
                        <img class="img-circle img-responsive img-center pull-right" src="img/recent_blogs/blog-4.jpg" alt="">
                        <a href="#"><h2>Back to School
                                        <small>Brahmanbaria</small>
                                    </h2>
                        </a>
                        <p>Undoubtedly, expat life can be very exciting. The experiences and challenges of 
                            life abroad develop one as a person, teach new skills and enhance capabilities, 
                            create new meanings in life, and generally translate into valuable memories, 
                            which are worth remembering for many years ahead. But home is something different.</p>
                            <a href="#">Read More</a>
                    </div>
                    <hr>
                    <div class="col-sm-12 blog-preview">
                        <img class="img-circle img-responsive img-center pull-left" src="img/recent_blogs/blog-3.jpg" alt="">
                        <a href="#"><h2>Lost in the Dreams
                                        <small>Sundarban</small>
                                    </h2>
                        </a>

                        <p>Donec id elit non mi porta gravida at eget metus. 
                            Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, 
                            ut fermentum massa justo sit amet risus.</p>
                            <a href="#">Read More</a>
                    </div>
                
                </div>
            </div>
        </div><!--./row-->

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Login</strong>
                        To get all features
                    </h2>
                    <hr>
                    
                    <div class="col-sm-6 login-body">
                        <div class="modal-body">
                            <form class="form col-md-12 center-block">
                                <div class="form-group">
                                  <input type="text" class="form-control input-lg" placeholder="Email">
                                </div>
                                <div class="form-group">
                                  <input type="password" class="form-control input-lg" placeholder="Password">
                                </div>
                                <div class="form-group">
                                  <button class="btn btn-primary btn-lg btn-block">Sign In</button>
                                  <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-12">
                              <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            </div>
                        </div>
                    </div>
                
                    <div class="col-xs-6 register-ad">
                      <p class="lead">Not a member? Register now for <span class="text-success">FREE</span></p>
                      <ul class="list-unstyled" style="line-height: 2">
                          <li><span class="fa fa-check text-success"></span> Share your trip</li>
                          <li><span class="fa fa-check text-success"></span> Write blogs</li>
                          <li><span class="fa fa-check text-success"></span> Get ratings</li>
                          <li><span class="fa fa-check text-success"></span> Keep your plan organized</li>
                      </ul>
                      <p><a href="#" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
                
                </div>
            </div>
        </div><!--./row-->




    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; ghuri 2016</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>


</body>

</html>
