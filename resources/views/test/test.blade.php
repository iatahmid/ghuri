@extends('layouts.master')
@section('content')
            
	
<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">
                <strong>{!!$data['page']!!}</strong>
            </h2>
            <hr>
        </div>

        <p>Hello World!</p>  
        <p>{!!$data['email']!!}</p>
        <p>{!!$data['password']!!}</p>       
        
        <div class="clearfix"></div>
    </div>
</div>

@endsection
