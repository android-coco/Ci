<?php

/**
 * 界面公用控制器
 * @author 刘健 <59208859@qq.com>
 */
class Web_Controller extends YH_Controller
{

    public $base_url = '';
    public function __construct()
    {
        parent::__construct();

        // 网址导入
        $this->load->config('config');
        $this->load->helper('json_helper');
        $this->base_url = $this->config->item('base_url');
    }

    /**
     * 获取用户会话
     * @return object 用户信息
     */
    public function userSession($redirect = true, $from = 'menu')
    {
        $this->load->library('session');
        $user = $this->session->web_user;
        if (empty($user) && $redirect) {
            header("Location:{$this->base_url}account/index?from={$from}");
            return;
        // var_dump($user);die;
        }
        return $user;
    }

    public function response($data)
    {
        echo api_jsonp_encode($data);
        exit;
    }

    public function log($data = null)
    {
        var_dump_pre($data);
        die();
    }

}
