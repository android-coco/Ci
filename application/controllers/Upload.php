<?php

/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/6/8
 * Time: 20:43
 */
class Upload extends Web_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('upload_form', array('error' => ' '));
    }

    public function do_upload()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'ipa|plist';
//        $config['max_size'] = 1024;
        $config['file_name']= uniqid();
//        $config['max_width'] = 1024;
//        $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form', $error);
        }
        else
        {
            $fileData = $this->upload->data();
            $data = array('upload_data' => $fileData);
            $data['base_url'] = $this->base_url;
            $this->load->view('upload_success', $data);
        }
    }
}