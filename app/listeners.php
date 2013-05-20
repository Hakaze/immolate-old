<?php

/**
 * Event Listeners
 */

// Relogin event
//
Event::listen('relogin', function($immolater, $action)
{
    if($immolater->client->reLogin()){
        $immolater->emulator->perform($action);
    } else {
        return false;
    }
});
