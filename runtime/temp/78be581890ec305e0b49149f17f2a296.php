<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"C:\AppServ\www\oo\public/../xmyttz/rx\view\user\account.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>交易账户</title>
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
    <script src="/Public/js/account.js" type="text/javascript"></script>
</head>
<body>


<header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
        <h1 class="mui-title">资金明细</h1>
    </header>
    <div style="margin: 45px 0">
        <!--有期货账户的情况下-->
        <div class="yes_guoji" >
            <p id="g_title">国际期货</p>
            <ul>
                <li>
                    <p>
                        <span>资金金额</span>
                        <span>0.00</span>
                    </p>
                </li>
                <li>
                    <p>
                        <span>浮动收益</span>
                        <span>0.00</span>
                    </p>
                </li>
            </ul>
            <ul>
                <li>
                    <p>
                        <span>资金净值</span>
                        <span>0.00</span>
                    </p>
                </li>
                <li>
                    <p>
                        <span>风险度</span>
                        <span>0.00%</span>
                    </p>
                </li>
            </ul>

        </div>
        <div class="yes_guoji guonei"style="display: none" >
            <p id="g_title">国内期货</p>
            <ul>
                <li>
                    <p>
                        <span>资金金额</span>
                        <span>0.00</span>
                    </p>
                </li>
                <li>
                    <p>
                        <span>浮动收益</span>
                        <span>0.00</span>
                    </p>
                </li>
            </ul>
            <ul>
                <li>
                    <p>
                        <span>资金净值</span>
                        <span>0.00</span>
                    </p>
                </li>
                <li>
                    <p>
                        <span>风险度</span>
                        <span>0.00%</span>
                    </p>
                </li>
            </ul>

        </div>
            <div class="mui-content">
                <ul class="mui-table-view mui-grid-view mui-grid-12">
                 <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6" id="guoji"><a >
                <span class="mui-icon mui-icon-home"></span>
                <div class="mui-media-body">国际期货</div><p>立即开通</p></a></li>
                    <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6" id="guonei"><a >
                <span class="mui-icon mui-icon-email"></span>
                <div class="mui-media-body">国内期货</div><p>立即开通</p></a></li>

                    <!--第二行开始-->

            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6"><a >
                <span class="mui-icon mui-icon-search"></span>
                <div class="mui-media-body">外汇高级</div><p>立即开通</p></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6"><a >
                <span class="mui-icon mui-icon-phone"></span>
                <div class="mui-media-body">外汇标准</div><p>立即开通</p></a></li>
            <!--第二行结束-->
        </ul>
    </div>

    </div>

</body>
</html>