<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 21:46
 */

namespace app\rx\controller;
use think\Controller;
use app\rx\model\User as UserModel;
use think\Session;
use think\Rsa;
use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use app\base\controller\Base_s;
use \think\Request;
class Register extends Controller{
    public function register(){
//
            echo $this->fetch();

    }
    public function registers(){

            $arr = array();
        $privDecrypt['phone']    = input('phone');
        $privDecrypt['password'] = input('password');

//            $privDecrypt['phone']    = Rsa::privDecrypt(input('phone'));
//            $privDecrypt['password'] = Rsa::privDecrypt(input('password'));

            $_POST['phone']    = $privDecrypt['phone'];
            $_POST['password'] = $privDecrypt['password'];

            $map = $_POST['phone'];
            $phone = UserModel::getfind($map);

            if(!empty($phone)){
                $arr['register'] = 'repeat';
            }else{
                $_SESSION = array();
                session(null);
                $data['belong']   = 'xmyttz';
                $data['uniqid']   = sha1(uniqid());
                $data['username'] = $_POST['phone'];
                $data['phone']    = $_POST['phone'];
                $data['password'] = sha1($_POST['password']);
                $data['reg_time'] = time();
                $data['del'] = 0;
            
                $row = Db('users')->strict(false)->insert($data);

                if($row){
                    session('username', $data['username']);
                    session('face'    , null);
                    session('uniqid'  , $data['uniqid']);
                    session('phone'   , $data['phone']);
                    $arr['register'] = 'success';
                }
            }

        return json($arr);

    }
    public function agreement(){
        echo $this->fetch();
    }

    //验证是否已注册
    public function has_phone(){
        $arr['exist'] =1;

        $map= input('phone');

        $phone = UserModel::getfind($map);

        if(!empty($phone)){
            $arr['exist']=0;
        }
        return json($arr);
    }

    //验证邀请码是否存在
    public function is_invite_code(){
        $invitelist = Db('invitelist');

        $arr['flag']        = 0;

        $map['invite_code'] = $_POST['invite_code'];

        $invite = $invitelist->where('del',0)->where($map)->count();
        if($invite!=0){
            $arr['flag'] = 1;
        }
        return json($arr);
    }
    public function abc(){
        Base_s::sendMsg(input('phone'));

    }
}