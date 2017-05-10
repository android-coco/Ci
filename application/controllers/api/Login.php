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

    public function login()
    {
        $user_name = $this->input->post('user') == null ? $this->input->get('user') : $this->input->post('user');
        $pass = $this->input->post('pass') == null ? $this->input->get('pass') : $this->input->post('pass');;
        if (!empty($user_name) && !empty($pass))
        {
            if ($user_name == '123456' && $pass == '123456')
            {
                $this->response(array('result' => 0, 'data' => array(array('username' => 123456, "pass" => 123456), array('username' => 123456, "pass" => 123456))));
            }
        }
        else
        {
            $this->response(array('result' => 1));
        }
    }
}