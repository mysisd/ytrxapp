<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:62:"C:\AppServ\www\tp\public/../xmyttz/index\view\index\index.html";i:1515998789;s:24:"../xmyttz/view/head.html";i:1515998789;s:26:"../xmyttz/view/header.html";i:1515998789;s:26:"../xmyttz/view/footer.html";i:1515998789;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>YT-首页</title>
	<meta charset="utf-8">
<title>厦门盈透投资有限公司</title>
<meta name="renderer" content="webkit" />
<meta name="description" content="" />
<meta name="keywords" content=" " />
<meta http-equiv="Cache-Control" content="no-transform" /> 
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no" />
<!--<link href="<?php echo \think\Request::instance()->root(); ?>/Public/img/logo.ico"  rel="shortcut icon"/>-->
<link href="<?php echo \think\Request::instance()->root(); ?>/Public/css/basic.css" rel="stylesheet" type="text/css" />
<script>var nav_active=null;var deal_success=false;var rootUrl="<?php echo \think\Request::instance()->root(); ?>";var conUrl="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>";var keepTime=2000;var setTime=null;function stopTime(){if(setTime){clearTimeout(setTime);}}</script>
<script src="http://cdn.bootcss.com/jsencrypt/2.3.0/jsencrypt.min.js"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/jquery.min.js" type="text/javascript"></script>

<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/jquery.touchSwipe.min.js" type="text/javascript"></script>
<script src="<?php echo \think\Request::instance()->root(); ?>/Public/js/base.js" type="text/javascript"></script>


	<link href="/Public/css/index.css" rel="stylesheet" type="text/css" />

	<script src="/Public/js/index.js" type="text/javascript"></script>
	<style>
		.newbanb {
			min-width: 1263px;
			padding: 113px 0;
		}
		.footer .top {
			width: 100%;
			height: 0px;
			margin: 0 auto;
		}
		#img img{
			position: absolute;margin: 47px 29%;z-index: 10000;
		}
		#header_bottom .to_index{
			background-color:#268bf2;
			color:#fff;
		}
		@media (max-width: 768px) {
			#img img{
				position: absolute;
				margin: 45px 9%;
				z-index: 10000;
				width: 83%;
			}
		}
	</style>
</head>
<body>
<!--[if IE 7]>
    <div class="ie_bar">
        您现在使用的浏览器版本过低，可能会导致部分图片和信息的缺失，建议您安装360极速浏览器或升级到IE8以上版本<a href="http://down.360safe.com/cse/360cse_8.1.0.428.exe" target="_blank">下载并安装360极速浏览器</a>
    </div>
<![endif]-->
<span style="display:none;"><script src="https://s4.cnzz.com/z_stat.php?id=1261565474&web_id=1261565474" language="JavaScript"></script></span>
<img src="/Public/img/logo.png" alt="厦门盈透投资咨询有限公司" style="display:none;width:121px;height:75px;">
<div id="gallery">
	<img src="/Public/img/sf.png"  style="display: none;width: 100%" rel="lightbox" >
</div>
<div class="pc">
<div class="top_bar">
	<div class="top_bar_box">
		<!--<div class="top_left">-->
			<!--<div class="tel_focus" style="position: absolute;left:736px">客服热线：<span class="red"><?php echo \think\Config::get('HOTLINE'); ?></span></div>-->
		<!--</div>-->
		<div class="top_right">
			<ul class="nav_more">
  				<li class="tel_focus">客服热线：<span class="red"><?php echo \think\Config::get('HOTLINE'); ?></span></li>
				<!--<li><a href="/Personal/User/user" id="user_html">个人中心</a></li>-->

			</ul>
			<ul class="nav_user">
				<!--<?php if(!(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty()))): ?>-->
					<!--&lt;!&ndash;<li><a href="/Personal/User/user">您好，<span style="color:#f55;" id="username" class="username"><?php echo \think\Session::get('username'); ?></span></a></li>&ndash;&gt;-->
					<!--&lt;!&ndash; <li id="message_li" <?php if(empty(\think\Session::get('message')) || ((\think\Session::get('message') instanceof \think\Collection || \think\Session::get('message') instanceof \think\Paginator ) && \think\Session::get('message')->isEmpty())): ?>style="display:none;"<?php endif; ?>><a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/message">消息<span class="header_message" id="header_message">&nbsp;</span></a></li> &ndash;&gt;-->
					<!--<li><a href="/Login/Login/logout" >退出</a></li>-->
				<!--<?php else: ?>-->
					<!--<li><a href="" class="nav_login">登录</a></li>-->
					<!--<li><a href="" class="nav_register">注册</a></li>-->
				<!--<?php endif; ?>-->
			</ul>
		</div>
	</div>
</div>
<!--top导航NED-->
<div class="white">
<div class="nav_box">
	<h1 class="logo">
		厦门盈透投资<a href="/"></a>
	</h1>
	<div class="header_nav" id="header_nav">
	<ul>
		<li><a href="/" id="index_html">首&nbsp;&nbsp;页</a></li>
		<li>
			<!--<a href="/product/product/product" id="product_html">产品介绍</a>-->
			<!--<dl class="drop">-->
				<!--<dd><a href="/product/aqihuo/aqihuo/type/hsi">恒生指数</a></dd>-->
				<!--<dd><a href="/product/aqihuo/aqihuo/type/mhi">小恒指数</a></dd>-->
				<!--<dd><a href="/product/aqihuo/aqihuo/type/cl">原油期货</a></dd>-->
				<!--<dd><a href="/product/aqihuo/aqihuo/type/gc">美国黄金</a></dd>-->
			<!--</dl>-->
		</li>
		<!--<li><a href="/product/dqihuo/dqihuo" id="dqihuo_html">国内期货</a></li>-->

		<!--<li><a href="/picture/picture/picture" id="picture_html">盈透风采</a></li>-->
		<!--<li><a href="/download/download/download_pc" id="download_html">软件下载</a></li>-->
		<!--<li><a href="/news/news/news" id="news_html">行业资讯</a></li>-->
		<!--<li><a href="/help/help/help" id="help_html">帮助中心</a></li>-->
		<li><a href="/about/about/about" id="about_html">关于我们</a></li>	<!--<li><a href="/product/shares/shares" id="shares_html">股票配资</a></li>-->
		<!--<li>-->
			<!--<a href="/department/department/department" id="department_html">公司部门</a>-->
			<!--<dl class="drop">-->
				<!--<dd><a href="/department/department/department#jiaoyi">交易部门</a></dd>-->
				<!--<dd><a href="/department/department/department#xingzheng">行政部门</a></dd>-->
				<!--<dd><a href="/department/department/department#pinxuan">品宣部门</a></dd>-->
				<!--<dd><a href="/department/department/department#caiwu">财务部门</a></dd>-->
				<!--<dd><a href="/department/department/department#peixun">培训部门</a></dd>-->
			<!--</dl>-->
		<!--</li>-->


		<!-- <li><a href="http://live.xmyttz.cn" id="live_html">理财直播</a></li> -->
		<!-- <li><a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/yingtou" id="nav_yingtou">赢投宝</a></li> -->
		<!-- <li><a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/school" id="nav_school">盈透学院</a></li> -->
		<!-- <li class="nav_new"><a id="nav_online">#直播#</a></li>  -->
		<!-- <li><a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/activity" id="nav_activity">活动专区</a></li> -->
	</ul>
</div>

</div>
	<!--<div style="position: absolute;top: 77px;z-index: 100;font-size: 16px;color:red;font-weight: 700;margin: 0px 21px -2px 77px;"  id="a"  width=80%  >公告：十九大已顺利闭幕，有关金融投资类规范须暂停使用第三方，现响应国家要求，本网站将于11月20号左右关闭所有第三方通道，如需线上提款请于以上日期前提取，本网站将不再直接接收终端客户充值，后期将全部改用线下网银方式，请咨询原有代理。</div>-->
</div>

<style>#<?php echo \think\Request::instance()->action(); ?>_html{color:#0379b5;}</style>
</div>
<div id="img" style="display: none">
	<img style="" src="/Public/img/gg.png" alt="">
</div>
<!-- 移动端 -->
<div id="list" style="display:none;">
	<ul>
		<li class="li1"><a href="/">首页</a></li>
		<li class="li2"><a href="/goods/goods/goods">期货参数</a></li>
		<li class="li3"><a href="/advantage/advantage/advantage">公司特色</a></li>
		<!--<li class="li4"><a href="/personal/user/user">个人中心</a></li>-->
		<li class="li1"><a href="/login/login/logout">退出</a></li>
	</ul>
</div>
<div class="mt_content">
<div id="header_bottom">
	 <ul>
		 <li><a href="/index/index/index" class="to_index"><img src="/Public/img/to_index.png" alt="">首页</a></li>
		 <!--<li><a href="/product/product/product" class="to_goods"><img src="/Public/img/to_trade.png" alt="">产品介绍</a></li>-->
		 <!--<li><a href="/download/download/download" class="to_download"><img src="/Public/img/to_find.png" alt="">软件下载</a></li>-->
		 <!--<li><a href="/news/news/news" class="to_news"><img src="/Public/img/to_find.png" alt="">行业资讯</a></li>-->
		 <!--<li><a href="/agent/help/help" class="to_help"><img src="/Public/img/to_find.png" alt="">帮助中心</a></li>-->
		 <!--<li><a href="/personal/user/user" class="to_me"><img src="/Public/img/to_me.png" alt="">我</a></li>-->
	 </ul>
</div>
<style>.to_<?php echo \think\Request::instance()->server('HTTP_POST'); ?>{background:#268bf2;color:#fff !important;}</style>
</div>
<!-- 移动端  END-->
<!-- 遮罩 -->
<img src="/Public/img/loading.jpg" alt="" id="loading_img">
<div id="overlay"></div>
<div id="error_system">
	<div class="error_system_box">
		<img src="/Public/img/error.png" alt=""><div class="error_system_content"><p id="error_system_text"></p></div>
	</div>
</div>
<script>
    $('.nav_register').click(function () {
        alert('网站升级中，注册功能暂停使用，具体恢复时间请等待通知。');
    })
    $('.nav_login').click(function () {
        alert('网站升级中，登录功能暂停使用，具体恢复时间请等待通知。');
    })
</script>
<!--<script>-->
    <!--var results=window.location.href.match(new RegExp("http://xmyttz.com/"));-->
	 <!--var results1=window.location.href.match(new RegExp("http://www.xmyttz.com/"));-->
	<!--if(results || results1){-->
        <!--$('#img').show();-->
        <!--showOverlay();-->

    <!--}-->
	<!--$('body').bind('click', function(event) {-->
        <!--hideOverlay();-->
		<!--var evt = event.srcElement ? event.srcElement : event.target;-->
        <!--if(evt.id == 'img' ) return;-->
        <!--else {-->
            <!--$('#img').hide(); // 如不是则隐藏元素-->
        <!--}-->
    <!--});-->

<!--</script>-->


<div class="pc">
	<div class="banner">
		<div class="banner_bg">
			<div class="banner_change banner_left" id="banner_prev" data="0">&lt;</div>
			<div class="banner_change banner_right" id="banner_next" data="0">&gt;</div>
			<?php if(is_array($bg) || $bg instanceof \think\Collection || $bg instanceof \think\Paginator): if( count($bg)==0 ) : echo "" ;else: foreach($bg as $key=>$v): ?>
				<img class="bg_img" src="<?php echo $v['img']; ?>" >
			<?php endforeach; endif; else: echo "" ;endif; ?>
			<ul>
				<?php if(is_array($bg) || $bg instanceof \think\Collection || $bg instanceof \think\Paginator): if( count($bg)==0 ) : echo "" ;else: foreach($bg as $key=>$v): ?>
					<li></li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<!--<?php if(empty(\think\Session::get('phone')) || ((\think\Session::get('phone') instanceof \think\Collection || \think\Session::get('phone') instanceof \think\Paginator ) && \think\Session::get('phone')->isEmpty())): ?>-->
			<!--<div class="banner_box">-->
				<!--<h3><span>账号登录</span></h3>-->
				<!--<p class="phone_p"><i></i><input type="text" name="phone" placeholder="请输入您的手机号" id="index_phoneNum"></p>-->
				<!--<p class="pwd_p"><i></i><input type="password" name="password" placeholder="请输入您的密码" id="index_pwd"></p>-->
				<!--<p class="banner_login"><button type="button" class="log" id="index_login">登录</button></p>-->
				<!--<div class="reg_log">-->
					<!--<span><a href="/login/login/findpwd">忘记密码？</a>|<a href="" class="reg">注册新账号</a></span>-->
				<!--</div>-->
			<!--</div>-->
		<!--<?php endif; ?>-->
	</div>
	<!--banner END-->
	<!--公告-->



	<!-- 优势列表 -->
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
	<!--newbanb END-->
	<!-- goods -->
	<!--<div class="goods_box">
        <div class="h2_box" id="qihuo_title">
            <div class="aqihuo">
                <h2 class="h2_aqihuo h2_qihuo"><img src="/Public/img/aqihuo_title.png" alt=""></h2>
            </div>
            <div class="dqihuo ">
                <h2 class="h2_dqihuo h2_qihuo"><img src="/Public/img/dqihuo_title.png" alt=""></h2>
            </div>
        </div>
        <div class="qihuo_type">
            <span class="type_aqihuo active" id="type_aqihuo">国际期货</span>
            <span class="type_dqihuo" id="type_dqihuo">国内期货</span>
            <div class="blue_line"></div>
        </div>
        <div class="qihuo">
            <div class="aqihuo_box qihuo_box">
                <div class="peizi">
                    <img src="/Public/img/index_hsi.png" alt="">
                    <p>恒生指数</p>
                    <a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/aqihuo/type/hsi">立即申请</a>
                </div>
                <div class="peizi">
                    <img src="/Public/img/index_mhi.png" alt="">
                    <p>小恒指数</p>
                    <a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/aqihuo/type/mhi">立即申请</a>
                </div>
                <div class="peizi">
                    <img src="/Public/img/index_cl.png" alt="">
                    <p>原油期货</p>
                    <a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/aqihuo/type/cl">立即申请</a>
                </div>
                <div class="peizi">
                    <img src="/Public/img/index_gc.png" alt="">
                    <p>美国黄金</p>
                    <a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/aqihuo/type/gc">立即申请</a>
                </div>
            </div>
            <div class="dqihuo_box qihuo_box">
                <div class="peizi">
                    <img src="/Public/img/index_dqihuo.png" alt="">
                    <p>国内期货</p>
                    <a href="/<?php echo \think\Request::instance()->module(); ?>/<?php echo \think\Request::instance()->controller(); ?>/aqihuo/type/dqihuo">立即申请</a>
                </div>
                <div class="peizi peizi_none"></div>
                <div class="peizi peizi_none"></div>
                <div class="peizi peizi_none"></div>
            </div>
        </div>
    </div>-->
	<!-- goods END-->
	<!--<div class="step_box">-->
	<!--<div class="img">-->
	<!--<div class="header_navs">-->
	<!--<ul>-->
	<!--<li style="position: relative;left:-25px">网站注册</li>-->
	<!--<li style="position: relative;left:15px">选择开户市场</li>-->
	<!--<li style="position: relative;left:55px">绑定出金银行卡</li>-->
	<!--<li style="position: relative;left:100px">选择交易品种和手数上限</li>-->
	<!--<li style="position: relative;left:130px">网上充值</li>-->
	<!--</ul>-->
	<!--</div>-->
	<!--<div class="header_navs" style="line-height:120px">-->
	<!--<ul>-->
	<!--<li style="position: relative;left:-20px">确认充值完成</li>-->
	<!--<li style="position: relative;left:20px">手机短信接收交易账户</li>-->
	<!--<li style="position: relative;left:50px">重新登陆网站</li>-->
	<!--<li style="position: relative;left:100px">下载风控规则 <p style="position: relative;top:-90px">下载交易软件</p></li>-->
	<!--<li style="position: relative;left:130px">登陆交易软件进行交易</li>-->
	<!--</ul>-->
	<!--</div>-->
	<!--</div>-->
	<!--</div>-->

	<div class="news_box">
		<!--<h2 style="text-align:center;font-size:26px;font-weight:normal;color:#666;">行业资讯</h2>-->
		<!--<div style="text-align:center;font-size:18px;margin:20px 0 40px 0;color:#666;text-transform:uppercase">———　Industry information　———</div>-->
		<!--<?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): if( count($article)==0 ) : echo "" ;else: foreach($article as $key=>$v): ?>-->
			<!--<a href="/news/news/news_detail/news_id/<?php echo $v['id']; ?>"><div class="news">-->
				<!--<p class="title"><?php echo $v['title']; if($v['state'] == 1): ?><img src="/Public/img/imp.jpg" width=14 height=14 style="margin: 0 3px 0 5px;"><?php endif; ?></p>-->
				<!--<p class="time"><?php echo date("Y-m-d",$v['date']); ?></p>-->
				<!--<p class="brief"><?php echo $v['brief']; ?></p>-->
				<!--<p class="more">了解更多</p>-->
			<!--</div></a>-->
		<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
	</div>
</div>
<!-- 移动端 -->
<div class="phone">
	<!--<div id="header">-->
	<!--<img src="/Public/img/list.png" alt="" class="list">-->
	<!--首页-->
	<!--</div>-->
	<div class="mt_content" style="border-bottom:1px solid #ccc;">
		<div id="banner">
			<?php if(is_array($bg) || $bg instanceof \think\Collection || $bg instanceof \think\Paginator): if( count($bg)==0 ) : echo "" ;else: foreach($bg as $key=>$v): ?>
				<img class="bg_img" src="<?php echo $v['img']; ?>" >
			<?php endforeach; endif; else: echo "" ;endif; ?>
			<ul>
				<?php if(is_array($bg) || $bg instanceof \think\Collection || $bg instanceof \think\Paginator): if( count($bg)==0 ) : echo "" ;else: foreach($bg as $key=>$v): ?>
					<li>●</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
		<div id="nav" >
			<!--<ul>-->
			<!--<a href="/agent/goods/goods"><li class="nav_box1"><img src="/Public/img/nav_goods.png" alt="">产品介绍</li></a>-->
			<!--<a href="/agent/advantage/advantage"><li class="nav_box2"><img src="/Public/img/nav_advantage.png" alt="">公司特色</li></a>-->
			<!--<a href="/agent/news/news"><li class="nav_box3"><img src="/Public/img/nav_news.png" alt="">行业资讯</li></a>-->
			<!--&lt;!&ndash;<a href="/about/about/aboutList"><li class="nav_box4"><img src="/Public/img/nav_about.jpg" alt="">关于我们</li></a>&ndash;&gt;-->
			<!--</ul>-->
		</div>
		<!--<div id="type">-->
			<!--<h3>&lt;!&ndash;<a href="/agent/goods/goods" class="title_box">热门品种<span>更多&gt;&gt;</span></a>&ndash;&gt;</h3>-->
			<!--<ul>-->
				<!--<li>-->
					<!--<img style="margin: -7px"  src="/Public/img/banb1.png" width="70" height="70" >-->
					<!--<p class="type" >低成本</p>-->
					<!--<p class="p1">撮合交易无点差，</p>-->
					<!--<p class="p2">最低1000元即可交易</p>-->

				<!--</li>-->
				<!--<li>-->
					<!--<img style="margin: -7px" src="/Public/img/banb2.png" width="70" height="70" >-->
					<!--<p class="type" >随时玩</p>-->
					<!--<p class="p1">T+0双向交易，可买涨</p>-->
					<!--<p class="p2">买跌，随时掌握操作机会</p>-->
				<!--</li>-->

			<!--</ul>-->
			<!--<ul>-->

				<!--<li>-->
					<!--<img style="margin: -7px" src="/Public/img/banb3.png" width="70" height="70" >-->
					<!--<p class="type" >资金安全</p>-->
					<!--<p class="p1">第三方资金托管的各种</p>-->
					<!--<p class="p2">安全监测，安全保障</p>-->

				<!--</li>-->
				<!--<li>-->
					<!--<img  style="margin: -7px" src="/Public/img/banb4.png" width="70" height="70" >-->
					<!--<p class="type" >国际监管</p>-->
					<!--<p class="p1">银行和证监会监管</p>-->
					<!--<p class="p2">规范监管体系</p>-->
				<!--</li>-->
			<!--</ul>-->

			<!--<div style="clear:both;"></div>-->
		<!--</div>-->
		<div id="news">
			<!--<h3><a href="/news/news/news" class="title_box">行业资讯<span>更多&gt;&gt;</span></a></h3>-->
			<!--<ul>-->
				<!--<?php if(is_array($mt_news) || $mt_news instanceof \think\Collection || $mt_news instanceof \think\Paginator): if( count($mt_news)==0 ) : echo "" ;else: foreach($mt_news as $key=>$v): ?>-->
					<!--<li><a href="/news/news/news_detail/news_id/<?php echo $v['id']; ?>"><?php if($v['state'] == 1): ?><img src="/Public/img/imp.jpg" width=14 height=14 style="margin: 0 3px 0 0;"><?php endif; ?><?php echo $v['title']; ?><span>&gt;</span></a></li>-->
				<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
			<!--</ul>-->
		</div>
	</div>
</div>
<!-- 移动端 END -->

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
</div>
<!--<script>-->
    <!--function browserRedirect() {-->
        <!--var sUserAgent = navigator.userAgent.toLowerCase();-->
        <!--var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";-->
        <!--var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";-->
        <!--var bIsMidp = sUserAgent.match(/midp/i) == "midp";-->
        <!--var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";-->
        <!--var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";-->
        <!--var bIsAndroid = sUserAgent.match(/android/i) == "android";-->
        <!--var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";-->
        <!--var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";-->
        <!--if (!(bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) ){-->
           <!--var results=window.location.href.match(new RegExp("http://xmyttz.com"));-->
            <!--var results1=window.location.href.match(new RegExp("http://www.xmyttz.com"));-->
            <!--if(results || results1){-->
                <!--$('#img').show();-->
                <!--showOverlay();-->

            <!--}-->
            <!--$('body').bind('click', function(event) {-->
                <!--hideOverlay();-->
                <!--var evt = event.srcElement ? event.srcElement : event.target;-->
                <!--if(evt.id == 'img' ) return;-->
                <!--else {-->
                    <!--$('#img').hide(); // 如不是则隐藏元素-->
                <!--}-->
            <!--});-->
        <!--}-->
    <!--}-->
    <!--browserRedirect();-->


<!--</script>-->
</body>
</html>