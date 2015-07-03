<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/7/1
 * Time: 9:45
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->init();
    }

    /**
     * 登录验证
     */
    private function init(){
        admin_is_login();
        //初始化分析器
        $this->output->enable_profiler(FALSE);
    }

    /**
     * 登录后的视图显示
     * @param array $params
     * @param $data
     */
    function loginView($params='', $data){
        //$clazz = get_called_class();

        //$file_d = debug_backtrace();
        //var_dump($file_d );

        $this->load->view('templates/header',$data);
        $this->load->view('templates/top_navbar',$data);
        if(is_array($params)){
            foreach($params as $item){
                $this->load->view($item, $data);
            }
        }elseif(!empty($params)){
            $this->load->view($params, $data);
        }

        $this->load->view('templates/footer',$data);
    }


}