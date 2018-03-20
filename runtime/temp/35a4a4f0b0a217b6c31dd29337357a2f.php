<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:59:"C:\AppServ\www\tp\public/../xmyttz/rx\view\login\login.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1517187779;s:29:"../xmyttz/view/rx_header.html";i:1516255478;s:26:"../xmyttz/view/footer.html";i:1515998789;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
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
            <li><a href="/rx/move/move" class="to_download"><img src="/Public/img/to_find.png" alt="">动态</a></li>
            <li><a href="/rx/user/index1" class="to_me"><img src="/Public/img/to_me.png" alt="">我的</a></li>
        </ul>
    </div>


</div>

</div>




<!--<div class="pc">-->
    <!--<div class="login_bg">-->
        <!--<div class="login_box">-->
            <!--<ul id="login_form">-->
                <!--<li class="user_h2">账号登录</li>-->
                <!--<li class="user_box"><span>手机号</span><input type="text" name="phone" placeholder="请输入手机号" id="login_phone"></li>-->
                <!--<li class="pwd_box"><span>密　码</span><input type="text" onfocus="this.type='password'" name="password" placeholder="请输入密码" id="login_pwd"></li>-->
                <!--<li class="btn_box"><span>&nbsp;</span><button type="button" id="login_sub">登录</button><a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/findpwd">忘记密码？</a> | <a href="" class="nav_register">注册</a></li>-->
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
    <!--
<div class="pc">
<div class="link">
	<div class="link_qq">
		<div class="show_qq"></div>
		<ul>
			<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo \think\Config::get('QQ1'); ?>&site=qq&menu=yes">客服一</a></li>
			<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo \think\Config::get('QQ2'); ?>&site=qq&menu=yes">客服二</a></li>
			<li><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo \think\Config::get('QQ3'); ?>&site=qq&menu=yes">客服三</a></li>
		</ul>
	</div>
	<div class="link_ph">
		<div class="show_ph"></div>
		<ul>
			<li>客服：<?php echo \think\Config::get('FENGKONG_PHONE'); ?></li>
		</ul>
	</div>
	<div class="link_ewm">
		<div class="show_ewm"></div>
		<ul>
			<li><img src="/Public/img/weixin1.jpg" alt=""></li>
			<li><img src="/Public/img/weixin2.jpg" alt=""></li>
		</ul>
	</div>
</div>
<div class="footer">
	<!--<div class="top">-->
		<!--<div class="newbanb">-->
			<!--<div class="banb_center">-->
				<!--<div class="newbanb_div newbanb_div1">-->
					<!--<img src="/Public/img/banb1.png" alt="" width=70 height=70>-->
					<!--<dl class="bana1">-->
						<!--<dt>低成本</dt>-->
						<!--<dd>撮合交易无点差，0利息0管理费，最低1000元即可交易</dd>-->
					<!--</dl>-->
				<!--</div>-->
				<!--<div class="newbanb_div newbanb_div2">-->
					<!--<div class="img_box">-->
						<!--<img src="/Public/img/banb2.png" alt="" width=70 height=70>-->
					<!--</div>-->
					<!--<dl class="bana2">-->
						<!--<dt>随时玩</dt>-->
						<!--<dd>T+0双向交易，可买涨买跌，线上出入金，即时到账，随时掌握盈利机会</dd>-->
					<!--</dl>-->
				<!--</div>-->
				<!--<div class="newbanb_div newbanb_div3">-->
					<!--<img src="/Public/img/banb3.png" alt="" width=70 height=70>-->
					<!--<dl class="bana3">-->
						<!--<dt>资金安全</dt>-->
						<!--<dd>拥有多年运作经验，通过第三方资金托管的各种安全监测，安全保障</dd>-->
					<!--</dl>-->
				<!--</div>-->
				<!--<div class="newbanb_div newbanb_div4">-->
					<!--<img src="/Public/img/banb4.png" alt="" width=70 height=70>-->
					<!--<dl class="bana3">-->
						<!--<dt>国际监管</dt>-->
						<!--<dd>银行和香港证监会监管，规范的信用评审，风险监管体系</dd>-->
					<!--</dl>-->
				<!--</div>-->
				<!--<div style="clear:both;"></div>-->
			<!--</div>-->
		<!--</div>-->
		<!--<div class="block right">-->
			<!--<h3>关于我们</h3>-->
			<!--<hr>-->
			<!--<ul>-->
				<!--<li><a href="/about/about/about">公司简介</a></li>-->
				<!--<li><a href="/about/about/about/id/5">最新公告</a></li>-->
				<!--<li><a href="/about/about/about/id/4">合作伙伴</a></li>-->
				<!--<li><a href="/about/about/about/id/6">联系我们</a></li>-->
			<!--</ul>-->
		<!--</div>-->
		<!--<div class="block center">-->
			<!--<h3>帮助中心</h3>-->
			<!--<hr>-->
			<!--<ul>-->
				<!--<li><a href="/help/help/help/par/1/id/1">操作指南</a></li>-->
				<!--<li><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo \think\Config::get('QQ'); ?>&site=qq&menu=yes">在线咨询</a></li>-->
				<!--<li><a href="/download/download/download">软件下载</a></li>-->
				<!--<li><a href="/help/help/help">帮助中心</a></li>-->
			<!--</ul>-->
		<!--</div>-->
		<!--<div class="block right">-->
			<!--<h3>联系我们</h3>-->
			<!--<hr>-->
			<!--<ul>-->
				<!--<li>周一至周五：09:00—18:00</li>-->
				<!--<li>客服热线：<?php echo \think\Config::get('FENGKONG_PHONE'); ?></li>-->
				<!--<li>紧急电话：<?php echo \think\Config::get('URGENT_PHONE'); ?></li>-->
			<!--</ul>-->
		<!--</div>-->
		<!--<img class="erweima" src="/Public/img/erweima.png">-->
	<!--</div>-->
	<div class="bottom">&copy; 2017   All rights reserved | <a href="http://www.miitbeian.gov.cn/" target="_black" style="color:#777;">闽ICP备17017794号-1</a> </div>
</div>
</div>
<div class="mt_content">
<div id="footer">
	<p>轻松有趣，乐享交易</p>
	<p>服务热线 <?php echo \think\Config::get('HOTLINE'); ?></p>
	<p>&copy;2016 - 版权所有：厦门盈透投资有限公司</p>
</div>
</div>-->
<!--</div>-->
<!-- 移动端 -->
<div class="phone">

    <div class="mt_content">
        <div id="mt_login">
            <img src="<?php echo \think\Request::instance()->root(); ?>/Public/img/logo_small.png" alt="" class="login_logo">
            <div class="user_pwd">
                <p class="user_p"><span>手机号码</span><input type="text" name="phone" placeholder="请输入手机号" id="mt_login_phone"></p>
                <p><span>登录密码</span><input type="password" onfocus="this.type='password'" name="password" placeholder="请输入密码" id="mt_login_pwd" autocomplete="off"></p>
            </div>

            <button type="button" id="mt_login_sub">登录</button>
            <div class="btm">
                <a href="/<?php echo \think\Request::instance()->module(); ?>/register/register" class="to_reg">注册</a>
                <a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/findpwd" class="to_find">忘记密码</a>
            </div>
        </div>
    </div>
</div>
<img src="<?php echo \think\Request::instance()->root(); ?>/Public/img/loading.jpg" alt="" id="loading_img">
<div id="overlay"></div>
<div id="error_system">
    <div class="error_system_box">
        <img src="<?php echo \think\Request::instance()->root(); ?>/Public/img/error.png" alt=""><div class="error_system_content"><p id="error_system_text"></p></div>
    </div>
</div>
</body>

</html>