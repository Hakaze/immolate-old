<?php

class AccountController extends BaseController
{
	/**
	 * Let's whitelist all the methods we want to allow guests to visit!
	 *
	 * @access   protected
	 * @var      array
	 */
	
	protected $whitelist = array('postLogin', 'getLogout');

	/**
	 * Login form processing.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postLogin()
	{
		if(Auth::attempt(array('email' => Input::json('email'), 'password' => Input::json('password'))))
	    {
      		return Auth::user()->toJson();
	    } else {
      		return Response::json(array('alert' => "Invalid username or password "), 500);
	    }
    }

	/**
	 * Logout page.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function getLogout()
	{
		// Log the user out.
		//
		Auth::logout();
		return Response::json(array('flash' => 'You have been logged out.'));
	}

	/**
	 * User account creation form page.
	 *
	 * @access   public
	 * @return   View
	 */
	public function getRegister()
	{
		// Are we logged in?
		//
		if (Auth::check())
		{
			return Redirect::to('account');
		}

		// Show the page.
		//
		return View::make('account/register');
	}

	/**
	 * User account creation form processing.
	 *
	 * @access   public
	 * @return   Redirect
	 */
	public function postRegister()
	{
		// Declare the rules for the form validation.
		//
		$rules = array(
			'first_name'            => 'Required',
			'last_name'             => 'Required',
			'email'                 => 'Required|Email|Unique:users',
			'password'              => 'Required|Confirmed',
			'password_confirmation' => 'Required'
		);

		// Get all the inputs.
		//
		$inputs = Input::all();

		// Validate the inputs.
		//
		$validator = Validator::make($inputs, $rules);

		// Check if the form validates with success.
		//
		if ($validator->passes())
		{
			// Create the user.
			//
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name  = Input::get('last_name');
			$user->email      = Input::get('email');
			$user->password   = Hash::make(Input::get('password'));
			$user->save();

			// Redirect to the register page.
			//
			return Redirect::to('account/register')->with('success', 'Account created with success!');
		}

		// Something went wrong.
		//
		return Redirect::to('account/register')->withInput($inputs)->withErrors($validator->getMessageBag());
	}

}
