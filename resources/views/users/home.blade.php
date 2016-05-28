@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">{{ \Auth::user()->name }},
                <strong>Welcome!</strong>
            </h2>
            <hr>
        </div>

        <ul class="nav nav-pills" >
        @if(\Auth::check())
          <li>
            <a href="logout">Logout</a> 

          </li>
        @else
          <li>
            {{ link_to_route('login', 'Login') }}
          </li>
        @endif
        <li>
          <a href="users/create">Register</a>
        </li>
      </ul>

        <div class="clearfix"></div>
    </div>
</div>

@endsection
