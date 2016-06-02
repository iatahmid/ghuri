@extends('layouts.master')

@section('content')

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
                            @include('forms.search_tourist_spot_form')
                          </div>
                          
                          <div id="accommodation" class="tab-pane fade">
                            <h3>Find an Accommodation</h3>
                            @include('forms.search_accommodation_form')
                            <?php //include("forms/search_accommodation_form.php");?>            
                          </div>

                          <div id="transport" class="tab-pane fade">
                            <h3>Find a Transport</h3>
                            @include('forms.search_transport_form')
                            <?php //include("forms/search_transport_form.php");?>            
                          </div>

                          <div id="restaurant" class="tab-pane fade">
                            <h3>Find a Restaurant</h3>
                            @include('forms.search_restaurant_form')
                            <?php //include("forms/search_restaurant_form.php");?>
                          </div>
                          <div id="event" class="tab-pane fade">
                            <h3>Find out What's Happening!</h3>
                            @include('forms.search_event_form')
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

        <div class="row" id="login_section">
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
                            @if(count($errors))
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            {!! Form::open(array('route' => 'handleLogin')) !!}
                                <div class="form-group">
                                    {!! Form::label('email') !!}
                                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                                </div>
                                
                                <div class="form-group">
                                  {!! Form::label('password') !!}
                                  {!! Form::password('password', array('class' => 'form-control')) !!}
                                </div>
                                
                                {!! Form::token() !!}
                                {!! Form::submit(null, array('class' => 'btn btn-default')) !!}
                            {!! Form::close() !!}
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
                      <p><a href="reg" class="btn btn-info btn-block">Yes please, register now!</a></p>
                  </div>
                
                </div>
            </div>
        </div><!--./row-->
    </div>
@stop