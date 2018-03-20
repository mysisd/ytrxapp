<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"C:\AppServ\www\oo\public/../xmyttz/rx\view\comm\index.html";i:1520321269;s:27:"../xmyttz/view/rx_head.html";i:1520233375;s:29:"../xmyttz/view/rx_header.html";i:1520233375;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
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
<script src="/Public/js/zepto.kslider.js"></script>
    <link rel="stylesheet" href="/Public/css/index2.css">
    <link rel="stylesheet" href="/Public/css/bass.css">
    <style>
        #header_bottom .to_community{
            background-color:#268bf2;
            color:#fff;
        }
    </style>
</head>
<body style="background-color: white">
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





<div style="width: 100%;height: 50px;background-color: skyblue">
    <ul>
        <li style="float: left;width: 30%;height: 50px;text-align: center">
            <!--<a href="/rx/comm/create">-->
            <img src="/Public/img/fatie.png" style="width: 25%;line-height: 30px;margin: 6px 0 0 -36px;" id="fatie" alt="">
            <!--</a>-->
        </li>
        <li style="float: left;width: 40%;height: 50px;text-align: center">
            <p style="text-align: center;font-size: 28px;height:50px;background-color: skyblue;font-family: monospace;">社区</p>
        </li>
        <li id="refresh" style="float: left;width: 30%;height: 50px;text-align: center">
            <img src="/Public/img/shuaxin.png" style="width: 25%;line-height: 30px;margin: 10px 0 0 37px;;" id="shuaxin"  alt="">
        </li>
    </ul>
</div>
<div class="slider" style="margin: -10px 0px;">
    <ul class="slider-main">
        <li class="slider-panel" >
            <a target="_blank"><img alt="" title="" src="/Public/img/banner/bg1.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂1</p>
        </li>
        <li class="slider-panel" style="display: none;">
            <a target="_blank"><img alt="" title="" src="/Public/img/banner/bg2.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂2</p>
        </li>
        <li class="slider-panel" style="display: none;">
            <a target="_blank"><img alt="" title="" src="/Public/img/banner/bg3.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂3</p>
        </li>
        <li class="slider-panel" style="display: none;">
            <a target="_blank"><img alt="" title="" src="/Public/img/banner/bg4.jpg"></a>
            <p class="slider_title">四大央行掌门人齐聚一堂4</p>
        </li>
    </ul>

    <div class="slider-extra">
    </div>
</div>
<div style="margin: 134px 0">
    <ul class="dynamic-list">
        <!--<div class="dynamic-list-head">-->
        <!--<i class="dynamic-i-l icon-uniE925"></i>-->
        <!--<b>热门动态</b>-->
        <!--<i class="dynamic-i-r icon-uniE906 fr"></i>-->
        <!--</div>-->
        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$v): ?>
            <li>
                <a href="/rx/comm/detailed?id=<?php echo $v['id']; ?>">
                    <img class="cy-media-object pull-left" src="/Public/img/st1.jpg">
                    <div class="cy-media-body">
                        <h3><?php echo $v['title']; ?></h3>
                        <p class="cy-ellipsis"><?php echo $v['content']; ?></p>
                        <p class="cy-ellipsis cy-heatTime">
                            <span><i class="icon-uniE92F"></i><?php echo $v['comm_num']; ?></span>&nbsp;&nbsp;
                            <span><i class="icon-uniE930"></i><?php echo $v['thumb_num']; ?></span>
                            <span class="fr"><?php echo $v['date']; ?></span>
                        </p>
                    </div>
                </a>
            </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>



    </ul>
</div>
<script>
    $(function () {

        $('#fatie').click(function () {
            $.ajax({
                url:'/rx/comm/ser_name',
                type:'post',
                success:function (data) {
                    console.log(data.nickname);
                    if(data.nickname==null){
                     location.href='/rx/comm/nickname';
                    }else{
                        location.href='/rx/comm/create';
                    }
                }
            })
        })

        $('#refresh').click(function () {
            location.reload();
        })
    })
</script>
</body>
</html>