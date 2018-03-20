<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"C:\AppServ\www\tp\public/../xmyttz/rx\view\open\open.html";i:1516255354;s:27:"../xmyttz/view/rx_head.html";i:1515998789;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>开户</title>
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
<script src="https://cdn.bootcss.com/vue/2.2.2/vue.min.js"></script>
<script src="/Public/js/echarts.js"></script>
<script src="/Public/js/jquery.timer.dev.js"></script>
<script src="/Public/js/jquery.timer.min.js"></script></include>
</head>
<body >
<header id="head" class="mui-bar mui-bar-nav " style="background-color: rgb(250,250,250)">
    <a href="" class="mui-action-back mui-icon-left-nav  mui-icon mui-pull-left " style="color: black"></a>
    <h1 class="mui-title">开户</h1>
</header>
<div style="margin: 47px 0 0 0">
<div class="open">
<div class="open_list"></div>
    <div class="open_detail">
        <p>国际期货</p>
        <div class="qihuo_list">
            <div class="mui-content">
                <ul class="mui-table-view mui-grid-view mui-grid-12">
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">自有金额</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="#">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href=''>
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">逐笔浮盈</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="#">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <!--第二行开始-->
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">动态权益</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">风险度</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <!--第二行结束-->
                </ul>
            </div>
        </div>
        <div class="immediate">立即开通</div>
    </div>
</div>
<div class="open">
    <div class="open_list"></div>
    <div class="open_detail">
        <p>外汇高级</p>
        <div class="qihuo_list">
            <div class="mui-content">
                <ul class="mui-table-view mui-grid-view mui-grid-12">
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/account">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">自有金额</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="#">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/system">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">逐笔浮盈</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="#">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <!--第二行开始-->
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/guide">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">动态权益</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/about">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/guide">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">风险度</div></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/about">
                        <span class="mui-icon "></span>
                        <div class="mui-media-body">--</div></a></li>
                    <!--第二行结束-->
                </ul>
            </div>
        </div>
        <div class="immediate">立即开通</div>
    </div>
</div>
</div>

</body>
</html>