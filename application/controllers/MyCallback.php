<?php

/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/7/3
 * Time: 10:45
 */
class MyCallback extends Web_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('callbacktest',null);
    }


}