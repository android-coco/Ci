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
        $this->load->helper('json_helper');
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
