<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/26
 * Time: 14:35
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if ( ! function_exists('admin_login'))
{
    /**
     * 验证用户是否登录
     * @param string $auth_admin 用户ID
     * @return bool|string
     */
    function admin_login($auth_admin='')
    {
        if(empty($auth_admin)){
            if(isset($_SESSION['auth_admin'])){
                return $_SESSION['auth_admin'];
            }
            return FALSE;
        }else{
            $_SESSION['auth_admin'] = $auth_admin;
        }
        return $auth_admin;

    }
}
