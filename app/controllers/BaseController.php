<?php

class BaseController extends Controller {

	protected $whitelist = array();

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => $this->whitelist));
	}

	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}