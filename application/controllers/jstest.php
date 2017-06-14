<?php
/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/6/14
 * Time: 23:30
 */
class jstest extends Web_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['base_url'] = $this->config->item("base_url");
        $this->load->view("testjs.php",$data);
    }
}