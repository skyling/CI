<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/26
 * Time: 15:02
 */

class Index extends MY_Controller{

    function __construct(){
        parent::__construct();
    }

    /**
     * 首页
     */
    public function index(){
        $data['title'] = '后台管理系统';
        $this->loginView('index/index',$data);
    }
}