@extends('layouts.master')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            
            <hr>
            <h2 class="intro-text text-center">
                {{ $restaurant['name'] }}
            </h2>

            <?php if($restaurant['specialization']){ ?>
            <h4 class="intro-text text-center">
                <small class="text-capitalize"> {{ $restaurant['specialization'] }}
                
                <a data-toggle="modal" href="#favoritesModal">Edit</a></small>
                
            </h4>

            <?php } ?>

            <?php if($restaurant['contact_info']){ ?>
            <h5 class = "text-center"> 
                <span class="glyphicon glyphicon-phone"></span> {{ $restaurant['contact_info'] }} 
            </h5>
            <?php } ?>
            
            <?php if($restaurant['facebook_link']){ ?>
            <h6 class = "text-center text-lowercase"> 
                <span class="fa fa-facebook"></span> 
                <a href=<?php echo $restaurant['facebook_link'] ?>>{{ $restaurant['facebook_link'] }} </a>
            </h6>
            <?php } ?>
            
            <?php if($restaurant['address']){ ?>
            <h5 class = "text-center text-capitalize"> 
                <span class="glyphicon glyphicon-home"></span> {{ $restaurant['address'] }} 
            </h5>
            <?php } ?>
            
            <?php if($restaurant['district']){ ?>
            <h6 class = "text-center text-capitalize"> 
                <span class="glyphicon glyphicon-hand-right"></span> {{ $restaurant['district'] }} 
            </h6>
            <?php } ?>
            <hr>

            <hr class="available-room-intro">
            <h2 class="intro-text text-center ">
                <strong> Available </strong> Foods
            </h2>
            <hr>
            
            @if(!$foodInfos)
                <h4 class="text-center text-capitalize"> No food available right now. </h4>
            
            @else
            @foreach($foodInfos as $foodInfo)
            <div class="room-info-block">
                
                <h3 class = "text-center text-capitalize">  
                {{ $foodInfo['name'] }} 
                <?php if($foodInfo['type']){ ?>
                    <small> | {{ $foodInfo['proportion'] }}:1 </small> 
                <?php } ?>    
                </h3>

                <h3 class = "text-center text-capitalize">  
                    <small class="text-capitalize"> {{ $foodInfo['type'] }} food </small>
                </h3>

                <h3 class = "text-center text-capitalize">  
                <small> Price: </small> {{ $foodInfo['price'] }}tk.
                </h3>
            </div>
            <hr width = "25%">
            @endforeach
            @endif
        </div>

        
        <div class="clearfix"></div>
    </div>
</div>

            

            <div class="modal fade" id="favoritesModal" 
                 tabindex="-1" role="dialog" 
                 aria-labelledby="favoritesModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" 
                      data-dismiss="modal" 
                      aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" 
                    id="favoritesModalLabel">The Sun Also Rises</h4>
                  </div>
                  <div class="modal-body">
                    <p>
                    Please confirm you would like to add 
                    <b><span id="fav-title">The Sun Also Rises</span></b> 
                    to your favorites list.
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" 
                       class="btn btn-default" 
                       data-dismiss="modal">Close</button>
                    <span class="pull-right">
                      <button type="button" class="btn btn-primary">
                        Add to Favorites
                      </button>
                    </span>
                  </div>
                </div>
              </div>
          </div>



@stop