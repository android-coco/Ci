<?php

/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/5/22
 * Time: 18:35
 */
class Hello extends Web_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model', 'order_model');
    }
    public function index()
    {
        $data['title'] = 'HelloJJJ';
        $data['expression'] = false;
        $data['datas'] = array(
            'id' =>'1',
            'name' => '杨家将',
            'age' => '26',
            'sex' => '1'
        );
        $data['orders'] = $this->order_model->getBadgeByUid();
        $this->load->view('hello_message',$data);
    }
}