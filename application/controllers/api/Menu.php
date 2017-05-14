<?php

/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/5/13
 * Time: 11:42
 */
class Menu extends Api_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu_model');
    }

    public function menulist()
    {
        $page = $this->input->get("page");
        $row = $this->menu_model->getMenu($page);
        $row = is_null($row) ? array() : $row;
        echo json_encode(array('result' => 0, 'data' => $row));
    }


    public function menu()
    {
        $storeid = $this->input->get("storeid");
        $row = $this->menu_model->getRowsByStoreid($storeid);
        $row = is_null($row) ? array() : $row;
        echo json_encode(array('result' => 0, 'data' => $row));
    }
}