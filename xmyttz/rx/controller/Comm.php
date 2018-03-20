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

class Comm extends  Base{
    public function index(){
        $row=Db('post')->where('del',0)->order('date','DESC')->select();
        $this->assign('data',$row);
        echo $this->fetch();
    }
    public function create(){
        $title=input('title');
        $idea=input('idea');
        if(!empty($title)&&!empty($idea)){
            $user=Db('users')->where('del',0)->where('username',session('username'))->find();
            $data['title']=$title;
            $data['content']=$idea;
            $data['user_id']=$user['id'];
            $data['nickname']=$user['nickname'];
            $data['date']=date('Y-m-d H:i',time());
            $row=Db('post')->strict(false)->insert($data);
            if($row){
                $arr['res']='success';
            }else{
                $arr['res']='error';

            }
            return json($arr);
        }else{
            echo $this->fetch();
        }

    }
    public function  nickname(){
        $nickname=input('nickname');
        if(!empty($nickname)){
            $data['nickname']=$nickname;
            $row=Db('users')->where('del',0)->where('username',session('username'))->update($data);
                if($row){
                    $arr['res']='success';
                }else{
                    $arr['res']='error';
                }
                return json($arr);
        }else{
            $row= Db('users')->where('del',0)->where('username',session('username'))->find();
            $this->assign('data',$row);
            echo $this->fetch();
        }

    }
    public function ser_name(){

       $row= Db('users')->where('del',0)->where('username',session('username'))->find();
        return json($row);
    }
    public function detailed(){
        $text=input('text');
        $id=input('id');
        if(!empty($text)){
            $row=Db('users')->where('del',0)->where('username',session('username'))->find();
            $data['msgid']=$id;
            $data['content']=$text;
            $data['sender']=$row['nickname'];
            $data['date']=date('Y-m-d H:i:s',time());
            $row=Db('msg')->insert($data);
               if($row){
                   $arr['res']='success';
               } else{
                   $arr['res']='error';
               }
               return json($arr);
        }else{
            $id=input('id');
            $data=Db('post')->where('del',0)->where('id',$id)->find();
            $datas=Db('msg')->where('msgid',$id)->order('date','DESC')->select();
            $this->assign('data',$data);
            $this->assign('datas',$datas);
            echo $this->fetch();
        }

    }


}