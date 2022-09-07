<?php

class E2GIPTwitter extends E2GIP {
  protected $type = 'twitter';

  private function _get_instance($oauth_token = null, $oauth_token_secret = null) {
    require_once 'system/library/twitter-oauth/autoload.php';
    $connection = new \Abraham\TwitterOAuth\TwitterOAuth(
      $this->get_config('consumer_key'),
      $this->get_config('consumer_secret'),
      $oauth_token,
      $oauth_token_secret
    );

    return $connection;
  }

  public function get_auth_url() {
    $proxy_url = $this->get_config('proxy_url'); 
    if(is_null($proxy_url)){
        $connection = $this->_get_instance();

        $request_token = $connection->oauth('oauth/request_token', ['oauth_callback' => $this->get_callback_url() ] );
        $url = $connection->url('oauth/authorize', ['oauth_token' => $request_token['oauth_token'] ] );

        self::set_session_data('twitter_oauth_token', $request_token['oauth_token']);
        self::set_session_data('twitter_oauth_token_secret', $request_token['oauth_token_secret']);
    }
    else{
        $url = $proxy_url . $this->get_proxy_param();       
    }
    return $url;
  }

  public static function get_profile_url($id, $link) {
    return 'https://twitter.com/' . $id;
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
        try {
            if(empty($_GET['oauth_token']) || empty($_GET['oauth_verifier'])) {
              throw new Exception('oauth_token or oauth_verifier are missing.');
            }

            if(($session_oauth_token = self::get_session_data('twitter_oauth_token', true)) != $_GET['oauth_token']) {
              throw new Exception('tokens mismatch.');
            }

            $session_oauth_token_secret = self::get_session_data('twitter_oauth_token_secret', true);
            $connection = $this->_get_instance($session_oauth_token, $session_oauth_token_secret);
            $access_token = $connection->oauth("oauth/access_token", ['oauth_verifier' => $_GET['oauth_verifier']]);
            $connection = $this->_get_instance($access_token['oauth_token'], $access_token['oauth_token_secret']);

            $user = $connection->get("account/verify_credentials");

        } catch(Exception $e) {
          return $e->getMessage();
        }

        $avatar_url = $user->profile_image_url;
        $avatar_url = str_replace('_normal.', '_bigger.', $avatar_url); // https://stackoverflow.com/a/21490648/568944

        $avatar_name = $this->save_avatar($user->screen_name, $avatar_url);
        $userEmail = isset($user->email) ? $user->email : '';
        $this->save_session($user->screen_name, $user->name, $access_token['oauth_token'], $avatar_name, $userEmail, $user->screen_name);
    }  
    
    return true;
  }

}