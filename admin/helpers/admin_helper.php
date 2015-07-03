<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/26
 * Time: 14:35
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('admin_is_login'))
{
    /**
     * 验证用户是否登录 未登陆将跳转至登陆页面
     * @param string $auth_admin 用户ID
     * @return bool|string
     */
    function admin_is_login($auth_admin='')
    {
        if(empty($auth_admin))
        {
            if(isset($_SESSION['auth_admin']))
            {
                return $_SESSION['auth_admin'];
            }
            redirect('login/index');
            return FALSE;
        }
        $_SESSION['auth_admin'] = $auth_admin;
        return $auth_admin;
    }
}
/**
 * 获取Admin用户表数据
 * @param string $field 字段 可多谢
 * @param bool $id
 * @return mixed
 */
function get_admin_field($field = 'id', $id = FALSE)
{
    $uid = ($id && is_numeric($id))? $id : $_SESSION['auth_admin'];
    $CI = CI_Controller::get_instance();
    $CI->load->model('admin_model');
    return $CI->admin_model->get_field($field,$uid);
}

/**
 * 获取提示页面数据
 * @param string $title 标题
 * @param string $message 消息体
 * @param int $type 类型 1 success 2 info 3 secondary 4 warning  5 alert
 * @param string $redirect_url 跳转URL
 * @param int $auto_redirect_time 自动跳转时间
 * @return array
 */
function get_message_data($title='提示消息', $message='操作成功', $type = 0, $redirect_url = '/', $auto_redirect_time = 5)
{
    $types = array('success', 'info', 'secondary', 'warning', 'alert', );
    return $data = array(
        'title' => $title,
        'message' => $message,
        'type' => $types[$type],
        'redirect_url' => $redirect_url,
        'auto_redirect_time' => $auto_redirect_time,
    );
}

/**
 * 显示提示页面
 * @param $obj 对象
 * @param $data 数据
 */
function show_message($obj, $data)
{
    $obj->load->view('templates/header',$data);
    $obj->load->view('templates/top_navbar', $data);
    $obj->load->view('templates/show_message', $data);
    $obj->load->view('templates/footer');
}

function get_channel_data(){

}

function get_return_data($status=1, $info="操作成功"){
    $status = $status===1 ? 'y' : 'n';
    return '{"info":"'.$info.'","status":"'.$status.'"}';

}