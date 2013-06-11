<?php

class UpdatesController extends BaseController
{
	public function index($soulbinderId)
	{
		$soulbinder = Soulbinder::find($soulbinderId);
		return Response::json($soulbinder->emulator->perform('stronghold'));
	}

	public function confirm($soulbinderId)
	{
		$soulbinder = Soulbinder::findOrFail($soulbinderId);
		return Response::json($soulbinder->emulator->perform('confirmupdates', array("web-security" => "no")));
	}
}