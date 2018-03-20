<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 20:27
 */

namespace app\rx\controller;
use think\Controller;
use think\Rsa;
use app\rx\model\User as UserModel;
class Login extends Controller{
    public function login(){
        session(null);
        if(!empty($_POST['phone']) && !empty($_POST['password'])){
            $_POST['phone']    = Rsa::privDecrypt($_POST['phone']);
            $_POST['password'] = Rsa::privDecrypt($_POST['password']);

            $map = $_POST['phone'];
            $phone_user   = UserModel::getfind($map);
            if(!empty($phone_user)){
                if($phone_user['password'] == sha1($_POST['password'])){


                    $data['login_time'] = time();
                    UserModel::saves($phone_user['id'],$data);
                    session('key'   , $phone_user['username']);
                    session('username'   , $phone_user['username']);
                    session('face'       , $phone_user['face']);
                    session('uniqid'     , $phone_user['uniqid']);
                    session('phone'      , $phone_user['phone']);
                    $arr['orign']= session('username');
                    $arr['username']=substr(session('username'), 0, 3) . '****' . substr(session('username'), 7, strlen(session('username')));
                    $arr['res'] = 'success';
                }else{
                    $arr['res'] = 'error';
                }
            }else{
                $arr['res']     = null;
            }
            return json($arr);
        }else{
            echo $this->fetch();
        }

    }
    public function logins(){
//        session(null);

//            $_POST['phone']    = Rsa::privDecrypt($_POST['phone']);
//            $_POST['password'] = Rsa::privDecrypt($_POST['password']);
        $_POST['phone']    = input('phone');
           $_POST['password'] = input('password');
            $map = $_POST['phone'];
            $phone_user   = UserModel::getfind($map);
            if(!empty($phone_user)){
                if($phone_user['password'] == sha1($_POST['password'])){


                    $data['login_time'] = time();
                    UserModel::saves($phone_user['id'],$data);
                    session('key'   , $phone_user['username']);
                    session('username'   , $phone_user['username']);
                    session('face'       , $phone_user['face']);
                    session('uniqid'     , $phone_user['uniqid']);
                    session('phone'      , $phone_user['phone']);
                    $arr['orign']= session('username');
                    $arr['username']=substr(session('username'), 0, 3) . '****' . substr(session('username'), 7, strlen(session('username')));
                    $arr['login'] = 'success';
                }else{
                    $arr['login'] = 'error';
                }
            }else{
                $arr['login']     = null;
            }
            return json($arr);


    }

    public function logout(){
        session_start();
        $_SESSION = array(); //清除SESSION值.
        if(isset($_COOKIE[session_name()])){  //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
            setcookie(session_name(),'',time()-1,'/');
        }
        session_destroy();  //清除服务器的sesion文件

    }

    //密码找回
    public function findpwd(){
        if(!empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['code']) ){
            session_start();
            $arr = array();
            if($_POST['code']==$_SESSION['code'] && $_POST['phone']==$_SESSION['code_phone']){
                $_SESSION = array();
                session(null);

                $map['phone']     = $_POST['phone'];
                $data['password'] = sha1($_POST['password']);

                $row = UserModel::getsave($map,$data);
                if($row!==false){
                    $arr['reset'] = 'success';
                }
            }else{
                $arr['reset'] = 'error';
            }
            return json($arr);
        }else{
            echo $this->fetch();
        }
    }
    public function findpwds(){

            session_start();
            $arr = array();
//            if(input('code')==session('code') && input('phone')==session('code_phone')){
//                $_SESSION = array();
//                session(null);
//
//                $map['phone']     = input('phone');
//                $data['password'] = sha1(input('password'));
//
//                $row = UserModel::getsave($map,$data);
//                if($row!==false){
//                    $arr['reset'] = 'success';
//                }
//            }else{
//                $arr['reset'] = 'error';
//            }

            $_SESSION = array();
            session(null);

            $map['phone']     = input('phone');
            $data['password'] = sha1(input('password'));

            $row = UserModel::getsave($map,$data);
            if($row!==false){
                $arr['reset'] = 'success';
            }
        else{
            $arr['reset'] = 'error';
        }
            return json($arr);

    }

    //验证是否已注册
    public function has_phone(){
        $arr['flag'] =1;

        $map = $_POST['phone'];

        $phone = UserModel::getfind($map);

        if(!empty($phone)){
            $arr['flag']=0;
        }
        return json($arr);
    }
}