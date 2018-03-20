<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 20:45
 */

namespace app\rx\controller;
use think\Controller;
use think\Session;
use app\rx\model\User as UserModel;
class Base extends Controller{
    public static function loginUser($url='') {
        if(empty(session('phone')) && empty(session('uniqid'))) {
            if(!empty($url)) getAlert(null,$url);
            return false;
        }
        $map['phone']  = session('phone');
        $map['uniqid'] = session('uniqid');

        $user = UserModel::getfinds($map);
        if(empty($user)) {
            if(!empty($url)) getAlert(null,$url);
            return false;
        }

        return $user;
    }
}