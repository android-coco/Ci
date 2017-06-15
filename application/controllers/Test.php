<?php

/**
 * Created by PhpStorm.
 * User: yh
 * Date: 2017/6/14
 * Time: 16:24
 */
class Test extends Web_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['base_url'] = $this->config->item('base_url');
        $this->load->view('test1.php',$data);
    }
}