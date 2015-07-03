<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/25
 * Time: 14:42
 */
class Pages extends CI_Controller{

    public function view($page='home'){
        if(!file_exists(APPPATH.'/views/pages/'.$page.'.php')){
            show_404();
        }
        //赋值讲$page的第一个字符转换为大写
        $data['title'] = ucfirst($page);

        //显示页面
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer',$data);
    }
}