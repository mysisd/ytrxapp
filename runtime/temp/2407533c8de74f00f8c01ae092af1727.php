<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"C:\AppServ\www\oo\public/../xmyttz/rx\view\user\index1.html";i:1519622866;s:27:"../xmyttz/view/rx_head.html";i:1520233375;s:29:"../xmyttz/view/rx_header.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的</title>
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
        #header_bottom .to_me{
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
            <li><a href="/rx/comm/index" class="to_community"><img src="/Public/img/to_trade.png" alt="">社区</a></li>
            <li><a href="/rx/move/move" class="to_download"><img src="/Public/img/to_find.png" alt="">动态</a></li>
            <li><a href="/rx/user/index1" class="to_me"><img src="/Public/img/to_me.png" alt="">我的</a></li>
        </ul>
    </div>


</div>

</div>



</include>
<div class="zhezao"></div>
<div class="me">
<p style="text-align: center;line-height: 69px;color:black;font-size: 24px">我的</p>
<div class="personal">
    <div class="imgsd">
        <img width="60" src=""   alt="">
    </div>
    <div class="use_list">
        <p id="username" style="font-size: 20px"><?php echo $username; ?></p>
        <span class="mui-table-view-cell" style="float: right;margin: -34px -10px">
            <a class="mui-navigate-right" href="/rx/user/per_info"></a>
        </span>
        <p class="name" id="nu">未实名</p>
        <p class="names"  >身份证资料未完善</p>
        <p class="name" id="always" style="display: none">已实名
            <p class="names" style="display: none">身份证资料已完善</p>
        </p>
    </div>
</div>
    <div class="set">

        <div class="mui-content">
        <ul class="mui-table-view mui-grid-view mui-grid-12">
            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/account">
                <span class="mui-icon mui-icon-home"></span>
                <div class="mui-media-body">交易账户</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="#">
                <span class="mui-icon mui-icon-email"></span>
                <div class="mui-media-body">我的赠金</div></a></li>
            <?php if(!(empty($user['card']) || (($user['card'] instanceof \think\Collection || $user['card'] instanceof \think\Paginator ) && $user['card']->isEmpty()))): ?>
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/history">
                    <span class="mui-icon mui-icon-email"></span>
                    <div class="mui-media-body">交易历史</div></a></li>
                <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/transactions">
                    <span class="mui-icon mui-icon-email"></span>
                    <div class="mui-media-body">交易汇总</div></a></li>
            <?php endif; ?>
            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/system">
                <span class="mui-icon mui-icon-chatbubble"></span>
                <div class="mui-media-body">系统设置</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a id="kefu">
                <span class="mui-icon mui-icon-location"></span>
                <div class="mui-media-body">联系客服</div></a></li>
            <!--第二行开始-->
            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/guide">
                <span class="mui-icon mui-icon-search"></span>
                <div class="mui-media-body">新手指导</div></a></li>
            <li class="mui-table-view-cell mui-media mui-col-xs-3 mui-col-sm-3"><a href="/rx/user/about">
                <span class="mui-icon mui-icon-phone"></span>
                <div class="mui-media-body">关于我们</div></a></li>
            <!--第二行结束-->
        </ul>
    </div>
    </div>
    <div class="logout" id="logout">
        退出登录
    </div>
    <div class="kefu">
        <p>400-850-1626</p>
        <p>周一 早 9:00 至 周五 晚 6:00</p>
        <p>
            <span>
                <button id="cancel">取消</button>
            </span>
            <span>
                <button id="bohao">拨号</button>
                <a id="kefu_phone" href="tel://400-850-1626" style="display: none">dddd</a>
            </span>

        </p>
</div>
</div>

<script>
    $(function () {
        $.ajax({
            url:'/rx/user/my',
            type:'post',
            success:function (data) {
                if(data.res=='false'){
                    return false;
                }
                else if(data.res=='success'&&data.front_idcard!=''&&data.back_idcard!=''&&data.handheld_idcard!=''){
                    $('#nu').hide();
                    $('#always').show();
                    $('.names').eq(0).hide();
                    $('.names').eq(1).show();


                }else{
                    $('#always').hide();
                    $('#nu').show();
                    $('.names').eq(0).show();
                    $('.names').eq(1).hide();
                }
                $('.imgsd img').attr('src', data['face'].substr(23));

            }
        });
       $('#kefu').click(function () {
           $('.zhezao').show();
           $('.kefu').show();
       })
        $('#cancel').click(function () {
            $('.zhezao').hide();
            $('.kefu').hide();
        });
        $("#bohao").click(function(){
            $("#kefu_phone").trigger("click");
        });
        $('#kefu_phone').click(function () {
            window.location.href = 'tel://400-850-1626' ;

        })

    })
</script>

</body>

</html>