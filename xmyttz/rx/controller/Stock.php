<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/14 0014
 * Time: 下午 3:31
 */

namespace app\rx\controller;
use think\Controller;
use app\rx\controller\Base;
use think\Session;

import("C:/AppServ/www/tp/public/Public/PHPExcel/PHPExcel_IOFactory",'php');
class Stock extends  Base{
    function export_excel($title,$header,$field,$data,$dir,$ext='.xls'){
        header("Content-type:text/html;charset=utf-8");
        require_once '../../../public/Public/PHPExcel.php';  // 引入phpexcel
        $phpexcel = new \PHPExcel();
        // 设置表头
        $chr = 65;
        foreach($header as $k=>$v){
            $phpexcel->setActiveSheetIndex(0)->setCellValue(chr($chr).'1', $v);
            $chr++;
        }
        // 标签名
        $phpexcel->getActiveSheet()->setTitle($title);
        // 使用第一个表
        $phpexcel->setActiveSheetIndex(0);
        $objWriter = new \PHPExcel_Writer_Excel5($phpexcel);
        foreach ($data as $key => $value) {
            //表格是从2开始的 因为上面还有表头
            $i = $key + 2;
            $chr = 65;
            foreach($field as $v){
                $phpexcel->getActiveSheet()->setCellValue(chr($chr) . $i, $value[$v]);//这里是设置单元格的内容
                $chr++;
            }
        }
        if (!is_dir($dir)) {
            mkdir($dir, 0777, TRUE);
        }
        $filename = $dir . time() . rand(10000, 99999) . $ext;
        $objWriter->save($filename);
        return $filename;
    }
    /* 读取excel 返回数组
 * @param $filename  文件名
 * @return array
 */
    function read_excel(){
        require_once 'C:/AppServ/www/tp/public/Public/PHPExcel/IOFactory.php';
//
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        //利用pdo进行连接数据库
        $redis->connect('127.0.0.1',6379);
        $reader = \PHPExcel_IOFactory::createReader('Excel2007'); //设置以Excel5格式(Excel97-2003工作簿)
        $objExcel = $reader ->load('C:/Users/Administrator/Desktop/all.xlsx'); //加载文件
        $sheet = $objExcel ->getSheet(0); //读取文件
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数

        /** 循环读取每个单元格的数据 */
        for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
            for ($column = 'A'; $column <=$highestColumm; $column++) {//列数是以A列开始
//                $dataset[] = $sheet->getCell($column.$row)->getValue();
                //echo $column.$row.":".$sheet->getCell($column.$row)->getValue()."<br />";
                $value=$sheet->getCell($column.$row)->getValue();


//                $redis->set('value',$arr);
            }
            dump($value);
        }

    }
    public function index(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        //利用pdo进行连接数据库
        $redis->connect('127.0.0.1',6379);
        require_once 'C:/AppServ/www/tp/public/Public/PHPExcel/IOFactory.php';
        $PHPReader = new \PHPExcel_Reader_Excel2007();
        $filePath = "C:/Users/Administrator/Desktop/all.xlsx";
        //判断文件类型
        if (!$PHPReader->canRead($filePath)) {
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                echo 'no Excel';
                return false;
            }
        }
        $PHPExcel = $PHPReader->load($filePath);
        /**读取excel文件中的第一个工作表*/
        $currentSheet = $PHPExcel->getSheet(0);
        /**取得最大的列号*/
        $allColumn = $currentSheet->getHighestColumn();
        /**取得一共有多少行*/
        $allRow = $currentSheet->getHighestRow();
        /**从第1行开始输出*/
        for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
            /**从第A列开始输出*/
            for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {
                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, $currentRow)->getValue();
                /**ord()将字符转为十进制数*/
//                dump($val);
                $date[]= $val;

            }

        }

        $redis->set('value',json_encode($date));
    }
    public  function  ceshi(){
        $redis = new \Redis();
        //连接
        $redis->connect('127.0.0.1',6379);
        //利用pdo进行连接数据库
        $redis->connect('127.0.0.1',6379);
//        $arr=json_decode($redis->get("value"));
//        $host = "https://stock.api51.cn";
//        $path = "/real";
//        $method = "GET";
//        $appcode = "f7a39b2b7c2a4fb7b1b6117b9a4022f1";
//        $headers = array();
//        array_push($headers, "Authorization:APPCODE " . $appcode);
//foreach($arr as $key=>$val ){
//    $val=$val.'.SZ';
//
//    $querys = "en_prod_code=600066.SZ&fields=open_px%2Chigh_px%2Clow_px%2Clast_px%2Cbusiness_amount%2Cbusiness_balance%2Coffer_grp%2Cbid_grp";
//    $bodys = "";
//    $url = $host . $path . "?" . $querys;
//
//    $curl = curl_init();
//    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//    curl_setopt($curl, CURLOPT_FAILONERROR, false);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_HEADER, false);
//    if (1 == strpos("$".$host, "https://"))
//    {
//        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//    }
//   $json=curl_exec($curl);
//    dump($json);
//
////    $json=json_decode($json, true); ;
////
////            $arr=array_keys($json['data']['snapshot']);
////
////
////        for($i=1;$i<count($arr);$i++){
////                $data=array();
////                $res=$arr[$i];
////                $row['sort']=$res;
////                $data=array_combine($json['data']['snapshot']['fields'],$json['data']['snapshot']["$res"]);
////                $data['sort']=$res;
////                dump($data);
//////                $redis->set("sort",$res);
//////                $redis->set("data_timestamp",$data['data_timestamp']);
//////                dump($data);
//////                 Db('stock')->strict(false)->insert($data);
////
//////                $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
//////                $redis->set("stock",$s);//将redis数据存入redis中
////            }            //这里是你要执行的代码
//}
        $appcode = "f7a39b2b7c2a4fb7b1b6117b9a4022f1 ";
        $host = "https://stock.api51.cn";
        $path = "/sort";
        $method = "GET";
        $headers = array();

        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "data_count=1&en_hq_type_code=SS&sort_field_name=px_change_rate&sort_type=1&start_pos=0";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

            $json=curl_exec($curl);


            $json=json_decode($json, true); ;

            $arr=array_keys($json['data']['sort']);
            $a=$arr[1];
        $val = array( $a=>$json['data']['sort'][$a]);


//        dump($json['data']['sort'][$a]);
        $keys = array_keys($json['data']['sort']) ;

//        for($i=1;$i<coun/t($arr);$i++){
//                $data=array();
//                $res=$arr[$i];
//                $row['sort']=$res;
//                dump($json);
//                $data=array_combine($json['data']['sort']['fields'],$json['data']['sort']["$res"]);
//                $data['sort']=$res;
                $da=json_encode($val);
            $redis->set("lsit",$da);
            dump($redis->get("lsit")) ;
//            $redis->set("sort",$res);
//            $redis->delete('sort');
//            dump($redis->get("sort")) ;
//             $redis->set("data_timestamp",$data['data_timestamp']);
//            $redis->delete('data_timestamp');
//            dump($redis->get("data_timestamp")) ;
//                dump($data);
//                 Db('stock')->strict(false)->insert($data);

//                $s = json_encode($data);//转化成json数据，因为中文转义了，所以看不清楚
//                $redis->set("stock",$s);//将redis数据存入redis中
//            }            //这里是你要执行的代码


    }
//    public function ceshi1(){
//        $redis = new \Redis();
//        //连接
//        $redis->connect('127.0.0.1',6379);
//        //利用pdo进行连接数据库
//        $redis->connect('127.0.0.1',6379);
//        $data_timestamp=$redis->get("data_timestamp");
//        $sort=$redis->get("sort");
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
//
//    }



}