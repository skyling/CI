<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/25
 * Time: 17:09
 */

class Admin_model extends CI_Model{
    private $table;

    function __construct(){
        parent::__construct();
        $this->table = 'admin';
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
        $map['password'] = md5($this->input->post('password'));
        if(empty($map['username']) || empty($map['password'])) return FALSE;
        $query = $this->db->select('id')->get_where($this->table,$map);
        $ret = $query->row_array();
        return $ret['id'] > 0 ? $ret['id'] : FALSE;
    }

    /**
     * 获取数据库字段
     * @param string $filed
     * @param bool $id
     * @return string
     */
    public function get_field($filed = 'username',$id=FALSE){
        if(!$id || empty($filed))return '';
        $this->db->select($filed);
        $query = $this->db->get($this->table);
        $ret = $query->row_array();
        return count($ret) > 1 ? $ret : $ret[$filed];
    }

    /**
     * 跟新数据
     * @param null $id
     * @param array $data
     * @return bool
     */
    public function update($id=NULL, $data = array()){
        if(!$id && !is_array($data))return FALSE;
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}