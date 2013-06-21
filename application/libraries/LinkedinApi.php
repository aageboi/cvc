<?php defined('BASEPATH') OR exit('No direct script access allowed');

class LinkedinApi {

    private $mainhost, $apihost, $config;

    public function __construct()
    {
        $this->to =& get_instance();
        $this->to->config->load('linkedin');

        $this->mainhost = 'https://www.linkedin.com';
        $this->apihost  = 'https://api.linkedin.com';
        $this->config   = $this->to->config->item('linkedin');
    }

    public function get_code()
    {
        //generate authorization code
        $data = array(
            'response_type' => 'code',
            'client_id'     => $this->config['api_key'],
            'scope'         => $this->config['scope'],
            'state'         => $this->config['state'],
            'redirect_uri'  => $this->config['callback_url']
        );

        $url = $this->mainhost.'/uas/oauth2/authorization?'.http_build_query($data);

        header('Location: '.$url);
        exit(0);
    }

    public function get_access_token($code)
    {
        //get access token
        $data = array(
            'code'          => $code,
            'redirect_uri'  => $this->config['callback_url'],
            'client_id'     => $this->config['api_key'],
            'client_secret' => $this->config['secret_key'],
            'grant_type'    => 'authorization_code'
        );

        $url        = $this->mainhost.'/uas/oauth2/accessToken?'.http_build_query($data);
        $response   = $this->get_response('GET', $url);

        if ($response) {
            $data = json_decode($response);
            if (isset($data->access_token)) {
                return $data;
            }
        }

        return false;
    }

    public function get_id($access_token)
    {
        $url        = $this->apihost.'/v1/people/~:(id,email-address)?format=json&oauth2_access_token='.$access_token;
        $response   = $this->get_response('GET', $url);
        $response   = json_decode($response);

        if (isset($response->id))
            return $response;

        return false;
    }

    public function get_profile($access_token)
    {
        $url = $this->apihost.'/v1/people/~:('.$this->config['field_selected'].')?format=json&oauth2_access_token='.$access_token;

        $response = $this->get_response('GET', $url);

        return json_decode($response);
    }

    private function get_response($type = 'GET', $url, $data=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

}
