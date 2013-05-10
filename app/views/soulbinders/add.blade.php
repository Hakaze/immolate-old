@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Add Soulbinder
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
  <h1>Add Existing Soulbinder</h1>
</div>
<form method="post" action="" class="form-horizontal">
  <!-- name -->
  <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
    <label class="control-label" for="name">Name</label>
    <div class="controls">
      <input type="text" name="name" id="name" value="{{{ Request::old('name') }}}" />
    </div>
  </div>
  <!-- ./ name -->

  <!-- php_sess_id -->
  <div class="control-group {{{ $errors->has('php_sess_id') ? 'error' : '' }}}">
    <label class="control-label" for="php_sess_id">PHP Session ID</label>
    <div class="controls">
      <input type="text" name="php_sess_id" id="php_sess_id" value="{{{ Request::old('php_sess_id') }}}" />
    </div>
  </div>
  <!-- ./ php_sess_id -->

  <!-- device_token -->
  <div class="control-group {{{ $errors->has('device_token') ? 'error' : '' }}}">
    <label class="control-label" for="device_token">Device Token</label>
    <div class="controls">
      <input type="text" name="device_token" id="device_token" value="{{{ Request::old('device_token') }}}" />
    </div>
  </div>
  <!-- ./ device_token -->

  <!-- social_id -->
  <div class="control-group {{{ $errors->has('social_id') ? 'error' : '' }}}">
    <label class="control-label" for="social_id">Social ID</label>
    <div class="controls">
      <input type="text" name="social_id" id="social_id" value="{{{ Request::old('social_id') }}}" />
    </div>
  </div>
  <!-- ./ social_id -->

  <!-- adid -->
  <div class="control-group {{{ $errors->has('adid') ? 'error' : '' }}}">
    <label class="control-label" for="adid">ADID</label>
    <div class="controls">
      <input type="text" name="adid" id="adid" value="{{{ Request::old('adid') }}}" />
    </div>
  </div>
  <!-- ./ adid -->

  <!-- mac -->
  <div class="control-group {{{ $errors->has('mac') ? 'error' : '' }}}">
    <label class="control-label" for="mac">MAC Address</label>
    <div class="controls">
      <input type="text" name="mac" id="mac" value="{{{ Request::old('mac') }}}" />
    </div>
  </div>
  <!-- ./ mac -->

  <!-- oauth -->
  <div class="control-group {{{ $errors->has('oauth') ? 'error' : '' }}}">
    <label class="control-label" for="oauth">OAuth Header</label>
    <div class="controls">
      <input type="text" name="oauth" id="oauth" value="{{{ Request::old('oauth') }}}" />
    </div>
  </div>
  <!-- ./ oauth -->

  <!-- Update button -->
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Add</button>
    </div>
  </div>
  <!-- ./ update button -->
</form>
@stop
