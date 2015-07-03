<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/7/1
 * Time: 17:01
 */

class Channel_model extends MY_Model{
    function __construct()
    {
        parent::__construct('channel');
    }

    /**
     * 新增一条记录
     * @return mixed
     */
    public function add_item()
    {

        $data = array(
            'pid' => $this->input->post('pid'),
            'title' => $this->input->post('title'),
            'name' => $this->input->post('name'),
            'number' => '0',
            'create_time' => time(),
            'update_time' => time(),
            'status' => '1',
        );
        return $this->db->insert($this->table_name, $data);
    }

    /**
     * 获取栏目数据
     * @param null $pid
     * @param string $filed
     * @param bool $sort
     * @return mixed
     */
    public function get_data($pid=NULL, $filed = 'id,title,name', $sort = FALSE)
    {
        $order_by = 'create_time asc';
        if($sort)//整合
        {
            $ret = $this->_get_data('0', $filed, $order_by);
        }
        else
        {
            $this->db->select($filed)->order_by($order_by);
            if(!empty($pid) && $pid > 0)
            {
                $this->db->where('pid', $pid);
            }
            $ret = $this->db->get($this->table_name)->result_array();
        }
        return $ret;
    }

    /**
     * 按类别获取数据
     * @param $id
     * @param $field
     * @param $order_by
     * @return array
     */
    private function _get_data($id, $field, $order_by){
        $data = $this->db->select($field)->where('pid='.$id)->order_by($order_by)->get($this->table_name)->result_array();
        if(is_array($data))
        {
            foreach($data as $key=>$item)
            {
                $data[$key]['sub'] = $this->_get_data($item['id'], $field, $order_by);
            }

        }
        return $data;

    }

    /**
     * 修改
     */
    public function modify()
    {

    }
    public function get_all(){

    }


}