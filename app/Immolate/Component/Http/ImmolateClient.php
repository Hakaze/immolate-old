<?php namespace Immolate\Component\Http;

use Guzzle\Http\Client;
use Guzzle\Http\Message\Response;

class ImmolateClient
{

   const USER_AGENT = 'Immortalis/1.4 (iPhone; CPU iPhone OS 6_1)';
   public $server = 'http://imm-mobile.aeriagames.com';
   protected $client;
   protected $sb;

   public function __construct($sb)
   {
      $this->sb = $sb;
      $this->client = new Client($this->server);
   }

   /*
    * This function will relogin and return the php session id that is required to be set in db
    */

   public function reLogin()
   {
      $tmpClient = new Client($this->server);
      $accountData = array(
         'social_id' => $this->sb->social_id,
         'urlpara' => 'login/register',
         'device_token' => $this->sb->device_token,
         'app_version' => '1.4',
         'adid' => $this->sb->adid,
         'mac' => $this->sb->mac,
      );
      $request = $tmpClient->post(array('{+path}{?data*}', array(
         'path' => '/login/register/',
         'data' => $accountData
      )));
      $request->addCookie('PHPSESSID',$this->sb->php_sess_id);
      $request->setHeader('Accept','*/*');
      $request->setHeader('Accept-Language','en-us');
      $request->setHeader('Accept-Encoding', 'gzip, deflate');
      $request->setHeader('Connection', 'keep-alive');      
      $request->setHeader('Content-Type', 'application/x-www-form-urlencoded');
      $request->setHeader('User-Agent', 'Immortalis/1.4 (iPhone; CPU iPhone OS 6_1)');      
      $request->setHeader('Authorization',$this->sb->oauth);
      $request->setBody($request->getQuery());
      $response = @$request->send();
      if($response->getSetCookie()){
        $header = $response->getSetCookie();
        $header->setGlue(';');
        $header->normalize(true);
        $header->setGlue('=');
        $header->normalize(true);
        $array = $header->toArray();
        $this->sb->php_sess_id = $array[1];
        $this->sb->save();
        return true;
      } else {
        return false;
      }
   }

   public function post($path, $data)
   {
      return $this->client->post(array('{/path}{?data*}', array(
         'path' => $path,
         'data' => $data
      )));
   }
   public function get($path, $data)
   {
      return $this->client->get(array('{/path}{?data*}', array(
         'path' => $path,
         'data' => $data
      )));
   }
}