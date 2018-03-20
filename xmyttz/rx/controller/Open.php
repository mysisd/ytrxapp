<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15 0015
 * Time: 下午 5:40
 */

namespace app\rx\controller;
use app\rx\controller\Base;

class Open extends Base{
    public function open(){
        $user = parent::loginUser('/rx/Login/login');
        echo $this->fetch();
    }
}