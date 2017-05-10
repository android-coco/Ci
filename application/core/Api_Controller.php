<?php

/**
 * API 公用的控制器
 * @author 游浩 <383145975@qq.com>
 */
class Api_Controller extends YH_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function response($data)
    {
        $this->load->helper('json_helper');
        echo api_jsonp_encode($data);
        exit;
    }
}
