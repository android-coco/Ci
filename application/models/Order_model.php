<?php

/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/5/13
 * Time: 11:33
 *
 */
class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // 所有订单
    public function getBadgeByUid($page = 1)
    {
        if ($page == 0)
        {
            $page = 1;
        }
        $this->db->from('order');
        $this->db->limit(16, $page * 16);
        $query = $this->db->get();
        return $query->result_array();
    }
}