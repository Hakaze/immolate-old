<?php

class ShopController extends BaseController
{
	public function index($soulbinderId)
	{
		$soulbinder = Soulbinder::find($soulbinderId);
		return Response::json($soulbinder->emulator->perform('shoplist'));
	}

	public function purchase($soulbinderId)
	{
		$soulbinder = Soulbinder::find($soulbinderId);
		$id = Input::json('item_id');
		return Response::json(array('message' => $soulbinder->emulator->perform('purchase', array('id' => $id))));
	}
}