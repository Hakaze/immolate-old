<?php namespace Immolate\Providers;

use Illuminate\Support\ServiceProvider;
use Immolate\Entity\ImmolaterEventHandler;

class ImmolateServiceProvider extends ServiceProvider
{
	public function register()
	{
		$app = $this->app;

		$app->bind('ImmolaterEventHandler', function()
		{
			return new ImmolaterEventHandler;
		});
	}
}