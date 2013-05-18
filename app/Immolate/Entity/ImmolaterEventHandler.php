<?php namespace Immolate\Entity;

class ImmolaterEventHandler
{
	
	public function onRelogin($immolater)
	{
		return $immolater->client->reLogin();
	}

	public function subscribe($events)
	{
		$events->listen('relogin', 'ImmolaterEventHandler@onRelogin');
	}
}