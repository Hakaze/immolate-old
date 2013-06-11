<?php

class SoulbindersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return User::find(Auth::user()->id)->soulbinders;
	}

	/**
	 * Show the form for adding a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('soulbinders/add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			$soulbinder = new Soulbinder();
			$soulbinder->user_id = Auth::user()->id;
			$soulbinder->name = Input::get('name');
			$soulbinder->php_sess_id = Input::get('php_sess_id');
			$soulbinder->device_token = Input::get('device_token');
			$soulbinder->adid = Input::get('adid');
			$soulbinder->social_id = Input::get('social_id');
			$soulbinder->oauth = Input::get('oauth');
			$soulbinder->mac = Input::get('mac');
			$soulbinder->app_version = Input::get('app_version');
			
			if($soulbinder->save()){
				return Redirect::action('SoulbindersController@getIndex')->with('success', '{$soulbinder->name created!}');
			} else {
				return Redirect::action('SoulbindersController@getAdd')->withErrors($soulbinder->errors());
			}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$soulbinder = Soulbinder::find($id);
		$data = $soulbinder->emulator->perform('profile');
		$data['id'] = $soulbinder->id;
		$data['name'] = $soulbinder->name;
		return Response::json($data);
	}

	public function getGiftbox($id)
	{
		$soulbinder = Soulbinder::find($id);
		return Response::json(array('giftbox' => $soulbinder->emulator->perform('giftbox')));
	}

	public function postGiftbox($id)
	{
		$soulbinder = Soulbinder::find($id);
		$gifts = Input::json('gifts');
		return Response::json(array('message' => $soulbinder->emulator->perform('acceptgifts', array('gifts' => $gifts))));
	}

	public function getQuest($id)
	{
		$soulbinder = Soulbinder::find($id);
		$data = array(
			'soulbinder_id' => $id,
			'task' => 'quest',
			'recurring' => true
		);
		Event::fire('queue.quest',array($data));
		return Redirect::action('SoulbindersController@getView', array($id))->with('info', 'Quest job has been queued!');
	}

	public function getItemList($id)
	{
		$soulbinder = Soulbinder::find($id);
		return json_encode($soulbinder->itemList());
	}

}