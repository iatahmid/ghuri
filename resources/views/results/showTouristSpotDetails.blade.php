@extends('layouts.master')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Plan a trip for
                <strong>{{ $spot }}</strong>
            </h2>
            <hr>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>

<!-- navbar for various attributes -->
<div class="row">
    <div class="box result-navbar">
        <div class="col-lg-12">
            <div class="col-sm-1"></div>
            
            <div class="col-sm-10">
                <ul class="nav nav-tabs result-show">
                    <li class="active"><a class="result-tab" data-toggle="tab" title="gallery" href="#gallery">Gallery</a></li>
                    <li><a class="result-tab" data-toggle="tab" title="Reviews" href="#reviews">Reviews</a></li>
                    <li><a class="result-tab" data-toggle="tab" title="Guide" href="#guide">Guides</a></li>
                    <li><a class="result-tab" data-toggle="tab" title="Accommodation" href="#accommodation">Accommodations</a></li>
                    <li><a class="result-tab" data-toggle="tab" title="Restaurant" href="#restaurant">Restaurants</a></li>
                    <li><a class="result-tab" data-toggle="tab" title="Transport" href="#transport">Transports</a></li>
                </ul>
            </div>

            <div class="col-sm-1"></div>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div> <!-- navbar for various attributes -->

<div class="row">
    <div class="box result-block">
        <div class="col-lg-12">
            
            <div class="tab-content">

                <!-- *********************************************
                //           gallery for photos 
                ***********************************************-->
                <div id="gallery" class="tab-pane fade in active">
                    <hr><!-- Box starts -->
                    <h2 class="intro-text text-center">Showing
                        <strong>Photos</strong>
                    </h2>
                    <hr><!-- Box ends -->

                    <div id="carousel-spot-photo" class="carousel slide"> <!-- carousel -->
                    
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php $flag = 1; ?>
                            @foreach($photos as $photo)
                                <!-- {{ $photo['SPOT_NAME'] }} {{ $photo['UPLOADER'] }} -->
                                <?php $file_name = $photo['PHOTO_FILE']; ?>
                                <?php $uploader_name = $photo['UPLOADER']; ?>
                                @if($flag)
                                <div class="item active">
                                <?php $flag = 0;?>
                                
                                @else
                                <div class="item">
                                @endif
                                    <img    id="img-spot-specific"
                                            class="img-responsive img-full img-spot-specific" 
                                            src=<?php echo "img/uploaded/".$file_name; ?> 
                                            alt=<?php echo $uploader_name; ?>>

                                    <div class="carousel-caption">
                                        Uploaded by: 
                                        <h3> 
                                            <a href="#"> {{ $uploader_name }} </a> 
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-spot-photo" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-spot-photo" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div> <!-- carousel -->
                </div> <!-- gallery -->

                <!-- *********************************************
                //           reviews 
                ***********************************************-->
                <div id="reviews" class="tab-pane fade">
                    <hr><!-- Box starts -->
                    <?php $rating = round($avgRating['avg'], 2); ?>
                    <h2 class="intro-text text-center">Average Rating:
                        <strong>{{ $rating }}</strong>
                    </h2>   
                    <hr><!-- Box ends -->
                    @foreach($reviews as $review)
                        <!-- {{ $review['REVIEWER'] }} {{ $review['DESCRIPTION'] }} {{ $review['RATING'] }} -->
                        <div class="review-block">
                            <div class="col-sm-4">
                                <div class="pull-right rating-round">  
                                    <h1 class = "text-center rating-review"> {{ $review['RATING'] }} </h1>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h3 class = "text-center text-capitalize"> <em> "{{ $review['DESCRIPTION'] }}" </em> </h3>
                                <h4 class = "text-center pull-right"> <a href="#"> - {{ $review['REVIEWER'] }} </a> </h4>   
                            </div>

                            <div class="col-sm-2"> </div>
                        </div>
                        <div class="col-sm-4"> </div>
                        <div class="col-sm-6"> <hr width = "20%"> </div>
                        <div class="col-sm-2"> </div>
                    @endforeach
                </div><!-- reviews -->

                <!-- *********************************************
                //           guides 
                ***********************************************-->
                <div id="guide" class="tab-pane fade">
                    <hr><!-- Box starts -->
                    <h2 class="intro-text text-center">Showing
                        <strong>Guides</strong>
                    </h2>   
                    <hr><!-- Box ends -->
                    @foreach($guides as $guide)
                        
                        <h3 class = "text-center text-capitalize">  
                            <a href=<?php echo "req-guide?id=".$guide['id'] ?>>
                                <em> {{ $guide['name'] }} </em>
                            </a> 
                        </h3>
                        <h6 class = "text-center"> +880{{ $guide['contact_info'] }} </h6>   
                    
                        <hr width = "20%">
                    @endforeach
                </div><!-- guides -->

                <!-- *********************************************
                //           accommodations 
                ***********************************************-->
                <div id="accommodation" class="tab-pane fade">
                    <hr><!-- Box starts -->
                    <h2 class="intro-text text-center">Showing
                        <strong>Accommodations</strong>
                    </h2>   
                    <hr><!-- Box ends -->
                    @foreach($accommodations as $accommodation)
                    <div class="accommodation-block">
                        <h3 class = "text-center text-capitalize">  
                            <a href=<?php echo "req-accommodation?id=".$accommodation['id'] ?>>
                                <em> {{ $accommodation['name'] }} </em> <small> | {{ $accommodation['type'] }} </small>
                            </a> 
                        </h3>
                        <?php if($accommodation['contact_info']){ ?>
                        <h6 class = "text-center"> 
                            <span class="glyphicon glyphicon-phone"></span> +880{{ $accommodation['contact_info'] }} 
                        </h6>
                        <?php } ?>
                        
                        <?php if($accommodation['facebook_link']){ ?>
                        <h6 class = "text-center text-lowercase"> 
                            <span class="fa fa-facebook"></span> 
                            <a href=<?php echo $accommodation['facebook_link'] ?>>{{ $accommodation['facebook_link'] }} </a>
                        </h6>
                        <?php } ?>
                        
                        <?php if($accommodation['address']){ ?>
                        <h6 class = "text-center"> 
                            <span class="glyphicon glyphicon-home"></span> {{ $accommodation['address'] }} 
                        </h6>
                        <?php } ?>
                        
                        <?php if($accommodation['district']){ ?>
                        <h6 class = "text-center"> 
                            <span class="glyphicon glyphicon-hand-right"></span> {{ $accommodation['district'] }} 
                        </h6>
                        <?php } ?>
                        <hr width = "25%">
                    </div>
                    @endforeach
                </div><!-- accommodation -->

                <!-- *********************************************
                //           restaurants 
                ***********************************************-->
                <div id="restaurant" class="tab-pane fade">
                    <hr><!-- Box starts -->
                    <h2 class="intro-text text-center">Showing
                        <strong>Restaurants</strong>
                    </h2>   
                    <hr><!-- Box ends -->

                    @foreach($restaurants as $restaurant)
                    <div class="accommodation-block">
                        <h3 class = "text-center text-capitalize">  
                            <a href=<?php echo "req-restaurant?id=".$restaurant['id'] ?>>
                                <em> {{ $restaurant['name'] }} </em> 
                                <?php if($restaurant['specialization']){ ?>
                                    <small> | {{ $restaurant['specialization'] }} </small> 
                                <?php } ?>
                                <?php if(!$restaurant['specialization']){ ?>
                                    <small> | No speciality </small> 
                                <?php } ?>
                            </a> 
                        </h3>
                        <?php if($restaurant['contact_info']){ ?>
                        <h6 class = "text-center"> 
                            <span class="glyphicon glyphicon-phone"></span> {{ $restaurant['contact_info'] }} 
                        </h6>
                        <?php } ?>
                        
                        <?php if($restaurant['facebook_link']){ ?>
                        <h6 class = "text-center text-lowercase"> 
                            <span class="fa fa-facebook"></span> 
                            <a href=<?php echo $restaurant['facebook_link'] ?>>{{ $restaurant['facebook_link'] }} </a>
                        </h6>
                        <?php } ?>
                        
                        <?php if($restaurant['address']){ ?>
                        <h6 class = "text-center text-capitalize"> 
                            <span class="glyphicon glyphicon-home"></span> {{ $restaurant['address'] }} 
                        </h6>
                        <?php } ?>
                        
                        <?php if($restaurant['district']){ ?>
                        <h6 class = "text-center text-capitalize"> 
                            <span class="glyphicon glyphicon-hand-right"></span> {{ $restaurant['district'] }} 
                        </h6>
                        <?php } ?>
                        <hr width = "25%">
                    </div>
                    @endforeach
                </div><!-- restaurant -->

                <div id="transport" class="tab-pane fade">
                    <hr><!-- Box starts -->
                    <h2 class="intro-text text-center">Showing
                        <strong>Transports</strong>
                    </h2>   
                    <hr><!-- Box ends -->
                </div><!-- transport -->

                
            </div>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>

<!---************************************** 
    Showing spot photo on click 
************************************** -->

@stop