@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Account Sign Up
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h1>Account Sign Up</h1>
</div>
<form method="post" action="" class="form-horizontal">
	<!-- CSRF Token -->
	<input type="hidden" name="csrf_token" id="csrf_token" value="{{{ Session::getToken() }}}" />

	<!-- First Name -->
	<div class="control-group {{{ $errors->has('first_name') ? 'error' : '' }}}">
		<label class="control-label" for="first_name">First Name</label>
		<div class="controls">
			<input type="text" name="first_name" id="first_name" value="{{{ Request::old('first_name') }}}" />
			{{{ $errors->first('first_name') }}}
		</div>
	</div>
	<!-- ./ first name -->

	<!-- Last Name -->
	<div class="control-group {{{ $errors->has('last_name') ? 'error' : '' }}}">
		<label class="control-label" for="last_name">Last Name</label>
		<div class="controls">
			<input type="text" name="last_name" id="last_name" value="{{{ Request::old('last_name') }}}" />
			{{{ $errors->first('last_name') }}}
		</div>
	</div>
	<!-- ./ last name -->

	<!-- Email -->
	<div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
		<label class="control-label" for="email">Email</label>
		<div class="controls">
			<input type="text" name="email" id="email" value="{{{ Request::old('email') }}}" />
			{{{ $errors->first('email') }}}
		</div>
	</div>
	<!-- ./ email -->

	<!-- Password -->
	<div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
		<label class="control-label" for="password">Password</label>
		<div class="controls">
			<input type="password" name="password" id="password" value="" />
			{{{ $errors->first('password') }}}
		</div>
	</div>
	<!-- ./ password -->

	<!-- Password Confirm -->
	<div class="control-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
		<label class="control-label" for="password_confirmation">Password Confirm</label>
		<div class="controls">
			<input type="password" name="password_confirmation" id="password_confirmation" value="" />
			{{{ $errors->first('password_confirmation') }}}
		</div>
	</div>
	<!-- ./ password confirm -->

	<!-- Signup button -->
	<div class="control-group">
		<div class="controls">
			<button type="submit" class="btn">Signup</button>
		</div>
	</div>
	<!-- ./ signup button -->
</form>
@stop
