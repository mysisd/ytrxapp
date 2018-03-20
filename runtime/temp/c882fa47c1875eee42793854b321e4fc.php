<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"C:\AppServ\www\oo\public/../xmyttz/rx\view\comm\create.html";i:1520213808;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<title>厦门盈透锐新</title>
<meta name="renderer" content="webkit" />
<meta name="description" content="" />
<meta name="keywords" content=" " />
<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, user-scalable=0, width=device-width"/>
<meta http-equiv="Cache-Control" content="no-transform" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta content="telephone=no" name="format-detection">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
<!--<link href="<?php echo \think\Request::instance()->root(); ?>/Public/img/logo.ico"  rel="shortcut icon"/>-->
<!--<link href="<?php echo \think\Request::instance()->root(); ?>/Public/css/basic.css" rel="stylesheet" type="text/css" />-->
<script>var nav_active=null;var deal_success=false;var rootUrl="<?php echo \think\Request::instance()->root(); ?>";var conUrl="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>";var keepTime=2000;var setTime=null;function stopTime(){if(setTime){clearTimeout(setTime);}}</script>
<script src="http://cdn.bootcss.com/jsencrypt/2.3.0/jsencrypt.min.js"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/jquery.touchSwipe.min.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/rx.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo \think\Request::instance()->root(); ?>/Public/css/rx.css" type="text/css">
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/mui.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo \think\Request::instance()->root(); ?>/Public/css/mui.css" type="text/css">
<link href="<?php echo \think\Request::instance()->root(); ?>/Public/css/index.css" rel="stylesheet" type="text/css" />
<link href="/Public/css/findpwd.css" rel="stylesheet" type="text/css" />
<script src="/Public/js/findpwd.js" type="text/javascript"></script>
<!--<link href="<?php echo \think\Request::instance()->root(); ?>/Public/css/basic.css" rel="stylesheet" type="text/css" />-->
<script src="/Public/js/base.js"></script>
<script src="/Public/js/qrcode.min.js"></script>
<script src="/Public/js/qrcode.js"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/city.data-3.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/mui.picker.min.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/mui.poppicker.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/data.city.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo \think\Request::instance()->root(); ?>/Public/css/mui.picker.css">
<!--<script src="https://cdn.bootcss.com/vue/2.2.2/vue.min.js"></script>-->

<script src="/Public/js/jquery.timer.dev.js"></script>
<script src="/Public/js/jquery.timer.min.js"></script>


<link rel="stylesheet" href="/Public/fonts/iconfont.css">
<script src="/Public/js/zepto.min.js"></script>
<script src="/Public/js/zepto.kslider.js"></script></include>
    <script src="/Public/js/mobileBUGFix.mini.js"></script>
    <script src="/Public/js/localResizeIMG.js"></script>
    <script src="/Public/js/ResizeIMG.js"></script>
</head>
<body style="background-color: white">

<div class="buy_title" style="border-bottom: 1px solid rgba(1,1,1,0.2);background-color: black;color:white">
    <ul>
        <li><img  style="width: 78%" src="/Public/img/left_arrow_w.png" alt=""></li>
        <li style="text-align: center;width: 66%;margin: 14px 10px;">发帖
        <p style="margin: -8px 0;height: 27px; "><em  style="font-style: normal;color:red">0</em>字（据统计，100字帖更受欢迎） </p>
        </li>
        <li  style="text-align: center;" id="create">发表</li>
    </ul>
</div>
<div>
    <input style="border: 0px;outline:none;cursor: pointer;" type="text" placeholder="请输入标题" name="title" id="title">
</div>
<div style="border-top:1px solid rgba(1,1,1,0.2);">
    <textarea style="border: 0px;outline:none;cursor: pointer;width: 100%;height:440px " type="text" placeholder="说说你的看法..." id="idea"></textarea>
</div>
<!--<div style="width: 100%;height: 50px;background-color: rgba(1,1,1,0.1)">-->
    <!--<ul>-->
        <!--<li style="float: left;width: 20%;height: 50px" id="picture">-->
            <!--<img style="width: 42%;margin: 8px 14px; " src="/Public/img/tupian.png" alt="">-->
            <!--&lt;!&ndash;<input type="file" id="file"  accept="image/*"  capture='camera' style="display: none" >&ndash;&gt;-->
        <!--</li>-->
        <!--<li style="float: left;width: 20%;height: 50px">-->
            <!--<a href="">-->
                <!--<img style="width: 42%;margin: 8px 14px; " src="/Public/img/huati.png" alt="">-->
            <!--</a>-->
        <!--</li>-->
        <!--<li style="float: left;width: 20%;height: 50px">-->
            <!--<a href="">-->
                <!--<img style="width: 42%;margin: 8px 14px; " src="/Public/img/at.png" alt="">-->
            <!--</a>-->
        <!--</li>-->


    <!--</ul>-->
<!--</div>-->
<script>
    $(function () {
        $('#create').click(function () {
            var title=$('#title').val();
            var idea=$('#idea').val();
            $.ajax({
                url:'/rx/comm/create',
                type:'post',
                data:{'title':title,'idea':idea},
                success:function (data) {
                   if(data.res=='success'){
                       alert('发表成功');
                       location.href='/rx/comm/index';
                   }else if(data.res=='error'){
                       alert('发表失败');
                       location.reload();
                   }
                }
            })
        })
        $("#idea").keyup(function() {
            var length = $('#idea').val().length;
            $('em').text(length);
        });
    })
</script>
</body>
</html>