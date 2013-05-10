@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
:: Viewing {{{ $soulbinder->name }}}
@stop
{{-- Content --}}
@section('content')
<h1>Viewing {{{ $soulbinder->name }}}</h1>
<hr />
<div class="well">
   <div class="row">
      <div class="span3">
         <a href='#' class='thumbnail'>
            <img src="{{{ $stronghold['ally'] }}}" alt="" />
         </a>
      </div>
      <div class="span3">
         <p>
            <strong>Level:</strong> <span>{{{ $stronghold['player_stats']['level'] }}}</span>
         </p>
         <p>
            MP: <span class="pull-right strong">{{{ $stronghold['player_stats']['mp'] . '/' . $stronghold['player_stats']['mp_max'] }}}</span>
            <div class="progress">
                     <div class="bar" style="width: {{{ $stronghold['player_stats']['mp'] / $stronghold['player_stats']['mp_max'] *100 }}}%"></div>
            </div>
         </p>
         <p>
            Stamina: <span class="pull-right strong">{{{ $stronghold['player_stats']['stamina'] . '/' . $stronghold['player_stats']['stamina_max'] }}}</span>
            <div class="progress progress-success">
                     <div class="bar" style="width: {{{ $stronghold['player_stats']['stamina'] / $stronghold['player_stats']['stamina_max'] *100 }}}%"></div>
            </div>
         </p>
         <p>
            Exp: <span class="pull-right strong">{{{ $stronghold['player_stats']['exp'] . '/' . $stronghold['player_stats']['levelup_exp'] }}}</span>
            <div class="progress progress-warning">
                     <div class="bar" style="width: {{{ $stronghold['player_stats']['exp'] / $stronghold['player_stats']['levelup_exp'] *100 }}}%"></div>
            </div>
         </p>
      </div>
      <div class="span2">
          <a class="btn btn-medium btn-block btn-primary" href="{{{ URL::to('soulbinders/quest/'.$soulbinder->id) }}}">
            <i class='icon-share-alt icon-white'></i> Auto Quest
          </a>
         <button class="btn btn-medium btn-block btn-primary" type="button"><i class='icon-beaker icon-white'></i> Bound Potion</button>
         <button data-toggle="modal" data-target="#modalContent" href="{{{ URL::to('soulbinders/item-list/'.$soulbinder->id) }}}" class="btn btn-medium btn-block btn-success" type="button">
            <i class='icon-inbox icon-white'></i> Giftbox
         </button>
         <button class="btn btn-medium btn-block btn-success" type="button"><i class='icon-gift icon-white'></i> Gift Main</button>
      </div>
   </div>
   <div class="row">
    <div class="span8">
      <h4>Activity Log</h4>
      @if ($notifications)
        @foreach ($notifications[0] as $item)
          <div class="alert alert-{{$item['type']}}">
            <strong>{{ $item['title']}}<strong> - {{ $item['created'] }}
            {{$item['message']}}
          </div>
        @endforeach
      @else
        No notifications yet.
      @endif
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
