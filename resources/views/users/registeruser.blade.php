@extends('layouts.master')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Register
                <strong>Now</strong>
            </h2>
            <hr>
        </div>

        @if(count($errors))
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
        @endif
        
        {!! Form::open(array('route' => 'users.store')) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Username') !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
        </div>
        
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
        
        <div class="clearfix"></div>
    </div>
</div>

@stop