<?php

/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/5/13
 * Time: 11:42
 */
class Order extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Order_model', 'order_model');
    }

    public function orderlist()
    {
        $page = $this->input->get("page");
        $row = $this->order_model->getBadgeByUid($page);
        $row = is_null($row) ? array() : $row;
        echo json_encode(array('result' => 0, 'data' => $row));
    }
}