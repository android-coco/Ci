<?php

/**
 * Created by PhpStorm.
 * User: yhlyl
 * Date: 2017/8/12
 * Time: 21:41
 */
class Expost extends Api_Controller
{
    public function testPost()
    {
        $data = getallheaders();
        $this->response($data);
    }
}