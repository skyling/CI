<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/26
 * Time: 15:02
 */

class Admin_Controller extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!admin_login()){
            redirect('login/index');
        }
    }

}