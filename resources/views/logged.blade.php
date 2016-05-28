@extends('layouts.master')
@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">You are
                <strong>Logged In</strong>
            </h2>
            <hr>
        </div>

			@if(Auth::check())
				{{ $contributor->Name}}
			@endif
        
        <p>Hello</p>

        <div class="clearfix"></div>
    </div>
</div>

@stop