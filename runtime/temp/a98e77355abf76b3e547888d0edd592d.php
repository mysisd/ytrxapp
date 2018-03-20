<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:59:"C:\AppServ\www\oo\public/../xmyttz/rx\view\rx\buy_shop.html";i:1520499543;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
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

    <div class="buy_shop">
    <p class="hand">手数</p>
    <div class="hand_mes">
        <input type="number" value="1" id="count">
        <span class="span"><img src="/Public/img/buy_reduction.png" alt="" id="redu"></span>
        <span class="span1"><img src="/Public/img/buy_add.png" alt=""  id="add1"></span>
    </div>
        <p class="buy_mess ">最多可买: <span ><i id="hand"><?php echo $hand; ?></i><i>手</i></span></p>
        <input type="hidden" value="<?php echo $pay; ?>" id="pay">
        <input type="hidden" value="<?php echo $sell; ?>" id="sell">
        <input type="hidden" value="<?php echo $type; ?>" id="type">
</div>
<div class="buy_back1"></div>
<!--资金动态-->
<div class="buy_active"><span>资金动态</span></div>
<div>
    <table width="100%" class="table" id="tablevalue">
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
<div class="buy_button">买入</div>
<script>
    $('.buy_button').click(function () {
        var pay=$('#pay').val();
        var sell=$('#sell').val();
        var name=$('#type').val();
//        var num = name.replace(/[^0-9]/ig,"");
//        var value = name.slice('left',-4);
        $.ajax({
            url:'/rx/rx/add_positions',
            type:'post',
            dataType:'json',
            data:{'hand':$('#count').val(),'pay':pay,'sell':sell,'type':name},
            success:function (data) {
                if(data.res=='success'){
                    alert('购买成功');
                    location.reload();
                }else if(data.res=='error'){
                    alert('购买失败');
                }
            }
        })

    })

</script>
</body>
</html>