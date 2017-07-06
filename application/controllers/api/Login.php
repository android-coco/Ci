<?php

/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/5/10
 * Time: 23:16
 */
class Login extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('member_model');
    }

    public function index()
    {
        # code...
        $data = array(
            'relult1' => '0',
            'relult2' => '解决',
            'relult3' => '2'
        );
        $this->response($data);
    }

    public function login()
    {
        //$this->benchmark->mark('code_start');
        $user_name = is_null($this->input->post('user')) ? $this->input->get('user') : $this->input->post('user');
        $pass = is_null($this->input->post('pass')) ? $this->input->get('pass') : $this->input->post('pass');
        if (!empty($user_name) && !empty($pass))
        {
            if ($user_name == '123456' && $pass == '123456')
            {
                $this->response(array('result' => 0, 'data' => array(array('username' => 123456, "pass" => 123456), array('username' => 123456, "pass" => 123456))));
            }
            else
            {
                $this->response(array('result' => 2,'errmsg' => "用户名或密码错误！"));
            }
        }
        else
        {
            $this->response(array('result' => 1,'errmsg' => "参数不完整！"));
        }
        //$this->benchmark->mark('code_end');
        //echo $this->benchmark->elapsed_time('code_start', 'code_end');
    }


}