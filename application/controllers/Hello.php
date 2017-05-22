<?php

/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/5/22
 * Time: 18:35
 */
class Hello extends Web_Controller
{
    public function index()
    {
        $data['title'] = 'HelloJJJ';
        $data['expression'] = false;
        $this->load->view('hello_message',$data);
    }
}