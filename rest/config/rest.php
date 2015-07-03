<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/25
 * Time: 17:38
 */
if( ! defined('BASEPATH')) exit('No direct script access allwoed');

$config['rest_auth'] = 'digest';
$config['rest_realm'] = 'REST API';
$config['rest_valid_logins'] = array('admin' => '1234');