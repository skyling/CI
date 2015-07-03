<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/7/1
 * Time: 9:45
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Channel extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('channel_model');
    }

    /**
     * 栏目管理主页
     */
    function index()
    {

        //表单验证
        $this->load->library('form_validation');
        $this->form_validation->set_rules('pid','父类id','required');
        $this->form_validation->set_rules('title','分类名称','required');
        $this->form_validation->set_rules('name','分类标识','required');
        $this->form_validation->set_message('required','%s必须！');
        if($this->form_validation->run()===FALSE){
            $data['channel'] = $this->channel_model->get_data();//获取栏目数据
            $data['channel'] = array_merge(array('0'=>array('id'=> '0', 'title'=> '根栏目', 'name' => 'root')),$data['channel']);

            $data['title'] = '栏目管理';
            $data['channel_sort'] =  $this->channel_model->get_data(NULL,'id,title,name,number,status',TRUE);
            //var_export($data['channel_sort']);
            $this->loginView(array('channel/index','channel/add_pop_window'),$data);
        }else{

            if($this->channel_model->add_item())//添加操作
            {
                echo get_return_data(1,'添加成功！');
            }
            else
            {
                echo get_return_data(0, '系统错误！');
            }
        }

    }

    /**
     * ajax检测字段是否存在
     */
    function check(){
        $name = $this->input->post('name');
        $param = $this->input->post('param');
        if(empty($name) || empty($param)){echo get_return_data(0, '请输入信息！');return;}
        if(!$this->channel_model->check_field_exist($name, $param)){
            echo get_return_data(1,'ok');
        }else{
            echo get_return_data(0, '此值已存在！');
        }
    }

    /**
     * 设置状态
     */
    function set_status()
    {
        if($this->_set_status($this->input->post('id')))
        {
            echo get_return_data();
        }
        else
        {
            echo get_return_data(0, '操作失败！');
        }
    }

    /**
     * 递归改变状态
     * @param $id
     * @return bool
     */
    private function _set_status($id)
    {
        $data = $this->channel_model->get_data($id,'id');
        $this->channel_model->set_status($id);
        if(is_array($data))
        {
            foreach($data as $item){
                $this->_set_status($item['id']);
            }
        }
        return is_array($data) ? TRUE : FALSE;
    }

    /**
     * 路由重定向
     * @param $method
     * @param array $params
     * @return mixed
     */
    public function _remap($method, $params = array())
    {
        if(method_exists($this, $method))//判断此类中方法是否存在
        {
            return call_user_func_array(array($this, $method), $params);
        }
        if(method_exists($this->channel_model, $method))//判断模型中方法是否存在
        {
            if($this->input->is_ajax_request())//ajax请求操作
            {
                if(call_user_func_array(array($this->channel_model, $method), $params))//删除成功
                {
                    echo get_return_data();
                    return;
                }
                else
                {
                    echo get_return_data(0,'系统错误！');
                    return;
                }
            }
            else//非ajax请求
            {
//TODO::非ajax请求返回操作 兼容性问题处理
            }
        }

        show_404();
    }

    public function modify($id=''){
        $data['title'] = "修改栏目";
        $this->loginView('channel/modify',$data);
        
    }
}