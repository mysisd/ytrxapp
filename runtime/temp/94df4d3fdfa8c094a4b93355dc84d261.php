<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:56:"C:\AppServ\www\tp\public/../xmyttz/rx\view\rx\index.html";i:1517289862;s:27:"../xmyttz/view/rx_head.html";i:1517187779;s:29:"../xmyttz/view/rx_header.html";i:1516255478;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>盈透锐新</title>
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
</include>
    <script src="/Public/js/rx_send.js"></script>
    <script src="/Public/js/rx_money.js"></script>
    <style>
        #header_bottom .to_index{
            background-color:#268bf2;
            color:#fff;
        }
        .mui-table-view-cell>a:not(.mui-btn).mui-active{
            background-color:white;
        }
    </style>
</head>
<body style="">
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



</include>
<div class="phone" style="background-color: white">

    <!--导航栏选择-->
<div class="nav">
    <ul>
        <li id="market" class="">自选</li>
        <li id="optional" class="active">市场</li>
    </ul>
</div>
    <!--选择-->
    <div class="select">
        <p id="click" style="width: 60px">所有</p>
        <!--<p class="line"></p>-->
        <div class="select_choice">
            <ul>
                <li>所有</li>
                <li >国际期货</li>
                <li>外汇</li>
            </ul>
        </div>
    </div>
    <div class="select shichang">
        <p id="clicks" style="width: 60px">国际期货</p>
        <p class="line"></p>
        <div class="select_choice">
            <ul>
                <li>国际期货</li>
                <li>外汇</li>
            </ul>
        </div>
    </div>
    <!--自选内容-->
    <ul class="mui-table-view option"></ul>
    <!--市场内容-->
    <div class="body shichang">

            <!--中间三个期货参数美原油，美黄金,小恒指-->
        <div class="box" id="info">
            <div class="oil"  >
               <p>美原油1801</p>
                <p id="QLastPrice_CL"></p>
                <p>
                    <span id="QChangeRate_CL"></span>
                    <span id="QSwing_CL"></span>
                </p>
            </div>

            <div class="oil">
                <p>美黄金1712</p>
                <p id="QLastPrice"></p>
                <p>
                    <span id="QChangeRate"></span>
                <span id="QSwing"></span>
                </p>
            </div>
            <div class="oil">
                <p>恒生指数1712</p>
                <p id="QLastPrice_hsi"></p>
                <p>
                    <span id="QChangeRate_hsi"></span>
                    <span id="QSwing_hsi"></span>
                </p>
            </div>

        </div>
        <!--详细期货选项卡，并且可添加滑动选择-->
        <div class="detail" id="test">
            <div style="overflow: auto">
                <ul id="list_1">
                    <li name="CL" id="CL" class="move_active">美原油</li>
                    <li name="CN" id="CN">A50指数</li>
                    <li name="HSI" id="HSI">恒生指数</li>
                    <li name="MHI" id="MHI" >小恒指</li>
                </ul>
            </div>

        </div>

        </div>
    <!--期货详细内容-->
    <ul class="mui-table-view ma"></ul>
    <div id="old" style="" >
        <ul id="list_11">
            <li class="act" ><a href="/rx/rx/rx_data" id="al"  target="myFrameName">k线<p style="display: none">ddd</p></a></li>
            <li id="time_sh"><a href="/rx/rx/rx_data1" target="myFrameName">分时</a></li>
            <li id="dish">盘口</li>
            <li class="five_file">五档</li>
            <!--<li>明细</li>-->
        </ul>
        <!--k线-->
        　<iframe  width="95%" height="350px" id="myFrameId" style="" name="myFrameName" scrolling="no" frameborder="0"></iframe>
       <!--分时-->

        <!--盘口-->
        <div id="old_del">
            <ul>
                <li id="old_del_o" style="border-right: 1px solid rgb(225,225,225)">
                    <ul>
                        <li>
                          <span class="purchase_price">买价</span><span class="purchase_price1"></span>
                        </li>
                        <li>
                            <span class="purchase_price">涨跌额</span><span class="purchase_price1"></span>

                        </li>
                        <li> <span class="purchase_price">开盘</span><span class="purchase_price1"></span></li>
                        <li> <span class="purchase_price">最高</span><span class="purchase_price1"></span></li>
                        <li> <span class="purchase_price">成交量</span><span class="purchase_price1"></span></li>
                        <li> <span class="purchase_price">持仓量</span><span class="purchase_price1"></span></li>
                    </ul>
                </li>
                <li id="old_del_t">
                    <ul>
                        <li>
                            <span class="purchase_price">卖价</span><span class="purchase_price1"></span>
                        </li>
                        <li>
                            <span class="purchase_price">涨跌幅</span><span class="purchase_price1"></span>

                        </li>
                        <li> <span class="purchase_price">昨结</span><span class="purchase_price1"></span></li>
                        <li> <span class="purchase_price">最低</span><span class="purchase_price1"></span></li>
                        <li> <span class="purchase_price">振幅</span><span class="purchase_price1"></span></li>

                    </ul>
                </li>
            </ul>

        </div>
        <!--五档-->
        <div id="five_file">
        <ul>
            <li id="seal" style="border-bottom: 1px solid rgb(225,225,225)">
                <ul>
                    <li style="line-height: 150px;">卖</li>
                    <li id="se">
                        <ul>
                            <li>
                                <span class="se_one"></span>
                                <span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span><span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span>
                                <span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span><span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span><span class="se_two"></span>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
            <li id="seal">
                <ul>
                    <li style="line-height: 150px;">买</li>
                    <li id="se">
                        <ul>
                            <li>
                                <span class="se_one"></span><span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span><span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span>
                                <span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span><span class="se_two"></span>
                            </li>
                            <li>
                                <span class="se_one"></span><span class="se_two"></span>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        </div>
        <!--按钮:买入、关闭、卖出-->
        <div id="tr_but">
            <ul>
                <li id="buy"><img src="/Public/img/mairu.png" alt=""><a href="/rx/rx/rx_buy"><span>买入</span></a></li>
                <li id="close"><img src="/Public/img/guanbi.png" alt=""><span>关闭</span></li>
                <li id="sell"><img src="/Public/img/maichu.png" alt=""><a href="/rx/rx/rx_sell"><span>卖出</span></a></li>
                <li id="optionals"><img src="/Public/img/zixuan.png" alt=""><span>自选</span></li>
            </ul>
        </div>
    </div>


</div>
<div id="qihuo" ></div>
<div style="position: absolute;top:293px;right: 0">

    <div id="item5mobile" class="mui-control-content">
        <div class="other_qihuos" >
            <div>
                <ul>
                    <li>
                        <div class="mui-input-row mui-checkbox mui-left">
                            <label for="checkbox1" name="">H股指数</label>
                            <input id="checkbox1" name="H股指数" value="HHI"  class="radio"  type="checkbox">
                        </div>

                    </li>
                    <li><div class="mui-input-row mui-checkbox mui-left">
                        <label for="checkbox2" name="">小H股指</label>
                        <input id="checkbox2" name="小H股指"  value="MCH"  class="radio" type="checkbox">
                    </div></li>
                    <li><div class="mui-input-row mui-checkbox mui-left">
                        <label for="checkbox3" name="">美黄金</label>
                        <input id="checkbox3" value="GC"  name="美黄金" class="radio" type="checkbox">
                    </div></li>
                    <li><div class="mui-input-row mui-checkbox mui-left">
                        <label for="checkbox4" name="">天然气</label>
                        <input id="checkbox4" value="NG"  name="天然气" class="radio" type="checkbox">
                    </div></li>
                    <li><div class="mui-input-row mui-checkbox mui-left">
                        <label for="checkbox5" name="">美精铜</label>
                        <input id="checkbox5" value="HG" name="美精铜"   class="radio" type="checkbox">
                    </div></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<script>
    function abc() {
        var ul=document.getElementById("list_1");
        var li=ul.getElementsByTagName("li");

        for(var i=0;i<li.length;i++){
            li[i].onclick=function(){
                for(j=0;j<li.length;j++){
                    li[j].className="";
                }
                this.className="move_active";
                $('#old').hide();

            }
        }
    }

   setInterval(abc,1);
    function abc1() {
        var ul=document.getElementById("list_11");
        var li=ul.getElementsByTagName("li");

        for(var i=0;i<li.length;i++){
            li[i].onclick=function(){
                for(j=0;j<li.length;j++){
                    li[j].className="";
                }
                this.className="act"

            }
        }
    }

    setInterval(abc1,1);

    var objdiv = document.getElementById('list_1');
    for(var i=1; i<6; ++i) {
        var objchk = document.getElementById('checkbox' + i);
        objchk.addEventListener('click', function(e) {
            //获取当前正在点击的 Checkbox对象
            var objchk = e.target;
            //获取已生成的 li 对象
            var objipt_exist = document.getElementById( objchk.value);
            if(objchk.checked) {
                //如果 Checkbox 选中状态下对应的 li 已存在，就返回，以防重复添加Input
                if(objipt_exist) {
                    return false;
                }
                //如果文本框不存在，在 list_1 容器中动态添加 li
                var objipt = document.createElement('li');
                objipt.setAttribute('name', objchk.value);
                objipt.setAttribute('id', objchk.value);
                objipt.innerHTML=objchk.name;
                objdiv.appendChild(objipt);
            } else {
                //从list_1中移除已存在的 li
                objdiv.removeChild(objipt_exist);
            }
        }, false);
    }
</script>

</body>
</html>