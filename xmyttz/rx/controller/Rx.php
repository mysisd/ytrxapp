<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14 0014
 * Time: 下午 3:31
 */

namespace app\rx\controller;
use app\website\controller\Deposit;
use think\Controller;
use app\rx\controller\Base;
use think\Session;

class Rx extends  Base{
    public function index(){
      parent::loginUser('/rx/login/login');
        echo $this->fetch();
    }
    public static function redis(){

    }
    public function send(){
        //实例化redis
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        $type=input('type');
            //利用pdo进行连接数据库
            $redis->connect('127.0.0.1',6379);
            $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
            $pdo = new \PDO($dsn,'root','1234567890');
            $sql = "SELECT *  FROM tbl_quotewhole WHERE CommodityNo='{$type}' ORDER  BY DateTimeStamp  DESC limit 1  ";//查询表中的数据
            $result=$pdo -> query($sql);//执行sql语句
             if($result==''){
                 $arr['res']=0;
        }else{
              $data = $result->fetchAll();//用数组的形式将值展现出来
                 $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
                 $redis->set("send",$s);//将redis数据存入redis中
                 $arr['res']=$data;
             }
        return json( $arr);

    }
    public function send_GC(){


            $redis = new \Redis();
            //连接
            $redis->connect('127.0.0.1',6379);


                //利用pdo进行连接数据库
                $redis->connect('127.0.0.1',6379);
                $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
                $pdo = new \PDO($dsn,'root','1234567890');
                $sql = "SELECT *  FROM tbl_quotewhole where CommodityNo='GC' and ContractNo1='1804' ORDER  BY DateTimeStamp  DESC limit 1 ";//查询表中的数据
                $result=$pdo -> query($sql);//执行sql语句
                $data = $result->fetchAll();//用数组的形式将值展现出来
                $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
                $redis->set("gc",$s);//将redis数据存入redis中

            $arr = json_decode($redis->get("gc"),true);

//
            return json( $data);
           // 等待5s


//
    }
    public function send_HSI(){


            $redis = new \Redis();
            $redis->connect('127.0.0.1',6379);


                //利用pdo进行连接数据库
                $redis->connect('127.0.0.1',6379);
                $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
                $pdo = new \PDO($dsn,'root','1234567890');
                $sql = "SELECT *  FROM tbl_quotewhole where CommodityNo='HSI' and ContractNo1='1802' ORDER  BY DateTimeStamp  DESC limit 1 ";//查询表中的数据
                $result=$pdo -> query($sql);//执行sql语句
                $data = $result->fetchAll();//用数组的形式将值展现出来
                $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
                $redis->set("hsi",$s);//将redis数据存入redis中


            $arr = json_decode($redis->get("hsi"),true);

//
            return json( $data);
           // 等待5s


    }

    public function send_CL(){


            $redis = new \Redis();
            $redis->connect('127.0.0.1',6379);

            //利用pdo进行连接数据库
                $redis->connect('127.0.0.1',6379);
                $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
                $pdo = new \PDO($dsn,'root','1234567890');
                $sql = "SELECT *  FROM tbl_quotewhole where CommodityNo='CL' and ContractNo1='1803' ORDER  BY DateTimeStamp  DESC limit 1 ";//查询表中的数据
                $result=$pdo -> query($sql);//执行sql语句
                $data = $result->fetchAll();//用数组的形式将值展现出来
                $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
                $redis->set("cl",$s);//将redis数据存入redis中

            $arr = json_decode($redis->get("cl"),true);


            return json( $data);



    }
    public function send_list(){

        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);

            $type=input('type');
             $num=input('num');
            //利用pdo进行连接数据库
            $redis->connect('127.0.0.1',6379);
            $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
            $pdo = new \PDO($dsn,'root','1234567890');
            $sql="SELECT *  FROM tbl_quotewhole where CommodityNo='{$type}'and ContractNo1='{$num}'ORDER  BY DateTimeStamp  DESC limit 1 ";
            $result=$pdo -> query($sql);//执行sql语句
            $data = $result->fetchAll();//用数组的形式将值展现出来

            $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
            $redis->set("send_list",$s);//将redis数据存入redis中
            $arr = json_decode($redis->get("send_list"),true);
            return json( $data);

    }
    public function rx(){
        echo $this->fetch();
    }
    public function rx_data(){
        echo $this->fetch();
    }
    public function rx_data1(){
        echo $this->fetch();
    }
    public function rx_buy(){
        $user=parent::loginUser('/rx/login/login');
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        $data=$redis->get('send_list');
        $arr = json_decode($data,true);
       $arr[0]['CommodityNo'];
        $this->assign('type',$arr[0]['CommodityNo'].$arr[0]['ContractNo1']);
        $this->assign('pay',$arr[0]['QBidPrice1']);
        $this->assign('sell',$arr[0]['QAskPrice1']);
        $this->assign('QLastPrice',$arr[0]['QLastPrice']);
        echo $this->fetch();
    }
    public function buy_shop(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        $data=$redis->get('send_list');
        $arr = json_decode($data,true);
        $arr[0]['CommodityNo'];
        $this->assign('type',$arr[0]['CommodityNo'].$arr[0]['ContractNo1']);
        $this->assign('pay',$arr[0]['QBidPrice1']);
        $this->assign('sell',$arr[0]['QAskPrice1']);
       $user=Db('users')->where('username',session('username'))->where('del',0)->find();
       $hand=$user['money']/$arr[0]['QBidPrice1'];
        $total = floor( ($hand*0.95)* 10 ) /10;
        $total = sprintf('%.0f', (int)$hand);
        $this->assign('hand',$total);
        echo $this->fetch();

    }
    public function buy_price(){
        echo $this->fetch();
    }
    public function rx_sell(){
        $user=parent::loginUser('/rx/login/login');
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        $data=$redis->get('send_list');
        $arr = json_decode($data,true);
        $arr[0]['CommodityNo'];
        $this->assign('type',$arr[0]['CommodityNo'].$arr[0]['ContractNo1']);
        $this->assign('pay',$arr[0]['QBidPrice1']);
        $this->assign('sell',$arr[0]['QAskPrice1']);
        $this->assign('QLastPrice',$arr[0]['QLastPrice']);
        echo $this->fetch();

    }
    public function buy_shop_sell(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        $data=$redis->get('send_list');
        $arr = json_decode($data,true);
        $this->assign('type',$arr[0]['CommodityNo'].$arr[0]['ContractNo1']);
        $this->assign('pay',$arr[0]['QBidPrice1']);
        $this->assign('sell',$arr[0]['QAskPrice1']);
        $user=Db('users')->where('username',session('username'))->where('del',0)->find();
           $a=Db('positions')->where('del',0)->where('user_id',$user['id'])->where('name',$arr[0]['CommodityNo'].$arr[0]['ContractNo1'])->find();
            if(empty($a['hand'])){
                $hand=0;
            }else{
                $hand=$a['hand'];
            }

//        $total = floor( ($hand*0.95)* 10 ) /10;
//        $total = sprintf('%.0f', (int)$hand);
        $this->assign('hand',$hand);
        echo $this->fetch();
    }
    public function buy_price_sell(){
        echo $this->fetch();
    }
    public function add_position(){
        $row=Db('users')->where('username',input('username'))->where('del',0)->find();
        $data['user_id']=$row['id'];
//
        $row2=Db('positions')->where('user_id',$row['id'])->where('del',0)->where('name',input('type'))->find();
        $data_p['user_id']=$row['id'];
        $data_p['name']=input('type').input('num');
        $data_p['hand']=input('hand')+$row2['hand'];
        $data_p['date']=date("Y-m-d H:i:s",time());
        $data_p['position_average']=input('pay');
        $ma['money']=$row['money']- input('hand')* input('pay');
        Db('users')->where('username',input('username'))->where('del',0)->update($ma);
        if(empty($row2)){
            $row1= Db('positions')->strict(false)->insert($data_p);
        }else{
            $da['hand']=input('hand')+$row2['hand'];
            $da['date']=date("Y-m-d H:i:s",time());
            $da['position_average']=input('pay');
            $row1= Db('positions')->where('user_id',$row['id'])->where('del',0)->where('name',input('type'))->update($da);
        }
        if($row1){
            $arr['res']='success';
            $re_data['status']='交易成功';
            $en_data['status']='完全成交';
        }else{

            $arr['res']='error';
            $re_data['status']='交易失败(资金不足)';
            $en_data['status']='下单失败';
        }
        $en_data['user_id']=$row['id'];
        $en_data['name']=input('type').input('num');
        $en_data['deal']='买';
        $en_data['entrusted_price']=input('pay');
        $en_data['entrust_amount']=input('hand');
        $en_data['traded']=input('hand');
        $en_data['date']=date("Y-m-d H:i:s",time());
        Db('entrust')->strict(false)->insert($en_data);
//
        $re_data['user_id']=$row['id'];
        $re_data['name']=input('type').input('num');
        $re_data['deal_valence']=input('pay');
        $re_data['volume']=input('hand');
        $re_data['sell']='1';
        $re_data['turnover']=input('pay')*input('hand');
        $re_data['deal_time']= $data_p['date'];
        Db('deal_record')->strict(false)->insert($re_data);

        return json($arr);

    }
    public function add_positions(){
        $row=Db('users')->where('username',session('username'))->where('del',0)->find();
        $data['user_id']=$row['id'];
//
            $row2=Db('positions')->where('user_id',$row['id'])->where('del',0)->where('name',input('type'))->find();
        $data_p['user_id']=$row['id'];
        $data_p['name']=input('type').input('num');
        $data_p['hand']=input('hand')+$row2['hand'];
        $data_p['date']=date("Y-m-d H:i:s",time());
        $data_p['position_average']=input('pay');
        $ma['money']=$row['money']- input('hand')* input('pay');
        Db('users')->where('username',session('username'))->where('del',0)->update($ma);
            if(empty($row2)){
                $row1= Db('positions')->strict(false)->insert($data_p);
            }else{
                $da['hand']=input('hand')+$row2['hand'];
                $da['date']=date("Y-m-d H:i:s",time());
                $da['position_average']=input('pay');
                $row1= Db('positions')->where('user_id',$row['id'])->where('del',0)->where('name',input('type'))->update($da);
            }
        if($row1){
                $arr['res']='success';
                $re_data['status']='交易成功';
                $en_data['status']='完全成交';
            }else{

                $arr['res']='error';
                $re_data['status']='交易失败(资金不足)';
                $en_data['status']='下单失败';
            }
        $en_data['user_id']=$row['id'];
        $en_data['name']=input('type').input('num');
        $en_data['deal']='买';
        $en_data['entrusted_price']=input('pay');
        $en_data['entrust_amount']=input('hand');
        $en_data['traded']=input('hand');
        $en_data['date']=date("Y-m-d H:i:s",time());
        Db('entrust')->strict(false)->insert($en_data);
//
            $re_data['user_id']=$row['id'];
            $re_data['name']=input('type').input('num');
            $re_data['deal_valence']=input('pay');
            $re_data['volume']=input('hand');
            $re_data['sell']='1';
            $re_data['turnover']=input('pay')*input('hand');
            $re_data['deal_time']= $data_p['date'];
            Db('deal_record')->strict(false)->insert($re_data);

            return json($arr);

    }
    public function optional(){
        $arr['res']=0;
            $data['num']=input('num');
            $data['type']=input('type');
            $user=Db('users')->where('phone',session('phone'))->where('del',0)->find();
            $data['user_id']=$user['id'];
            $row= Db('optional')->where('del',0)->select();
            foreach($row as $key=>$val){
              if(input('num')==$val['num']&&input('type')==$val['type']){
                  $arr['res']=null;
                  exit;
              }
            }
            $row1=Db('optional')->strict(false)->insert($data);
            if($row1){
                $arr['res']=1;
            }
            return json($arr);

    }
    public function option(){

        $user=Db('users')->where('username',session('username'))->where('del',0)->find();
        $data=Db("optional")->where('user_id',$user['id'])->select();

        return json($data);

    }
    public function money(){
        $user=Db('users')->where('username',session('username'))->where('del',0)->find();
        $res=$user['money'];
        return json($res);

    }
    public function moneys(){
        $user=Db('users')->where('username',input('username'))->where('del',0)->find();
        $res=$user['money'];
        return json($res);


    }
    public function hand_num(){
        $user=Db('users')->where('username',session('username'))->where('del',0)->find();
        $arr=Db('trading')->where('user_id',$user['id'])->where('type',input('type'))->where('number',input('num'))->where('del',0)->order('date','DESC')->limit(1)->find();
        if(empty($arr)){
                $res=0;
        }else{
            $res=$arr['available_hand'];
        }
        return json($res);
    }
    public function hand_nums(){
        $user=Db('users')->where('username',input('username'))->where('del',0)->find();
        $arr=Db('trading')->where('user_id',$user['id'])->where('type',input('type'))->where('number',input('num'))->where('del',0)->order('date','DESC')->limit(1)->find();
        if(empty($arr)){
            $res=0;
        }else{
            $res=$arr['available_hand'];
        }
        return json($res);
    }
    public function echart(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);

        $type=input('value');
            $num=input('num');
            //利用pdo进行连接数据库
            $redis->connect('127.0.0.1',6379);
            $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
            $pdo = new \PDO($dsn,'root','1234567890');
            $sql="SELECT tbl_quotewhole.QPositionTrend,tbl_quotewhole.QChangeRate,tbl_quotewhole.QLastPrice,tbl_quotewhole.DateTimeStamp,tbl_quotewhole.QOpeningPrice,tbl_quotewhole.QClosingPrice,tbl_quotewhole.QHighPrice,tbl_quotewhole.QLowPrice FROM tbl_quotewhole where CommodityNo='{$type}'and ContractNo1='{$num}' order by DateTimeStamp ";
            $result=$pdo -> query($sql);//执行sql语句
            $data = $result->fetchAll();//用数组的形式将值展现出来
            $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
            $redis->set("echart",$s);//将redis数据存入redis中

        $arr = json_decode($redis->get("echart"),true);
        return json( $arr);
    }
    public function sell_option(){

        $row=Db('users')->where('username',input('username'))->where('del',0)->find();
        $has=Db('positions')->where('user_id',$row['id'])->where('name',input('type'))->where('del',0)->find();
        if($has['hand']-input('hand')>0){
            $has_data['del']=0;
            $has_data['hand']=$has['hand']-input('hand');
            $has_data['date']=date('Y-m-d H:i:s',time());
        }else if($has['hand']-input('hand')==0){
            $has_data['hand']=0;
            $has_data['date']=date('Y-m-d H:i:s',time());
            $has_data['del']=1;
        }
        $has=Db('positions')->where('user_id',$row['id'])->where('name',input('type'))->update($has_data);

        $num1=input('hand');
        $ma['money']=$row['money']+$num1*input('pay');
        Db('users')->where('username',input('username'))->where('del',0)->update($ma);
        if($has){
            $arr['res']='success';
            $re_data['status']='交易成功';
            $en_data['status']='完全成交';
        }else{
            $arr['res']='error';
            $re_data['status']='交易失败(资金不足)';
            $en_data['status']='下单失败';
        }
        $en_data['user_id']=$row['id'];
        $en_data['name']=input('type');
        $en_data['deal']='卖';
        $en_data['entrusted_price']=input('pay');
        $en_data['entrust_amount']=input('hand');
        $en_data['traded']=input('hand');
        $en_data['date']=date("Y-m-d H:i:s",time());
        Db('entrust')->strict(false)->insert($en_data);

        $re_data['name']=input('type').input('num');
        $re_data['user_id']=$row['id'];
        $re_data['deal_valence']=input('sell');
        $re_data['volume']=input('hand');
        $re_data['sell']='0';
        $re_data['turnover']=input('sell')*input('hand');
        $re_data['deal_time']= $en_data['date'];
        Db('deal_record')->strict(false)->insert($re_data);
        return json($arr);
    }
    public function sell_options(){

        $row=Db('users')->where('username',session('username'))->where('del',0)->find();
        $has=Db('positions')->where('user_id',$row['id'])->where('name',input('type'))->where('del',0)->find();
        if($has['hand']-input('hand')>0){
            $has_data['del']=0;
            $has_data['hand']=$has['hand']-input('hand');
            $has_data['date']=date('Y-m-d H:i:s',time());
        }else if($has['hand']-input('hand')==0){
            $has_data['hand']=0;
            $has_data['date']=date('Y-m-d H:i:s',time());
            $has_data['del']=1;
        }
        $has=Db('positions')->where('user_id',$row['id'])->where('name',input('type'))->update($has_data);

        $num1=input('hand');
        $ma['money']=$row['money']+$num1*input('pay');
        Db('users')->where('username',session('username'))->where('del',0)->update($ma);
        if($has){
            $arr['res']='success';
            $re_data['status']='交易成功';
            $en_data['status']='完全成交';
        }else{
            $arr['res']='error';
            $re_data['status']='交易失败(资金不足)';
            $en_data['status']='下单失败';
        }
        $en_data['user_id']=$row['id'];
        $en_data['name']=input('type');
        $en_data['deal']='卖';
        $en_data['entrusted_price']=input('pay');
        $en_data['entrust_amount']=input('hand');
        $en_data['traded']=input('hand');
        $en_data['date']=date("Y-m-d H:i:s",time());
        Db('entrust')->strict(false)->insert($en_data);

        $re_data['name']=input('type').input('num');
        $re_data['user_id']=$row['id'];
        $re_data['deal_valence']=input('sell');
        $re_data['volume']=input('hand');
        $re_data['sell']='0';
        $re_data['turnover']=input('sell')*input('hand');
        $re_data['deal_time']= $en_data['date'];
        Db('deal_record')->strict(false)->insert($re_data);
        return json($arr);
    }
    public function optiona(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        //利用pdo进行连接数据库
        $redis->connect('127.0.0.1',6379);
        $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
        $pdo = new \PDO($dsn,'root','1234567890');
        $sql="SELECT tbl_quotewhole.CommodityNo,tbl_quotewhole.ContractNo1,tbl_quotewhole.QBidPrice1, tbl_quotewhole.QAskPrice1 FROM tbl_quotewhole  ORDER BY DateTimeStamp DESC  ";
        $result=$pdo -> query($sql);//执行sql语句
        $data = $result->fetchAll();//用数组的形式将值展现出来
        $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
        $redis->set("optiona",$s);//将redis数据存入redis中
        $arr = json_decode($redis->get("optiona"),true);
        return json($arr);
    }
    public function res(){
        $row=Db('users')->where('phone',session('phone'))->where('del',0)->find();
        $user=Db('reservation')->where('user_id',$row['id'])->select();
        return json($user);
    }

    public function ceshi1(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        //利用pdo进行连接数据库
        $redis->connect('127.0.0.1',6379);
        $data_timestamp=$redis->get("data_timestamp");
        $sort=$redis->get("sort");


//        if($redis->exists("sort_list")){
//            $row=Db('stock')->where('sort',$sort)->where('data_timestamp',$data_timestamp)->find();
//            $row = json_encode($row);//转化成json数据，因为中文转义了，所以看不清楚
//            $redis->set("sort_list",$row);
//            $arr=  $redis->get("sort_list");
//        }else{
//            $row=Db('stock')->where('sort',$sort)->where('data_timestamp',$data_timestamp)->find();
//            $row = json_encode($row);//转化成json数据，因为中文转义了，所以看不清楚
//            $redis->set("sort_list",$row);
//            $arr=  $redis->get("sort_list");
//
//        }
//        return $arr;

    }
    public function send_lists(){
        $use=Db('users')->where('del',0)->where('username',session('username'))->find();
        $trad=Db('trading')->where('del',0)->where('user_id',$use['id'])->select();
//       foreach($trad as $key=>$value){
//           $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
//           $pdo = new \PDO($dsn,'root','1234567890');
//           $sql="SELECT *  FROM tbl_quotewhole where CommodityNo='{$type}'and ContractNo1='{$num}'ORDER  BY DateTimeStamp  DESC limit 1 ";
//           $result=$pdo -> query($sql);//执行sql语句
//           $data = $result->fetchAll();//用数组的形式将值展现出来
//
//           $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
//           $redis->set("send_list",$s);//将redis数据存入redis中
//           $arr = json_decode($redis->get("send_list"),true);
//       }
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);

        $type=input('type');
        $num=input('num');
        //利用pdo进行连接数据库
        $redis->connect('127.0.0.1',6379);
        $dsn = "mysql:host=106.14.64.177;dbname=quotesql";//数据库地址和数据库名称
        $pdo = new \PDO($dsn,'root','1234567890');
        $sql="SELECT *  FROM tbl_quotewhole where CommodityNo='{$type}'and ContractNo1='{$num}'ORDER  BY DateTimeStamp  DESC limit 1 ";
        $result=$pdo -> query($sql);//执行sql语句
        $data = $result->fetchAll();//用数组的形式将值展现出来

        $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
        $redis->set("send_list",$s);//将redis数据存入redis中
        $arr = json_decode($redis->get("send_list"),true);
        return json( $data);

    }



}