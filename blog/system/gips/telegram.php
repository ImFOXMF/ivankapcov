<?php

class E2GIPTelegram extends E2GIP {
  protected $type = 'telegram';

  public function get_auth_url() {
    $proxy_url = $this->get_config('proxy_url'); 
    if(is_null($proxy_url)){
        // not implemented
    }
    else{
        $url = $proxy_url . $this->get_proxy_param();       
    }
    return $url;
  }

  public static function get_profile_url($id, $link) {
    return 'https://t.me/' . $id;
  }

  public function callback() {
    if(isset($_GET['data'])){
        $data = json_decode($_GET['data'], true);
        $user = $data['user'];
        $accessToken = $data['accessToken'];
        $avatar_url = urldecode($user['pictureUrl']);
        $avatar_name = $this->save_avatar($user['id'], $avatar_url);
        $this->save_session($user['id'], $user['name'], $accessToken, $avatar_name, $user['email'], $user['link']);
    }
    else{
        // not implemented
    }  
    
    return true;
  }

}