<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:65:"C:\AppServ\www\oo\public/../xmyttz/rx\view\rx\buy_price_sell.html";i:1517535264;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
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
    <script src="/Public/js/rx_money.js"></script>
</head>
<body style="background-color: white">
<div class="buy_shop buy_price">
    <p class="hand">价格</p>
    <div class="hand_mes">
        <input type="text" value="63.47" id="time_sell">
        <span class="span"><img src="/Public/img/buy_reduction.png" alt="" id="redu1"></span>
        <span class="span1"><img src="/Public/img/buy_add.png" alt="" id="add2"></span>
    </div>
    <p class="hand">手数</p>
    <div class="hand_mes">
        <input type="text" value="1" id="sell_count">
        <span class="span"><img src="/Public/img/buy_reduction.png" alt="" id="redu"></span>
        <span class="span1"><img src="/Public/img/buy_add.png" alt="" id="add1"></span>
    </div>
    <p class="sell_mess">最多可卖: <span>0 <i>手</i></span></p>
</div>
<div class="buy_back"></div>
<!--资金动态-->
<div class="buy_active1"><span>资金动态</span></div>
<div>
    <table width="100%" class="table1" id="tablevalue1">
        <tr>
            <th width=50%>动态权益 <span>0.0</span> </th>
            <th width=50%>可用资金 <span>0.0</span></th>
        </tr>
        <tr>
            <th width=50%>占用保证金 <span>0.0</span> </th>
            <th width=50%>冻结资金 <span>0.0</span></th>
        </tr>
    </table>
</div>
<div class="buy_button1">卖出</div>
<script>
    $('#time_sell').val($.cookie('sell_money'))
</script>
</body>
</html>