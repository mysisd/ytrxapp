<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"C:\AppServ\www\oo\public/../xmyttz/rx\view\user\transaction.html";i:1520584411;s:27:"../xmyttz/view/rx_head.html";i:1520233375;s:29:"../xmyttz/view/rx_header.html";i:1520233375;}*/ ?>
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
    <style>
        #header_bottom .to_goods{
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
            <li><a href="/rx/comm/index" class="to_community"><img src="/Public/img/to_trade.png" alt="">社区</a></li>
            <li><a href="/rx/move/move" class="to_download"><img src="/Public/img/to_find.png" alt="">动态</a></li>
            <li><a href="/rx/user/index1" class="to_me"><img src="/Public/img/to_me.png" alt="">我的</a></li>
        </ul>
    </div>


</div>

</div>



</include>
<div class="tra">
<div class="tra_list">
<ul>
    <li>国际期货</li>
    <!--<li>陈育智</li>-->
    <!--<li>下单</li>-->
</ul>
</div>
    <div class="tra_interests">
    <ul>
        <li>0.00
        <p>动态权益($)</p>
        </li>
        <li>
            0.00
            <p>逐笔浮盈($)</p>
        </li>
        <li>
            0.00%
            <p>持仓风险</p>
        </li>
        <!--<li>-->
            <!--<a href="/rx/user/capital">-->
                <!--<img src="/Public/img/icon_4.png" alt="">-->
            <!--</a>-->

        <!--</li>-->
    </ul>
    </div>
</div>
<div style="clear: both;background-color: white"></div>
<div class="tra_nav">
    <ul id="list_1">
        <li class="tra_active" id="position">持仓</li>
        <li id="posters">账户资金</li>
        <li id="entrust">委托</li>
        <li id="deal">成交</li>
    </ul>

</div>
<!--持仓表-->
<div class="position">
<div>
    <table width="100%" class="tables" id="tablevalue">
        <tr>
            <th width=20%>名称</th>
            <th width=20%>多空</th>
            <th width=20%>手数</th>
            <th width=20%>持仓均价</th>
            <th width=20%>浮动盈亏</th>
        </tr>
    </table>
</div>
</div>
<!--挂单表-->
<div class="posters" style="display: none">
    <div class="capital">
        <p class="p_active">资金动态</p>
        <div class="cap_active">
            <ul>
                <li>
                    <div class="avc">
                        <ul>
                            <li >
                                <p>
                                    <span>动态权益</span>
                                    <span class="span">&nbsp;&nbsp;&nbsp;0.00</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <span>授信资金</span>
                                    <span class="span">&nbsp;&nbsp;&nbsp;0.00</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <span>占用保证金</span>
                                    <span class="span">0.00</span>
                                </p>
                            </li>

                        </ul>
                    </div>
                </li>
                <li class="vertical" ></li>
                <li style="margin: -75px 0;">
                    <div class="avc">
                        <ul>
                            <li>
                                <p>
                                    <span>可用资金</span>
                                    <span class="span">0.00</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <span>可提资金</span>
                                    <span class="span">0.00</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <span>冻结资金</span>
                                    <span class="span">0.00</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="cap_back"></div>
    <div class="loss">
        <p class="p_active">盈亏总览</p>
        <ul>
            <li>
                <p>
                    <span class="profit">逐笔浮动盈亏</span>
                    <span class="cap_pro">0.00</span>
                </p>
            </li>
            <li>
                <p>
                    <span class="profit">盯市浮动盈亏</span>
                    <span class="cap_pro">0.00</span>
                </p>
            </li>
            <li>
                <p>
                    <span class="profit">逐笔平仓盈亏</span>
                    <span class="cap_pro">0.00</span>
                </p>
            </li>
            <li>
                <p>
                    <span class="profit">盯市平仓盈亏</span>
                    <span class="cap_pro">0.00</span>
                </p>
            </li>
        </ul>
        <div class="line"></div>
        <p style="line-height: 36px;padding: 0 16px;font-size: 16px;">
            <span>当日手续费</span>
            <span class="cap_pros">0.00</span>
        </p>
    </div>
</div>
<!--委托表-->
<div class="entrust" style="display: none">
    <div>
        <table width="100%" class="tables" id="tablevalues">
            <tr>
                <th width=20%>名称</th>
                <th width=20%>状态</th>
                <th width=20%>买卖</th>
                <th width=20%>委托价</th>
                <th width=20%>委托量</th>
                <th width=20%>下单时间</th>
            </tr>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): if( count($data)==0 ) : echo "" ;else: foreach($data as $key=>$v): ?>
                <tr>
                    <td><?php echo $v['name']; ?></td>
                    <td><?php echo $v['status']; ?></td>
                    <td><?php echo $v['deal']; ?></td>
                    <td><?php echo $v['entrusted_price']; ?></td>
                    <td><?php echo $v['entrust_amount']; ?></td>
                    <td><?php echo $v['date']; ?></td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
</div>
<!--成交表-->
<div class="deal" style="display: none">
    <div>
        <table width="100%" class="tables" id="tablevaluess">
            <tr>
                <th width=20%>名称</th>
                <th width=20%>成交价</th>
                <th width=20%>成交量</th>
                <th width=20%>买/卖</th>
                <th>交易金额</th>
                <th width=20%>成交时间</th>
            </tr>


        </table>
    </div>
</div>
<script>
setInterval(function () {
    $.ajax({
        url:'/rx/user/tran_all',
        type:'post',
        success:function (data) {
            $("#tablevalue  tr:not(:first)").empty("");
            $.each(data,function (k,v) {
                item="<tr><td>"+v.name+"</td>"+"<td>"+'多'+"</td>"+"<td>"+v.hand+"</td>"+"<td>"+v.position_average+"</td>"+"<td>"+v.floating_profit+"</td>"+"</tr>";
                $("#tablevalue").append(item);
            })

        }


//            $.each(data,function (k,v)  {
//                var num = v['name'].replace(/[^0-9]/ig,"");
//                var value = v['name'].slice('left',-4);
//                 $.ajax({
//                    url:'/rx/rx/send_list',
//                    type:'post',
//                    dataType:'json',
//                    data:{'type':value,'num':num},
//                    success:function (datas) {
//
//                        data=datas[0];
//                        var loss_sell=(data['QLastPrice']-v['position_average'])*v['hand'];
//                        loss_sell = loss_sell.toFixed(2);
//                        item="<tr><td>"+v['name']+"</td>"+"<td>"+'多'+"</td>"+"<td>"+v.hand+"</td>"+"<td>"+v.position_average+"</td>"+"<td>"+loss_sell+"</td>"+"</tr>";
//                        $("#tablevalue").append(item);
//
//                    }
//                })
//
//            })


    })
},1000)





    $.ajax({
        url:'/rx/user/clinch_list',
        type:'post',
        success:function (data) {

           $.each(data,function (k,v) {

               if(v.sell==0){
                    var text='卖';
               }else if(v.sell==1){
                   var text='买';
               }
               var item="<tr><td>"+v.name+"</td>"+"<td>"+v.deal_valence+"</td>"+"<td>"+v.volume+"</td>"+"<td>"+text+"</td>"+"<td>"+v.turnover+"</td>"+"<td>"+v.deal_time+"</td>"+"</tr>";
               $("#tablevaluess").append(item);
           })
        }

    })


</script>
<script>
    var ul=document.getElementById("list_1");
    var li=ul.getElementsByTagName("li");
    for(i=0;i<li.length;i++){

        li[i].onclick=function(){
            for(j=0;j<li.length;j++){
                li[j].className=""
            }
            this.className="tra_active"
        }
    }
</script>
</body>
</html>