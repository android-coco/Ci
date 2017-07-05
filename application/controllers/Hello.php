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
        $this->load->helper('config_captcha');
        $this->load->helper('captcha');
        $this->load->library('session');
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
        $data['wrod'] = $this->session->cap_word;
        $base_url = $this->config->item('base_url');
        $data['orders'] = $this->order_model->getBadgeByUid();
        $img_path = FCPATH . 'static/captcha/';
        $img_url = $base_url . 'static/captcha/';
        $cfg = config_captcha($img_path, $img_url);
        $cap = create_captcha($cfg);
        $data['cap_img_html'] = $cap['image'];
        //保存session
        $this->session->cap_word = $cap['word'];

        $this->load->view('hello_message',$data);
    }

}