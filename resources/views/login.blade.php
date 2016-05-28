<!doctype html>
<html>

<head>
<title>Look at me Login</title>
</head>

<body>

<form method="POST" action="http://localhost/lara_prac/public/login" accept-charset="UTF-8">

	<input name="_token" type="hidden" value="Dvg7jYRLCiiQNGgqAsbtHDRxlMWNsbbjScZHsMTM">

	<label for="email">Email Address</label> <input placeholder="awesome@awesome.com" name="email" type="text" id="email">

	<label for="password">Password</label> <input name="password" type="password" value="" id="password">

	<input type="submit" value="Submit!">

</form>



<?php
/*{{ Form::open(array('url' => 'login')) }}

<h1>Login</h1>

<!-- if there are login errors, show them here -->
<p>
    {{ $errors->first('email') }}
    {{ $errors->first('password') }}
</p>

<p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
</p>

<p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
</p>

<p>
	{{ Form::submit('Submit!') }}
</p>

{{ Form::close() }}
*/
?>

</body>
</html>