<?php
class PluginPhpCookie{
  public $days = 30;
  public $path = "/";
  public $domain = "";
  public $secure = true;
  public $httponly = false;
  public function set($name, $value){
    setcookie($name, $value, strtotime( '+'.$this->days.' days' ), $this->path, $this->domain, $this->secure, $this->httponly);
    return null;
  }
  public function del($name){
    setcookie($name, '', time()-1000, "/");
  }
  public function get($name){
    if(isset($_COOKIE[$name])){
      return $_COOKIE[$name];
    }else{
      return null;
    }
  }
}