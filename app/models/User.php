<?php

use LaravelBook\Ardent\Ardent;
use Illuminate\Auth\UserInterface;

class User extends Ardent implements UserInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Relationships to Soulbinder
	 * 
	 * @return Soulbinder
	 */
	public function soulbinders() 
	{
		return $this->hasMany('Soulbinder');
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

}
