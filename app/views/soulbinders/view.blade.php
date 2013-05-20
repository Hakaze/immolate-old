@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Viewing {{{ $data['soulbinder']->name }}}
@stop
{{-- Content --}}
@section('content')
<h1>Viewing {{{ $data['soulbinder']->name }}}</h1>
<hr />
<div class="well">
   <div class="row">
      <div class="span3">
         <a href='#' class='thumbnail'>
            <img src="http://imm-mobile.aeriagames.com{{{ $data['img_path'] }}}" alt="" />
         </a>
      </div>
      <div class="span3">
         <p>
            <strong>Level:</strong> <span>{{{ $data['level'] }}}</span>
         </p>
         <p>
            MP: <span class="pull-right strong">{{{ $data['mp'] . '/' . $data['mp_max'] }}}</span>
            <div class="progress">
                     <div class="bar" style="width: {{{ $data['mp'] / $data['mp_max'] *100 }}}%"></div>
            </div>
         </p>
         <p>
            Stamina: <span class="pull-right strong">{{{ $data['stamina'] . '/' . $data['stamina_max'] }}}</span>
            <div class="progress progress-success">
                     <div class="bar" style="width: {{{ $data['stamina'] / $data['stamina_max'] *100 }}}%"></div>
            </div>
         </p>
         <p>
            Exp: <span class="pull-right strong">{{{ $data['exp'] . '/' . $data['levelup_exp'] }}}</span>
            <div class="progress progress-warning">
                     <div class="bar" style="width: {{{ $data['exp'] / $data['levelup_exp'] *100 }}}%"></div>
            </div>
         </p>
      </div>
      <div class="span2">
          <a class="btn btn-medium btn-block btn-primary" href="{{{ URL::to('soulbinders/quest/'.$data['soulbinder']->id) }}}">
            <i class='icon-share-alt icon-white'></i> Auto Quest
          </a>
         <button class="btn btn-medium btn-block btn-primary" type="button"><i class='icon-beaker icon-white'></i> Bound Potion</button>
         <button data-toggle="modal" data-target="#modalContent" href="{{{ URL::to('soulbinders/item-list/'.$data['soulbinder']->id) }}}" class="btn btn-medium btn-block btn-success" type="button">
            <i class='icon-inbox icon-white'></i> Giftbox
         </button>
         <button class="btn btn-medium btn-block btn-success" type="button"><i class='icon-gift icon-white'></i> Gift Main</button>
      </div>
   </div>
</div>
<!-- Modal -->
<div id="modalContent" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="modalLabel"></h3>
  </div>
  <div class="modal-body">
    <p></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
  </div>
</div>
@stop
