@extends('layouts.master')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Showing
                <strong>Result</strong>
            </h2>
            <hr>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="box result-navbar">
        <div class="col-lg-12">
            <div class="col-sm-2"></div>
            
            <div class="col-sm-8">
                <ul class="nav nav-tabs result-show">
                  <li class="active"><a class="result-tab" data-toggle="tab" title="Reviews" href="#reviews">Reviews</a></li>
                  <li><a class="result-tab" data-toggle="tab" title="Accommodation" href="#accommodation">Accommodations</a></li>
                  <li><a class="result-tab" data-toggle="tab" title="Transport" href="#transport">Transports</a></li>
                  <li><a class="result-tab" data-toggle="tab" title="Restaurant" href="#restaurant">Restaurants</a></li>
                </ul>
            </div>

            <div class="col-sm-2"></div>
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="box result-block">
        <div class="col-lg-12">
            <hr><!-- Box starts -->
            <div class="tab-content">
              <div id="reviews" class="tab-pane fade in active">
                <h2 class="intro-text text-center">Showing reviews</h2>
              </div>
              
              <div id="accommodation" class="tab-pane fade">
                <h2 class="intro-text text-center">Showing where to stay</h2>
              </div>

              <div id="transport" class="tab-pane fade">
                <h2 class="intro-text text-center">Showing available Transport</h2>
              </div>

              <div id="restaurant" class="tab-pane fade">
                <h2 class="intro-text text-center">Showing available Restaurants</h2>
              </div>
            </div>
            <hr><!-- Box ends -->
        </div>
        
        <div class="clearfix"></div>
    </div>
</div>
@stop