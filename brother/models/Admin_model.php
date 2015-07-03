<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/25
 * Time: 17:09
 */

class Admin_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_admin(){
        $query = $this->db->get('admin');
        return $query->result_array();
    }

    /**
     * 登录
     * @return mixed
     */
    public function admin_login(){
        $map['username'] = $this->input->post('username');
        $map['password'] = $this->input->post('password');
        if(empty($map['username']) || empty($map['password'])) return FALSE;
        $query = $this->db->select('id')->get_where('admin',$map);
        $ret = $query->row_array();
        return $ret > 0 ? $ret : FALSE;
    }
}