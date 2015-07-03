<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/7/1
 * Time: 17:06
 */

class MY_Model extends CI_Model{
    protected $table_name;
    private $where;

    function __construct($table_name = ''){
        parent::__construct();
        $this->table_name = $table_name;
        $this->load->database();
    }

    /**
     * 检查数据库中某个字段是否存在这个值
     * @param $field
     * @param $value
     * @return bool
     */
    function check_field_exist($field, $value){
        $count = $this->db->where($field.'="'.$value.'"')->from($this->table_name)->count_all_results();
        return $count>0 ? $count : FALSE;
    }

    /**
     * 更新status状态
     * @param string $id
     * @return bool
     */
    public function set_status($id = ''){
        $id = empty($id) ? $this->input->post('id') : $id;
        $status = $this->input->post('status');

        if(empty($id) || $status < 0)return FALSE;

        return $this->db->where('id', $id)->update($this->table_name, array('status'=>$status));
    }


    /**
     * 删除项
     * @param string $id
     * @return bool
     */
    public function delete($id = ''){
        $id = empty($id) ? $this->input->post('id') : $id;
        if(empty($id)) return FALSE;
        return $this->db->delete($this->table_name, array('id'=>$id));
    }

//TODO::封装适配器 类似TP查询
    public function where($where){
        if(is_array($where)){

        }
    }
}