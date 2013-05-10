<?php namespace Immolate\Component\Emulator;

use Immolate\Component\Yokai\Runner as Yokai;

class EmulatorBase 
{

    public $actions = array();
    public $php_sess_id;
    public $yokai;

    public function __construct($php_sess_id){
        $this->php_sess_id = $php_sess_id;
        $this->yokai = new Yokai();
    }
    
}