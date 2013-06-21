<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route = array(

    'default_controller' => 'welcome',
    '404_override' => '',

    'auth' => 'auth/home',

    'user' => 'user/home',
    'user/setting' => 'user/home/setting',
    'user/logout' => 'user/home/logout',

    'cv' => 'user/cv',
    'cv/new' => 'user/cv/add',

);
