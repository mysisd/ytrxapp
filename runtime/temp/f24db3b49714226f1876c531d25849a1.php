<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"C:\AppServ\www\tp\public/../xmyttz/rx\view\login\findpwd.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1516936615;s:29:"../xmyttz/view/rx_header.html";i:1516255478;}*/ ?>
<!doctype html>
<html>
<head>
	<title>找回密码</title>
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
<!--<script src="/Public/js/rx_money.js"></script>-->


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
<!--<div class="findpwd_box">-->
	<!--<h2>找回密码<a href="login">返回登录&gt;</a></h2>-->
	<!--<div class="find_method"><a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/findpwd" class="active">手机找回密码</a></div>-->
	<!--<ul id="findpwd_form">-->
		<!--<li class="user_box"><input type="text" name="phone" placeholder="请输入手机号" id="find_pc_phone_num"></li>-->
		<!--<li class="yzm_box"><input type="text" name="code" placeholder="请输入收到的验证码" id="find_pc_code_num" class="yzm"><button type="button" id="find_pc_getCode"><p>获取验证码</p></button></li>-->
		<!--<li class="pwd_box"><input type="text" onfocus="this.type='password'" name="password" placeholder="请输入新密码" id="find_pc_pwd_num"></li>-->
		<!--<li class="pwd_box2"><input type="text" onfocus="this.type='password'" placeholder="请再次输入密码" id="find_pc_pwd_num2"></li>-->
		<!--<li class="btn_box"><button type="button" class="rebuild" id="pc_find_btn">重设密码</button></li>-->
	<!--</ul>-->
<!--</div>-->
<!--</div>-->
<!-- 移动端 -->
<div class="phone">

<div class="mt_content">
	<div id="mt_findpwd">
		<!--<div id="errorInfo"><div class="errorInfo_box"><img src="/Public/img/error.png" alt=""><div class="errorInfo_content"><p id="errorInfo_text"></p></div></div></div>-->
		<div id="mt_findpwd_form">
			<div class="user_phone">
				<p class="phone_p"><span>手机号</span><input type="text" name="phone" placeholder="请输入您的手机号" id="find_phone_num"></p>
				<p class="yzm_box"><span>验证码</span><input type="text" name"code" placeholder="请输入收到的验证码" id="find_code_num"><button type="button" id="find_getCode"><p>获取验证码</p></button></p>
				<p class="new_pwd"><span>新密码</span><input type="text" onfocus="this.type='password'" name="password" placeholder="请输入登录密码" id="find_pwd_num"></p>
				<p class="re_pwd"><span>重复密码</span><input type="text" onfocus="this.type='password'" placeholder="请再次输入密码" id="find_pwd_num2"></p>
			</div>
			<button type="button" class="find_btn" id="find_btn">重设密码</button>
		</div>
	</div>
</div>
</div>
<!--<div class="tanchu_system small" id="findpwd_success">-->
	<!--<div class="tanchu_system_box">-->
		<!--<h3>重设密码成功</h3>-->
		<!--<div class="question"><img src="/Public/img/success.png" alt=""><div class="tanchu_content"><p>重设密码成功！</p></div></div>-->
		<!--<div class="answer">-->
			<!--<a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/login" class="success">确定</a>	-->
		<!--</div>-->
	<!--</div>-->
<!--</div>-->
<!-- 移动端 END -->

</body>
</html>