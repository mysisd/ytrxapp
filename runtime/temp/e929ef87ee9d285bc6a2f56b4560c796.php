<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"C:\AppServ\www\tp\public/../xmyttz/rx\view\rx\ceshi.html";i:1516848285;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">


 
    <link rel="stylesheet" href="/Public/css/style_ceshi.css">

    <title></title>

</head>
<body>
<div id="main">
    <!--quote start-->
    <div class="detail-content" style="display: none;" id="quote">
        <div id="top" style="display: none;">
            <a><i></i></a><p><span class="nstock span1" id="nstock"></span><span class="cstock span2" id="cstock"></span></p>
        </div>
        <div id="stock" class="top_fixed" style="display: none;">
            <div class="top-header top-stock">
                <a class="top-left" style="display:none;" id="pre"><i></i></a>
                <p>
                    <span class="span1" id="secu_abbr"></span>
                </p>
                <p id="stockCode">
                    <span class="span2" id="s_code"></span>
                </p>
                <p class="top-scroll" style="width:3rem;display:none;" id="stock_content">
                    <span class="scroll_last_px" model-bind="last_px" id="scroll_last_px"></span>
                    <!--<span class="scroll_px_change" model-bind="px_change" id="scroll_px_change"></span>-->
                    <span class="scroll_px_change_rate" model-bind="px_change_rate" id="scroll_px_change_rate"></span>
                </p>
                <a class="top-right" style="display:none;" id="next"><i></i></a>
                <a href="javascript:void(0)" id="searchs"><img alt="" src="images/fdj.png"></a>
            </div>
            <!-- <div class="top-header top-stock" id="stock_content" style="display: none;">
                <p class="top-scroll" style="width:5rem;">
                    <span class="scroll-abbr" id="scroll_abbr"></span>
                    <span class="scroll-code" id="scroll_code"></span>
                </p>
                <p class="top-scroll" style="width:6rem;">
                    <span class="scroll_last_px" model-bind="last_px" id="scroll_last_px"></span>
                    <span class="scroll_px_change" model-bind="px_change" id="scroll_px_change"></span>
                    <span class="scroll_px_change_rate" model-bind="px_change_rate" id="scroll_px_change_rate"></span>
                </p>

            </div> -->
        </div>
        <div style="clear: both;"></div>
        <div id="real" class="data">
            <div class="data-block real-price">
                <p id="last_px_wrapper"><span class="span1" model-bind="last_px" id="last_px"></span></p>
                <p class="t-margin"><span class="span2" model-bind="px_change" id="px_change"></span><span class="span2" model-bind="px_change_rate" id="px_change_rate"></span></p>
            </div>
            <div id="pankou">
                <div class="data-block">
                    <p><span class="span3 t-padding">开</span><span class="span4 open" model-bind="open_px" id="open_px"></span></p>
                    <p><span class="span3 t-padding2">高</span><span class="span4 height" model-bind="high_px" id="high_px"></span></p>
                </div>
                <div class="data-block">
                    <p id="balance"><span class="span3 t-padding" model-bind="blanceAcount">额</span><span class="span5" model-bind="business_balance" id="business_balance" style="display:none;"></span><span class="span5" model-bind="business_amount" id="usa_amount" style="display:none;"></span></p>
                    <p><span class="span3 t-padding2">低</span><span class="span4 low" model-bind="low_px" id="low_px"></span></p>
                </div>
                <div class="data-block">
                    <p><span class="span3 t-padding">换手</span><span class="span5" model-bind="turnover_ratio" id="turnover_ratio"></span></p>
                    <p><span class="span3 t-padding2">量比</span><span class="span4" model-bind="vol_ratio" id="vol_ratio"></span></p>
                </div>
            </div>
            <div id="kline_pankou" style="display:none">
                <div class="data-block" style="width:1.4rem;">
                    <p><span class="span3 t-padding">开</span><span class="span4 open" model-bind="open_px" id="kline_open_px"></span></p>
                    <p><span class="span3 t-padding2">高</span><span class="span4 height" model-bind="high_px" id="kline_high_px"></span></p>
                </div>
                <div class="data-block">
                    <p><span class="span3 t-padding">换</span><span class="span5" model-bind="turnover_ratio" id="kline_turnover_ratio"></span></p>
                    <p><span class="span3 t-padding2">低</span><span class="span4 low" model-bind="low_px" id="kline_low_px"></span></p>
                </div>
                <div class="data-block">
                    <p><span class="span3 t-padding">量</span><span class="span4" model-bind="business_amount" id="kline_business_amount"></span></p>
                    <p><span class="span3 t-padding2">额</span><span class="span4" model-bind="business_balance" id="kline_business_balance"></span></p>
                </div>
            </div>
            <div id="hsdata" class="hsdata"><div id="show_data" class="hs_pic"></div></div>
        </div>
        <div id="hou_pan" style="display: none;">
            <ul style="padding-left:.4rem;"><li><h3 id="pre_type">昨收</h3><p model-bind="preclose_px"></p></li>
                <li><h3>内盘</h3><p model-bind="business_amount_in" class="quote-bg-fall" id="business_amount_in"></p></li>
                <li><h3>流通市值</h3><p model-bind="circulation_value"></p></li>
                <li><h3>涨停</h3><p model-bind="up_px" class="quote-bg-rise" id="up_px"></p></li>
                <li><h3>振幅</h3><p model-bind="amplitude"></p></li>
                <li><h3>外盘</h3><p model-bind="business_amount_out" class="quote-bg-rise" id="business_amount_out"></p></li>
                <li><h3>总市值</h3><p model-bind="market_value"></p></li>
                <li><h3>跌停</h3><p model-bind="down_px" class="quote-bg-fall" id="down_px"></p></li>
                <li><h3>每股收益</h3><p model-bind="eps"></p></li>
                <li><h3>委比</h3><p model-bind="entrust_rate" id="entrust_rate"></p></li>
                <li><h3>市盈率</h3><p model-bind="pe_rate"></p></li>
                <li><h3>市净率</h3><p model-bind="dyn_pb_rate"></p></li></ul>
        </div>
        <div id="trend" class="time" style="margin-bottom: none;">

            <div class="kline stock_line">
                <p><a href="javascript:void(0);" id="click_timeline" class="hover" line_type="timeline">分时</a></p>
                <p><a href="javascript:void(0);" id="click_trend5day" line_type="trend5day">五日</a></p>
                <p id="kday"><a href="javascript:void(0);" id="click_6" line_type="6">日K</a></p>
                <p id="kweek"><a href="javascript:void(0);" id="click_7" line_type="7">周K</a></p>
                <p id="kmonth"><a href="javascript:void(0);" id="click_8" line_type="8">月K</a></p>
                <p id="kmore">
                    <a href="javascript:void(0);" line_type="minutekline" id="minutekline">
                        <span id="minute">分钟</span>

                        <span id="ul_list" style="display: none;">
							<span line_type="1">1分钟</span>
							<span line_type="2">5分钟</span>
							<span line_type="3">15分钟</span>
							<span line_type="4">30分钟</span>
							<span line_type="5">60分钟</span>
							<i></i>
						</span>
                    </a>
                    <i class="select" id="show_min"></i>
                </p>
            </div>
            <div class="time-inner">
                <div class="con-hight" id="con-hight"> </div>   <!--默认高度-->
                <div id="s_loading" style="text-align: center;display: none;">
                </div>
                <div id="s_chart" style="display: none;">
                </div>
            </div>
        </div>
        <div id="news" class="news" style="display: none;">
            <!-- <div class="swiper-container thumbs-cotnainer border-gradient"> -->
            <div class="kline stock_info_all swiper-container-horizontal swiper-container-free-mode" id="newsTab">
                <div class="swiper-wrapper">
                    <div id="finace" class="swiper-slide">
                        <p><a href="javascript:void(0);" linkto=".stock_finace_list">资金</a></p>
                    </div>
                    <div id="press" class="swiper-slide">
                        <p><a href="javascript:void(0);" t_type="news" linkto=".stock_news_list">新闻</a></p>
                    </div>
                    <div id="annou" class="swiper-slide">
                        <p><a href="javascript:void(0);" t_type="announcement" linkto=".stock_announcement_list">公告</a></p>
                    </div>
                    <div id="reserach" class="swiper-slide">
                        <p><a href="javascript:void(0);" linkto=".reserach_news_list">研报</a></p>
                    </div>
                    <div id="deep" class="swiper-slide">
                        <p><a href="javascript:void(0);" t_type="announcement" linkto=".deep_data">深度</a></p>
                    </div>
                    <div id="doctor" class="swiper-slide">
                        <p><a href="javascript:void(0);" linkto=".F10">F10</a></p>
                    </div>
                    <div id="data" class="swiper-slide">
                        <p><a href="javascript:void(0);" linkto=".stock_info">资料</a></p>
                    </div>
                    <div id="stockDia" class="swiper-slide">
                        <p><a href="javascript:void(0);" linkto=".stockDia"></a></p>
                    </div>


                </div>

                <div id="shadowWindow" class="shadow">&nbsp;</div>
            </div>

            <div class="news-inner">
                <ul class="stock_news_list news_list">
                </ul>
                <div id="jzlr" class="clearfix" style="height:3.5rem;background:#fff;">
                    <p>
                        <i class="hotblue"></i>
                        <span>资金流向（万元）</span>
                    </p>
                    <div id="zjlr" style="width:7.5rem;height:3rem">
                    </div>
                </div>
                <ul class="stock_info news_list" style="display: none;">
                    <div style="margin:10px;color:rgb(42, 32, 32);" class="info_list comp_info">
                        <p class="comp_title">公司简介</p>
                        <table style="width:100%;margin: 10px 0;">
                            <tr>
                                <td style="width:20%">公司名称</td><td><p model-bind="chi_name"></p></td>
                            </tr>
                            <tr>
                                <td>注册资本</td><td><p model-bind="ipo_proceeds"></p></td>
                            </tr>
                            <tr>
                                <td>所属行业</td><td><p model-bind="indurstry"></p></td>
                            </tr>
                            <tr>
                                <td>所属地域</td><td><p model-bind="reg_addr"></p></td>
                            </tr>
                            <tr>
                                <td>主营业务</td><td><p model-bind="main_business"></p></td>
                            </tr>
                        </table>

                        <p class="comp_title">收入构成</p>
                        <table class="profileinfo" style="width:100%">
                        </table>
                    </div>
                    <div style="padding:0 10px 10px 10px;" class="info_list gd_info">
                        <p class="comp_title">十大流通股股东<span>持股比例</span></p>
                        <table style="width: 100%;">
                            <thead>

                            </thead>
                            <tbody class="gd_info_list">

                            </tbody>
                        </table>
                    </div>
                    <div style="padding:0 10px;" class="info_list cw_info">
                        <p class="comp_title">财务</p>
                        <table style="width:100%">
                            <tr>
                                <td>基本每股收益</td><td style="text-align: right;" model-bind="basic_eps"></td>
                            </tr>
                            <tr><td>每股净资产</td><td style="text-align:right;" model-bind="naps">ds</td></tr>
                            <tr><td>每股公积金</td><td style="text-align:right;" model-bind="accumulation_fundps"></td></tr>
                            <tr><td>每股未分配利润</td><td style="text-align:right;" model-bind="undivided_profit"></td></tr>
                            <tr><td>每股经营性现金流</td><td style="text-align:right;" model-bind="oper_cash_flowps"></td></tr>
                            <tr><td>滚动市盈率(最新)</td><td style="text-align:right;" model-bind="pe"></td></tr>
                            <tr><td>目前可流通股</td><td style="text-align:right;" model-bind="float_share"></td></tr>
                            <tr><td>总股本</td><td style="text-align:right;" model-bind="total_shares"></td></tr>
                            <tr><td>营业收入同比增长</td><td style="text-align:right;" model-bind="oper_revenue_growrate"></td></tr>
                            <tr><td>净利润同比增长</td><td style="text-align:right;" model-bind="net_profit_growrate"></td></tr>
                            <tr><td>净资产收益率(摊薄)</td><td style="text-align:right;" model-bind="roe"></td></tr>
                            <tr><td>市净率(最新)</td><td style="text-align:right;" model-bind="pb"></td></tr>
                        </table>
                    </div>
                </ul>
            </div>
            <div class="tips" style="display: none;"><span id="nomore">已全部显示</span></div>
            <div class="pull_refresh" style="display: none;"><span><img alt="" src="images/load.gif">&nbsp;&nbsp;正在加载...<span></span></span></div>
            <div class="pull_refresh" style="display: none;"><span><img alt="" src="images/load.gif">&nbsp;&nbsp;正在加载...<span></span></span></div>
        </div>
        <div id="up_down" class="news bordst" style="display: none;">
            <div class="kline stock_info_all_bord">
                <p><a href="javascript:void(0);" class="hover" linkto="bord_zf_list">领涨</a></p>
                <p><a href="javascript:void(0);" linkto="bord_df_list">领跌</a></p>

            </div>
            <div class="news-inner bord_zd">
                <ul id="up_down_list" class="bord_zf_list bord_list"></ul>
                <ul class="bord_df_list bord_list"></ul>
            </div>
        </div>
        <div id="hkm" class="news company_info" style="display: none;">

        </div>
        <div id="xbhs" class="news news_fb" style="color:#fff">
            <div class="kline" id="stickyTab">
                <p><a href="javascript:void(0);">名称</a></p>
                <p><a href="javascript:void(0);">策略</a></p>
                <p class="newprice"><a href="javascript:void(0);" id="newprice">最新价</a>
                    <i class="up"></i>
                    <i class="down"></i>
                </p>
                <p class="ratechange"><a href="javascript:void(0);" id="ratechange">涨跌幅</a>
                    <i class="up"></i>
                    <i class="down active"></i>
                </p>
            </div>
            <div class="news-inner bord_zd none-padding" id="bordStyle">
                <ul id="xb_down_list" class="bord_zf_list bord_list" style="background-color:#fff;"></ul>
                <div class="show_all" style="display:none;"><span id="nomore">已全部显示</span></div>
                <div class="pull_refresh" style="display: none;"><span><img alt="" src="images/load.gif">&nbsp;&nbsp;正在加载...<span></span></span></div>
            </div>


        </div>
        <div id="usa" class="news company_info_us" style="display: none;">
            <!----><div class="kline us_stock_info_all " id="usTab">

            <p style="width:50%"><a href="javascript:void(0);" linkto=".us_finace_info" class="hover">财务</a></p>
            <p style="width:50%"><a href="javascript:void(0);" linkto=".company_info_us" class="">资料</a></p>

        </div>
            <div class="news-inner">
                <ul class="company_info_us news_list" style="">
                    <div style="margin:10px;color:rgb(42, 32, 32)" class="info_list comp_info">
                        <table id="finace_list" style="width:100%" class="comp_table company_info_us">
                            <tr class="labeltap"><td colspan="2" model-bind="profit" style="font-size:.32rem;padding:2px 0;font-weight: bold;"></td></tr>
                            <tr> <td>税前利润</td><td><p model-bind="ebt"></p></td></tr>
                            <tr><td>截止日期</td><td><p model-bind="endDate"></p></td></tr>
                            <tr> <td>毛利</td><td><p model-bind="grossProfit"></p></td></tr>
                            <tr> <td>净利润</td><td><p model-bind="netIncome"></p></td> </tr>
                            <tr><td>营业净利润</td><td><p model-bind="netIncomeCont"></p></td></tr>
                            <tr> <td>总收入</td><td><p model-bind="totalRevenue"></p></td></tr>

                            <tr class="labeltap"> <td colspan="2" model-bind="blance" style="font-size:.32rem;padding:2px 0;font-weight: bold;"></td></tr>
                            <tr> <td>现金</td><td><p model-bind="cashAndEquivalents"></p></td></tr>
                            <tr> <td>截止日期</td><td><p model-bind="endDate"></p></td></tr>
                            <tr> <td>长期负债</td><td><p model-bind="lTDebt"></p></td></tr>
                            <tr>  <td>资产总计</td><td><p model-bind="totalAssets"></p></td></tr>
                            <tr> <td>流动资产</td><td><p model-bind="totalCurrentAssets"></p></td></tr>
                            <tr><td>流动负债总额</td><td><p model-bind="totalCurrentLiabilities"></p></td></tr>
                            <tr><td>所有者益合计</td><td><p model-bind="totalEquity"></p></td></tr>
                            <tr><td>负债总计</td><td><p model-bind="totalLiabilities"></p></td></tr>

                            <tr class="labeltap"> <td colspan="2" model-bind="cashFlow" style="font-size:.32rem;padding:2px 0;font-weight: bold;"></td></tr>
                            <tr> <td>截止日期</td><td><p model-bind="endDate"></p></td> </tr>
                            <tr><td>现金及现金等价物</td><td><p model-bind="netCF"></p></td></tr>
                            <tr> <td>筹资活动现金</td><td><p model-bind="netCFFinancing"></p></td></tr>
                            <tr> <td>投资活动现金</td><td><p model-bind="netCFInvesting"></p></td></tr>
                            <tr> <td>经营活动现金</td><td><p model-bind="netCFOperating"></p></td></tr>

                            <tr class="labeltap"> <td colspan="2" model-bind="finIndex" style="font-size:.32rem;padding:2px 0;font-weight: bold;"></td></tr>
                            <tr> <td>每股收益</td><td><p model-bind="ePS"></p></td></tr>
                            <tr> <td>截止日期</td><td><p model-bind="endDate"></p></td></tr>
                            <tr>  <td>存货周转率</td><td><p model-bind="inventoryTRate"></p></td></tr>
                            < tr> <td>公司简介</td><td><p model-bind="netProfitYOY"></p></td></tr>
                            <tr>  <td>营业利润率</td><td><p model-bind="operatingProfitMargin"></p></td></tr>
                            <tr> <td>净资产收益率</td><td><p model-bind="rOE"></p></td></tr>
                        </table>
                        <table id="com_info_list" style="width:100%" class="comp_table company_info_us">

                            <tr><td>上市日期</td><td><p model-bind="list_date"></p></td></tr>
                            <tr><td>省份/州</td><td><p model-bind="state"></p></td></tr>
                            <tr> <td>证券类别</td><td><p model-bind="secu_category"></p></td></tr>
                            <tr> <td>上市板块</td><td><p model-bind="listed_sector"></p></td> </tr>
                            <tr><td>证券市场</td><td><p model-bind="secu_market"></p></td></tr>
                            <tr> <td>公司中文名称</td><td><p model-bind="chi_name"></p></td></tr>
                            <tr> <td>公司简介</td><td><p model-bind="brief_intro"></p></td></tr>
                            <tr> <td>城市</td><td><p model-bind="city"></p></td></tr>
                            <tr> <td>国家</td><td><p model-bind="country"></p></td></tr>
                            <tr> <td>公司英文名称</td><td><p model-bind="eng_name"></p></td></tr>
                            <tr>  <td>公司英文简称</td><td><p model-bind="eng_name_abbr"></p></td></tr>
                            <tr> <td>公司简介</td><td><p model-bind="introduction"></p></td></tr>
                        </table>
                    </div>

                </ul>
            </div>
        </div>
        <div id="menu" class="fs" style="display: none;">
            <div class="menubg bottom_funs clearfix">
                <div class="stock" id="block">
                    <h2 class="prod_name"></h2>
                    <p class="zs"></p>
                </div>
                <ul class="clearfix" id="simulation">
                    <li id="up_count"> <div class="s_count">上涨 <span model-bind="rise_count"></span> </div> </li>
                    <li id="down_count"><div class="s_count"> 下跌<span model-bind="fall_count"></span> </div> </li>


                    <li id="addstock">
                        <a id="add_stock" class="add_btn">
                            <img alt="" src="images/bottom_funs_4.png">
                            <p>加自选</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="error-infos" style="display: none;">
            <div class="error-text"></div>
        </div>
    </div>
    <div id="finacechart_template" style="display:none;">
        <div id="finacechart">
            <p>
                <i class="hotblue"></i>
                <span>今日资金流向（万元）</span>
            </p>
            <canvas id="chartfinace" width="400" height="200">
            </canvas>
        </div>
        <div>
            <div id="mainLeft">
                <ul>
                    <li>主力流入<span class="mainIn red"></span></li>
                    <li>主力流出<span class="mainOut green"></span></li>
                    <li>主力净流入<span class="mainAll"></span></li>
                </ul>
            </div>
            <div id="drawMain">
                <canvas id="MainflowBar" width="200" height="100">
                </canvas></div>
        </div>
        <div id="zlzj" class="clearfix">
            <p>
                <i class="hotblue"></i>
                <span>最近5日主力资金流向（万元）</span>
            </p>
            <canvas id="zlzjBar" width="400" height="200"></canvas></div>

    </div>

    <div id="mask" class="mask" style="display: none;"></div>
    <!-- 免责声明弹框 -->
    <div id="disclaimer">
        <div class="disclaimer_content">
            <h3>温馨提示</h3>
            <p>根据港交所规定，港股行情延时15分钟</p>
            <div class="detail_content">【免责声明】香港交易所资讯服务有限公司、其控股公司及／或该等控股公司的任何附属公司均竭力确保所提供信息的准确和可靠度，但不能保证其绝对准确和可靠，且亦不会承担因任何不准确或遗漏而引起的任何损失或损害的责任（不管是否侵权法下的责任或合约责任又或其它责任）</div>
            <div class="iKnow">知道了</div>
        </div>
    </div>

    <div id="infonet" style="display:none;height:auto!important;height:400px;min-height:400px;">
        <div class="head" style="padding-top:0.2rem;">
            <div>
                <h3 model-bind="tnews" id="tnews">
                </h3>
                <h5>
                    <span model-bind="date" id="t_date"></span>
                </h5>
            </div>
        </div>
        <article class="articleList">
            <div class="text clearfix" style="padding-bottom: 20px;">
                <div class="text1" id="content" style="line-height: 1.55em; padding: 0 0.3rem;font-size:.32rem; word-break: break-word;" model-bind="content">

                </div>
            </div>
        </article>
    </div>
    <div id="search" style="display:none;">

        <header class="wrapper" id="search_header">
            <!--头部-->
            <div class="am-header theme_color">
                <div class="search_header clearfix">
                    <div class="search_box">
                        <i class="fdj"></i>
                        <input type="text" placeholder="请输入股票代码/拼音简称" style="display: none">
                        <div id="code_m" class="gb"><em id="code_s">请输入股票代码/拼音简称</em></div>
                        <div id="clear_all"><a class="close"></a></div>
                    </div>
                    <div style="position: absolute;width: 1rem;right: 0rem;" id="cancel_div"><a class="cancel font_color" style="margin-right: 0.2rem">取消</a></div>
                </div>
            </div>
            <!--头部-->
        </header>
        <div class="con-transaction">
            <article class="content" style="margin-top: 0rem;padding-top: 0.8rem;background-color:#f3f3f3;padding-bottom:0;" id="search_list">
                <section>
                    <div class="search search_n_list" id="search_list_div">

                    </div>
                </section>
            </article>


        </div>

        <!--底部键盘-->
        <div class="am-keyboard Searchbottom" style="display:none;border-top: 1px solid #8c8c8c" id="num_div">
            <div class="txt_yuyin txt_yuyinhover" style="display: none;">
                <i></i>
            </div>
            <table class="s-key" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td width="25%"><a>600</a></td>
                    <td width="25%"><a>1</a></td>
                    <td width="25%"><a>2</a></td>
                    <td width="25%"><a>3</a></td>
                </tr>
                <tr>
                    <td><a>300</a></td>
                    <td><a>4</a></td>
                    <td><a>5</a></td>
                    <td><a>6</a></td>
                </tr>
                <tr>
                    <td><a>00</a></td>
                    <td><a>7</a></td>
                    <td><a>8</a></td>
                    <td><a>9</a></td>
                </tr>
                </tbody>
            </table>
            <table class="s-key" cellpadding="0" cellspacing="0">
                <tfoot>
                <tr>
                    <td colspan="1" width="20%" class="keyboard-gary"><a class="ft_50" id="change_E">ABC</a></td>
                    <td width="20%" class="keyboard-gary"><a id="hide_keyBord">隐藏</a></td>
                    <td width="20%"><a class="ft_56" id="zero">0</a></td>
                    <td width="20%" class="keyboard-gary"><a id="clear_one_num"><i class="icon-closeKey">×</i></a></td>
                    <td width="20%" class="keyboard-gary"><a id="sure_btn">确定</a></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!--底部键盘-->

        <!--底部键盘2-->
        <div class="Searchbottom s-key s-key-tab" style="display:none;overflow:visible;" id="E_div">
            <div class="txt_yuyin txt_yuyinhover" style="display: none;">
                <i></i>
            </div>
            <div class="tab1">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10%"><a>Q</a></td>
                        <td width="10%" class="left-click" style="display:none;" id="bigQ"><span style="margin-left:-.31rem;">Q</span></td>
                        <td width="10%"><a>W</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigW"><span style="margin-left:-.28rem;">W</span></td>
                        <td width="10%"><a>E</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigE"><span>E</span></td>
                        <td width="10%"><a>R</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigR"><span>R</span></td>
                        <td width="10%"><a>T</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigT"><span style="margin-left:-.22rem;">T</span></td>
                        <td width="10%"><a>Y</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigY"><span style="margin-left:-.22rem;">Y</span></td>
                        <td width="10%"><a>U</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigU"><span>U</span></td>
                        <td width="10%"><a>I</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigI"><span style="margin-left:-.18rem;">I</span></td>
                        <td width="10%"><a>O</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigO"><span>O</span></td>
                        <td width="10%"><a>P</a></td>
                        <td width="10%" class="right-click" style="display:none;" id="bigP"><span>P</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab2">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="11.11111111111111%"><a>A</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigA"><span style="margin-left:-.24rem;">A</span></td>
                        <td width="11.11111111111111%"><a>S</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigS"><span style="margin-left:-.22rem;">S</span></td>
                        <td width="11.11111111111111%"><a>D</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigD"><span style="margin-left:-.24rem;">D</span></td>
                        <td width="11.11111111111111%"><a>F</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigF"><span style="margin-left:-.21rem;">F</span></td>
                        <td width="11.11111111111111%"><a>G</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigG"><span style="margin-left:-.25rem;">G</span></td>
                        <td width="11.11111111111111%"><a>H</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigH"><span style="margin-left:-.24rem;">H</span></td>
                        <td width="11.11111111111111%"><a>J</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigJ"><span style="margin-left:-.22rem;">J</span></td>
                        <td width="11.11111111111111%"><a>K</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigK"><span style="margin-left:-.22rem;">K</span></td>
                        <td width="11.11111111111111%"><a>L</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigL"><span style="margin-left:-.22rem;">L</span></td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab3">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="11.11111111111111%"><a>Z</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigZ"><span style="margin-left:-.23rem;">Z</span></td>
                        <td width="11.11111111111111%"><a>X</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigX"><span style="margin-left:-.23rem;">X</span></td>
                        <td width="11.11111111111111%"><a>C</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigC"><span style="margin-left:-.25rem;">C</span></td>
                        <td width="11.11111111111111%"><a>V</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigV"><span style="margin-left:-.23rem;">V</span></td>
                        <td width="11.11111111111111%"><a>B</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigB"><span style="margin-left:-.23rem;">B</span></td>
                        <td width="11.11111111111111%"><a>N</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigN"><span style="margin-left:-.26rem;">N</span></td>
                        <td width="11.11111111111111%"><a>M</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigM"><span style="margin-left:-.27rem;">M</span></td>
                        <td width="14.8%" class="keyboard-gary close"><a class="class_Main" id="clear_one"><i class="icon-closeKey">×</i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab4">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="28%"><a class="ft_32" id="change_num">123</a></td>
                        <td class="keyboard-gary" width="44%"><a class="ft_32" id="hide_key_E">隐藏键盘</a></td>
                        <td width="28%"><a class="ft_32" id="sure_btn_E">确定</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--底部键盘2-->




        <div class="black_shield" id="confirm" style="display: none;">
            <div class="popupys_bg">
                <div class="popupys">
                    <p>清除历史记录？</p>
                    <div class="btns">
                        <a href="javascript:;" class="cancle">取消</a>
                        <a href="javascript:;" class="sure">清除</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--quote end -->
    <div id="mystock" style="display:none;background: #f3f3f3;" class="optional">
        <header class="wrapper">
            <!--头部-->
            <div class="am-header am-headerfb theme_color">
                <div class="search_header clearfix">
                    <input class="edit_srh header-fdj" placeholder="请输入股票代码/拼音简称" readonly="true">
                    <i></i>
                </div>
            </div>
            <!--头部-->
        </header>
        <div class="con-transaction">
            <article class="content_new">
                <section>
                    <div class="optional">
                        <div class="topmenu clearfix">
                            <div id="szzs_stock">
                                <div class="top_stock" data-id="1A0001.SS">
                                    上证指数
                                    <h3 class="sz1 last_px1"></h3>
                                    <h4 class="sz1 clearfix">
                                        <span class="px_change1"></span>
                                        <span class="px_change_rate1"></span>
                                    </h4>
                                </div>
                                <div class="top_stock" data-id="2A01.SZ">
                                    深证成指
                                    <h3 class="sz2 last_px2"></h3>
                                    <h4 class="sz2 clearfix">
                                        <span class="px_change2"></span>
                                        <span class="px_change_rate2"></span>
                                    </h4>
                                </div>
                                <div class="top_stock" data-id="399006.SZ">
                                    创业板指
                                    <h3 class="sz3 last_px3"></h3>
                                    <h4 class="sz3 clearfix">
                                        <span class="px_change3"></span>
                                        <span class="px_change_rate3"></span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div>
                            <table class="optional_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <thead id="optional_thead">
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <a href="javascript:;" class="add_zxg" style="display: none;">
                            <img alt="" src="images/add_zxg.png">
                            添加自选股
                        </a>
                        <!--
                        <div class="login theme_color">同步自选股获取更多权限</div>
                        -->
                        <div class="login theme_color login_theme"></div>
                    </div>
                </section>
            </article>
        </div>
    </div>
    <!--自选股-->
    <div id="optional_edit" style="display:none;background: #f3f3f3;">
        <!-- <header class="wrapper"> -->
        <!--头部-->
        <!--  <div class="am-header">
             <a class="header-Link header-leftLink"><i class="am-icon-arrow-left"></i></a>
             <h1>编辑自选</h1>
         </div> -->
        <!--头部-->
        <!-- </header> -->

        <div class="con-transaction">
            <article class="content_new">
                <section>
                    <div class="edit">
                        <table class="edit_table" style="margin:0;" width="100%" border="0" cellspacing="0" cellpadding="0">
                            <thead>
                            <tr>
                                <th width="13%"></th>
                                <th width="45%">名称代码</th>
                                <th width="18%">置顶</th>
                                <th width="24%">拖动</th>
                            </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <ul class="edit_table">
                        </ul>
                    </div>
                </section>
            </article>
        </div>

        <div class="edit_bottom">





            <a class="all_xz">
                <div class="ui-radio-box">
                    <div class="ui-radio"></div>
                    <input type="hidden" class="ui-radio-value">
                </div>
                <span>全选</span></a>
            <a class="del font_color"><span>删除</span><span class="num"></span></a>
        </div>
    </div><!-- 自选股编辑 -->
    <div id="search" style="display:none;">

        <header class="wrapper" id="search_header">
            <!--头部-->
            <div class="am-header theme_color">
                <div class="search_header clearfix">
                    <div class="search_box">
                        <i class="fdj"></i>
                        <input type="text" placeholder="请输入股票代码/拼音简称" style="display: none">
                        <div id="code_m" class="gb"><em id="code_s">请输入股票代码/拼音简称</em></div>
                        <div id="clear_all"><a class="close"></a></div>
                    </div>
                    <div style="position: absolute;width: 1rem;right: 0rem;" id="cancel_div"><a class="cancel font_color" style="margin-right: 0.2rem">取消</a></div>
                </div>
            </div>
            <!--头部-->
        </header>
        <div class="con-transaction">
            <article class="content" style="margin-top: 0rem;padding-top: 0.8rem;background-color:#f3f3f3;padding-bottom:0;" id="search_list">
                <section>
                    <div class="search search_n_list" id="search_list_div">

                    </div>
                </section>
            </article>


        </div>

        <!--底部键盘-->
        <div class="am-keyboard Searchbottom" style="display:none;border-top: 1px solid #8c8c8c" id="num_div">
            <div class="txt_yuyin txt_yuyinhover" style="display: none;">
                <i></i>
            </div>
            <table class="s-key" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td width="25%"><a>600</a></td>
                    <td width="25%"><a>1</a></td>
                    <td width="25%"><a>2</a></td>
                    <td width="25%"><a>3</a></td>
                </tr>
                <tr>
                    <td><a>300</a></td>
                    <td><a>4</a></td>
                    <td><a>5</a></td>
                    <td><a>6</a></td>
                </tr>
                <tr>
                    <td><a>00</a></td>
                    <td><a>7</a></td>
                    <td><a>8</a></td>
                    <td><a>9</a></td>
                </tr>
                </tbody>
            </table>
            <table class="s-key" cellpadding="0" cellspacing="0">
                <tfoot>
                <tr>
                    <td colspan="1" width="20%" class="keyboard-gary"><a class="ft_50" id="change_E">ABC</a></td>
                    <td width="20%" class="keyboard-gary"><a id="hide_keyBord">隐藏</a></td>
                    <td width="20%"><a class="ft_56" id="zero">0</a></td>
                    <td width="20%" class="keyboard-gary"><a id="clear_one_num"><i class="icon-closeKey">×</i></a></td>
                    <td width="20%" class="keyboard-gary"><a id="sure_btn">确定</a></td>
                </tr>
                </tfoot>
            </table>
        </div>
        <!--底部键盘-->

        <!--底部键盘2-->
        <div class="Searchbottom s-key s-key-tab" style="display:none;overflow:visible;" id="E_div">
            <div class="txt_yuyin txt_yuyinhover" style="display: none;">
                <i></i>
            </div>
            <div class="tab1">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="10%"><a>Q</a></td>
                        <td width="10%" class="left-click" style="display:none;" id="bigQ"><span style="margin-left:-.31rem;">Q</span></td>
                        <td width="10%"><a>W</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigW"><span style="margin-left:-.28rem;">W</span></td>
                        <td width="10%"><a>E</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigE"><span>E</span></td>
                        <td width="10%"><a>R</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigR"><span>R</span></td>
                        <td width="10%"><a>T</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigT"><span style="margin-left:-.22rem;">T</span></td>
                        <td width="10%"><a>Y</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigY"><span style="margin-left:-.22rem;">Y</span></td>
                        <td width="10%"><a>U</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigU"><span>U</span></td>
                        <td width="10%"><a>I</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigI"><span style="margin-left:-.18rem;">I</span></td>
                        <td width="10%"><a>O</a></td>
                        <td width="10%" class="middle-click" style="display:none;" id="bigO"><span>O</span></td>
                        <td width="10%"><a>P</a></td>
                        <td width="10%" class="right-click" style="display:none;" id="bigP"><span>P</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab2">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="11.11111111111111%"><a>A</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigA"><span style="margin-left:-.24rem;">A</span></td>
                        <td width="11.11111111111111%"><a>S</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigS"><span style="margin-left:-.22rem;">S</span></td>
                        <td width="11.11111111111111%"><a>D</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigD"><span style="margin-left:-.24rem;">D</span></td>
                        <td width="11.11111111111111%"><a>F</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigF"><span style="margin-left:-.21rem;">F</span></td>
                        <td width="11.11111111111111%"><a>G</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigG"><span style="margin-left:-.25rem;">G</span></td>
                        <td width="11.11111111111111%"><a>H</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigH"><span style="margin-left:-.24rem;">H</span></td>
                        <td width="11.11111111111111%"><a>J</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigJ"><span style="margin-left:-.22rem;">J</span></td>
                        <td width="11.11111111111111%"><a>K</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigK"><span style="margin-left:-.22rem;">K</span></td>
                        <td width="11.11111111111111%"><a>L</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigL"><span style="margin-left:-.22rem;">L</span></td>

                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab3">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="11.11111111111111%"><a>Z</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigZ"><span style="margin-left:-.23rem;">Z</span></td>
                        <td width="11.11111111111111%"><a>X</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigX"><span style="margin-left:-.23rem;">X</span></td>
                        <td width="11.11111111111111%"><a>C</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigC"><span style="margin-left:-.25rem;">C</span></td>
                        <td width="11.11111111111111%"><a>V</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigV"><span style="margin-left:-.23rem;">V</span></td>
                        <td width="11.11111111111111%"><a>B</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigB"><span style="margin-left:-.23rem;">B</span></td>
                        <td width="11.11111111111111%"><a>N</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigN"><span style="margin-left:-.26rem;">N</span></td>
                        <td width="11.11111111111111%"><a>M</a></td>
                        <td width="11.11111111111111%" class="middle-click" style="display:none;" id="bigM"><span style="margin-left:-.27rem;">M</span></td>
                        <td width="14.8%" class="keyboard-gary close"><a class="class_Main" id="clear_one"><i class="icon-closeKey">×</i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab4">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td width="28%"><a class="ft_32" id="change_num">123</a></td>
                        <td class="keyboard-gary" width="44%"><a class="ft_32" id="hide_key_E">隐藏键盘</a></td>
                        <td width="28%"><a class="ft_32" id="sure_btn_E">确定</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--底部键盘2-->

        <!--底部用现有的-->


        <div class="black_shield" id="confirm" style="display: none;">
            <div class="popupys_bg">
                <div class="popupys">
                    <p>清除历史记录？</p>
                    <div class="btns">
                        <a href="javascript:;" class="cancle">取消</a>
                        <a href="javascript:;" class="sure">清除</a>
                    </div>
                </div>
            </div>
        </div>


    </div><!--搜索-->



    <div id="optional_list" style="display:none;" class="optional">
        <div class="top">
            <div class="top_img">
                <img src="" alt="">
            </div>
            <div class="title">
                <div class="header-info"><span class="name">我的自选股列表</span><span class="date">2016-01-01</span></div>
            </div>
        </div>
        <div class="blank"></div>
        <div class="con-transaction">
            <article class="content_new" style="padding-top: 0">
                <section>
                    <div class="optional">
                        <div style="margin-bottom:1.06rem;overflow: auto;">
                            <table class="optional_table" width="100%" border="0" cellspacing="0" cellpadding="0">
                                <thead>
                                <tr>
                                    <th width="26%">股票代码</th>
                                    <th width="28%">最新价</th>
                                    <th width="46%">涨跌幅</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id='1A0001.SS'>
                                    <td>
                                        <h3>上证指数</h3>
                                        <p>1A0001.SH</p>
                                    </td>
                                    <td class="zxj_z">2938.32</td>
                                    <td><i class="zdf_z">+0.66%</i></td>
                                </tr>
                                <tr id='2A01.SZ'>
                                    <td>
                                        <h3>深证成指</h3>
                                        <p>1A0001.SZ</p>
                                    </td>
                                    <td class="zxj_d">10000.32</td>
                                    <td><i class="zdf_z zdf_d">-0.66%</i></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </article>
        </div>
    </div>
    <!--自选股列表页-->
</div>
<div id="watermark">
</div>


</body>

</html>