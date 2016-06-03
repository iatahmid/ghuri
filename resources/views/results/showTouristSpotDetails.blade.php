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
                    <li><a class="result-tab" data-toggle="tab" title="Transport" href="#transport">Transports</a></li>
                    <li><a class="result-tab" data-toggle="tab" title="Restaurant" href="#restaurant">Restaurants</a></li>
                </ul>
            </div>

            <div class="col-sm-1"></div>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="box result-block">
        <div class="col-lg-12">
            
            <div class="tab-content">
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
              </div>

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
              </div>

              <div id="transport" class="tab-pane fade">
                <hr><!-- Box starts -->
                <h2 class="intro-text text-center">Showing
                    <strong>Transports</strong>
                </h2>   
                <hr><!-- Box ends -->
              </div>

              <div id="restaurant" class="tab-pane fade">
                <hr><!-- Box starts -->
                <h2 class="intro-text text-center">Showing
                    <strong>Restaurants</strong>
                </h2>   
                <hr><!-- Box ends -->
              </div>
            </div>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>

<!---************************************** 
    Showing spot photo on click 
************************************** -->

<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<script>

// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('img-spot-specific');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

</script>

@stop