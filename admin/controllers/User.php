<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/30
 * Time: 11:06
 */

class User extends MY_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('form');

    }

    function modify_pwd(){
        $this->load->library('form_validation');
        //验证
        $validation = array(
            array(
                'field'   => 'oldpwd',
                'label'   => '旧密码',
                'rules'   => 'required|callback_oldpwd_check'
            ),
            array(
                'field'   => 'newpwd',
                'label'   => '新密码',
                'rules'   => 'required'
            ),
            array(
                'field'   => 'reqpwd',
                'label'   => '确认密码',
                'rules'   => 'required|matches[newpwd]'
            ),
        );
        $this->form_validation->set_rules($validation);//设置验证
        //设置验证消息
        $this->form_validation->set_message('required', '%s不能为空！');
        $this->form_validation->set_message('oldpwd_check', '%s验证失！');
        $this->form_validation->set_message('matches', '%s与%s不匹配！');

        $this->form_validation->set_error_delimiters('<span class="round alert label">','</span>');//修改错误提示定界符

        //表单提交验证
        if ($this->form_validation->run() === FALSE){
            $data['title'] = '管理员修改密码';
            $this->loginView('user/modify_pwd',$data);
        }else{//验证成功是显示的消息
            $data = array(
                'password' => md5($this->input->post('newpwd')),
            );

            $this->admin_model->update($_SESSION['auth_admin'], $data);
            show_message($this, get_message_data('修改密码','密码修改成功，下次登录时请使用新密码！', 0 ,current_url(), 3));
        }

    }
    /**
     * 管理员登出
     */
    function logout(){
        session_unset();
        admin_is_login();
    }

    /**
     * 表单提交密码验证
     * @param $str
     * @return bool
     */
    public function oldpwd_check($str){
        if(get_admin_field('password') != md5($this->input->post('oldpwd'))){

            return FALSE;
        }
        return TRUE;
    }
}