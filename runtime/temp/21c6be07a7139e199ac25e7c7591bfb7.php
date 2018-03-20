<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"C:\AppServ\www\oo\public/../xmyttz/rx\view\user\system.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>设置</title>
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
        a{
            font-size: 14px;
        }
    </style>
</head>
<body >
<div class="curtain" style="display: none"></div>
    <header class="mui-bar mui-bar-nav">
        <a href="/rx/user/index1" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
        <h1 class="mui-title">系统设置</h1>
    </header>
<div style="margin: 46px 0">
    <div class="password">密码设置</div>
    <ul class="mui-table-view">
        <li class="mui-table-view-cell">
            <a href="/rx/user/set_password" class="mui-navigate-right">修改登录密码 </a>
        </li>
        <li class="mui-table-view-cell">
            <a  class="mui-navigate-right" href="/rx/user/set_dealpassword">修改交易密码</a>
        </li>
        <li class="mui-table-view-cell">
            <a class="mui-navigate-right" href="/rx/user/resert">重置交易密码</a>
        </li>
    </ul>
    <div class="password">交易密码提示时间</div>
    <ul class="mui-table-view">
        <li class="mui-table-view-cell">
            <a id="select_time" class="mui-navigate-right">设置交易密码提示时间 <span id="time" style="float: right;padding: 0 24px">1小时</span> </a>
        </li>
    </ul>
    <div class="password">行情刷新</div>
    <ul class="mui-table-view">
        <li class="mui-table-view-cell">
        <a id="select_refresh" class="mui-navigate-right">2G/3G/4G <span id="refresh" style="float: right;padding: 0 24px">1秒</span> </a>
    </li>
        <li class="mui-table-view-cell">
            <a id="wifi" class="mui-navigate-right">wifi <span id="re_wifi" style="float: right;padding: 0 24px">500毫秒</span> </a>
        </li>
    </ul>
</div>

<!--<div class="current" ></div>-->
</body>
<script>
    $(function () {
        $.ajax({
            url:'/rx/user/sys',
            type:'post',
            success:function (data) {
                if(data['net_time']=='500'){
                    $('#refresh').html(data['net_time']+'毫秒');
                }else if(data['net_time']=='0'){
                    $('#refresh').html('不刷新');
                }
                else{
                    $('#refresh').html(data['net_time']+'秒');
                }
                if(data['wifi_time']=='500'){
                    $('#re_wifi').html(data['wifi_time']+'毫秒');
                }else if(data['wifi_time']=='0'){
                    $('#re_wifi').html('不刷新');
                }
                else{
                    $('#re_wifi').html(data['wifi_time']+'秒');
                }
                if(data['pass_time']=='0'){
                    $('#time').html('不刷新');
                }else{
                    $('#time').html(data['pass_time']+'小时');
                }



            }
        })
    })
</script>
<script>
    document.querySelector('#select_time').addEventListener("tap", function() {
        var roadPick = new mui.PopPicker();//获取弹出列表组建，假如是二联则在括号里面加入{layer:2}
        roadPick.setData([
            {
                value: "0.1",
                text: "10分钟"
            }
            ,{
            value: "0.5",
            text: "30分钟"
        },
            {
                value: "1",
                text: "1小时"
            },
             {
                value: "2",
                text: "2小时"
            },
            {
                value: "4",
                text: "4小时"
            },
            {
                value: "6",
                text: "6小时"
            },
            {
                value: "8",
                text: "8小时"
            },
            {
                value: "0",
                text: "不提示"
            }
        ]);
        roadPick.show(function (item) {

            var itemCallback=roadPick.getSelectedItems();
            console.log(itemCallback);
            $('#time').html(itemCallback[0].text);
            $.ajax({
                url:'/rx/user/re_pass',
                type:'post',
                data:{'pass_time':itemCallback[0].value}
            })
        })

    });
    document.querySelector('#select_refresh').addEventListener("tap", function() {
        var roadPick = new mui.PopPicker();//获取弹出列表组建，假如是二联则在括号里面加入{layer:2}
        roadPick.setData([{
            value: "10",
            text: "10秒"
        },
            {
                value: "5",
                text: "5秒"
            },
            {
                value: "500",
                text: "500毫秒"
            },
            {
                value: "0",
                text: "不刷新"
            }
        ]);
        roadPick.show(function (item) {

            var itemCallback=roadPick.getSelectedItems();
            console.log(itemCallback);
            $('#refresh').html(itemCallback[0].text);
            $.ajax({
                url:'/rx/user/re_net',
                type:'post',
                data:{'net_time':itemCallback[0].value},
            })
        })

    });
    document.querySelector('#wifi').addEventListener("tap", function() {
        var roadPick = new mui.PopPicker();//获取弹出列表组建，假如是二联则在括号里面加入{layer:2}
        roadPick.setData([
            {
                value: "1",
                text: "1秒"
            },
            {
                value: "500",
                text: "500毫秒"
            },
            {
                value: "0",
                text: "不刷新"
            }
        ]);
        roadPick.show(function (item) {
            var itemCallback=roadPick.getSelectedItems();
            $('#re_wifi').html(itemCallback[0].text);
            $.ajax({
                url:'/rx/user/re_wifi',
                type:'post',
                data:{'wifi_time':itemCallback[0].value},
                success:function (data) {
                
                }
            })
        })

    });
</script>
<script>
    $(function () {
        var d=window.screen.height*0.5;
        $('.net').width( window.screen.width);
        $('.net').height(d);
        $('.curtain').width( document.documentElement.clientWidth);
        $('.curtain').height(document.documentElement.clientHeight);


    })

</script>

</html>