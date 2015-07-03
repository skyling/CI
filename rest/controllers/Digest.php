<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/26
 * Time: 16:03
 */

class Digest extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    function index(){
        $realm = 'My Realm';
        $logged = FALSE;
        $users = array('admin' => '123');
    }
}