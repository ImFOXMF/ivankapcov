<?php

class E2GIPVk extends E2GIP {
  protected $type = 'vk';

  private function _get_instance() {
    
    require_once 'system/library/vk-sdk/autoload.php';  
      
    $vk = new VK\OAuth\VKOAuth();
    return $vk;
  }

  public function get_auth_url() {
    $proxy_url = $this->get_config('proxy_url'); 
    if(is_null($proxy_url)){
        $vk = $this->_get_instance();
        $login_url = $vk->getAuthorizeUrl(
                VK\OAuth\VKOAuthResponseType::CODE, 
                $this->get_config('app_id'), 
                $this->get_callback_url(), 
                VK\OAuth\VKOAuthDisplay::POPUP, 
                array(VK\OAuth\Scopes\VKOAuthUserScope::NOTIFY,VK\OAuth\Scopes\VKOAuthUserScope::LINK,VK\OAuth\Scopes\VKOAuthUserScope::EMAIL), 
                $this->get_config('app_key')); 
    }
    else{
        $login_url = $proxy_url . $this->get_proxy_param();
    }
    
    return $login_url;
  }

  public static function get_profile_url($id, $link) {
    if(!empty($link)) return 'https://vk.com/' . $link;
    if(!empty($id)) return 'https://vk.com/id' . $id;
    return false;
  }

  public function callback() {
    if(isset($_GET['data'])){
        $data = json_decode($_GET['data'], true);
        $user_id = $data['user']['id'];
        $user_name = $data['user']['name'];
        $user_email = $data['user']['email'];
        $user_link = $data['user']['link'];
        $access_token = $data['accessToken'];

        $avatar_url = urldecode($data['user']['pictureUrl']);
        $avatar_name = $this->save_avatar($user_id, $avatar_url);
    }
    else{
        $vk = $this->_get_instance();
        $response = $vk->getAccessToken(
                $this->get_config('app_id'),
                $this->get_config('app_key'), 
                $this->get_callback_url(), 
                $_GET['code']);
        $access_token = $response['access_token'];
        $user_id =  $response['user_id'];
        $user_email =  $response['email'];
        
        $vkClient = new VK\Client\VKApiClient();
        $response = array_shift($vkClient->users()->get($access_token, array(
            'user_ids' => [$user_id],
            'fields' => array('photo_100','domain')
        ))); 
        $avatar_url = urldecode($response['photo_100']);
        $avatar_name = $this->save_avatar($user_id, $avatar_url);
        $user_name = $response['first_name'] . ' ' . $response['last_name'];
        $user_link = $response['domain'];
    }

    $this->save_session($user_id, $user_name, $access_token, $avatar_name, $user_email, $user_link);
    return true;
  }

}