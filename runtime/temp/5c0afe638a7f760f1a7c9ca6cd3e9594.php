<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"C:\AppServ\www\oo\public/../xmyttz/rx\view\user\resert.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>重置交易密码</title>
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
</head>
<body>
<header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
        <h1 class="mui-title">重置交易密码</h1>
</header>
<div style="margin: 49px 0;background-color: white">
    <p class="code_text">已发送验证码短信到</p>
    <input type="hidden" id="phone_one">
    <p id="phone_code"></p>
    <div class="resert">

        <div class="mui-input-row">
            <label style="width: 20%"><img src="/Public/img/icon_5.png" alt=""></label>
            <input type="text" id="phone"  placeholder="手机号/用户名" >
        </div>
        <div class="mui-button-row">
            <button type="button" class="mui-btn mui-btn-primary " id="resert" style="background-color: rgb(255,206,52);border:none;    width: 300px;color: black;height: 40px;" >下一步</button>
        </div>
    </div>
    <div class="resert_code">
        <div class="mui-input-row">
            <label style="width: 20%"><img src="/Public/img/icon_6.png" alt=""></label>
            <input type="text" style="width: 80%"   placeholder="请输入验证码" id="u_code" >
            <a  id="get_code"  onclick="sendMessage()">获取验证码</a>
        </div>
        <div class="mui-button-row">
            <button type="button" class="mui-btn mui-btn-primary "  style="background-color: rgb(255,206,52);border:none;    width: 300px;color: black;height: 40px;"  id="next_code">下一步</button>
        </div>
    </div>
    </div>

</div>
<script>
    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数


    function sendMessage() {
        curCount = count;
        //设置button效果，开始计时
        $("#get_code").attr("disabled", "true");
        $("#get_code").val("请在" + curCount + "秒内输入验证码");

        //向后台发送处理数据
        var phone=$("#phone_one").val();
        $.ajax({
            type: "POST", //用POST方式传输
            dataType: "text", //数据格式:JSON
            url: '/rx/register/abc', //目标地址
            data: "phone=" + phone,
            success: function (data){
                if(data.indexOf('success')){
                    InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                }

            }
        });
    }


    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {
            window.clearInterval(InterValObj);//停止计时器
            $("#get_code").removeAttr("disabled");//启用按钮
            $("#get_code").text("重新发送验证码");
        }
        else {
            curCount--;
            $('#get_code').css({margin: '-47px 0'});
            $("#get_code").attr("disabled",true);
            $("#get_code").text("请在" + curCount + "秒内输入验证码");
        }
    }
   $('#next_code').click(function () {
       var u_code =$('#u_code').val();
       if(u_code==''){
           alert('验证码不能为空');
           return false;
       }
       $.ajax({
           type: "POST", //用POST方式传输
           dataType: "text", //数据格式:JSON
           url: '/rx/user/resert_code', //目标地址
           data: "code=" + u_code,
           success:function (data) {
             var res=JSON.parse(data);
             if( res['res']=='success'){
                 location.href='/rx/user/resert_deal';
             }else{
                 alert('验证码不正确');
                 location.href='/rx/user/resert';
             }
           }
       })
   })

</script>
</body>
</html>