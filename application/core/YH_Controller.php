<?php

/**
 * 公用的控制器
 * @author 游浩 <383145975@qq.com>
 */
class YH_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

}

// 自定义公用控制器
require_once APPPATH . 'core/Web_Controller.php';
require_once APPPATH . 'core/Api_Controller.php';

