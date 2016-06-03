@extends('layouts.master')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            
            <h2 class="intro-text text-center">
                {{ $provider['name'] }}
                <small> | {{ $provider['type'] }}</small>
            </h2>

            <?php if($provider['contact_info']){ ?>
            <h6 class = "text-center"> 
                <span class="glyphicon glyphicon-phone"></span> {{ $provider['contact_info'] }} 
            </h6>
            <?php } ?>
            
            <?php if($provider['facebook_link']){ ?>
            <h6 class = "text-center text-lowercase"> 
                <span class="fa fa-facebook"></span> 
                <a href=<?php echo $provider['facebook_link'] ?>>{{ $provider['facebook_link'] }} </a>
            </h6>
            <?php } ?>
            
            <?php if($provider['address']){ ?>
            <h6 class = "text-center"> 
                <span class="glyphicon glyphicon-home"></span> {{ $provider['address'] }} 
            </h6>
            <?php } ?>
            
            <?php if($provider['district']){ ?>
            <h6 class = "text-center"> 
                <span class="glyphicon glyphicon-hand-right"></span> {{ $provider['district'] }} 
            </h6>
            <?php } ?>
            <hr>

            <hr class="available-room-intro">
            <h2 class="intro-text text-center ">
                <strong> Available </strong> Packages
            </h2>
            <hr>
            
            @if(!$roomInfos)
                <h4 class="text-center text-capitalize"> No room available right now. </h4>
            
            @else
            @foreach($roomInfos as $roomInfo)
            <div class="room-info-block">
                
                <h3 class = "text-center text-capitalize">  
                <small>Type: </small> {{ $roomInfo['room_type'] }}    
                </h3>

                <h3 class = "text-center text-capitalize">  
                {{ $roomInfo['room_count'] }} <small> Room(s) </small>     
                <small class="text-lowercase"> for </small>
                {{ $roomInfo['room_capacity'] }} <small> Person(s) </small>     
                </h3>

                <h3 class = "text-center text-capitalize">  
                <small> Price: </small> {{ $roomInfo['room_price'] }}tk.
                </h3>

                
                
            </div>
            <hr width = "25%">
            @endforeach
            @endif
        </div>

        
        <div class="clearfix"></div>
    </div>
</div>

@stop