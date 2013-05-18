<?php namespace Immolate\Component\Emulator;

use Immolate\Component\Yokai\Runner as Yokai;
use Illuminate\Support\Facades\Event;

class EmulatorBase 
{

    public $actions = array();
    public $php_sess_id;
    public $yokai;
    public $immolater;

    public function __construct($immolater)
    {
        $this->immolater = $immolater;
        $this->yokai = new Yokai();
    }

    protected function perform($action)
    {
    	$response = $this->yokai->execute($action,array(
    		'php-sess-id' => $this->immolater->php_sess_id,
            'action' => $action
		));

        // fire relogin event
        // 
        if($response['statusCode'] == 2){
            $relogin = Event::fire('relogin', array($this->immolater));
            if($relogin){
                $this->perform($action);
            }
        }
    }
    
}