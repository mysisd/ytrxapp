<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:57:"C:\AppServ\www\oo\public/../xmyttz/rx\view\move\move.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1520233375;s:29:"../xmyttz/view/rx_header.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>动态</title>
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
    <style>
        #header_bottom .to_download{
            background-color:#268bf2;
            color:#fff;
        }
    </style>
</head>

<body style="background-color: white;">
<!--移动端-->

<div class="phone">
    <div class="mt_content">
    <div id="header_bottom">
        <ul>
            <li><a href="/rx/rx/index" class="to_index"><img src="/Public/img/to_index.png" alt="">行情</a></li>
            <li><a href="/rx/user/transaction" class="to_goods"><img src="/Public/img/to_trade.png" alt="">交易</a></li>
            <li><a href="/rx/comm/index" class="to_community"><img src="/Public/img/to_trade.png" alt="">社区</a></li>
            <li><a href="/rx/move/move" class="to_download"><img src="/Public/img/to_find.png" alt="">动态</a></li>
            <li><a href="/rx/user/index1" class="to_me"><img src="/Public/img/to_me.png" alt="">我的</a></li>
        </ul>
    </div>


</div>

</div>



</include>

<div class="head_back">
动态
</div>
<div class="move_nav">
 <ul>
     <!--<li>财经日历</li>-->
     <li id="notice" class="move_active">盈透公告</li>
     <li id="new">新闻咨询</li>
     <li id="info">风控信息</li>
 </ul>
</div><p class="line" ></p>
<div class="slider"  style="display:none;margin: -10px 0">
    <ul class="slider-main">
        <li class="slider-panel">
            <a target="_blank"><img alt="" title="" src="/Public/img/banner/bg1.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂1</p>
        </li>
        <li class="slider-panel">
            <a  target="_blank"><img alt="" title="" src="/Public/img/banner/bg2.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂2</p>
        </li>
        <li class="slider-panel">
            <a  target="_blank"><img alt="" title="" src="/Public/img/banner/bg3.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂3</p>
        </li>
        <li class="slider-panel">
            <a target="_blank"><img alt="" title="" src="/Public/img/banner/bg4.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂4</p>
        </li>
    </ul>

    <div class="slider-extra">

        <!--<ul class="slider-nav">-->
        <!--<li class="slider-item"></li>-->
        <!--<li class="slider-item"></li>-->
        <!--<li class="slider-item"></li>-->
        <!--<li class="slider-item"></li>-->
        <!--</ul>-->


        <!--<div class="slider-page">-->
        <!--<a class="slider-pre" href="javascript:;;"><</a>-->
        <!--<a class="slider-next" href="javascript:;;">></a>-->
        <!--</div>-->
    </div>
</div>
<!--公告内容-->
<div class="notice">
<div class="content">
<p class="content_title">国际期货品种天然气(NG1712)退市提醒<span class="time">时间</span></p>

    <div class="content_list">
    <p>
    尊敬的客户：您好，感谢阁下一直以来对我司的支持。由于天然气(NG1712)合约交割期将近，本平台该和实打实大大阿达阿达阿达啊啊大是</p></div>
</div>
    <p class="line"></p>
    <div class="content">
        <p class="content_title">国际期货品种天然气(NG1712)退市提醒<span class="time">时间</span></p>

        <div class="content_list">
            <p>
                尊敬的客户：您好，感谢阁下一直以来对我司的支持。由于天然气(NG1712)合约交割期将近，本平台该和实打实大大阿达阿达阿达啊啊大是</p></div>
    </div>
    <p class="line"></p>
</div>
<!--新闻-->
<div class="zixun"  style="display: none;margin: 152px 0" >
<div class="zixun_nav">
    <ul>
        <li id="hot" class="zixun_active">热门文章</li>
        <li id="all">全部</li>
    </ul>
    <p class="line"></p>
</div>
    <div class="hot">
        <div class="zixun_list">
    <p>美国税改真正考验在后面 美元仍有大麻烦</p>
    <img src="/Public/img/banner/bg1.jpg" alt="">
    <p class="zixun_time">11/17</p>

</div> <p class="line"></p>
    <div class="zixun_list">
        <p>美国税改真正考验在后面 美元仍有大麻烦</p>
        <img src="/Public/img/banner/bg1.jpg" alt="">
        <p class="zixun_time">11/17</p>

    </div>
        <p class="line"></p>
    <div class="zixun_list">
        <p>美国税改真正考验在后面 美元仍有大麻烦</p>
        <img src="/Public/img/banner/bg1.jpg" alt="">
        <p class="zixun_time">11/17</p>

    </div>
        <p class="line"></p>
    <div class="zixun_list">
        <p>美国税改真正考验在后面 美元仍有大麻烦</p>
        <img src="/Public/img/banner/bg1.jpg" alt="">
        <p class="zixun_time">11/17</p>

    </div>
        <p class="line"></p>
    </div>

    <div class="all" style="display:none" id="refreshContainer">

                <!--数据列表-->

                        <div class="zixun_list">
                <p>美国税改真正考验在后面 美元仍有大麻烦1</p>
                <img src="/Public/img/banner/bg1.jpg" alt="">
                <p class="zixun_time">11/17</p>

            </div> <p class="line"></p>

                <div class="zixun_list">
                    <p>美国税改真正考验在后面 美元仍有大麻烦1</p>
                    <img src="/Public/img/banner/bg1.jpg" alt="">
                    <p class="zixun_time">11/17</p>

                </div> <p class="line"></p>

                <div class="zixun_list">
                    <p>美国税改真正考验在后面 美元仍有大麻烦1</p>
                    <img src="/Public/img/banner/bg1.jpg" alt="">
                    <p class="zixun_time">11/17</p>

                </div> <p class="line"></p>

                <div class="zixun_list">
                    <p>美国税改真正考验在后面 美元仍有大麻烦1</p>
                    <img src="/Public/img/banner/bg1.jpg" alt="">
                    <p class="zixun_time">11/17</p>
                </div> <p class="line"></p>


        </div>
    </div>
</div>
<!--风控-->
<div class="info">
    <p style="color:rgb(51,51,51);text-align: center">暂无信息</p>
</div>
<script src="/Public/js/mui.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

    mui.init({
        pullRefresh : {
            container:"#refreshContainer",//下拉刷新容器标识，querySelector能定位的css选择器均可，比如：id、.class等
            down : {
                height:50,//可选,默认50.触发下拉刷新拖动距离,
                auto: true,//可选,默认false.首次加载自动下拉刷新一次
                contentdown : "下拉可以刷新",//可选，在下拉可刷新状态时，下拉刷新控件上显示的标题内容
                contentover : "释放立即刷新",//可选，在释放可刷新状态时，下拉刷新控件上显示的标题内容
                contentrefresh : "正在刷新..."//可选，正在刷新状态时，下拉刷新控件上显示的标题内容

            }
        }
    });
</script>
</body>
</html>