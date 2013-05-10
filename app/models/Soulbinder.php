<?php

use LaravelBook\Ardent\Ardent;
use Immolate\Entity\Immolater;

class Soulbinder extends Ardent 
{
    
    /**
     * Extend the Immolater trait
     */
    use Immolater;

    /**
     * Validation rules
     * @var array
     */
    public static $rules = array(
      'name' => 'required|max:16',
      'php_sess_id' => 'required',
    );

    /**
     * Validation messages
     * @var array
     */
    public static $customMessages = array(
      'required' => ':attribute field is required.',
      'max:16' => ':attribute must be less than 16 characters.'
    );

    /**
     * Relationship
     * @return User 
     */
    public function user()
    {
      return $this->belongsTo('User');
    }

}