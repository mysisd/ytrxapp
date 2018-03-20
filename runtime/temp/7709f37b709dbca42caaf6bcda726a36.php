<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"C:\AppServ\www\tp\public/../xmyttz/rx\view\user\transaction.html";i:1516255939;s:27:"../xmyttz/view/rx_head.html";i:1516774617;s:29:"../xmyttz/view/rx_header.html";i:1516255478;}*/ ?>
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
<script src="/Public/js/echarts.js"></script>
<script src="/Public/js/jquery.timer.dev.js"></script>
<script src="/Public/js/jquery.timer.min.js"></script>
<script src="/Public/js/rx_money.js"></script></include>
    <style>
        #header_bottom .to_goods{
            background-color:#268bf2;
            color:#fff;
        }
    </style>
</head>
<body>
<!--移动端-->

<div class="phone">
    <div class="mt_content">
    <div id="header_bottom">
        <ul>
            <li><a href="/rx/rx/index" class="to_index"><img src="/Public/img/to_index.png" alt="">行情</a></li>
            <li><a href="/rx/user/transaction" class="to_goods"><img src="/Public/img/to_trade.png" alt="">交易</a></li>
            <li><a href="/rx/move/move" class="to_download"><img src="/Public/img/to_find.png" alt="">动态</a></li>
            <li><a href="/rx/user/index1" class="to_me"><img src="/Public/img/to_me.png" alt="">我的</a></li>
        </ul>
    </div>


</div>

</div>



</include>
<div class="tra">
<div class="tra_list">
<ul>
    <li>国际期货</li>
    <li>陈育智</li>
    <li>下单</li>
</ul>
</div>
    <div class="tra_interests">
    <ul>
        <li>0.00
        <p>动态权益($)</p>
        </li>
        <li>
            0.00
            <p>逐笔浮盈($)</p>
        </li>
        <li>
            0.00%
            <p>持仓风险</p>
        </li>
        <li>
            <a href="/rx/user/capital">
                <img src="/Public/img/icon_4.png" alt="">
            </a>

        </li>
    </ul>
    </div>
</div>
<div style="clear: both;background-color: white"></div>
<div class="tra_nav">
    <ul id="list_1">
        <li class="tra_active" id="position">持仓(0)</li>
        <li id="posters">挂单(0)</li>
        <li id="entrust">委托</li>
        <li id="deal">成交</li>
    </ul>

</div>
<!--持仓表-->
<div class="position">
<div>
    1
</div>
</div>
<!--挂单表-->
<div class="posters" style="display: none">
    <div>
        2
    </div>
</div>
<!--委托表-->
<div class="entrust" style="display: none">
    <div>
        3
    </div>
</div>
<!--成交表-->
<div class="deal" style="display: none">
    <div>
      4
    </div>
</div>
<script>
    $.ajax({
        url:'/user/user/transaction',
        type:'post',
        success:function (data) {

    }
    })
</script>
<script>
    var ul=document.getElementById("list_1");
    var li=ul.getElementsByTagName("li");
    for(i=0;i<li.length;i++){

        li[i].onclick=function(){
            for(j=0;j<li.length;j++){
                li[j].className=""
            }
            this.className="tra_active"
        }
    }
</script>
</body>
</html>