<?php

/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/5/13
 * Time: 11:42
 * @property  var order_model
 */
class Order extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model', 'order_model');
    }

    public function list()
    {
        $page = $this->input->get("page");
        $page = isset($page) ? $page : 0;
        $row = $this->order_model->getBadgeByUid($page);
        $row = is_null($row) ? array() : $row;
        $this->response(array('result' => 0, 'data' => $row));
    }
}