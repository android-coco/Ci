<?php

/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/5/13
 * Time: 12:26
 */
class Menu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // 所有菜品
    public function getMenu($page = 0)
    {
        if ($page < 1)
        {
            $page = 1;
        }
        $this->db->select('A.menuid,A.menuname,A.pic,A.price');
        $this->db->from('menu A');
        $this->db->order_by('A.menuid', 'DESC');
        $this->db->limit(32, ($page - 1) * 32);
        $query = $this->db->get();
        //echo "sql语句：".$this->db->last_query();
        return $query->result_array();
    }

    /**
     * 获取门店菜单
     * @param  int $storeid 门店id
     * @return array             菜单列表
     */
    public function getRowsByStoreid($storeid)
    {
        $where = array(
            'A.status' => 0,
            'C.storeid' => $storeid,
            //'B.number >' => 0,
        );
        $this->db->select('A.*, C.storeid, B.number');
        $this->db->from('menu A');
        $this->db->join('menu_stock B', 'A.menuid = B.menuid', 'left');
        $this->db->join('store C', 'C.sid = B.sid', 'inner');
        $this->db->where($where);
        $this->db->order_by('A.price', 'desc');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        return 0;
    }

}