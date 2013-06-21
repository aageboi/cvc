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
    )
);
