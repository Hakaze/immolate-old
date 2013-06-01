<?php namespace Immolate\Component\Emulator;

use Immolate\Component\Yokai\Runner as Yokai;
use Illuminate\Support\Facades\Event;

class Dispatcher 
{

    public $yokai;
    public $immolater;

    public function __construct($immolater)
    {
        $this->immolater = $immolater;
        $this->yokai = new Yokai();
    }

    public function perform($action)
    {
    	$return = $this->yokai->execute($action,array(
    		'php-sess-id' => $this->immolater->php_sess_id
		));
        // fire relogin event
        //
        if($return['statusCode'] == 2){
            Event::fire('relogin', array($this->immolater, $action));
        } elseif($return['statusCode'] == 0) {
            die('Yokai Runtime Error: ' . $return['statusMsg']);
        } else {
            return $return['response'];
        }
    }
    
}