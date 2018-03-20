<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15 0015
 * Time: 下午 2:33
 */

namespace app\rx\controller;
use app\rx\controller\Base;

class Move extends Base{
    public function move(){



        echo $this->fetch();
    }
}