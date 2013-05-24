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
        var_dump($return);
        die();
        // fire relogin event
        //
        if($return['statusCode'] == 2){
            Event::fire('relogin', array($this->immolater, $action));
        } else {
            return $return['response'];
        }
    }
    
}