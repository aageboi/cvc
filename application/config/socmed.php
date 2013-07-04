<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'linkedin' => array(
        'api_key'       => 'g3k5pxqf7x33',
        'secret_key'    => 'DjLU4riFnyEqwdAS',
        'oauth_token'   => 'eab825dc-9df7-43e4-bbf9-aeb6b9df5585',
        'oauth_secret'  => '0db0086c-abee-4346-9cad-8dd7b0b46fba',
        'scope'         => 'r_fullprofile r_emailaddress r_contactinfo',
        'state'         => 'test',
        // 'callback_url'	=> 'http://cvc.eu01.aws.af.cm/index.php/auth/linkedin/callback',
        'callback_url'	=> 'http://localhost/cvc/auth/linkedin/callback',
        'field_selected'=> 'id,first-name,last-name,picture-url,public-profile-url,positions,skills,educations,date-of-birth,email-address,phone-numbers',
    ),
    'facebook' => array(
        'api_key'       => '221821921249076',
        'secret_key'    => 'd3f750dad6264bf33f8193bb34df5734',
        'oauth_token'   => '',
        'oauth_secret'  => '',
        'scope'         => '',
        'state'         => 'test',
        'callback_url'  => 'http://localhost/cvc/auth/facebook/callback',
        'field_selected'=> '',
    ),

    // ini pake account @aagebot, aplikasi 'buatcv.com'
    'twitter' => array(
        'api_key'       => 'IvVHOQzQjuizArY5pzlTrw',
        'secret_key'    => 'Ew50A5yhQCw9F9oNZpB0RjufBqDiCgLuCGJmw',
        'oauth_token'   => '785892422-iertyRTvFaz8fzlfzdwY7HNFyxZiNd4OpF0kmnh0',
        'oauth_secret'  => 'SnSwRJhVdlNMqXp188lcSou4nSGSO3aclkogrn2H0',
        'scope'         => '',
        'state'         => 'test',
        'callback_url'  => 'http://localhost/cvc/auth/twitter/callback',
        'field_selected'=> '',
    )
);
