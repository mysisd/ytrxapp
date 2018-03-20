<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"C:\AppServ\www\tp\public/../xmyttz/rx\view\register\register.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1516943879;s:29:"../xmyttz/view/rx_header.html";i:1516255478;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>YT-注册</title>
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

    <style>
        .newbanb {
            min-width: 1263px;
            padding: 66px 0;
        }
        .footer {
            min-width: 100%;
            /*background: #222;*/
            clear: both;
            text-align: center;
        }
        .footer .top {
            width:100%;
            height: 0px;
            margin: 25px auto;
        }
        .footer .bottom {
            height: 85px;
            line-height: 80px;
            background-color: #000;
            color: #777;
            text-align: center;
            border-top: 1px solid #444;
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




<!--<div class="pc">-->
    <!--<div class="reg_bg">-->
        <!--<div class="reg_box">-->
            <!--<ul>-->

                <!--<li class="user_box"><i></i><input type="text" name="phone" placeholder="请输入手机号" id="pc_phone_num" ></li>-->
                <!--<li class="yzm_box"><i></i><input type="text" name="code" class="yzm" placeholder="请输入短信验证码" id="pc_code_num" autocomplete="off"><button type="button" id="pc_getCode" >获取验证码</button></li>-->
                <!--<li class="pwd_box"><i></i><input type="text" onfocus="this.type='password'" name="password" placeholder="请设置登录密码" id="pc_pwd_num"></li>-->
                <!--<li class="pwd_box2"><i></i><input type="text" onfocus="this.type='password'" placeholder="请再次输入密码" id="pc_pwd_num2"></li>-->
                <!--<?php if(empty($_GET['inviteCode']) || (($_GET['inviteCode'] instanceof \think\Collection || $_GET['inviteCode'] instanceof \think\Paginator ) && $_GET['inviteCode']->isEmpty())): ?><li class="invite_box"><i></i><input type="text" name="invite" placeholder="输入邀请码" id="pc_invite_code" autocomplete="off"></li><?php else: ?><input type="hidden" value="<?php echo input('get.inviteCode'); ?>" name="invite" id="pc_invite_code"><?php endif; ?>-->
                <!--<li class="other_box"><input type="checkbox" id="pc_checkbox" ><label for="pc_checkbox">我已阅读并接受</label><a href="/login/register/agreement" target="_blank" id="agreement">《注册协议》</a></li>-->
                <!--<li class="btn_box"><button type="button" id="pc_reg_btn">注册</button></li>-->
                <!--<li style="margin:0;height:auto;font-size:14px;"><span style="color:#999;float:right;height:auto;">已有账号，<a href="/<?php echo \think\Request::instance()->module(); ?>/Login/login" style="color:#01c0dd;">立即登录</a></span></li>-->
            <!--</ul>-->
        <!--</div>-->
    <!--</div>-->
    <!--<div class="footer">-->
        <!--<div class="top">-->
            <!--<div class="newbanb">-->
                <!--<div class="banb_center">-->
                    <!--<div class="newbanb_div newbanb_div1">-->
                        <!--<img src="/Public/img/banb1.png" alt="" width=120 height=120>-->
                        <!--<dl class="bana1">-->
                            <!--<dt>低成本</dt>-->
                            <!--<dd>撮合交易无点差，最低1000元即可交易</dd>-->
                        <!--</dl>-->
                    <!--</div>-->
                    <!--<div class="newbanb_div newbanb_div2">-->
                        <!--<div class="img_box">-->
                            <!--<img src="/Public/img/banb2.png" alt="" width=120 height=120>-->
                        <!--</div>-->
                        <!--<dl class="bana2">-->
                            <!--<dt>随时玩</dt>-->
                            <!--<dd>T+0双向交易，可买涨买跌，随时掌握操作机会</dd>-->
                        <!--</dl>-->
                    <!--</div>-->
                    <!--<div class="newbanb_div newbanb_div3">-->
                        <!--<img src="/Public/img/banb3.png" alt="" width=120 height=120>-->
                        <!--<dl class="bana3">-->
                            <!--<dt>资金安全</dt>-->
                            <!--<dd>第三方资金托管的各种安全监测，安全保障</dd>-->
                        <!--</dl>-->
                    <!--</div>-->
                    <!--<div class="newbanb_div newbanb_div4">-->
                        <!--<img src="/Public/img/banb4.png" alt="" width=120 height=120>-->
                        <!--<dl class="bana3">-->
                            <!--<dt>国际监管</dt>-->
                            <!--<dd>银行和证监会监管，规范监管体系</dd>-->
                        <!--</dl>-->
                    <!--</div>-->
                    <!--<div style="clear:both;"></div>-->
                <!--</div>-->
            <!--</div>-->
            <!--&lt;!&ndash;<div class="block right">&ndash;&gt;-->
            <!--&lt;!&ndash;<h3>关于我们</h3>&ndash;&gt;-->
            <!--&lt;!&ndash;<hr>&ndash;&gt;-->
            <!--&lt;!&ndash;<ul>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="/about/about/about">公司简介</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="/about/about/about/id/5">最新公告</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="/about/about/about/id/4">合作伙伴</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="/about/about/about/id/6">联系我们</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;</ul>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;<div class="block center">&ndash;&gt;-->
            <!--&lt;!&ndash;<h3>帮助中心</h3>&ndash;&gt;-->
            <!--&lt;!&ndash;<hr>&ndash;&gt;-->
            <!--&lt;!&ndash;<ul>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="/help/help/help/par/1/id/1">操作指南</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo \think\Config::get('QQ'); ?>&site=qq&menu=yes">在线咨询</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="/download/download/download">软件下载</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li><a href="/help/help/help">帮助中心</a></li>&ndash;&gt;-->
            <!--&lt;!&ndash;</ul>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;<div class="block right">&ndash;&gt;-->
            <!--&lt;!&ndash;<h3>联系我们</h3>&ndash;&gt;-->
            <!--&lt;!&ndash;<hr>&ndash;&gt;-->
            <!--&lt;!&ndash;<ul>&ndash;&gt;-->
            <!--&lt;!&ndash;<li>周一至周五：09:00—18:00</li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li>客服热线：<?php echo \think\Config::get('FENGKONG_PHONE'); ?></li>&ndash;&gt;-->
            <!--&lt;!&ndash;<li>紧急电话：<?php echo \think\Config::get('URGENT_PHONE'); ?></li>&ndash;&gt;-->
            <!--&lt;!&ndash;</ul>&ndash;&gt;-->
            <!--&lt;!&ndash;</div>&ndash;&gt;-->
            <!--&lt;!&ndash;<img class="erweima" src="/Public/img/erweima.png">&ndash;&gt;-->
        <!--</div>-->
    <!--</div>-->

<!--</div>-->

<!-- 移动端 -->
<div class="phone">
    <!--<div id="header">-->

    <!--</div>-->
    <div id="mt_register_a">

        <div class="user_pwd">
            <p class="user_p"><span>手机号</span><input type="text" name="phone" placeholder="" id="phone_num"></p>
            <p class="user_p"><span>验证码</span><input type="text" name="code" placeholder="" id="code_num" autocomplete="off"><button type="button" id="getCode">获取验证码</button></p>
            <p class="user_p"><span>密码</span><input  type="text" onfocus="this.type='password'" name="password" placeholder="" id="pwd_num"></p>
            <p class="user_p"><span>确认密码</span><input  type="text" onfocus="this.type='password'" placeholder="" id="pwd_num2"></p>
            <!--<?php if(empty($_GET['inviteCode']) || (($_GET['inviteCode'] instanceof \think\Collection || $_GET['inviteCode'] instanceof \think\Paginator ) && $_GET['inviteCode']->isEmpty())): ?><p class=""><span>邀请码</span><input  type="text" name="invite" placeholder="" id="invite_code"></p><?php else: ?><input type="hidden" value="<?php echo input('get.inviteCode'); ?>" name="invite" id="invite_code"><?php endif; ?>-->
        </div>
        <p class="xieyi" style="width: 100%;line-height: 53px;margin: 3px 77px;font-size: 16px;"><input type="checkbox" id="mt_checkbox"><label for="mt_checkbox" style="color:black;margin:0 0 0 5px;">我已阅读并接受</label><a style="color:red" id="showContract" href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/agreement">《注册协议》</a></p>
        <button type="button" class="reg_next" id="register_btn">确认注册</button>
    </div>

</div>


</body>
</html>