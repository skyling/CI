<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/26
 * Time: 15:02
 */

class Index extends CI_Controller{

    function __construct(){
        parent::__construct();

    }

    /**
     * 首页
     */
    public function index(){
        //echo "hello";
        $data['title'] = '后台主页';
        $data['foundation_dir'] = config_item('foundation_dir');
        var_dump($data);
        $this->load->view('templates/header',$data);
        $this->load->view('Index/index');
        $this->load->view('templates/footer');
    }
}