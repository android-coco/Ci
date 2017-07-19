<?php

/**
 * Created by PhpStorm.
 * User: yh
 * Date: 2017/5/22
 * Time: 18:35
 * 导数据
 */
class Exportdata extends Web_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');//分页
        $this->load->helper('config_pagination');
        $this->load->helper('form');
        $this->load->library('PHPExcel');
        $this->load->helper('excel');
        $this->load->model('Exportdata_model', 'exportdata_model');
        $this->load->library('RedisDriver', 'redisdriver');//redis
        $this->redisdriver->connect();//连接redis
    }


    public function lists($page = 1)
    {
        $currdData = date("Y-m-d");
        $start = empty($this->input->get("start_time")) ? $currdData : $this->input->get("start_time");
        $end = empty($this->input->get("end_time")) ? $currdData : $this->input->get("end_time");
        $data['info'] = $this->exportdata_model->getxiaoshou($start, $end, $page)['info'];
        $data['num'] = $this->exportdata_model->getxiaoshou($start, $end, $page)['num'];
//        $this->response($data);
//        die();
        $data['base_url'] = $this->base_url;
        $per_page = 1; // 页数
        $url = $this->base_url . "exportdata/lists?start_time=$start&end_time=$end";
        $cfg = config_pagination($url, $data['num'], $per_page, 2);
        $this->pagination->initialize($cfg);
        $data['pages_html'] = $this->pagination->create_links();
        $data['per_page'] = $page;
        $data['start'] = $start;
        $data['end'] = $end;
        $data['curr_url'] = $url;
        $data['total_page'] = ceil(($data['num'] / 10));
//        $this->response($data);
//        $this->log($data);
        $this->load->view('export_message', $data);
    }


    public function ajaxData()
    {
        $currdData = date("Y-m-d");
        $page = empty($this->input->get("page")) ? 1 : $this->input->get("page");
        $start = empty($this->input->get("start_time")) ? $currdData : $this->input->get("start_time");
        $end = empty($this->input->get("end_time")) ? $currdData : $this->input->get("end_time");
        $data['info'] = $this->exportdata_model->getxiaoshou($start, $end, $page)['info'];
        $data['num'] = $this->exportdata_model->getxiaoshou($start, $end, $page)['num'];
//        $this->response($data);
//        die();
        $data['base_url'] = $this->base_url;
        $per_page = 1; // 页数
        $url = $this->base_url . "exportdata/lists?start_time=$start&end_time=$end";
        $cfg = config_pagination($url, $data['num'], $per_page, 2);
        $this->pagination->initialize($cfg);
        $data['pages_html'] = $this->pagination->create_links();
        $data['per_page'] = $page;
        $data['start'] = $start;
        $data['end'] = $end;
        $data['curr_url'] = $url;
        $data['total_page'] = ceil(($data['num'] / 10));
        $this->response($data);
    }


    public function exportToData()
    {
        $currdData = date("Y-m-d");
        $start = empty($this->input->get("start_time")) ? $currdData : $this->input->get("start_time");
        $end = empty($this->input->get("end_time")) ? $currdData : $this->input->get("end_time");
        $data['info'] = $this->exportdata_model->exportxiaoshou($start, $end)['info'];
        $data['num'] = $this->exportdata_model->getxiaoshou($start, $end)['num'];
        $header = array('订单详情id','订单id','菜品id','总数量','已取餐数量','已退押金',
            '用户申请退款数量','原始价格','减免价格','需支付价格','最后修改时间','购买者用户昵称','菜品名称','下单时间','支付类型1=微信，2=支付宝','店铺名称');
        excel_download($header,$data['info']);
    }

}