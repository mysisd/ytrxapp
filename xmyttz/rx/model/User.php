<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/27 0027
 * Time: 上午 9:42
 */

namespace app\rx\model;
use think\Model;
class User extends Model{
    public static function getfind($map){
        return Db('users')->where('del',0)->where('phone',$map)->find();
    }
    public static function getfinds($map){
        return Db('users')->where('del',0)->where($map)->find();
    }
    public static function getsave($map,$data){
        return Db('users')->strict(false)->where('del',0)->where($map)->update($data);
    }
    public static function saves($id,$data){
        return Db('users')->strict(false)->where('id',$id)->update($data);
    }
    public static function user(){
        return Db('users')->where('id',input('delete'))->find();
    }
    public static function dele(){
        return Db('users')->where('id',input('delete'))->setField('del',1);
    }
    public static function alls($map){
        return Db('users')->where('del',0)->where($map)->order('reg_time desc')->paginate(30,false,['query' => input('param.')]);
    }
    public static function userinfo(){
        return Db('users')->where('id',input('id'))->find();
    }

}
