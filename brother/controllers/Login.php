<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/25
 * Time: 17:21
 */

class Login extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('admin');
    }

    /**
     * 登录首页
     */
    public function index(){
        if(admin_login()){
            redirect('/index/index');
        }

        if(isset($_POST['username']) && isset($_POST['password'])){
            $data = $this->admin_model->admin_login();
            var_dump($data);
            if($data){
                admin_login($data);
                redirect('index/index');
            }
            show_error('用户名或者密码错误！',500,'操作错误！');
        }
        $data['title'] = '管理员登录';
        $data['foundation_dir'] = config_item('foundation_dir');
        $this->load->view('templates/header', $data);
        $this->load->view('login/index');
        $this->load->view('templates/footer', $data);
    }
}