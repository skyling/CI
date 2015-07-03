<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/25
 * Time: 15:01
 * 新闻条目类
 */

class News_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_news($slug = FALSE){
        if($slug === FALSE){
            //查询所有条数
            $query = $this->db->get('news');
            return $query->result_array();
        }

        //查询制定条数
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_news(){
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        if(empty($slug)){
            $slug = time();
        }
        $data = array(
            'title' => $this->input->post('title'),
            'slug'  => $slug,
            'text'  => $this->input->post('text'),
        );

        return $this->db->insert('news', $data);
    }
}