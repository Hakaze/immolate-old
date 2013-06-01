<?php

namespace Immolate\Component\Yokai;

/**
 * CasperJS Command Runner
 *
 * $command = new Immolate\Component\Yokai\Runner;
 * $result = $command->execute('\www\test.js', 'http://mysite.com', 'another-arg');
 *
 * @package CasperJS
 **/

class Runner {

    /**
     * Casper bin path
     * 
     * @var string
     **/
    private $bin = '/usr/local/bin/casperjs';


    /**
     * @var bool If true, all Command output is returned verbatim
     **/
    private $debug = false;

    /**
     * Options to be passed during exec
     * @var array
     */
    private $options = array();

    /**
     * Constructor
     *
     * @param string Path to CasperJS binary
     * @param bool Debug mode
     * @return void
     **/
    public function __construct($debug = null)
    {
        if($debug !== null) $this->debug = $debug;
    }

    /**
     * Execute a given JS file
     *
     * @param string Script file
     * @param string Arg, ...
     * @return bool/array False of failure, JSON array on success
     **/
    public function execute($action, $args = null) 
    {
        // handle arguments
        //
        if(isset($args)){
            foreach($args as $key => $val){
                $this->options[$key] = escapeshellarg($val);
            }
        }

        // parse options
        //
        $options = __DIR__ . "/js/init.js --action=$action";
        foreach($this->options as $opt => $val){
            $options .= " --$key=$val";
        }
        
        // build command
        //
        $cmd = escapeshellcmd("{$this->bin} $options");
        if($this->debug) $cmd .= ' 2>&1';

        // execute
        // 
        $result = shell_exec($cmd);
        
        // handle return
        //
        if(substr($result, 0, 1) !== '{'){
            //not json
            //
            echo '<pre>';
            die($result . '</pre>');
        } else {
            $json = json_decode($result, $asArray = true);
            if($json === null){
                return false;
            } else {
                return $json;
            }
        }

    }
}