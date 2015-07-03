<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/25
 * Time: 15:08
 */

class News extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('news_model');
    }

    /**
     * 显示所有的新闻
     */
    public function index(){
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('news/index',$data);
        $this->load->view('templates/footer');
    }

    /**
     * 获取某条新闻
     * @param $slug 新闻标识符
     */
    public function view($slug){
        $data['news_item'] = $this->news_model->get_news($slug);

        if(empty($data['news_item'])){
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('news/view',$data);
        $this->load->view('templates/footer');
    }

    /**
     * 创建一条新闻
     */
    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if($this->form_validation->run() === false){
            $this->load->view('templates/header', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        }else{
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
}