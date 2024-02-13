<?php
class PluginPhpCookie{
  public $days = 30;
  public $path = "/";
  public $domain = "";
  public $secure = true;
  public $httponly = false;
  public $samesite = 'Lax'; //The value of the samesite element should be either None, Lax or Strict.
  public function set($name, $value){
    /**
     * secure
     */
    if(wfServer::calcProtocol()=='http'){
      $this->secure = false;
    }
    /**
     * setcookie
     */
    if(wfGlobals::get('php/version')<='7.3'){
      setcookie($name, $value, strtotime( '+'.$this->days.' days' ), $this->path, $this->domain, $this->secure, $this->httponly);
    }else{
      $options = new PluginWfArray();
      $options->set('expires' , strtotime( '+'.$this->days.' days' ));
      $options->set('path'    , $this->path);
      $options->set('domain'  , $this->domain);
      $options->set('secure'  , $this->secure);
      $options->set('httponly', $this->httponly);
      $options->set('samesite', $this->samesite);
      setcookie($name, $value, $options->get());
    }
    return null;
  }
  public function del($name){
    if(wfGlobals::get('php/version')<='7.3'){
      setcookie($name, '', time()-1000, $this->path);
    }else{
      $options = new PluginWfArray();
      $options->set('expires' , time()-1000);
      $options->set('path'    , $this->path);
      setcookie($name, '', $options->get());
    }
  }
  public function get($name){
    if(isset($_COOKIE[$name])){
      return $_COOKIE[$name];
    }else{
      return null;
    }
  }
}