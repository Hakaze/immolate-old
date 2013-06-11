@extends('layouts.login')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Login
@stop

{{-- Content --}}
@section('content')
<div class="container">
	<div class="row">
		<div class="span4 offset4 well">
			<legend>Please Sign In</legend>
			<form method="POST" action="" accept-charset="UTF-8">
				<!-- CSRF Token -->
				<input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />
				<!-- ./ CSRF Token -->				
				
				<!-- Email -->
				<div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
					<label class="control-label" for="email">Email</label>
					<div class="controls">
						<input type="text" class="span4" placeholder="Email" name="email" id="email" value="{{{ Input::old('email') }}}" />
					</div>
				</div>
				<!-- ./ email -->

				<!-- Password -->
				<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
					<label class="control-label" for="password">Password</label>
					<div class="controls">
						<input type="password" class="span4" name="password" id="password" placeholder="Password" />
					</div>
				</div>
				<!-- ./ password -->

				<!-- Login button -->
				<button type="submit" name="submit" class="btn btn-info btn-block">Sign in</button>
				<!-- ./ login button -->
			</form>    
		</div>
	</div>
</div>
@stop
