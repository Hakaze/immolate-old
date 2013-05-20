<?php

class SoulbindersController extends AuthorizedController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$soulbinders = User::find(Auth::user()->id)->soulbinders;
		return View::make('soulbinders/index')->with('soulbinders', $soulbinders);	
	}

	/**
	 * Show the form for adding a new resource.
	 *
	 * @return Response
	 */
	public function getAdd()
	{
		return View::make('soulbinders/add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postAdd()
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
	 * Show the form for adding a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$form = new Formly();

		return View::make('soulbinders/create')->with('form', $form);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getView($id)
	{
		$soulbinder = Soulbinder::find($id);
		$data = $soulbinder->emulator->perform('stronghold');
		$data['soulbinder'] = $soulbinder;		
		return View::make('soulbinders/view')->with('data', $data);
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