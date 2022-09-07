<?php

class E2GIPFacebook extends E2GIP {
  protected $type = 'facebook';

  private function _get_instance() {
    require_once 'system/library/facebook-graph-sdk/src/Facebook/autoload.php';

    $fb = new \Facebook\Facebook([
      'app_id' => $this->get_config('app_id'),
      'app_secret' => $this->get_config('app_secret'),
      'default_graph_version' => 'v2.10',
    ]);

    return $fb;
  }

  public function get_auth_url() {
    $proxy_url = $this->get_config('proxy_url'); 
    if(is_null($proxy_url)){
        $fb = $this->_get_instance();

        $helper = $fb->getRedirectLoginHelper();
        $permissions = array();

        $login_url = $helper->getLoginUrl($this->get_callback_url(), $permissions).'&display=popup';
    }
    else{
        $login_url = $proxy_url . $this->get_proxy_param();
    }
    
    return $login_url;
  }

  public static function get_profile_url($id, $link) {
      if(!empty($link)) return 'https://facebook.com/' . $link;
    return false;
  }

  public function callback() {
    if(isset($_GET['data'])){
        $data = json_decode($_GET['data'], true);
        $user = $data['user'];
        $accessToken = $data['accessToken'];
        $avatar_url = urldecode($user['pictureUrl']);
        $avatar_name = $this->save_avatar($user['id'], $avatar_url);
    }
    else{
        $fb = $this->_get_instance();
        $helper = $fb->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
          $helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }

        try {
          $accessToken = $helper->getAccessToken();
        } catch(Exception $e) {
          return 'Facebook SDK returned an error: ' . $e->getMessage();
        }

        try {
          // Returns a `Facebook\FacebookResponse` object
          $response = $fb->get('/me?fields=id,name,email,link,picture.width(' .  $this->get_avatar_width(). ').height(' . $this->get_avatar_height() . ')', $accessToken);
        } catch(Exception $e) {
          return $e->getMessage();
        }

        $user = $response->getGraphUser();
        $avatar_url = $user['picture']['url'];
        $avatar_name = $this->save_avatar($user['id'], $avatar_url);
        if(!isset($user['email']))  $user['email'] = '';
        if(!isset($user['link']))  $user['link'] = '';
    }

    $this->save_session($user['id'], $user['name'], $accessToken, $avatar_name, $user['email'], $user['link']);
    return true;
  }

}