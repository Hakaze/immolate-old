<?php

class GiftboxController extends BaseController
{
	public function index($soulbinderId)
	{
		$soulbinder = Soulbinder::find($soulbinderId);
		return Response::json($soulbinder->emulator->perform('giftbox'));
	}

	public function accept($soulbinderId)
	{
		$soulbinder = Soulbinder::find($soulbinderId);
		$gifts = Input::json('present_data_ids');
		return Response::json(array('message' => $soulbinder->emulator->perform('acceptgifts', array('gifts' => $gifts))));
	}
}