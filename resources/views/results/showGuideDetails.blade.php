@extends('layouts.master')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            
            <h2 class="intro-text text-center">{{ $guide['name'] }} |
                <strong>{{ $guide['working_area'] }}</strong>
            </h2>
            <h6 class="text-center"> Ph: {{ $guide['contact_info'] }} </h6>
            <hr>

            @foreach($guideInfos as $guideInfo)
            <div class="guide-info-block">
                
                <h3 class = "text-center text-capitalize">  
                <em> {{ $guideInfo['from'] }} </em> <small>to</small> <em> {{ $guideInfo['to'] }} </em>    
                </h3>

                <h5 class = "text-center text-capitalize"> Fee: {{ $guideInfo['fee'] }}tk.  </h5>
                <hr width = "20%">
                
            </div>
            @endforeach
        </div>

        
        <div class="clearfix"></div>
    </div>
</div>

@stop