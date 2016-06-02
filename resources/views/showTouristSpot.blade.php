@extends('layouts.master')
@section('content')
<!--user id for the reviewer and user for the photo uploader-->  
     
 <?php
    $reviewResult = $reviews;
    $photoResult = $photos;
    $avgRatingResult = $avgRatings;

    $reviewBlock = array();
    $i = 0;

    foreach($reviewResult as $q)
    {
        $reviewInfo = array('description' => $q['DESCRIPTION'],
                            'rating' => $q['RATING'],
                            'contributor' => $q['NAME']);

        $reviewBlock[$q['SPOT_NAME']][$i] = $reviewInfo;
        $i++;
      
        //echo $q['SPOT_NAME'], $q['DESCRIPTION'], $q['RATING'], $q['USER'];
        //echo "<br>";
    }

    $ratingBlock = array();
    foreach($avgRatingResult as $q)
    {
        $ratingInfo = array('spot_id' => $q['SPOT_ID'],
                            'spot_name' => $q['SPOT_NAME'],
                            'rating' => $q['AVG_RATING']);

        $ratingBlock[$q['SPOT_NAME']] = $q['AVG_RATING'];
    }

    //echo "Photos: <br>";
    /*foreach($photoResult as $q)
    {
        echo $q['SPOT_NAME'], $q['PHOTO_FILE'], $q['USER'];
        echo "<br>";
    }*/

    /*foreach ($reviewBlock as $spot => $info) {
        echo $spot."<br>";
        foreach ($info as $review) {
            echo $review['description']." ".$review['rating']." ".$review['contributor']."<br>";
        }
        echo "<br>";
    }*/

?>

<!-- @foreach ($reviewBlock as $spot => $info) 
    <h5> {{ $spot }} </h5>
    @foreach ($info as $review) 
        <p> {{ $review['description'] }} {{ $review['rating'] }} {{ $review['contributor'] }} </p>
    @endforeach
@endforeach  -->

@foreach ($reviewBlock as $spot => $info) <!-- one box for every spot -->
<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">{{ $spot }}
                <?php $avgRating = round($ratingBlock[$spot], 2) ?>
                <strong> | Rating: {{ $avgRating }} </strong>
            </h2>
            <hr>
            <div id="carousel-review" class="carousel slide">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $flag = 1; ?>
                    @foreach ($info as $review) 
                        @if($flag)
                            <div class="item active">
                            <?php $flag = 0; ?>
                        @else
                            <div class="item">
                        @endif
                                <div class="col-sm-4">
                                    <div class="pull-right rating-round">  
                                        <h1 class = "text-center rating-review"> {{ $review['rating'] }} </h1>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <h3 class = "text-center text-capitalize"> <em> "{{ $review['description'] }}" </em> </h3>
                                    <h4 class = "text-center"> {{ $review['contributor'] }} </h4>   
                                    <!-- <h5 class = "text-center"> {{ $review['rating'] }} </h5> -->
                                </div>
                                <div class="col-sm-2">
                                    
                                </div>         
                            </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-review" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#carousel-review" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>

        </div>        
        <div class="clearfix"></div>
    </div>
</div>
@endforeach




@stop