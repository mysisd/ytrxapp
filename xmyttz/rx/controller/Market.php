<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15 0015
 * Time: 下午 1:27
 */

namespace app\rx\controller;
use app\rx\controller\Base;

class Market extends Base{
        public function market(){
            $user = parent::loginUser('/rx/Login/login');
//            $url='http://tp.com/rx/open/open';
            $url='http://xmyttz.com/rx/open/open';
            if($user['a_account']==''){
                Header("Location: $url");
              exit;
            }

            echo $this->fetch();
        }
}