<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14
 * Time: 20:43
 */

namespace app\rx\controller;
use app\rx\controller\Base;
use app\rx\model\User as UserModel;
use think\Rsa;
use think\Session;
use app\base\controller\Base_s;
class User extends Base{
    public function index(){
        $user = parent::loginUser('/rx/Login/login');


        echo $this->fetch();
    }
    public function index1(){
        $user = parent::loginUser('/rx/Login/login');
        $this->assign('user',$user);
        $arr=substr(session('username'), 0, 3) . '****' . substr(session('username'), 7, strlen(session('username')));
        $this->assign('username',$arr);

        echo $this->fetch();
    }
    public  function account(){

        echo $this->fetch();
    }
    public function system(){
        echo $this->fetch();
    }
    public function guide(){
        echo $this->fetch();
    }
    public function about(){
        echo $this->fetch();
    }
    public function set_password(){
        if(!empty(input('post.'))){
            $arr['flag']=1;
            $user=Db('users');

            $map['phone']=session('phone');
            $user_row=Db('users')->where('del',0)->where($map)->find();
            if(sha1(input('old_pwd'))==$user_row['password']){
                $new_pwd=sha1($_POST['new_pwd']);
                $row=Db('users')->execute("UPDATE yt_user SET password='".$new_pwd."' WHERE del='0' and phone=".session('phone'));
                if($row !== false){
                    $_SESSION = array();
                }else{
                    $arr['flag']=0;
                }
            }else{
                $arr['flag']=-1;
            }
            return json($arr);
        }else{
            echo $this->fetch();
            }

    }
    public function set_dealpassword(){
        if(!empty(input('post.'))){
            $arr['flag']=1;
            $user=Db(('users'));

            $map['phone']=session('phone');
            $user_row=Db('users')->where('del',0)->where($map)->find();
            if(sha1(input('old_pwd'))==$user_row['deal_password']){
                $new_pwd=sha1($_POST['new_pwd']);
                $row=Db('users')->execute("UPDATE yt_user SET deal_password='".$new_pwd."' WHERE del='0' and phone=".session('phone'));
                if($row !== false){
                    $_SESSION = array();
                }else{
                    $arr['flag']=0;
                }
            }else{
                $arr['flag']=-1;
            }
            return json($arr);
        }else{
            echo $this->fetch();
        }

    }
    public function per_info(){
        $this->assign('username',session('username'));
        echo $this->fetch();

    }
    public function per(){
        $res=Db('users')->where('del',0)->where('username',session('username'))->find();
        if(!empty($res['front_idcard'])&&!empty($res['back_idcard'])&&!empty($res['handheld_idcard'])){
            $res['res']='success';
        }
        return json($res);
    }
    public function ceshi(){
        echo $this->fetch();
    }
    public function identity(){
        echo $this->fetch();
    }
    public function addcard(){

        $user = parent::loginUser('/rx/Login/login');

//        if(!empty($user['card'])){
//            getAlert(null,'/rx/user/transaction');
//            exit;
//        }
//        if(empty($_COOKIE['addcardPath'])){
//            $arr['ret']='error';
//            return json($arr);
//            cookie('addcardPath','/rx/user/setcard');
//        }
        echo $this->fetch();
    }
    public function addcard_success(){
        parent::loginUser('/rx/Login/login');
        if(!empty($_POST['card'])){
            $privDecrypt['deal_password']    = Rsa::privDecrypt($_POST['deal_password']);
            $data['deal_password'] = $privDecrypt['deal_password'];
            $_POST['deal_password'] = sha1($data['deal_password']);
            $row = UserModel::getsave(array('phone' => session('phone')),$_POST);
            if($row){
                $arr['flag']=1;
            }else{
                $arr['flag']=0;
            }
            return json($arr);
        }
    }
    //银行卡信息显示
    public function setcard(){
        $user = parent::loginUser('/rx/Login/login');

        $card      = substr($user['card'], 0, 4).'***********'.substr($user['card'], 15);
        $cardphone = substr($user['cardphone'], 0, 3).'****'.substr($user['cardphone'], 7);
        $this->assign('card'      , $card);
        $this->assign('cardphone' , $cardphone);
        $this->assign(('users')      , $user);
        echo $this->fetch();
    }
    public function transaction(){
        parent::loginUser('/rx/Login/login');
        $use=Db('users')->where('username',session('username'))->where('del',0)->find();
        $data=Db('entrust')->where('user_id',$use['id'])->order('date','DESC')->select();
        $this->assign('data',$data);
        echo $this->fetch();
    }
    public function capital(){

        echo $this->fetch();
    }

//  判断有没有添加出金银行卡
    public function null_card(){
        $res=Db('users')->where('del',0)->where('username',session('username'))->find();
        if(empty($res['card'])){
            $arr['res']='no';
        }else{
            $arr['res']='yes';
        }
        return json($arr);

    }
    public function acc(){
        $arr['ret']='no';
        $res=Db('users')->where('del',0)->where('username',session('username'))->find();
        if(!empty($res['card'])){
            $arr['ret']='yes';
        }
        return json($arr);
    }
    public function history(){
        echo $this->fetch();
    }
    public function transactions(){

        echo $this->fetch();
    }
    public function save_trans(){
        $arr['ret']='false';
        $data['sex']=input('sex');
        $data['area']=input('area');
        $data['face']=input('face');
        $res=Db('users')->where('del',0)->where('username',session('username'))->strict(false)->update($data);
        if($res){
           $arr['ret']='success';
        }
        return json($arr);
    }
    public function my(){
        $arr['res']='false';
        $res=Db('users')->where('del',0)->where('username',session('username'))->find();
        if(!empty($res['idcard'])){
            $arr['front_idcard']= $res['front_idcard'];
            $arr['back_idcard']= $res['back_idcard'];
            $arr['handheld_idcard']= $res['handheld_idcard'];
            $arr['face']=$res['face'];
            $arr['res']='success';
        }
        return json($arr);
    }

    public function re_wifi(){
        $data['wifi_time']=input('wifi_time');
        Db('users')->where('del',0)->where('username',session('username'))->update($data);

    }
    public function re_net(){
        $data['net_time']=input('net_time');
        Db('users')->where('del',0)->where('username',session('username'))->update($data);

    }
    public function re_pass(){
        $data['pass_time']=input('pass_time');
        Db('users')->where('del',0)->where('username',session('username'))->update($data);

    }
    public function sys(){
        $res=Db('users')->where('del',0)->where('username',session('username'))->find();
        return json($res);
    }
//    修改登录密码
    public function change_pass(){

    }
//   判断与原密码相同
  public function old_pass(){
      if(!empty($_POST['password'])){

          $_POST['phone']    = Rsa::privDecrypt($_POST['phone']);
          $_POST['password'] = Rsa::privDecrypt($_POST['password']);

          $map = $_POST['phone'];
          $phone_user   = UserModel::getfind($map);
          if(!empty($phone_user)){
              if($phone_user['password'] == sha1($_POST['password'])){

                  $arr['ret'] = 'success';
              }else{
                  $arr['ret'] = 'error';
              }
          }else{
              $arr['ret']     = null;
          }
          return json($arr);
      }
  }


//    重回登录界面
    public function re_login(){
        $_SESSION = array();
        session(null);
        getAlert(null,'/rx/login/login');
    }
//    重置交易密码
    public function resert(){
        if(!empty(input('code'))){
            if(input('code')== session('code')){
                $arr['res']='success';
            }else{
                $arr['res'] = 'error';
            }
            return json($arr);
        }
        if(!empty(input('phone'))){
            $res=Db('users')->where('del',0)->where('phone',input('phone'))->find();

            if($res){
               $arr['res']='success';
            }else{
                $arr['res'] = 'error';
            }
            return json($arr);
        }else{
            echo $this->fetch();
        }

    }
    public function resert_deal(){
        if(!empty(input('new_deal'))){
            $privDecrypt['new_deal']    = Rsa::privDecrypt(input('new_deal'));
            $_POST['new_deal'] = $privDecrypt['new_deal'];

            $data['deal_password']=sha1( $_POST['new_deal']);
            $res=Db('users')->where('del',0)->where('username',session('username'))->update($data);
            if($res){
                $arr['res']='success';
            }else{
                $arr['res'] = 'error';
            }
            return json($arr);
        }else{
            echo $this->fetch();
        }

    }
    public function resert_code(){
        if(input('code')== session('code')){
                $arr['res']='success';
            }else{
                $arr['res'] = 'error';
            }
        return json($arr);
        }

    public function imgs(){
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', input('face'), $result)){
            $type = $result[2];
            $name=input('name');
            $time=date('ymdhis',time());
            $new_file = "/data/web/xmyttz/public/Public/img/idcard/";
            if(!file_exists($new_file)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $new_file =  "/data/web/xmyttz/public/Public/img/idcard/{$time}.{$name}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', input('face'))))){
                $data['face']=$new_file;
                $res=Db('users')->where('del',0)->where('username',session('username'))->update($data);
                if($res){
                    $arr['res']='success';
                }else{
                    $arr['res']='false';
                }
                return json($arr);
            }
        }else{
            return false;
        }

    }
    public function perfect_id(){

            echo $this->fetch();
        }
    public function cesi(){
            echo $this->fetch();
        }
    public function film_positive(){
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', input('face'), $result)){
            $type = $result[2];
            $name=input('name');
            $time=date('ymdhis',time());
            $new_file = "/data/web/xmyttz/public/Public/img/idcard/";
            if(!file_exists($new_file)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $new_file =  "/data/web/xmyttz/public/Public/img/idcard/{$time}.{$name}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', input('face'))))){
                $data['front_idcard']=$new_file;
                $res=Db('users')->where('del',0)->where('username',session('username'))->update($data);
                if($res){
                    $arr['res']='success';
                }else{
                    $arr['res']='false';
                }

            }
        }else{
            $arr['res']='null';
        }
        return json($arr);
    }
    public function film_back(){
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', input('face'), $result)){
            $type = $result[2];
            $name=input('name');
            $time=date('ymdhis',time());
            $new_file = "/data/web/xmyttz/public/Public/img/idcard/";
            if(!file_exists($new_file)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $new_file =  "/data/web/xmyttz/public/Public/img/idcard/{$time}.{$name}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', input('face'))))){
                $data['back_idcard']=$new_file;
                $res=Db('users')->where('del',0)->where('username',session('username'))->update($data);
                if($res){
                    $arr['res']='success';
                }else{
                    $arr['res']='false';
                }
                return json($arr);
            }
        }else{
            return false;
        }
         }
    public function film_hold(){
        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', input('face'), $result)){
            $type = $result[2];
            $name=input('name');
            $time=date('ymdhis',time());
            $new_file = "/data/web/xmyttz/public/Public/img/idcard/";
            if(!file_exists($new_file)){
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $new_file =  "/data/web/xmyttz/public/Public/img/idcard/{$time}.{$name}";
            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', input('face'))))){
                $data['handheld_idcard']=$new_file;
                $res=Db('users')->where('del',0)->where('username',session('username'))->update($data);
                if($res){
                    $arr['res']='success';
                }else{
                    $arr['res']='false';
                }
                return json($arr);
            }
        }else{
            return false;
        }
         }
         public function ceshi1(){
        echo $this->fetch();
         }
         public function amv(){
             $res=Db('users')->where('del',0)->where('username',session('username'))->find();
             return json($res);
         }
         public function ceshi2(){
             echo $this->fetch();
         }
    public function ceshi3(){
        echo $this->fetch();
    }
    public function kline(){
        echo $this->fetch();
    }

    public function tran_all(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        $use=Db('users')->where('del',0)->where('username',session('username'))->find();

        $qq =Db('positions')->where('del',0)->where('user_id',$use['id'])->select();

        foreach( $qq as $key=>$value){
           $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
           $pdo = new \PDO($dsn,'root','1234567890');
           $arr1['type']=substr($value['name'], 0,-4);
           $arr1['num']=substr($value['name'],-4);

                $type=$arr1['type'];

                $num=$arr1['num'];
                $sql="SELECT *  FROM tbl_quotewhole where CommodityNo='{$type}'and ContractNo1='{$num}'ORDER  BY DateTimeStamp  DESC limit 1 ";
                $result=$pdo -> query($sql);//执行sql语句
                $dataq = $result->fetchAll();//用数组的形式将值展现出来
                $arr = json_encode($dataq);//转化成json数据，因为中文转义了，所
            $ab1=Db('positions')->where('del',0)->where('user_id',$use['id'])->where('name',$dataq[0]['CommodityNo'].$dataq[0]['ContractNo1'])->order('date','DESC')->find();
            $data['floating_profit']=$dataq[0]['QLastPrice']-$ab1['position_average'];
            $data['date']=date('Y-m-d H:i:s',time());
            $ab=Db('positions')->where('del',0)->where('user_id',$use['id'])->where('name',$dataq[0]['CommodityNo'].$dataq[0]['ContractNo1'])->order('date','DESC')->update($data);


       }
       $more= Db('positions')->where('del',0)->where('user_id',$use['id'])->order('date','DESC')->select();
        return json($more);
    }
    public function tran_alls(){

        $use=Db('users')->where('del',0)->where('username',input('name'))->find();

        $qq =Db('positions')->where('del',0)->where('user_id',$use['id'])->select();

        foreach( $qq as $key=>$value){
            $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
            $pdo = new \PDO($dsn,'root','1234567890');
            $arr1['type']=substr($value['name'], 0,-4);
            $arr1['num']=substr($value['name'],-4);

            $type=$arr1['type'];

            $num=$arr1['num'];
            $sql="SELECT *  FROM tbl_quotewhole where CommodityNo='{$type}'and ContractNo1='{$num}'ORDER  BY DateTimeStamp  DESC limit 1 ";
            $result=$pdo -> query($sql);//执行sql语句
            $dataq = $result->fetchAll();//用数组的形式将值展现出来
            $arr = json_encode($dataq);//转化成json数据，因为中文转义了，所
            $ab1=Db('positions')->where('del',0)->where('user_id',$use['id'])->where('name',$dataq[0]['CommodityNo'].$dataq[0]['ContractNo1'])->order('date','DESC')->find();
            $data['floating_profit']=$dataq[0]['QLastPrice']-$ab1['position_average'];
            $data['date']=date('Y-m-d H:i:s',time());
            $ab=Db('positions')->where('del',0)->where('user_id',$use['id'])->where('name',$dataq[0]['CommodityNo'].$dataq[0]['ContractNo1'])->order('date','DESC')->update($data);


        }
        $more= Db('positions')->where('del',0)->where('user_id',$use['id'])->order('date','DESC')->select();
        return json($more);
    }

    public function clinch_list(){
       $row= Db('users')->where('del',0)->where('username',session('username'))->find();
        $row= Db('deal_record')->where('user_id',$row['id'])->order('deal_time','DESC')->select();
        return json($row);
    }
    public function clinch_lists(){
        $row= Db('users')->where('del',0)->where('username',input('username'))->find();
        $row= Db('deal_record')->where('user_id',$row['id'])->order('deal_time','DESC')->select();
        return json($row);
    }
    public function en_list(){
        $use=Db('users')->where('username',input('name'))->where('del',0)->find();
        $data=Db('entrust')->where('user_id',$use['id'])->order('date','DESC')->select();
        return json($data);
    }

    public function clinch_list_s(){
        $row= Db('users')->where('del',0)->where('username',session('username'))->find();
        $row= Db('trading')->where('del',0)->where('user_id',$row['id'])->select();
        $data['row']=count($row);
        $data['data']=$row;
        return json($data);
    }

    public function reservation(){
        $arr['res']=0;
        $row=Db('users')->where('phone',session('phone'))->where('del',0)->find();
        $data['user_id']=$row['id'];
        $data['reservation_hand']=input('count');
        $data['reservation']=input('money');
        $data['num']=input('num');
        $data['type']=input('type');
        $data['date']=date("Y-m-d H:i:s",time());
        $row2=Db('reservation')->strict(false)->insert($data);
        if($row2){
            $arr['res']=1;
        }
        return json($arr);
    }

}