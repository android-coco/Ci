<?php

/**
 * Created by PhpStorm.
 * User: 38314
 * Date: 2017/7/4
 * Time: 15:10
 */
class MenuBean
{
    public $menuid;
    public $menuname;
    public $pic;

    public function getMenuid()
    {
        return $this->menuid;
    }

    public function getMenuname()
    {
        return $this->menuname;
    }

    public function getPic()
    {
        return $this->pic;
    }

    public function add()
    {
        return ($this->menuid + $this->pic);
    }
}