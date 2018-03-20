<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:58:"C:\AppServ\www\oo\public/../xmyttz/rx\view\rx\rx_data.html";i:1519268747;s:27:"../xmyttz/view/rx_head.html";i:1520233375;}*/ ?>
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
    <script src="/Public/js/echarts.min.js"></script>
    <script type="text/javascript" src="/Public/js/lodash.js"></script>
    <script type="text/javascript" src="/Public/js/dat.gui.min.js"></script>
    <script type="text/javascript" src="/Public/js/ecStat.min.js?_v_=1518076267754"></script>
    <script type="text/javascript" src="/Public/js/china.js?_v_=1518076267754"></script>
    <script type="text/javascript" src="/Public/js/world.js?_v_=1518076267754"></script>
    <script type="text/javascript" src="/Public/js/dataTool.js?_v_=1518076267754"></script>
    <script type="text/javascript" src="/Public/js/bmap.js?_v_=1518076267754"></script>
    <script type="text/javascript" src="/Public/js/ace.js"></script>
    <script type="text/javascript" src="/Public/js/ext-language_tools.js"></script>

    <script type="text/javascript" src="/Public/js/hm.js"></script>


</head>
<body>
<div id="main" style="width: 100%;height: 300px"></div>
<script>
    $(function () {

        var text=$.cookie('names');
        var num = text.replace(/[^0-9]/ig,"");
        var type = text.slice('left',-4);
   $.ajax({
    url:'/rx/rx/echart',
    type:'post',
    dataType:'json',
   data:{'num':num,'value':type},
    success:function (datas) {


        var map=[];
        var time=[];
        var value=[];
        var num=[];

        var times=[];
        var nums=[];
        var values=[];

       for (var i = 0; i < datas.length; i++) {
           map[i]= [datas[i].DateTimeStamp.substr(0,10),datas[i].QOpeningPrice,datas[i].QClosingPrice,datas[i].QLowPrice,datas[i].QHighPrice,datas[i].QLastPrice,datas[i].QChangeRate];//二维数组
           time[i]= datas[i].DateTimeStamp.substr(0,10);
           value[i]= [datas[i].QOpeningPrice,datas[i].QClosingPrice,datas[i].QLowPrice,datas[i].QHighPrice,datas[i].QTotalQty];
            num[i]=datas[i].QTotalQty;
            }

            for(var k = 0; k < time.length; k++){
           if(time[k]==time[k+1])continue;
                values[k]=value[k];
                times[k]=time[k];
                nums[k]=num[k];
            }
        for(var h = 0 ;h<times.length;h++) {
            if (times[h] == "" || typeof(times[h]) == "undefined") {
                times.splice(h, 1);
                h = h - 1;
            }

        }
        for(var h = 0 ;h<values.length;h++) {
            if (values[h] == "" || typeof(values[h]) == "undefined") {
                values.splice(h, 1);
                h = h - 1;
            }

        }
        for(var h = 0 ;h<nums.length;h++) {
            if (nums[h] == "" || typeof(nums[h]) == "undefined") {
                nums.splice(h, 1);
                h = h - 1;
            }

        }
        var rawData = [map];
        var colorList = ['#c23531','#2f4554', '#61a0a8', '#d48265', '#91c7ae','#749f83',  '#ca8622', '#bda29a','#6e7074', '#546570', '#c4ccd3'];
        var labelFont = 'bold 12px Sans-serif';
        var myChart = echarts.init(document.getElementById('main'));
        function calculateMA(dayCount, data) {
            var result = [];
            for (var i = 0, len = data.length; i < len; i++) {
                if (i < dayCount) {
                    result.push('-');
                    continue;
                }
                var sum = 0;
                for (var j = 0; j < dayCount; j++) {
                    sum += data[i - j][1];
                }
                result.push((sum / dayCount).toFixed(2));
            }
            return result;
        }



        var dates = times;
        var data = values;
        var volumes = [nums];



        var dataMA5 = calculateMA(5, data);
        var dataMA10 = calculateMA(10, data);
        var dataMA20 = calculateMA(20, data);


        option = {
            animation: false,
            color: colorList,
            title: {
                left: 'center',
                text: ''
            },
            legend: {
                top: 30,
                data: ['日K', 'MA5', 'MA10', 'MA20', 'MA30']
            },
            tooltip: {
                triggerOn: 'none',
                transitionDuration: 0,
                confine: true,
                bordeRadius: 4,
                borderWidth: 1,
                borderColor: '#333',
                backgroundColor: 'rgba(255,255,255,0.9)',
                textStyle: {
                    fontSize: 12,
                    color: '#333'
                },
                position: function (pos, params, el, elRect, size) {
                    var obj = {
                        top: 60
                    };
                    obj[['left', 'right'][+(pos[0] < size.viewSize[0] / 2)]] = 5;
                    return obj;
                }
            },
            axisPointer: {
                link: [{
                    xAxisIndex: [0, 1]
                }]
            },
            dataZoom: [{
                type: 'slider',
                xAxisIndex: [0, 1],
                realtime: false,
                start: 20,
                end: 70,
                top: 65,
                height: 20,
                handleIcon: 'M10.7,11.9H9.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4h1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
                handleSize: '120%'
            }, {
                type: 'inside',
                xAxisIndex: [0, 1],
                start: 40,
                end: 70,
                top: 30,
                height: 20
            }],
            xAxis: [{
                type: 'category',
                data: dates,
                boundaryGap : false,
                axisLine: { lineStyle: { color: '#777' } },
                axisLabel: {
                    formatter: function (value) {
                        return echarts.format.formatTime('MM-dd', value);
                    }
                },
                min: 'dataMin',
                max: 'dataMax',
                axisPointer: {
                    show: true
                }
            }, {
                type: 'category',
                gridIndex: 1,
                data: dates,
                scale: true,
                boundaryGap : false,
                splitLine: {show: false},
                axisLabel: {show: false},
                axisTick: {show: false},
                axisLine: { lineStyle: { color: '#777' } },
                splitNumber: 20,
                min: 'dataMin',
                max: 'dataMax',
                axisPointer: {
                    type: 'shadow',
                    label: {show: false},
                    triggerTooltip: true,
                    handle: {
                        show: true,
                        margin: 30,
                        color: '#B80C00'
                    }
                }
            }],
            yAxis: [{
                scale: true,
                splitNumber: 2,
                axisLine: { lineStyle: { color: '#777' } },
                splitLine: { show: true },
                axisTick: { show: false },
                axisLabel: {
                    inside: true,
                    formatter: '{value}\n'
                }
            }, {
                scale: true,
                gridIndex: 1,
                splitNumber: 2,
                axisLabel: {show: false},
                axisLine: {show: false},
                axisTick: {show: false},
                splitLine: {show: false}
            }],
            grid: [{
                left: 20,
                right: 20,
                top: 110,
                height: 120
            }, {
                left: 20,
                right: 20,
                height: 40,
                top: 260
            }],
            graphic: [{
                type: 'group',
                left: 'center',
                top: 70,
                width: 300,
                bounding: 'raw',
                children: [{
                    id: 'MA5',
                    type: 'text',
                    style: {fill: colorList[1], font: labelFont},
                    left: 0
                }, {
                    id: 'MA10',
                    type: 'text',
                    style: {fill: colorList[2], font: labelFont},
                    left: 'center'
                }, {
                    id: 'MA20',
                    type: 'text',
                    style: {fill: colorList[3], font: labelFont},
                    right: 0
                }]
            }],
            series: [{
                name: 'Volume',
                type: 'bar',
                xAxisIndex: 1,
                yAxisIndex: 1,
                itemStyle: {
                    normal: {
                        color: '#7fbe9e'
                    },
                    emphasis: {
                        color: '#140'
                    }
                },
                data: volumes
            }, {
                type: 'candlestick',
                name: '日K',
                data: data,
                itemStyle: {
                    normal: {
                        color: '#ef232a',
                        color0: '#14b143',
                        borderColor: '#ef232a',
                        borderColor0: '#14b143'
                    },
                    emphasis: {
                        color: 'black',
                        color0: '#444',
                        borderColor: 'black',
                        borderColor0: '#444'
                    }
                }
            }, {
                name: 'MA5',
                type: 'line',
                data: dataMA5,
                smooth: true,
                showSymbol: false,
                lineStyle: {
                    normal: {
                        width: 1
                    }
                }
            }, {
                name: 'MA10',
                type: 'line',
                data: dataMA10,
                smooth: true,
                showSymbol: false,
                lineStyle: {
                    normal: {
                        width: 1
                    }
                }
            }, {
                name: 'MA20',
                type: 'line',
                data: dataMA20,
                smooth: true,
                showSymbol: false,
                lineStyle: {
                    normal: {
                        width: 1
                    }
                }

            }]

        }; myChart.setOption(option);
   }
  })
    })
</script>
</body>
</html>