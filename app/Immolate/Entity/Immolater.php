<?php namespace Immolate\Entity;

use Immolate\Component\Emulator\Dispatcher;
use Immolate\Component\Http\ImmolateClient;

trait Immolater
{

    public $client;
    public $emulator;

    public function init()
    {
    	$this->client = new ImmolateClient($this);
        $this->emulator = new Dispatcher($this);
    }

}