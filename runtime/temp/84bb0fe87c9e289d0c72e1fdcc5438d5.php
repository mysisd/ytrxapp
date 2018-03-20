<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:60:"C:\AppServ\www\tp\public/../xmyttz/rx\view\user\addcard.html";i:1515998789;s:27:"../xmyttz/view/rx_head.html";i:1515998789;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>绑定银行卡</title>
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
<script src="https://cdn.bootcss.com/vue/2.2.2/vue.min.js"></script>
<script src="/Public/js/echarts.js"></script>
<script src="/Public/js/jquery.timer.dev.js"></script>
<script src="/Public/js/jquery.timer.min.js"></script>
	<link href="/Public/css/index.css" rel="stylesheet" type="text/css" />
	<style>
		.footer{
			clear:both;
		}
		.jump_left .tongdao .method_a {
			display: inline-block;
			width: 111px;
			height: 27px;
			line-height: 28px;
			background: #ccc;
			/* color: #000; */
			border-left: 1px solid #0379b5;
			text-align: center;
			border-radius: 7px;
			font-size: 13px;
			float: left;
			margin: 8px 23px 0 0;
			font-family: '微软雅黑';
		}
		.jump_left .tongdao  .method_active {
			background: #0379b5;
			color: #fff;
			float: left;
		}
	</style>
</head>

<body>

<header id="head" class="mui-bar mui-bar-nav " style="background-color: rgb(250,250,250)">
	<a href="/rx/user/index1" class="mui-action-back mui-icon-left-nav  mui-icon mui-pull-left " style="color: black"></a>
	<h1 class="mui-title">绑定银行卡</h1>
</header>
<div class="user_content">
<div class="user_box">
<div class="user_right">


<div id="addcard">
	<div class="jump_left jump_content">
		<div class="jump_box">
			<div class="tongdao" >

				<div class="method_box">
					<li data="show"  href="javascript:;" class="method_a method_active" id="">绑定提款银行卡</li>
				</div>


			</div>

			<!--<div class="remind deposit ">-->
			<!--<p><b class="blue" style="font-weight:normal;">提款银行卡在第一次入金时绑定，入金可以自行切换不同银行，按充值在跳转的页面填写另外银行卡即可。</b>入金由第三方收取手续费为付款金额的0.3%(如付款1万，手续费30),单笔最高10万元，最低500元，到帐后处理时间15分钟左右，请耐心等待！入金的时间为每个交易日上午08：30至次日05：30分，未及时到帐号请联系客服！请先开通网银，申请各家银行UKEY或U盾或K令，各家银行额度限制请向客服索要详表。农业银行不支持K码/K令，请使用K宝。</p>-->
			<!--</div>-->
			<!--<div class="remind webllpay  hide">-->
			<!--<p><b class="blue" style="font-weight:normal;">提款银行卡在第一次入金时绑定，入金可以自行切换不同银行，按充值在跳转的页面填写另外银行卡即可。</b>入金由第三方收取手续费为付款金额的0.3%(如付款1万，手续费30),单笔最高10万元，最低500元，到帐后处理时间15分钟左右，请耐心等待！入金的时间为每个交易日上午08：30至次日05：30分，未及时到帐号请联系客服！请先开通网银，申请各家银行UKEY或U盾或K令，各家银行额度限制请向客服索要详表。</p>-->
			<!--</div>-->
			<!--<div class="remind zfb_deposit ">-->
			<!--<p><b class="blue" style="font-weight:normal;">提款银行卡在第一次入金时绑定，入金可以自行切换不同银行，按充值在跳转的页面填写另外银行卡即可。</b>入金手续费为付款金额的0.3%（如：付款1万元，手续费30元），单笔最高为10万元，最低为500元，到帐后处理时间为15分钟左右，请耐心等待！如30分钟以上资金未到帐号，请及时与联系我司客服联系！入金时间：每个交易日08:30至次日凌晨05：00。首次使用请用手机下载支付宝</p>-->
			<!--</div>-->
			<!--<div class="remind weixin_deposit ">-->
			<!--<p><b class="blue" style="font-weight:normal;">提款银行卡在第一次入金时绑定，入金可以自行切换不同银行，按充值在跳转的页面填写另外银行卡即可。</b>入金手续费为付款金额的0.3%（如：付款1万元，手续费30元），单笔最高为10万元，最低为500元，到帐后处理时间为15分钟左右，请耐心等待！如30分钟以上资金未到帐号，请及时与联系我司客服联系！入金时间：每个交易日08:30至次日凌晨05：00。首次使用请用手机下载微信</p>-->
			<!--</div>-->
		</div>
	</div>
	<div style="margin: 10px 0">
	<div id="error_info" class="error_info addcard_error_info"><img src="/Public/img/error.png" alt="" style=""><span id="error_span" class="error_span"></span></div>
	<div class="card_box">
	<form action="<?php echo url('addcard'); ?>" method="post" id="addcardform">
		<input type="hidden" name="bankname" id="bankname" value="中国工商银行">
		
		<p>
			<span>银行名称</span>
			<select name="bankcode" class="bank_code_box" id="addcard_bankcode">
				<option value="ICBC" selected = "selected">中国工商银行</option>
				<option value="CCB">中国建设银行</option>
				<option value="ABC">中国农业银行</option>
				<option value="COMM">交通银行</option>
				<option value="BOC">中国银行</option>
				<option value="CEB">中国光大银行</option>
				<option value="BJBANK">北京银行</option>
				<option value="BJRCB">北京农商银行</option>
				<option value="CIB">兴业银行</option>
				<option value="CITIC">中信银行</option>
				<option value="CMBC">中国民生银行</option>
				<option value="CMB">招商银行</option>
				<option value="SPDB">浦发银行</option>
				<option value="PSBC">中国邮政储蓄银行</option>
				<option value="NBBANK">宁波银行</option>
				<option value="SDB">深圳发展银行</option>
				<option value="HXBANK">华夏银行</option>
				<option value="HZCB">杭州银行</option>
				<option value="NJCB">南京银行</option>
				<option value="GDB">广发银行</option>
			</select>
		</p>
		<p><span>银行卡号</span><input type="text" name="card" id="card" autocomplete="off" placeholder="请输入您的银行卡号"></p>
		<p><span>持卡人</span><input type="text" name="name" id="idname" autocomplete="off" placeholder="请输入持卡人的姓名"></p>
		<p><span>身份证号</span><input type="text" name="idcard" id="idcard" autocomplete="off" placeholder="请输入持卡人的身份证号"></p>
		<p class="small_select">
			<span>开户省</span>
			<select id="province" class="bank_code_box select_province" runat="server" onchange="selectprovince(this);" name="cardprovince" ></select>
			<span class="select_city_span">开户市</span>
			<select id="city" runat="server" class="bank_code_box select_city" name="cardcity"></select>
		</p>
		<p><span>支行名称</span><input type="text" name="bankbranchname" id="bankbranchname" autocomplete="off" placeholder="请输入开户行支行名称"></p>
		<p><span>预留手机号</span><input type="text" name="cardphone" id="cardphone" placeholder="请输入银行预留手机号" autocomplete="off"></p>
		<p><span>交易密码</span><input type="text" name="cardphone" id="deal_password" placeholder="请输入交易密码" autocomplete="off"></p>
		<button type="button" class="addcard_sub" id="addcard_btn">提款银行卡绑定</button>
	</form>
	</div></div>
</div>
</div>
</div>
</div>
<div class="tanchu_system small" id="addcard_success" style="display: none">
	<div class="tanchu_system_box">
		<h3>绑定银行卡成功</h3>
		<div class="question"><img src="/Public/img/success.png" alt=""><div class="tanchu_content"><p>绑定银行卡成功！</p></div></div>
		<div class="answer">
			<a href="/rx/user/transaction" class="error">确定</a>
		</div>
	</div>
</div>

<script type="text/javascript">
    var list1 = new Array;
    var list2 = new Array;
    list1[list1.length] = "请选择";
    list1[list1.length] = "北京市";
    list1[list1.length] = "天津市";
    list1[list1.length] = "河北省";
    list1[list1.length] = "山西省";
    list1[list1.length] = "内蒙古";
    list1[list1.length] = "辽宁省";
    list1[list1.length] = "吉林省";
    list1[list1.length] = "黑龙江省";
    list1[list1.length] = "上海市";
    list1[list1.length] = "江苏省";
    list1[list1.length] = "浙江省";
    list1[list1.length] = "安徽省";
    list1[list1.length] = "福建省";
    list1[list1.length] = "江西省";
    list1[list1.length] = "山东省";
    list1[list1.length] = "河南省";
    list1[list1.length] = "湖北省";
    list1[list1.length] = "湖南省";
    list1[list1.length] = "广东省";
    list1[list1.length] = "广西自治区";
    list1[list1.length] = "海南省";
    list1[list1.length] = "重庆市";
    list1[list1.length] = "四川省";
    list1[list1.length] = "贵州省";
    list1[list1.length] = "云南省";
    list1[list1.length] = "西藏自治区";
    list1[list1.length] = "陕西省";
    list1[list1.length] = "甘肃省";
    list1[list1.length] = "青海省";
    list1[list1.length] = "宁夏回族自治区";
    list1[list1.length] = "新疆维吾尔自治区";
    list1[list1.length] = "香港特别行政区";
    list1[list1.length] = "澳门特别行政区";
    list1[list1.length] = "台湾省";
    list1[list1.length] = "其它";

    list2[list2.length] = new Array("请选择");
	list2[list2.length] = new Array("北京", "东城区", "西城区", "崇文区", "宣武区", "朝阳区", "丰台区", "石景山区", " 海淀区（中关村）", "门头沟区", "房山区", "通州区", "顺义区", "昌平区", "大兴区", "怀柔区", "平谷区", "密云县", "延庆县", " 其他");
    list2[list2.length] = new Array("和平区", "河东区", "河西区", "南开区", "红桥区", "塘沽区", "汉沽区", "大港区",
                "西青区", "津南区", "武清区", "蓟县", "宁河县", "静海县", "其他");
    list2[list2.length] = new Array("石家庄市", "张家口市", "承德市", "秦皇岛市", "唐山市", "廊坊市", "衡水市",
                "沧州市", "邢台市", "邯郸市", "保定市", "其他");
    list2[list2.length] = new Array("太原市", "朔州市", "大同市", "长治市", "晋城市", "忻州市", "晋中市", "临汾市",
                "吕梁市", "运城市", "其他");
    list2[list2.length] = new Array("呼和浩特市", "包头市", "赤峰市", "呼伦贝尔市", "鄂尔多斯市", "乌兰察布市",
                "巴彦淖尔市", "兴安盟", "阿拉善盟", "锡林郭勒盟", "其他");
    list2[list2.length] = new Array("沈阳市", "朝阳市", "阜新市", "铁岭市", "抚顺市", "丹东市", "本溪市", "辽阳市",
                "鞍山市", "大连市", "营口市", "盘锦市", "锦州市", "葫芦岛市", "其他");
    list2[list2.length] = new Array("长春市", "白城市", "吉林市", "四平市", "辽源市", "通化市", "白山市", "延边朝鲜族自治州", "其他");
    list2[list2.length] = new Array("哈尔滨市", "七台河市", "黑河市", "大庆市", "齐齐哈尔市", "伊春市", "佳木斯市",
                "双鸭山市", "鸡西市", "大兴安岭地区(加格达奇)", "牡丹江", "鹤岗市", "绥化市　", "其他");
    list2[list2.length] = new Array("黄浦区", "卢湾区", "徐汇区", "长宁区", "静安区", "普陀区", "闸北区", "虹口区",
                "杨浦区", "闵行区", "宝山区", "嘉定区", "浦东新区", "金山区", "松江区", "青浦区", "南汇区", "奉贤区", "崇明县", "其他");
    list2[list2.length] = new Array("南京市", "徐州市", "连云港市", "宿迁市", "淮安市", "盐城市", "扬州市", "泰州市",
                "南通市", "镇江市", "常州市", "无锡市", "苏州市", "其他");
    list2[list2.length] = new Array("杭州市", "湖州市", "嘉兴市", "舟山市", "宁波市", "绍兴市", "衢州市", "金华市",
                "台州市", "温州市", "丽水市", "其他");
    list2[list2.length] = new Array("合肥市", "宿州市", "淮北市", "亳州市", "阜阳市", "蚌埠市", "淮南市", "滁州市",
                "马鞍山市", "芜湖市", "铜陵市", "安庆市", "黄山市", "六安市", "巢湖市", "池州市", "宣城市", "其他");
    list2[list2.length] = new Array("福州市", "南平市", "莆田市", "三明市", "泉州市", "厦门市", "漳州市", "龙岩市", "宁德市", "其他");
    list2[list2.length] = new Array("南昌市", "九江市", "景德镇市", "鹰潭市", "新余市", "萍乡市", "赣州市", "上饶市",
                "抚州市", "宜春市", "吉安市", "其他");
    list2[list2.length] = new Array("济南市", "聊城市", "德州市", "东营市", "淄博市", "潍坊市", "烟台市", "威海市",
                "青岛市", "日照市", "临沂市", "枣庄市", "济宁市", "泰安市", "莱芜市", "滨州市", "菏泽市", "其他");
    list2[list2.length] = new Array("郑州市", "三门峡市", "洛阳市", "焦作市", "新乡市", "鹤壁市", "安阳市", "濮阳市",
                "开封市", "商丘市", "许昌市", "漯河市", "平顶山市", "南阳市", "信阳市", "周口市", "驻马店市", "其他");
    list2[list2.length] = new Array("武汉市", "十堰市", "襄樊市", "荆门市", "孝感市", "黄冈市", "鄂州市", "黄石市",
                "咸宁市", "荆州市", "宜昌市", "随州市", "恩施土家族苗族自治州", "仙桃市", "天门市", "潜江市", "神农架林区", "其他");
    list2[list2.length] = new Array("长沙市", "张家界市", "常德市", "益阳市", "岳阳市", "株洲市", "湘潭市", "衡阳市",
                "郴州市", "永州市", "邵阳市", "怀化市", "娄底市", "湘西土家族苗族自治州", "其他");
    list2[list2.length] = new Array("广州市", "清远市市", "韶关市", "河源市", "梅州市", "潮州市", "汕头市", "揭阳市",
                "汕尾市", " 惠州市", "东莞市", "深圳市", "珠海市", "中山市", "江门市", "佛山市", "肇庆市", "云浮市",
                "阳江市", "茂名市", "湛江市", " 其他");
    list2[list2.length] = new Array("南宁市", "桂林市", "柳州市", "梧州市", "贵港市", "玉林市", "钦州市", "北海市",
                "防城港市", "崇左市", "百色市", "河池市", "来宾市", "贺州市", "其他");
    list2[list2.length] = new Array("海口市", "三亚市", "其他");
    list2[list2.length] = new Array("渝中区", "大渡口区", "江北区", "沙坪坝区", "九龙坡区", "南岸区", "北碚区",
                "万盛区", "双桥区", "渝北区", "巴南区", "万州区", "涪陵区", "黔江区", "长寿区", "合川市", "永川市",
                "江津市", "南川市", "綦江县", "潼南县", "铜梁县", "大足县", "璧山县", "垫江县", "武隆县", "丰都县",
                "城口县", "开县", "巫溪县", "巫山县", "奉节县", "云阳县", "忠县", "石柱土家族自治县", "彭水苗族土家族自治县",
                "酉阳土家族苗族自治县", "秀山土家族苗族自治县", "其他");
    list2[list2.length] = new Array("成都市", "广元市", "绵阳市", "德阳市", "南充市", "广安市", "遂宁市",
                "内江市", "乐山市", "自贡市", "泸州市", "宜宾市", "攀枝花市", "巴中市", "资阳市", "眉山市", "雅安",
                "阿坝藏族羌族自治州", "甘孜藏族自治州", "凉山彝族自治州县", "其他");
    list2[list2.length] = new Array("贵阳市", "六盘水市", "遵义市", "安顺市", "毕节地区", "铜仁地区",
                "黔东南苗族侗族自治州", "黔南布依族苗族自治州", "黔西南布依族苗族自治州", "其他");
    list2[list2.length] = new Array("昆明市", "曲靖市", "玉溪市", "保山市", "昭通市", "丽江市", "普洱市",
                "临沧市", "宁德市", "德宏傣族景颇族自治州", "怒江傈僳族自治州", "楚雄彝族自治州", "红河哈尼族彝族自治州",
                "文山壮族苗族自治州", "大理白族自治州", "迪庆藏族自治州", "西双版纳傣族自治州", "其他");
    list2[list2.length] = new Array("拉萨市", "那曲地区", "昌都地区", "林芝地区", "山南地区", "日喀则地区", "阿里地区", "其他");
    list2[list2.length] = new Array("西安市", "延安市", "铜川市", "渭南市", "咸阳市", "宝鸡市", "汉中市", "安康市", "商洛市", "其他");
    list2[list2.length] = new Array("兰州市 ", "嘉峪关市", "金昌市", "白银市", "天水市", "武威市", "酒泉市",
                "张掖市", "庆阳市", "平凉市", "定西市", "陇南市", "临夏回族自治州", "甘南藏族自治州", "其他");
    list2[list2.length] = new Array("西宁市", "海东地区", "海北藏族自治州", "黄南藏族自治州", "玉树藏族自治州",
                "海南藏族自治州", "果洛藏族自治州", "海西蒙古族藏族自治州", "其他");
    list2[list2.length] = new Array("银川市", "石嘴山市", "吴忠市", "固原市", "中卫市", "其他");
    list2[list2.length] = new Array("乌鲁木齐市", "克拉玛依市", "喀什地区", "阿克苏地区", "和田地区", "吐鲁番地区",
                "哈密地区", "塔城地区", "阿勒泰地区", "克孜勒苏柯尔克孜自治州", "博尔塔拉蒙古自治州",
                "昌吉回族自治州伊犁哈萨克自治州", "巴音郭楞蒙古自治州", "河子市", "阿拉尔市", "五家渠市", "图木舒克市", "其他");
    list2[list2.length] = new Array("香港", "其他");
    list2[list2.length] = new Array("澳门", "其他");
    list2[list2.length] = new Array("台湾", "其他");

    var ddlProvince = document.getElementById("province");
    var ddlCity = document.getElementById("city");
    for(var i =0;i<list1.length; i++)
    {
        var option = document.createElement("option");
        option.appendChild(document.createTextNode(list1[i]));
        option.value = list1[i];
        ddlProvince.appendChild(option);
        //city initialize
        var firstprovince = list2[0];
        for (var j = 0; j < firstprovince.length; j++) {
            var optioncity = document.createElement("option");
            optioncity.appendChild(document.createTextNode(firstprovince[j]));
            optioncity.value = firstprovince[j];
            ddlCity.appendChild(optioncity);
        }
    }
    function indexof(obj,value)
    {
        var k=0;
        for(;k<obj.length;k++)
        {
            if(obj[k] == value)
            return k;
        }
        return k;
    }
    function selectprovince(obj) {
        ddlCity.options.length = 0;//clear
        var index = indexof(list1,obj.value);
        var list2element = list2[index];
        for(var i =0;i<list2element.length; i++)
        {
            var option = document.createElement("option");
            option.appendChild(document.createTextNode(list2element[i]));
            option.value = list2element[i];
            ddlCity.appendChild(option);
        }
    }
	selectprovince(ddlProvince);
</script>
</body>
</html>