<?php

/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/7/6
 * Time: 11:01
 */
class Exportdata_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function getxiaoshou($start = "2017-06-14 00:00:00", $end = "2017-06-14 23:59:59", $page = 0)
    {
//        echo site_url();
//        die();
        if ($page < 1)
        {
            $page = 1;
        }
        $onePage = 10;//每页显示多少
        $start1 = ($page - 1) * $onePage;//开始数据ID
        $where = array(
            'a.paystatus =' => 1,
            'a.dateline >=' => $start." 00:00:00",
            'a.dateline <=' => $end." 23:59:59",
            );
        $this->db->select("
        b.orderdetailid AS \"订单详情id\",
        b.orderid AS \"订单id\",
        b.menuid AS \"菜品id\",
        b.price AS \"价格\",
        b.amount AS \"总数量\",
        b.takeamount AS \"已取餐数量\",
        b.refundamount AS \"用户申请退款数量\",
        b.originalprice AS \"原始价格\",
        b.minusprice AS \"减免价格\",
        b.payprice AS \"需支付价格\",
        (b.amount * b.payprice) AS \"支付总金额\",
        ((b.amount - b.takeamount) * b.payprice) AS \"退入饭卡总金额\",
        b.updatetime AS \"最后修改时间\",
        a.username AS \"购买者用户昵称\",
        c.menuname AS \"菜品名称\",
        a.dateline AS \"下单时间\",
        a.paytype AS \"支付类型\",
        d.sname AS \"店铺名称\"
        ");
        $this->db->from('`order` a');
        $this->db->join('order_detail b','a.orderid = b.orderid','left');
        $this->db->join('menu c','b.menuid = c.menuid','left');
        $this->db->join('store d','a.storeid = d.storeid','left');
//        $this->db->where("a.orderid = b.orderid");
//        $this->db->where(" a.paystatus = 1");
//        //(a.dateline >= '".$start."' and a.dateline <= '".$end."')
//        $this->db->where("(a.dateline >= '".$start." 00:00:00"."' and a.dateline <= '".$end." 23:59:59"."')");
//        $this->db->where('b.menuid = c.menuid');
//        $this->db->where("a.storeid = d.storeid");
        $this->db->where($where);
        $this->db->limit($onePage,$start1);

        $query = $this->db->get();
//        echo $this->db->last_query();
//        die();

        $this->db->from('`order` a');
        $this->db->join('order_detail b','a.orderid = b.orderid','left');
        $this->db->join('menu c','b.menuid = c.menuid','left');
        $this->db->join('store d','a.storeid = d.storeid','left');
//        $this->db->where("a.orderid = b.orderid");
//        $this->db->where(" a.paystatus = 1");
//        //(a.dateline >= '".$start."' and a.dateline <= '".$end."')
//        $this->db->where("(a.dateline >= '".$start." 00:00:00"."' and a.dateline <= '".$end." 23:59:59"."')");
//        $this->db->where('b.menuid = c.menuid');
//        $this->db->where("a.storeid = d.storeid");
        $this->db->where($where);
        $query1 = $this->db->get();
        return array("info" => $query->result_array(), "num" => $query1->num_rows());
    }



    public function exportxiaoshou($start = "2017-06-14 00:00:00", $end = "2017-06-14 23:59:59")
    {
        $where = array(
            'a.paystatus =' => 1,
            'a.dateline >=' => $start." 00:00:00",
            'a.dateline <=' => $end." 23:59:59",
        );
        $this->db->select("
        b.orderdetailid AS \"订单详情id\",
        b.orderid AS \"订单id\",
        b.menuid AS \"菜品id\",
        b.price AS \"价格\",
        b.amount AS \"总数量\",
        b.takeamount AS \"已取餐数量\",
        b.refundamount AS \"用户申请退款数量\",
        b.originalprice AS \"原始价格\",
        b.minusprice AS \"减免价格\",
        b.payprice AS \"需支付价格\",
        (b.amount * b.payprice) AS \"支付总金额\",
        ((b.amount - b.takeamount) * b.payprice) AS \"退入饭卡总金额\",
        b.updatetime AS \"最后修改时间\",
        a.username AS \"购买者用户昵称\",
        c.menuname AS \"菜品名称\",
        a.dateline AS \"下单时间\",
        a.paytype AS \"支付类型\",
        d.sname AS \"店铺名称\"
        ");
        $this->db->from('`order` a');
        $this->db->join('order_detail b','a.orderid = b.orderid','left');
        $this->db->join('menu c','b.menuid = c.menuid','left');
        $this->db->join('store d','a.storeid = d.storeid','left');
//        $this->db->where("a.orderid = b.orderid");
//        $this->db->where(" a.paystatus = 1");
//        //(a.dateline >= '".$start."' and a.dateline <= '".$end."')
//        $this->db->where("(a.dateline >= '".$start." 00:00:00"."' and a.dateline <= '".$end." 23:59:59"."')");
//        $this->db->where('b.menuid = c.menuid');
//        $this->db->where("a.storeid = d.storeid");
        $this->db->where($where);
        $query = $this->db->get();
        return array("info" => $query->result_array(), "num" => $query->num_rows());
    }

}