<?php
/**
 * Created by PhpStorm.
 * User: v_frli
 * Date: 2015/6/29
 * Time: 9:22
 */

class Blog extends CI_Controller{
    function index(){
        echo "hello world!";
    }

    function comments(){
        echo 'Look at this!';
    }

    function shoes($sandals, $id){
        echo $sandals.'<br/>'.$id;
    }

    /**
     * 重定向
     * @param $method
     */
    function _remap($method){
        if($method == 'hello'){
            $this->index();
        }else{
            $this->default_method();
        }
    }
}