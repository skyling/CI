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
        $this->load->helper('form');
    }

    /**
     * 登录首页
     */
    public function index(){
        //判断是否登录，登陆后跳转至index/index
        if(isset($_SESSION['auth_admin']) && $_SESSION['auth_admin'] > 0){
            redirect('index/index');
        }


        $this->load->library('form_validation');
        $validation = array(
            array(
                'field'=>'username',
                'label'=>'用户名',
                'rules'=>'required',
                ),
            array(
                'field'=>'password',
                'label'=>'密码',
                'rules'=>'required|callback_pwd_check',
            ),
        );
        $this->form_validation->set_rules($validation);
        $this->form_validation->set_message('required', '%s不能为空！');
        $this->form_validation->set_message('pwd_check', '%s验证错误！');
        $this->form_validation->set_error_delimiters('<span class="round alert label">','</span>');//修改错误提示定界符

        if($this->form_validation->run() === FALSE){
            $data['title'] = '管理员登录';
            $data['foundation_dir'] = config_item('foundation_dir');
            $this->load->view('login/index',$data);
        }else{
            show_message($this, get_message_data('后台管理系统','登录成功！',0,'index/index',3));
        }
    }

    function pwd_check(){
        $data = $this->admin_model->admin_login();
        if($data){
            admin_is_login($data);
            return TRUE;
        }
        return FALSE;
    }
}
?>