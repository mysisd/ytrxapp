<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"C:\AppServ\www\oo\public/../xmyttz/rx\view\comm\detailed.html";i:1520305304;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
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
<script src="/Public/js/zepto.kslider.js"></script></include>
    <link rel="stylesheet" href="/Public/css/share.css">
    <link rel="stylesheet" href="/Public/css/share_style1_32.css">
    <link rel="stylesheet" href="/Public/css/demo.css">
    <link rel="stylesheet" href="/Public/css/comment.css">
    <link rel="stylesheet" href="/Public/css/style.css">
    <script src="/Public/js/share.js"></script>
    <style>
        @media(max-width:768px) {

            #title{
                width: 98%;
                height: 70px;
                margin: 10px auto;

                font-size: 25px;
                font-weight: bold;
                line-height: 35px;
            }
            #detail{
                width: 100%;
                height: 40px;
                background-color: antiquewhite;
            }
            #detail li{
                float: left;
                height: 40px;

            }
            #link{
                display: none;
                width: 100%;
                height: 100px;
                background-color: rgba(255,255,225,0.5);
                position: fixed;
                bottom:0;
                z-index: 100000;
            }
            #cancel{
                width: 100%;
                height: 50%;
                text-align: center;
                line-height: 50px;
                font-size: 21px;
            }
            #comments{
                width: 100%;
                background-color: red;
            }
            #comments li{
                width: 100%;
                height: 60px;
                background-color: #00a0e9;
            }
            #content{
                word-wrap: break-word;
                line-height: 44px;
                font-size: 20px;
                text-indent: 2em;
            }

        }
    </style>
</head>
<body style="background-color: white">
<div class="buy_title" style="border-bottom: 1px solid rgba(1,1,1,0.2);background-color: black;color:white">
    <ul>
        <li><img  style="width: 78%" src="/Public/img/left_arrow_w.png" alt=""></li>
        <li style="text-align: center;width: 66%;margin: 14px 10px;">帖子详情</li>
        <li id="pp"><img style="width: 78%" src="/Public/img/fenxiang.png" alt=""></li>
    </ul>
</div>
<div id="title"><?php echo $data['title']; ?></div>
<div id="detail">
    <ul>
        <li style="width: 20%"><img src="" alt=""></li>
        <li style="width: 30%"><?php echo $data['nickname']; ?></li>
        <li style="width: 30%"><?php echo $data['date']; ?></li>
    </ul>
</div>
<input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>" >
<div id="content"><?php echo $data['content']; ?></div>
<div class="commentAll">
    <!--回复区域 begin-->
    <div class="comment-show">
        <?php if(is_array($datas) || $datas instanceof \think\Collection || $datas instanceof \think\Paginator): if( count($datas)==0 ) : echo "" ;else: foreach($datas as $key=>$v): ?>
            <div class="comment-show-con clearfix">
            <div class="comment-show-con-img pull-left">
                <img src="/Public/img/header-img-comment_03.png" alt=""></div>
            <div class="comment-show-con-list pull-left clearfix">
                <div class="pl-text clearfix">
                    <a href="#" class="comment-size-name"><?php echo $v['sender']; ?> : </a>
                    <span class="my-pl-con">&nbsp;<?php echo $v['content']; ?></span>
                </div>
                <div class="date-dz">
                    <span class="date-dz-left pull-left comment-time"><?php echo $v['date']; ?></span>
                    <!--<div class="date-dz-right pull-right comment-pl-block">-->
                        <!--<a href="javascript:;" class="removeBlock">删除</a>-->
                        <!--<a href="javascript:;" class="date-dz-pl pl-hf hf-con-block pull-left">回复</a>-->
                        <!--<span class="pull-left date-dz-line">|</span>-->
                        <!--<a href="javascript:;" class="date-dz-z pull-left"><i class="date-dz-z-click-red"></i>赞 (<i class="z-num">666</i>)</a>-->
                    <!--</div>-->
                </div>
                <div class="hf-list-con"></div>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <!--回复区域 end-->
</div>
<div class="commentbox">
    <textarea cols="80" rows="50" placeholder="来说几句吧......" class="mytextarea" id="text"></textarea>
    <div class="btn btn-info pull-right" id="comment">评论</div>
</div>
<div style="" id="link">
    <div style="height: 50%">
        <div id="socialShare" ></div>
    </div>
    <div style="" id="cancel">取消</div>
</div>


<script>
    $(function() {
        $("#socialShare").socialShare({
            content: '',
            url:'',
            titile:''
        });
        $('#pp').click(function () {
            if($(".msb_main").is(".active")){
//                $('#socialShare').hide();
                $('#link').hide();
            }else if(!$(".msb_main").is(".active")){
                $('body').css({
                    'backgroundColor':'black',
                    'z-index':'1000',
                    opacity:0.5
                })
                $('body').width(window.screen.width)
                $('body').height(window.screen.height)
                $('#link').show();
                $('#socialShare').show();
                $('.commentbox').hide();
            }
           $('.msb_main').trigger('click');
        })
        $('#cancel').click(function () {
          $('#link').hide();
            $('body').css({
                'backgroundColor':'white',
                opacity:1
            })
            $('body').width(window.screen.width)
            $('body').height(window.screen.height);
            $('.commentbox').show();
        })
        $('#comment').click(function () {
           var text=$('#text').val();
           var id=$('#id').val();
           $.ajax({
               url:'/rx/comm/detailed',
               type:'post',
               data:{'text':text,'id':id},
               success:function (data) {
                   if(data.res=='success'){
                       alert('评论成功');
                       location.reload();
                   }else if(data.res=='error'){
                       alert('评论失败');
                   }else{
                       alert('内容不能为空');
                   }
               }
           })
        })
    });

</script>

</body>
</html>