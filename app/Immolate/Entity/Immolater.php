<?php namespace Immolate\Entity;

use Immolate\Component\Emulator;
use Immolate\Component\Http\ImmolateClient;
use Illuminate\Support\Facades\Event;

trait Immolater
{

    public $client;

    public function init()
    {
    	$this->client = new ImmolateClient($this);
    	$subscriber = new ImmolaterEventHandler();
    	Event::subscribe($subscriber);
    }

    public function stronghold()
    {   
        return new Emulator\StrongholdEmulator($this);
    }

}