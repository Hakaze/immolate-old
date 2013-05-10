@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Soulbinders
@stop
{{-- Content --}}
@section('content')
<h1>My Soulbinders</h1>
<hr />
@if ($soulbinders->count() > 0)
<div class="btn-toolbar">
    <a href="{{{ URL::to('soulbinders/add') }}}" class="btn btn-primary">Add Existing</a>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>Account Name</th>
          <th>Session ID</th>
          <th>Created</th>
        </tr>
      </thead>
      <tbody>
         @foreach ($soulbinders as $sb)
           <tr>
             <td><a href='{{{ URL::to("soulbinders/view/" . $sb->id ) }}}'>{{ $sb->name }}</a></td>
             <td>{{ $sb->php_sess_id }}</td>
             <td>{{ $sb->created_at }}</td>
           </tr>
         @endforeach
      </tbody>
    </table>
</div>
@else 
<div class="alert alert-block">
  <h4>There are no Soulbinders attached to this account.
    <a href="{{ URL::to('soulbinders/add') }}" class="btn btn-large pull-right">Add One</a>
  </h4>
  <p>Add a soulbinder that you have created.</p>
</div>
@endif
@stop
