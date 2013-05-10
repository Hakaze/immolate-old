<?php namespace Immolate\Entity;

use Immolate\Component\Emulator;

trait Immolater 
{

    public $profile;

    public function stronghold()
    {   
        return new Emulator\StrongholdEmulator($this->php_sess_id);
    }

}