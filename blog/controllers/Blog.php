<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/29
 * Time: 14:14
 */

class Blog extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
    }
    function index(){
        $data['title'] = '我的博客标题';
        $data['heading'] = 'My Blog heading';
        $data['query'] = $this->db->get('entries');
        $this->load->view('blog/index', $data);
    }

    function comments(){
        $data['title'] = '我的博客评论';
        $data['heading'] = 'My Comment heading';
        $this->db->where('entries_id', $this->uri->segment(3));
        $data['query'] = $this->db->get('comments');
        $this->load->view('blog/comments', $data);
    }

    function comment_insert(){
        $this->db->insert('comments', $_POST);
        redirect('blog/comments/'.$_POST['entries_id']);
    }
}