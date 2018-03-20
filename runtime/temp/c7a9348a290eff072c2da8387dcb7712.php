<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"C:\AppServ\www\oo\public/../xmyttz/rx\view\user\per_info.html";i:1520325120;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人信息</title>
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
    <script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/data.city.js" type="text/javascript"></script>
    <script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/city.data-3.js" type="text/javascript"></script>
</head>
<body style="background-color: white">
<div class="curtain" style="display: none"></div>

<header class="mui-bar mui-bar-nav">
    <a  class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title">个人信息</h1>
</header>

<div class="per"></div>

<div class="per_img" id="headImage">
<p>头像</p><span>
    <div class="imgsd" style="width: 60px;height: 60px">
        <img src=""  width="60" alt="">
    </div>
</span>
</div>
    <div class="photo" >
        <ul class="mui-table-view">
            <li class="mui-table-view-cell">
                <a id="cam" class="">照相机</a>
                <a id='image' style="display: none" ></a>
                <!--<input style="display: none" type="file"  id='image' accept="image/*"  capture='camera' onchange="showPreview(this)">-->
            </li>
            <li class="mui-table-view-cell">
                <a >相册</a>
            </li>
            </ul>
    </div>
<div class="per" style="margin: 0"></div>
<ul class="mui-table-view">
    <li class="mui-table-view-cell">
        <a class="">昵称 <span style="float: right" id="username"></span></a>

    </li>
    <li class="mui-table-view-cell">

        <a id="sex" class="mui-navigate-right">性别<span class="suc-msg" style="float: right;padding: 0 24px" ></span></a>
    </li>
    <li class="mui-table-view-cell">
        <a class="">手机号 <span style="float: right" id="usernames"><?php echo $username; ?></span></a>
    </li>
    <li class="mui-table-view-cell">
        <a class="mui-navigate-right">邮箱</a>
    </li>
    <li class="mui-table-view-cell" id="city1">
        <a class="mui-navigate-right">地区 <span id="city_text" style="float: right;padding: 0 24px"></span></a>
    </li>
    <!--<li class="mui-table-view-cell">-->
        <!--<a href="/rx/user/identity" class="mui-navigate-right">实名认证</a>-->
    <!--</li>-->
    <li class="mui-table-view-cell" >
        <a href="/rx/user/perfect_id" id="sf" class="mui-navigate-right">身份资料<span class="suc-msgs" style="float: right;padding: 0 24px;color:rgb(160,160,160)" >身份资料未完善</span></a>
    </li>
</ul>
<div class="per_but">
    <button type="button" >保存</button>
</div>

<script>
    $(function () {
        var d=window.screen.height*0.5;
        $('.net').width( window.screen.width);
        $('.net').height(d);
        $('.curtain').width( document.documentElement.clientWidth);
        $('.curtain').height(document.documentElement.clientHeight);

        var file = document.querySelector('input');
        if (getIos()) {
            file.removeAttribute("capture");
        }
        function getIos() {
            var ua=navigator.userAgent.toLowerCase();
            if (ua.match(/iPhone\sOS/i) == "iphone os") {
                return true;
            } else {
                return false;
            }
        }
    })

</script>
<script>

    //选择省市区
    var city_picker = new mui.PopPicker({layer:3});
    city_picker.setData(init_city_picker);
    $("#city1").on("tap", function(){
        setTimeout(function(){
            city_picker.show(function(items){
                $("#city_id").val((items[0] || {}).value + "," + (items[1] || {}).value + "," + (items[2] || {}).value);//该ID为接收城市ID字段
                $("#city_text").html((items[0] || {}).text + " " + (items[1] || {}).text + " " + (items[2] || {}).text);

            });
        },200);

    });


</script>
<script>

        mui.init();
        var userPicker = new mui.PopPicker();
        userPicker.setData([{
            value: '男',
            text: '男'
        }, {
            value: '女',
            text: '女'
        }]);
        var showUserPickerButton = document.getElementById('sex');

        showUserPickerButton.addEventListener('tap', function(event) {
            userPicker.show(function(items) {
                $('#sex .suc-msg').html(items[0].value);
            });
        }, false);

</script>
<script>
    $(function () {
        $.ajax({
            url:'/rx/user/per',
            type:'post',
            success:function (data) {
                if(data.res=='success'){
                    $('.suc-msgs').text('身份资料已完善');
                    $('#sf').removeAttr('href');
                }else{
                    $('.suc-msgs').text('身份资料未完善');
                }
                if(data['face']==''){
                    $('.imgsd img').attr('src');
                }else{
                    $('.imgsd img').attr('src', data['face']);
                }
              $('.suc-msg').text(data['sex']);
              $('#city_text').text(data['area']);



            }
        });
        $('#cam').click(function () {
            $('#image').trigger('click');
        })
        $('#image').click(function () {
            location.href='/rx/user/ceshi';
        })
    })
</script>
<script>
    function showPreview(source) {

        var file = source.files[0];
        if(!/image\/\w+/.test(file.type)){
            alert("请确保文件为图像类型");
            return false;
        }
        if(window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function(e) {
                $('.imgsd img').attr('src',e.target.result);
                  }
            fr.readAsDataURL(file);

        }
    }
</script>
<script>

</script>
</body>
</html>