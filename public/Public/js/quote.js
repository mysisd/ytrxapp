var sortFlag;
var changeList = "";
var tbswiper;
var scrollFlag = false,
	scrollHeight, oldList = [],
	newList = [],
	isFirst = true,
	isFirstEnter = true,
	finaceList = [],
	infoList = []; //scrollHeight:置顶后滚动的距离
;
(function($) {
	//window.blockFlag;
	App.quoteView.wrap({
		canvas: "time_chart",
		valcanvas: 'canvas_bar',
		size: 20,
		beforeRender: function(arg) {

			var tabLength = 0;
			tbswiper = null;
			$('#newsTab .swiper-slide').each(function(i) {
				if (this.style.display != 'none') {
					$(this).attr('data-id', tabLength)
					tabLength++;
				}
			})
			App.quoteView.tabLength = tabLength;
			//console.log(tabLength)
			//K线图进度条
			$('#s_loading').html('<div style="margin:auto;width: 20%;height:5.58rem"><img src="images/load.gif" style="margin: 100% 0;width: 0.31rem;height: 0.31rem;vertical-align: -.04rem;"></div>').show();
			$('#s_chart').hide();
			$('#news').hide(); //默认资讯隐藏
			$('#time_level').show(); //默认五档、明细是显示的
			$('#hkm').hide(); //目录港股隐藏的
			$('#usa').hide(); //默认美股信息是隐藏
			$('#up_down').hide(); //默认A股涨跌是隐藏的
			$('.time-chart').addClass('hide_chart').removeClass('show_chart'); //默认分时图宽度
			$('#block').hide(); //默认板块隐藏
			$('#buy').hide();
			$('#sell').hide();
			$('#nomore').hide(); //t提示没有信息了	
			$('#hsdata').show(); // 默认有更多按钮
			$('#up_count').hide();
			$('#down_count').hide();
			$('#xbhs').hide();
			$("#ul_list").hide();
			//isFirst = true;
			//20161029 支持自选股组件传参，而达到实现自选股功能
			App.quoteView.isLogin = App.commobj.getValue('isLogin'); //
			App.quoteView.mystocks = App.commobj.getValue('mystocks');
			App.quoteView.token = App.commobj.getValue('token');
			App.quoteView.open_id = App.commobj.getValue('open_id'); //||'aaaaaa';
			App.quoteView.auth_id = App.commobj.getValue('auth_id'); //auth_id
			App.quoteView.zt_token = App.commobj.getValue('zt_token'); //token
			App.quoteView.device = App.commobj.getValue('device');
			App.quoteView.rebackurl = App.commobj.getValue('rebackurl');
			App.quoteView.top_color = App.commobj.getValue('theme_color') ? App.commobj.getValue('theme_color') : 'red';
			App.quoteView.font_color = App.commobj.getValue('font_color') ? App.commobj.getValue('font_color') : 'white';

			$('#top').css('background-color', "#" + App.quoteView.top_color).css('color', "#" + App.quoteView.font_color);
			App.quoteView.furture = ['CCFX', 'XSGE', 'XDCE', 'XZCE'];
			App.quoteView.points = 241;
			App.quoteView.coin = [];
			App.quoteView.datalength = 0;
			arg = arg ? arg : App.commobj.getUrlParam("code");
			//console.log("enter view:", App.quoteView.trendData);
			if (arg) {
				arg = arg.indexOf('=') > -1 ? arg.split('=')[1] : arg; // code = '00001'
				arg = arg.indexOf('&') > -1 ? arg.substring(0, arg.indexOf('&')) : arg;
				//console.log("first:",arg);
				this.init_code(arg)
			} else {
				arg = "000001.SZ";
				//console.log("first:",arg);
				App.quoteView.init_head(arg);
			}
			var title = window.data.control_title;
			title == 1 && App.commobj.getUrlParam("prod_name") && this.init_title();
			!title || title == 0 && App.commobj.changeTitle("行情");
			isFirst = true;
			isFirstEnter = true;
			oldList = [];
		},

		init_code: function(arg) {
			if (arg.indexOf('.') < 0) { //如果输入的代码没有带市场后缀，通过键盘机灵接口检索。市场后缀只支持恒生内部接口数据结构 20161024
				API.wizard(arg, function(ret) {
					var stockc = '';
					var obj = ret.data;
					stockc = obj[0].prod_code;
					App.quoteView.init_head(stockc);
				}, function(err) {
					arg = "000001.SZ";
					App.quoteView.init_head(arg);
				});
			} else {
				App.quoteView.init_head(arg.toUpperCase());
			}
		},
		init_title: function(prod_name, prod_code) {
			//增加股票名称、代码的控制
			//alert(App.commobj.getUrlParam("prod_name")+"lianjie")
			//alert(window.location.href.match(/(\?|&)prod_name=([^&#]*)([&#]|$)/)[2])
			var title = decodeURI(decodeURI(decodeURI((App.commobj.getUrlParam("prod_name"))))) + "(" + decodeURI((App.commobj.getUrlParam("code"))) + ")";
			if (data.control_title == 1) {
				App.commobj.getUrlParam("prod_name") ? App.commobj.changeTitle(title) : App.commobj.changeTitle(prod_name + "(" + prod_code + ")");
			}
		},
		// 云纪添加openid 判断 
		init_stocks: function(open_id) {
			if (open_id) {
				this.getLoginMessage_openid(open_id);
			} else {
				if (App.quoteView.token) {
					this.queryOpstock_openid(App.quoteView.token);
				} else {
					App.quoteView.hasToken = false //表没有token
					this.getLoginMessage_openid(open_id);
				}
			}
		},
		getLoginMessage_openid: function(input_value) {
			// var open_id = input_value;
			var ajax_url;
			var open_id = App.quoteView.open_id;
			if (open_id) {
				ajax_url = _.login_url + "&open_id=" + open_id;
			} else if (App.quoteView.auth_id) {
				open_id = App.quoteView.auth_id;
				ajax_url = _.login_url + "&auth_id=" + open_id;
			}
			//console.log(ajax_url);
			var app_key = _.key + ":" + _.secret;
			var authorization_code = encoder(app_key);
			//console.log(authorization_code);
			if (open_id) {
				$.ajax({ //获取token
					type: 'get',
					url: ajax_url,
					beforeSend: function(request) {
						request.setRequestHeader("authorization", authorization_code);
					},
					success: function(res) {
						var isLogin = 1;
						App.commobj.store("isLogin", isLogin);
						var token = res.data.token;
						if (token) {
							App.commobj.store("token", token);
							App.quoteView.queryOpstock_openid(token);
						}
					}
				});
			}
		},
		queryOpstock_openid: function(token) {
			var that = this;
			var stocks = App.quoteView.mystocks; // 获取到本地的自选股
			if (App.quoteView.hasToken) { //  true， 已成功获取自选，下次无需再发送请求，直接在读取本地自选缓存
				that.qryStock(); // 
				return;
			}
			$.ajax({ //查询用户自选股
				type: 'POST',
				url: _.fstock + "queryOpstock.json",
				beforeSend: function(req) {
					req.setRequestHeader("authorization", token);
				},
				success: function(data) {
					if (data.success == true) {
						//console.log("第一次查询自选股成功");
						var ss = data.data;
						//console.log(ss);
						if (ss) {
							var arr_mystock = "";
							for (var i = 0; i < ss.length; i++) {
								var obj = ss[i];
								//console.log(obj);
								var stock_code = obj.stock_code;
								var stock_market = obj.stock_market;
								var stock = stock_code + "." + stock_market + ",";
								arr_mystock += stock;
							}
							var code_to_save = arr_mystock.substring(0, arr_mystock.length - 1);
							App.quoteView.hasToken = true;
							App.commobj.store("mystocks", code_to_save);
							that.qryStock();
						}
					} else {
						if (data.error_code == "20300003") {
							App.commobj.reLogin(function(res) {
								//console.log("open_id重新授权成功");
								var token = res.data.token;
								//console.log(token);
								App.commobj.store("token", token);
								$.ajax({
									type: 'POST',
									url: _.fstock + "queryOpstock.json",
									beforeSend: function(req) {
										req.setRequestHeader("authorization", token);
									},
									success: function(data) {
										if (data.success == true) {
											//console.log("第二次查询自选股成功");
											var ss = data.data;
											//console.log(ss);
											if (ss) {
												var arr_mystock = "";
												for (var i = 0; i < ss.length; i++) {
													var obj = ss[i];
													//console.log(obj);
													var stock_code = obj.stock_code;
													var stock_market = obj.stock_market;
													var stock = stock_code + "." + stock_market + ",";
													arr_mystock += stock;
												}
												var code_to_save = arr_mystock.substring(0, arr_mystock.length - 1);
												App.quoteView.hasToken = true;
												App.commobj.store("mystocks", code_to_save);
												that.qryStock();
											}
										}
									}
								})
							});

						}
					}

				}
			});
		},
		init_head: function(code) {
			var params = code.toUpperCase().split(",");
			App.quoteView.stock_code = params[0];
			this.query_block(App.quoteView.stock_code);
			var codeLength = App.quoteView.stock_code.split(".").length;
			App.quoteView.market = App.quoteView.stock_code.split(".")[codeLength - 1];
			//console.log(App.quoteView.market);
			App.quoteView.usa = ['A', 'O', 'N'];
			if ($.inArray(App.quoteView.market, ['SS', 'SZ']) > -1) { //A股
				//App.quoteView.aFlag = true;
				App.quoteView.clock_timeline = ['09:30', '11:30', '15:00'];
				App.quoteView.points_timeline = 241;
				App.quoteView.market_type = ['SS', 'SZ'];
				App.quoteView.points_trend5day = 1203;
				App.quoteView.pagecount = 10;

			} else if ($.inArray(App.quoteView.market, App.quoteView.furture) > -1) { //期货
				var n_code = App.quoteView.stock_code.split('.');
				if (App.quoteView.market == "CCFX") {
					App.quoteView.clock_timeline = ['09:15', '11:30', '15:00'];
					var reg = /^(T|TF)[0-9A-Za-z]{4}/g;
					if (reg.test(n_code[0])) {
						App.quoteView.points_timeline = 271;
						App.quoteView.points_trend5day = 1351;
					} else {
						App.quoteView.points_timeline = 241;
						App.quoteView.points_trend5day = 1203;
					}

				} else {
					App.quoteView.clock_timeline = ['21:00', '15:00'];
					if (App.quoteView.market == 'XDCE') {
						App.quoteView.points_timeline = 291;
						var reg = /^(C|PP|L|V)[0-9A-Za-z]{4}/g;
						if (reg.test(n_code[0])) {
							App.quoteView.points_timeline = 241;
							App.quoteView.points_trend5day = 1203;
						} else {
							App.quoteView.points_timeline = 391;
							App.quoteView.points_trend5day = 1801;
						}

					} else if (App.quoteView.market == 'XZCE') {
						App.quoteView.points_timeline = 391;
						App.quoteView.points_trend5day = 1805;
					} else {
						var reg = /^(AL|CU|PB|ZN|NI|AG){1}[0-9A-Za-z]{4}/g;
						if (reg.test(n_code[0])) {
							var _n_code = n_code[0] + "";
							if (_n_code.indexOf('AG') == 0) {
								App.quoteView.points_timeline = 498;
								App.quoteView.points_trend5day = 2495;
							} else {
								App.quoteView.points_timeline = 481;
								App.quoteView.points_trend5day = 2161;
							}
						} else {
							App.quoteView.points_timeline = 361;
							App.quoteView.points_trend5day = 1681;
						}
					}

				}
				App.quoteView.market_type = ['CCFX', 'XSGE', 'XDCE', 'XZCE'];
				$('.time-chart').css('width', '69%');
				$('#time_level').show(); //港股股暂不支持五档、明细数据
				// $('#news').hide();
			} else if ($.inArray(App.quoteView.market, App.quoteView.usa) > -1) { //美股时间和组成点数
				App.quoteView.usFlag = true;
				App.quoteView.aFlag = false;
				App.quoteView.clock_timeline = ['21:30', '04:00'];
				App.quoteView.points_timeline = 391;
				$('.time-chart').css('width', '100%');
				$('#time_level').hide(); //美股暂不支持五档、明细数据
				$('#usa').show();
				App.quoteView.market_type = ['A', 'O', 'N'];
				App.quoteView.points_trend5day = 1951;
			} else if (App.quoteView.market == 'XBHS') { // 板块行情
				App.quoteView.clock_timeline = ['09:30', '11:30', '15:00'];
				App.quoteView.points_timeline = 241;
				$('.time-chart').css('width', '100%');
				$('#simulation').css('width', '100%');
				$('#time_level').hide(); //
				$('#hsdata').hide();
				$('#up_count').show();
				$('#down_count').show();
				//add by wyy
				//增加点中的颜色判断
				$("#ratechange").addClass("active");
				$('#xbhs').show();
				App.quoteView.startpos = 0;
				App.quoteView.sortname = 'px_change_rate';
				App.quoteView.sorttype = 1;
				App.quoteView.pagecount = 20;
				//App.commobj.setCookie("stocks","");
				changeList = "";
				this.bordZDF();
				App.quoteView.points_trend5day = 1203;
			} else { //港股时间
				App.quoteView.clock_timeline = ['09:30', '12:00', '16:00'];
				App.quoteView.points_timeline = 331;
				$('.time-chart').css('width', '100%');
				$('#time_level').hide(); //港股股暂不支持五档、明细数据
				if (App.quoteView.market == 'HKM') {
					$('#hkm').show();
				}
				App.quoteView.market_type = ['HKM'];
				App.quoteView.points_trend5day = 1651;
			}
			if ($('#time_level').css('display') == 'none') {
				$('.time-chart').css('width', '100%');
			}
			//console.log("init:", App.quoteView.trendData);
			this.getMarket();
			$('#time_chart').html('');
			// if ($.inArray(App.quoteView.market, ['SS', 'SZ']) > -1) {
			// 	API.real(App.quoteView.stock_code, 'trade_status,hq_type_code', function(ret) {
			// 		var fields = ret.data.snapshot.fields,
			// 			data = ret.data.snapshot[App.quoteView.stock_code],
			// 			hq_type = data[fields.indexOf("hq_type_code")],
			// 			trade_status = data[fields.indexOf("trade_status")];
			// 		if (trade_status != 'STOPT') {
			// 			// 资金流数据
			// 			hq_type.indexOf('ESA.M') > -1 || hq_type.indexOf('ESA.GEM') > -1 || hq_type.indexOf("ESA.SMSE") > -1 ? DRAW.coins(App.quoteView.stock_code) : "";
			// 		}
			// 	});
			// }
			App.quoteView.preclose_px = 0;
			//App.quoteView.clickType="";//是否显示五档、明细标志
			this.init_stocks(App.quoteView.open_id || App.quoteView.auth_id);
			App.quoteView.indexNum = 0; // 是否为指数跳分时的标志
			return true;
		},
		ready: function() {

		},
		zdTpl: _.template('<%_.each(list,function(row){%>\
			<li code="<%=row.prod_code_all%>" ><a code="<%=row.prod_code%>" href="javascript:;"><p><span class="span1">\
			<%=row.prod_name%></span><span class="span2"><%=row.prod_code%></span></p>\
			<p class="<%=row.cls%>" ><span class="span">\
			<%=row.stock_status%></span></p><p class="<%=row.zd_color%>" ><span class="span3 span">\
			<%=row.last_px%></span></p><p class="<%=row.zd_color%>"><span class="span4">\
			<%=row.px_change_rate%></span></p></a></li><%})%>'),
		events: {
			"click .stock_line p a, #ul_list span": "toggleStockLine",
			"click .stock_info_all p a": "toggleNews",
			"click .level-nav  a": "tradeMin",
			"click canvas": "unbindTogle",
			"click .level-data ": "tradeMin",
			"click #buy": "simaf",
			"click #sell": "simaf",
			"click #abuy": "simaf",
			"click #asell": "simaf",
			"click #add_stock": "add_stock",
			"click #searchs": "get_auth",
			"click .stock_info_all_bord p a": "toggleZDB",
			"click .us_stock_info_all p a": "togglefin_com",
			"click #top": "rebackurl",
			"click #up_down_list li a, .bord_df_list li a, #block, #xb_down_list li": "turn_new",
			"click #real": "control_houpan", //更多盘口数据
			// "click " : 'turn_new', //板块跳转 
			"click .newprice, .ratechange": 'sortlist',
			"click .top-left, .top-right": "changeStock",
			"click #shadowWindow": "slideToRight" //
		},
		rebackurl: function() { //回退
			history.go(-1);
		},
		sortlist: function(e) { //排序
			// $('#xbhs .kline').removeClass('xbhs');
			App.commobj.removeDisclaimer();
			sortFlag = true;
			$(".show_all,.pull_refresh").hide();
			$("#xb_down_list").html("");
			App.quoteView.datalength = 0;
			var el = $(e.currentTarget);
			var cls = "active";
			if (!el.find('a').hasClass(cls)) {
				el.find('a').addClass(cls);
				el.siblings('p').find('a').removeClass(cls);
			}
			//el.find('a').addClass('active').siblings('p').find('a').removeClass('active');
			var cla = el.attr('class');
			if (cla == 'newprice') {
				App.quoteView.sortname = 'last_px';
			} else {
				App.quoteView.sortname = 'px_change_rate';
			}
			el.siblings('p').find('i').removeClass('active');
			var iup = el.find('.up');
			if (iup.hasClass('active')) {
				iup.removeClass('active').siblings('i').addClass('active');
				App.quoteView.sorttype = 1;
			} else {
				iup.addClass('active').siblings('i').removeClass('active');
				App.quoteView.sorttype = 0;
			}

			App.quoteView.startpos = 0;
			changeList = "";
			oldList = [];
			this.bordZDF();
		},
		turn_new: function(e) {
			var code = $(e.currentTarget).attr('code');
			changeList = $(e.currentTarget).attr("id") == "block" ? code : changeList;
			var stockList = changeList.split(",");
			stockList[stockList.length - 1] == "" ? stockList.splice(stockList.length - 1, 1) : "";
			var length = stockList.length;
			//获得下标
			var index = $.inArray(code, stockList),
				list = "";
			for (var i = 0; i < length; i++) {
				if (index < 30) {
					if (i <= 60) {
						list += stockList[i] + ',';
					}
				} else if (index + 30 > length) {
					if (i >= length - 61) {
						list += stockList[i] + ',';
					}
				} else {

					if (i >= index - 30 && i <= index + 30) {
						list += stockList[i] + ',';
					}
				}
			}
			//console.log(list);
			App.commobj.setCookie("stocks", list);
			$(".show_all,.pull_refresh").hide();
			$(".data-block .span2").css("font_size", ".35rem");
			//无记录跳转
			var replace_url = location.href.replace(/(?![?&])(code)=.*/, "code=" + code);
			//var url = location.origin+location.pathname+'#quote?code=' + code;
			window.location.replace(replace_url);

		},

		stocktimer: function() {
			clearInterval(App.quoteView.quoteTimer);
			var that = this;
			App.quoteView.quoteTimer = setInterval(function() {
				var real_fields = 'trade_status,hq_type_code'; //判断集合竞价、盘中交易时间里，这只股票代码是否可以交易
				API.real(App.quoteView.stock_code, real_fields, function(ret) {
					var fields = ret.data.snapshot.fields;
					var data = ret.data.snapshot[App.quoteView.stock_code];
					var hq_type = data[fields.indexOf("hq_type_code")];
					if (data) {
						var trade_status = data[fields.indexOf("trade_status")];
						if (trade_status == 'TRADE' || trade_status == 'OCALL') {
							//debugger;
							that.readStockData.call(that);
							that.intervalTimeline.call(that);
							if ($.inArray(App.quoteView.market, ['SS', 'SZ']) > -1) {
								hq_type.indexOf('ESA.M') > -1 || hq_type.indexOf('ESA.GEM') > -1 || hq_type.indexOf("ESA.SMSE") > -1 ? DRAW.coins(App.quoteView.stock_code) : "";
							}
						}
					}
				});
			}, 8000);
		},
		 
		get_auth: function() {
			var url = location.href.replace(/#.*\?/, "#search?");
			window.location.replace(url);
		},
		simaf: function(e) {
			//进入仿真添加离开当前视图标志，区别于回退离开 20161029
			App.quoteView.leave = true;
			var auth_id; //='A000000000662579';
			if (App.quoteView.auth_id) {
				auth_id = App.quoteView.auth_id;
			}
			var el = $(e.currentTarget),
				idval = el.attr('id');
			if (idval.indexOf("a") > -1)
				idval = idval.substring(1, idval.length);
			var open_id = App.quoteView.open_id;
			//auth_id="A000000001655372";
			var local_auth = App.commobj.getValue('auth_id');
			var local_open = App.commobj.getValue('open_id');
			var token = App.quoteView.token || App.commobj.getValue('token');
			if (window.data.tradeUrl) { // 投资赢家跳交易
				var trade_type;
				if (idval == "buy" || idval == "abuy") {
					trade_type = 'purchase_new';
				} else if (idval == "sell" || idval == "asell") {
					trade_type = 'sell_new';
				}
				window.location.href = window.data.tradeUrl + '/view/' + trade_type + '.html?stock_code=' + App.quoteView.stock_code + '&stock_name=' + App.quoteView.secu_abbr;
				return;
			}
			if ((local_auth || local_open) && _.display != 'z') { // 跳仿真交易
				//var turn_url = 'auth_id';
				// if (auth_id != local_auth) {
				// 	App.commobj.store('auth_id', auth_id);
				// 	turn_url = 'auth_id';
				// }
				// if (open_id != local_open) {
				// 	App.commobj.store('open_id', open_id);
				// 	turn_url = 'open_id';
				// }
				var turn_url;
				if (local_auth) {
					turn_url = 'auth_id';
				}
				if (local_open) {
					turn_url = 'open_id';
				}
				var tabColor = '_' + window.data.tabColor.substring(1, window.data.tabColor.length)
				window.location.href = _.smalight + "?" + turn_url + "=" + local_auth + "&t=" + tabColor + "#entrust?tabName=" + idval + "&code=" + App.quoteView.stock_code;
			}
			// else if (App.quoteView.zt_token && token) { // 跳展厅交易
			// 	App.commobj.store('token', token);
			// 	var reurl = _.smaRebackUrl + "?code=" + App.quoteView.stock_code;
			// 	var sellparams = "";
			// 	if ($.inArray(App.quoteView.market, App.quoteView.furture) > -1) {
			// 		_.smalight = _.smafurture;
			// 		if (idval == 'sell') {
			// 			sellparams = "&is_open=0"; //卖出
			// 		}
			// 		idval = 'entrust';
			// 	}
			// 	window.location.href = _.smalight + "ftenant/user/loginWithSign.json?token=" + (App.quoteView.zt_token || token) + "&user_source=8&tabName=" + idval + "&code=" + App.quoteView.stock_code + sellparams + "&reBackUrl=" + reurl;
			// }
			else {
				$('.error-text').html('请登录券商资金账户！');
				$('.error-infos').show();
				setTimeout(function() {
					$('.error-infos').fadeOut(1000)
				}, 1000)
			}

		},

		_swiper: function() {
			$('swiper-wrapper').click(function(e) {
				return true;
			});
		},
		//查询股票所属板块
		query_block: function(code) {
			var blocks = "" /*,changeList=""*/ ;
			API.block_query(code, function(data) {
				var list = data.data[code];
				for (var i = 0; i < list.length; i++) {
					var indblock = list[i][2];
					// if(indblock=='XBHK.HGT'){
					// 	continue;
					// }
					if (indblock.split('.')[1] == 'HY') {
						blocks = list[i][0] + "." + indblock.split(".")[0]; //拼接行业板块代码
						break;
					}
				}

				if (list.length > 0 && blocks.length > 6) {
					$('#block').attr('code', blocks);
					//changeList = blocks;
					$('#block').show(); //有板块信息
					var fields = 'last_px,prod_name,high_px,low_px,px_change,px_change_rate';
					API.sort(blocks, fields, function(data) {
						var stock_quote = data.data['sort'],
							list = [];
						list = stock_quote[blocks];
						$('.stock .prod_name').html(list[1]);
						if (list[5] < 0) {
							$('.stock p').html(list[5] + "%").attr('class', 'ds');
						} else if (list[5] > 0) {
							$('.stock p').html(list[5] + "%").attr('class', 'zs');
						} else {
							$('.stock p').html("--").attr('class', 'ps');
						}

					});
				} else { //没有板块信息，则隐藏掉板块模块
					$('#block').hide(); //
				}
				// API.menuControl();
				if ($('#block').css('display') == 'block') {
					$('#simulation').css('width', '75%');
				} else {
					$('#simulation').css('width', '100%');
				}

			});
		},
		// 20161029 改造自选股接入行情分时组件
		add_stock: function(e) {
			var stock_code = App.quoteView.stock_code,
				el = $(e.currentTarget);
			STOCK.add_stock(stock_code, el);
		},
		//查询个股是否为自选股
		qryStock: function(e) {
			var that = this;
			var mystock = App.commobj.getValue('mystocks');
			if (mystock) {
				mystock = mystock.split(',');
				if ($.inArray(App.quoteView.stock_code, mystock) > -1) {
					$("#add_stock").attr("class", "del_btn");
					$('#add_stock').find('img').attr('src', 'images/bottom_funs_5.png');
					$('#add_stock').find('p').eq(0).html('删除');
				} else {
					$("#add_stock").attr("class", "add_btn");
					$('#add_stock').find('img').attr('src', 'images/bottom_funs_4.png');
					$('#add_stock').find('p').eq(0).html('加自选');
				}
			}
		},
		unbindTogle: function(e) {
			$(this).unbind('click');
		},
		changeStock: function(e) {
			//获得自选股列表
			//debugger;
			App.commobj.removeDisclaimer();
			window.scrollAble = true;
			var mystocks = App.commobj.getCookie('stocks');
			var stock_code,
				stockList = mystocks.split(","),
				$this = e.target;
			stockList[stockList.length - 1] == "" ? stockList.splice(stockList.length - 1, stockList.length) : "";
			var code = App.commobj.getUrlParam("code");
			//获得下标
			var index = $.inArray(code, stockList),
				direciton = $(e.currentTarget).attr("id");
			//改变透明度，实现点击效果
			$($this).css("opacity", 0.5);
			//console.log(index,direciton);
			setTimeout(function() {
				$($this).css("opacity", 1)
			}, 500);
			if (direciton == "next") { // 下一个
				if (index + 1 < stockList.length) {
					stock_code = stockList[index + 1]; //取下一个代码
					//console.log(stock_code);
				} else {
					stock_code = stockList[0]; //下标越界，取第一个
				}
			} else { // 上一个
				if (index - 1 > -1) {
					stock_code = stockList[index - 1]; //取上一个
				} else {
					stock_code = stockList[stockList.length - 1]; // 取最后一个
				}
			}
			var replace_url;
			/*location.href.indexOf("&")>-1?replace_url = location.href.replace(/(?![?&])(code)=.*&/, "code="+stock_code+"&"):*/
			replace_url = location.href.replace(/(?![?&])(code)=.*/, "code=" + stock_code);
			//history.pushState("", "", replace_url);
			history.replaceState(null, '', replace_url);
			var url = location.href;
			this.changePage(url);
		},
		changePage: _.debounce(function(url) {
			//window.location.replace(url+"&end");
			//App.quoteView.stock_code = "";
			//$('#minute').html('分钟');
			$("#hou_pan,#mask").hide();
			$('#disclaimer').hide();
			localStorage.setItem('disclaimer',1);//1 代表免责声明显示过一次 不再显示
			$("#show_data").removeClass('sh_pic');
			App.quoteView.beforeRender();
			App.quoteView.afterRender();
			StockGraph.draw(App.quoteView.period, App.commobj.getUrlParam("code"));
			//App.quote.beforeRender();
		}, 200),
		/****
		顶部的title:微信中顶部显示黑色
		****/
		controlTitle: function() {
			if (App.commobj.isWechat()) {
				App.commobj.osType() == "Android" ? $("top_fixed,.top-header").css("background-color", "#393A3D") : $("top_fixed,.top-header").css("background-color", "#1c1c20");
				$(".top-header .span1,.top-header .span2").css("color", "#fff");
				$(".top-header .scroll-code,.top-header .scroll-abbr,.top-header").css("color", "#fff");
				$("head").append("<style>.top-header:before{border-bottom-color: @cl}</style>".replace(/@cl/g, "#1c1c20"));
				if (App.quoteView.trade_status == "STOPT") {
					$("#scroll_last_px,#scroll_px_change_rate,#scroll_px_change").removeClass("quote-bg-fall quote-bg-rise").addClass("quote-bg-wechat");
				}
			} else {
				if (App.quoteView.trade_status == "STOPT") {
					$("#scroll_last_px,#scroll_px_change_rate,#scroll_px_change").removeClass("quote-bg-fall quote-bg-rise");
				}
			}
		},
		afterRender: function(arg) {
			var stockCode = App.commobj.getUrlParam('code');
			tongji.openPage('hq101',stockCode,App.commobj.getUrlParam('u'));
			var interval = "";
			document.body.scrollTop = 0;
			App.quoteView.news_start_pos = 0;
			App.quoteView.reserach_start_pos = 0;
			App.quoteView.notice_start_pos = 0;
			App.quoteView.preclose_px = 0;
			//App.quoteView.type = "finance";
			//App.quoteView.click_type = 'timeline';
			$("#scroll_abbr,#scroll_code").html("");
			$("#stockCode").removeClass("fadeOutUp").show();
			$("#stock_content").removeClass("fadeOutDown").hide();
			var that = this;
			that.initSwiperTab();
			/*****/
			//add by wyy 2017.4.11
			//资讯tab可配置默认点中第一个tab
			// if (_.news === 's' && !App.quoteView.type) {
			// 	var hover;
			// 	$this = $("#news .kline .swiper-wrapper").children();
			// 	for (var i = 0; i < $this.length; i++) {
			// 		if ($($this[i]).css("display") === "block") {
			// 			hover = i;
			// 			break;
			// 		}
			// 	}
			// 	/*$($this[hover]).find("a").trigger("click");*/
			// 	var e = {};
			// 	e.target = $($this[hover]).find("a")[0];
			// 	e.currentTarget = $($this[hover]).find("a")[0];
			// 	that.toggleNews(e);
			// }
			/***
			点击分钟，弹出下面的列表但是不点击时切换隐藏
			add by wyy on 2017/6/21
			***/
			if (!App.quoteView.period) {
				$("#ul_list").hide();
				$(".stock_line p a").removeClass("hover");
				$("#click_timeline").addClass("hover");
				//$("#click_timeline").trigger();
			}
			if (App.quoteView.period == "分时") {
				$(".stock_line p a").removeClass("hover");
				$("#click_timeline").addClass("hover");
			}
			if (App.quoteView.period == "五日") {
				$(".stock_line p a").removeClass("hover");
				$("#click_trend5day").addClass("hover");
			}
			if (App.quoteView.period == "日K") {
				$(".stock_line p a").removeClass("hover");
				$("#click_6").addClass("hover");
			}
			if (App.quoteView.period == "周K") {
				$(".stock_line p a").removeClass("hover");
				$("#click_7").addClass("hover");
			}
			if (App.quoteView.period == "月K") {
				$(".stock_line p a").removeClass("hover");
				$("#click_8").addClass("hover");
			}
			//板块分布界面底部需要大一点
			if ($("#xbhs").css("display") === "block") {
				$("#bordStyle").css("margin-bottom", "1.5rem");
				//$("head").append("<style>#xbhs{margin-bottom: @cl}</style>".replace(/@cl/g, "1.5rem"));
			}
			/***
				控制盘口样式
			****/
			var offsetHeight = $("#show_data").offset().top,
				picHeight = $("#show_data").height();
			var realHeight = offsetHeight + picHeight;
			$("#hou_pan").css("top", realHeight);
			/***
				控制盘口样式 end
			****/
			//if (window.location.href != top.location.href) {
			if (window.frames.length != parent.frames.length) {
				//判断页面是否在iframe中打开，若是则不显示切换功能
				$(".top-left,.top-right").hide();
			} else {
				var stockLen = App.commobj.getCookie("stocks") ? App.commobj.getCookie("stocks").split(",") : "";
				stockLen[stockLen.length - 1] == "" ? stockLen.splice(stockLen.length - 1, stockLen.length) : "";
				if (stockLen.length == 1 || !App.commobj.getCookie("stocks")) {
					$(".top-left,.top-right").hide();
					//$(".top-header p").css("width","4rem");
					//$(".top-header .span2").css("max-width","2.5rem");
				} else {
					$(".top-left,.top-right").show();
					//$(".top-header p").css("width","3.2rem");
					//$(".top-header .span2").css("max-width","1.7rem");
				}
			}
			var font_size = 100 * ((screen.width > 1000 ? document.body.offsetWidth : screen.width) / 750),
				x = font_size * 3.2,
				y = font_size * 1.8;
			if (x > 400 && x < 1000) {
				App.quoteView.canvasHeight = {
					chart: x / 3,
					volume: y / 3
				};
			} else {
				App.quoteView.canvasHeight = {
					chart: x,
					volume: y
				};
			}
			var that = this;
			arg = arg ? arg : App.commobj.getQueryString('code');
			if (arg) {
				arg = arg.indexOf('=') > -1 ? arg.split('=')[1] : arg;
				App.quoteView.stock_code = arg.indexOf('&') > -1 ? arg.substring(0, arg.indexOf('&')) : arg;
				if (!App.quoteView.stock_code) {
					App.quoteView.stock_code = "000001.SZ";
					App.quoteView.market = App.quoteView.stock_code.split(".")[1];
				} else if (App.quoteView.stock_code.indexOf('.') < 0) { //如果输入的代码没有带市场后缀，通过键盘机灵接口检索。市场后缀只支持恒生内部接口数据结构 20161024

					API.wizard(App.quoteView.stock_code, function(ret) {
						var obj = ret.data;
						App.quoteView.stock_code = obj[0].prod_code;
						App.quoteView.market = App.quoteView.stock_code.split(".")[1];
						that.init_data();
					});
				}
				if (App.quoteView.stock_code.indexOf('.') > -1) {
					App.quoteView.stock_code = App.quoteView.stock_code.toUpperCase();
					var length = App.quoteView.stock_code.split(".").length;
					App.quoteView.market = App.quoteView.stock_code.split(".")[length - 1];
					that.init_data();
				}
			} else {
				that.init_data();
			}

			if ($('#time_level').css('display') == 'none') {
				$('.time-chart').addClass('show_chart').removeClass('hide_chart');
				$('#con-hight').show();
			}
			App.commobj.displacement();
			//this.zjTimer();

		},
		initSwiperTab: function() {
			var width = document.body.clientWidth;

			//$('#newsTab .swiper-slide').length - $('#newsTab .swiper-slide:hidden').length;
			if (App.quoteView.tabLength > 5) {
				tbswiper = new Swiper('#newsTab', {
					width: width,
					slidesPerView: 5,
					spaceBetween: 0,
					resistanceRatio: 0.4,
					freeMode: true
				});

				window.setInterval(function() {
					App.quoteView.tabscroll()
				}, 300);

			} else {
				$("#shadowWindow").hide();
			}

			var id = $('#newsTab .swiper-wrapper .hover').closest('.swiper-slide').attr('data-id');
			App.quoteView.slideToPosition(id);
		},
		tabscroll: function() {
			if (App.quoteView.tabLength <= 5) {
				return;
			}
			// if (tbswiper == null) {
			// 	return;
			// }
			// var tmp=$("#topbanner .swiper-wrapper .swiper-slide").css("width").split("px")[0];
			var tmp = document.body.clientWidth / 5;
			var distance = tbswiper.getWrapperTranslate();
			var tabLength = $('#newsTab .swiper-slide').length - $('#newsTab .swiper-slide:hidden').length;
			if (tabLength > 5) {
				if (distance <= -(tmp * (tabLength - 5) - 1)) {
					$("#shadowWindow").hide();
				} else {
					$("#shadowWindow").show();
				}
			}
		},
		slideToRight: function() {
			tbswiper.slideNext();
		},

		slideToPosition: function(i) {
			// if (tbswiper == null) {
			// 	return;
			// }
			if (App.quoteView.tabLength <= 5) {
				return;
			}
			if (i == undefined) {
				return;
			}
			i = Number(i)
			var num = i + 1;
			if (num > 2) {
				tbswiper && tbswiper.slideTo(i - 2, 1000, false);
			} else if (num = 2) {
				tbswiper && tbswiper.slideTo(3, 1000, false); //样式引起的
				tbswiper && tbswiper.slideTo(i - 2, 1000, false);
			} else if (num = 1) {
				tbswiper && tbswiper.slideTo(0, 1000, false);
			}

		},
		/**初始化数据*/
		init_data: function() {
			this.readStockData(); //获取盘口信息
			// this.intervalTimeline();
			$(".stock_news_list,#jzlr").css('display', 'block');
			$(".stock_info").css('display', 'none');
			//debugger;
			App.quoteView.type && this.toggeleTap(App.quoteView.market);
			//this.usInitTap(App.quoteView.type);
			App.quoteView.canvas.chart = null;
			App.quoteView.business_amount = 0.00;
			App.quoteView.klineData = {};
			if (!App.quoteView.hasToken) {
				this.qryStock();
			}
			this._swiper();
			this.stocktimer();
			this.hide_houpan();
		},
		/**控制后盘数据是否显示*/
		control_houpan: function(e) {
			if ($('#hsdata').css('display') === 'none') {
				return;
			}
			var show_flag = $('#hou_pan').css('display');
			if (show_flag === 'none') {
				$("#hou_pan").show();
				$('#mask').show(); //定义蒙版效果
				$("#show_data").addClass('sh_pic');
				//$(".time").css("margin-top", 0);
			} else {
				$('#hou_pan').hide();
				$('#mask').hide();
				$("#show_data").removeClass('sh_pic');
				//$(".time").css("margin-top", ".2rem");
				//$(".time").css("margin-bottom", ".2rem");
			}
		},
		/**单击页面任意处，隐藏盘口数据*/
		hide_houpan: function() {
			$('#mask').bind('click', function(e) {
				var show_flag = $('#hou_pan').css('display');
				if (show_flag === 'block') {
					$('#hou_pan').hide();
					//$(".time").css("margin-top", ".2rem");
					//$(".time").css("margin-bottom", ".2rem");
					$(this).hide();
					$("#show_data").removeClass('sh_pic').addClass('hs_pic');
				}
			});
		},
		/**离开视图，做善后工作*/
		afterUnRender: function() {
			//清空上一个code，下次进入该页面时可以重新展示
			App.commobj.removeDisclaimer();
			App.quoteView.last_code = "";
			$('#secu_abbr').html("");
			$('#s_code').html("");
			$("#scroll_abbr,#scroll_code").html("");
			$('#nstock').html("");
			$('#cstock').html("");
			//$(".news").css("margin-bottom","1rem");
			$(".show_all,.pull_refresh").hide();
			$("#show_data").removeClass('sh_pic');
			//盘口样式还原
			/*$(".data-block .span2").css("font_size", ".35rem");
			$(".data-block .span4").css("font_size",".26rem");
			$(".data-block .span4").css("padding-left",".05rem");
			$(".data-block .span1").css("font_size",".589rem");
			$("#last_px_wrapper").css("margin-top","0");
			$(".data-block .span5").css("font_size",".26rem");*/
			//
			$(".stock_news_list").html('');
			oldList = [];
			var that = this;
			$('.data-block span').forEach(function(item) {
				if ($(item).attr('model-bind')) {
					that.model.set($(item).attr('model-bind'), '');
				}
			});
			$('#mask').hide(); // 隐藏蒙版
			$('#disclaimer').hide();
			localStorage.setItem('disclaimer',1);//1 代表免责声明显示过一次 不再显示
			$('#stock_canvas').html('');
			$("#hou_pan").hide();
			$(".time").css("margin-top", ".2rem");
			$("#xbhs .kline,#usa .kline,#news .kline").removeClass("xbhs");
			//changeList="";
			clearInterval(App.quoteView.quoteTimer);
			App.quoteView.trendData = undefined;
			App.quoteView.trend5Data = undefined;
			App.quoteView.stock_code = '';
			App.quoteView.aFlag = false;
			App.quoteView.usFlag = false;
			//console.log("leave:", App.quoteView.trendData);
			App.quoteView.coin = [];
			$('.time-chart').addClass('hide_chart').removeClass('show_chart'); //默认分时图宽度
			localStorage.removeItem('reBackUrl_quote');
			/**bug#41402 重置排序类型*/
			$('.newprice , .ratechange').find('i').removeClass('active');
			$('#newprice , #ratechange').removeClass('active');
			$('.ratechange i.down').addClass('active');
			//App.quoteView.click_type = 'timeline';
			$('#xbhs .kline').removeClass('xbhs');
			$('#news .kline').removeClass('xbhs');
			$('#usa .kline').removeClass('xbhs');
			//$('#minute').html('分钟');
			$('.ma-title .px_av label').html('均价:');
			this.$el.find("#ul_list span").removeClass("hover");
			window.endFlag = false; /**以下三个参数控制下拉加载更多的样式**/
			window.scrollAble = true;
			window.noContent = false;
			StockGraph.shutDown();
			if (App.quoteView.tabLength > 5) {
				tbswiper && tbswiper.destroy(false);
			}
		},

		/** 个股下资讯tab切换*/
		toggeleTap: function(arg) {
			//debugger
			var classval = $('.stock_info_all p').find("a.hover").attr('linkto');
			$(classval).show().siblings('ul').hide();
			var future = ['CCFX', 'XSGE', 'XDCE', 'XZCE'];
			if ($.inArray(arg, future) > -1) {
				$(".stock_news_list,#jzlr").hide();
				$(".stock_info").hide();
			} else {
				$("#jzlr").hide();
				if (classval == '.reserach_news_list') {
					INFO.researchlist();
					App.quoteView.type = 'reserach';
				} else if (classval == '.stock_announcement_list') {
					INFO.ansList();
					App.quoteView.type = 'notice';
				} else if (classval == '.stock_finace_list') {
					$("#jzlr").show();
					INFO.finace();
				} else if (classval == '.stock_info') {
					App.quoteView.type = 'data'
					this.readCompInfo();
				} else {
					if ($.inArray(App.quoteView.market, ['HKM', 'HKI', 'CCFX', 'XSGE', 'XDCE', 'XZCE', 'O', 'N', 'A']) == -1)
						INFO.newslist();
					App.quoteView.type = 'news';
				}
			}
			//$('.stock_line p').eq(0).find('a').addClass('hover');
			//$('.stock_line p').eq(0).siblings('p').find('a').removeClass('hover');
			$('.level-nav a').eq(0).addClass('hover').siblings('a').removeClass('hover');
			$('.trade_price').show();
			$('.trade_min').hide();
		},
		/*usInitTap: function(arg) {
			if(arg==".us_finace_info"){
				$("#finace_list").show();
			}else{
				$("#com_info_list").show();
			}
		},*/
		//五档，分笔明细
		tradeMin: function(e) {
			this.$el.find(".level-nav a").removeClass("hover");
			var el = $(e.currentTarget);
			var hasMin = true,
				type;
			if (el.prop("tagName") == 'DIV') {
				hasMin = el.hasClass("trade_min");
			} else {
				type = el.attr("showed");
				el.addClass("hover");
				this.type = type;
			}
			if (type == "trade_min" || !hasMin) {
				if (!hasMin)
					this.$el.find(".level-nav a").eq(1).addClass('hover');
				$('.trade_min').show();
				$('.trade_price').hide();
				/*API.tick(App.quoteView.stock_code, function(ret) {
					var fields = ret.data.tick.fields;
					var data = ret.data.tick[App.quoteView.stock_code];
					if (!data) {
						var html = "";
						for (var i = 9; i >= 0; i--) {
							html = html + '<li> <span class="span1" >--</span> 	<span class="span2">--</span><span class="span3">--</span></li>';
						}
						$("#trade_min").html(html);
						return;
					}
					var datalist = [];
					for (var i = 0; i < data.length; i++) {
						var tmp = {};
						tmp['business_time'] = data[i][0];
						tmp['hq_px'] = (data[i][1]).toFixed(2);
						tmp['business_amount'] = App.quoteView.fmrAmount(data[i][2]);
						//增加买卖方向
						tmp['business_direction'] = data[i][5];
						tmp['last_px'] = last_px;
						datalist.push(tmp);
					}
					var tradezpl = _.template('<%_.each(list,function(row){%><li>\
						<span class="span1" ><% var datetime=App.quoteView.fmrdate(row.business_time);%><%=datetime%></span>\
						<%if(row.hq_px > row.last_px){%><span class="span2 quote-bg-rise"><%=row.hq_px%></span><%}%>\
						<%if(row.hq_px < row.last_px){%><span class="span2 quote-bg-fall"><%=row.hq_px%></span><%}%>\
						<%if(row.hq_px==row.last_px){%><span class="span2"><%=row.hq_px%></span><%}%>\
						<%if(row.business_direction == 0){%><span class="span3 quote-bg-fall"><%=row.business_amount%></span></li><%}%>\
						<%if(row.business_direction == 1){%><span class="span3 quote-bg-rise"><%=row.business_amount%></span></li><%}%>\
					<%})%>');
					var html = tradezpl({
						"list": datalist
					});
					$("#trade_min").html(html);
					/*var classval=	$('.trade_price').find("span.span2").attr('class');
					$('.trade_min').find("span.span2").attr('class',classval);

				});*/
			} else {
				this.$el.find(".level-nav a").eq(0).addClass('hover');
				$('.trade_min').hide();
				$('.trade_price').show();
			}
		},

		fmrAmount: function(amount) {
			if (amount > 0 && amount < 100) {
				return 1;
			}
			return Math.round(amount / 100);
		},
		/*fmrdate: function(amount) {
			var amounts = amount + "";
			var dtime = amounts.substring(amounts.length - 6, amounts.length);
			return dtime.substring(0, 2) + ":" + dtime.substring(2, 4);
		},*/
		toggleStockLine: function(e) {
			var stockCode = App.commobj.getUrlParam('code');
			this.size = 20;
			var el;
			if (e) {
				el = $(e.currentTarget);
			} else {
				el = App.quoteView.lineTypeOb;
			}
			var minutekline = el.parents('a').attr('line_type');
			var lineType = el.attr("line_type");
			if (minutekline != 'minutekline') { // 判断当前点击为分钟k线
				this.$el.find(".stock_line p a").removeClass("hover");
				if (lineType != 'minutekline') $('#minute').html('分钟');
			} else {
				this.$el.find("#ul_list span").removeClass("hover");
				$('#minute').html(el.html());
			}
			el.addClass("hover");
			if (lineType == 'minutekline') { // 显示分钟k线tab标签
				tongji.customEvent('hq104_6',300,stockCode,App.commobj.getUrlParam('u'));
				if ($('#ul_list').css('display') == 'block') {
					$('#ul_list').hide();
				} else {
					$('#ul_list').show();
				}
				return;
			} else {
				$('#ul_list').hide();
				if (minutekline != 'minutekline')
					this.$el.find("#ul_list span").removeClass("hover");
				App.quoteView.click_type = lineType;
			}
			/**分时、5分时，日、月、k,设置点到的tab类型**/
			// if(el.attr("id").indexOf('click_') > -1 ){
			// 	App.quoteView.click_type = lineType;
			// }
			this.lineType = lineType;
			App.quoteView.period = e.target.innerText;
			StockGraph.draw(App.quoteView.period, App.quoteView.stock_code);
			if (lineType != "timeline" && lineType != "trend5day") {
				if(lineType == 6){
					tongji.customEvent('hq104_3',300,stockCode,App.commobj.getUrlParam('u'));
				}else if(lineType == 7){
					tongji.customEvent('hq104_4',300,stockCode,App.commobj.getUrlParam('u'));
				}else if(lineType == 8){
					tongji.customEvent('hq104_5',300,stockCode,App.commobj.getUrlParam('u'));
				}else{
					tongji.customEvent('hq104_6',300,stockCode,App.commobj.getUrlParam('u'));
				}
				$('.time-chart').css('width', '100%');
				// clearInterval( App.quoteView.timer);
				this.intervalTimeline(false);
				$('#stock_canvas').hide();
				$('#stock_canvas').html('');
				$('#stock_canvas_kline').html('');
				$('#stock_canvas_kline').show();
				//DRAW.kline(lineType);
				drawKLine(this.canvas, lineType, this.size)
			} else {
				if ((App.quoteView.clickType == 'ag' ||
						$.inArray(App.quoteView.market, App.quoteView.furture) > -1) &&
					lineType != 'trend5day' && App.quoteView.market != 'XBHS') {
					tongji.customEvent('hq104_1',300,stockCode,App.commobj.getUrlParam('u'));
					$('.time-chart').css('width', '69%');
					$('#time_level').show();
				} else {
					if(lineType == 'timeline'){
						tongji.customEvent('hq104_1',300,stockCode,App.commobj.getUrlParam('u'));
					}else {
						tongji.customEvent('hq104_2',300,stockCode,App.commobj.getUrlParam('u'));
					}
					$('.time-chart').css('width', '100%');
					$('#time_level').hide();
				}
				$('#stock_canvas_kline').html('');
				$('#stock_canvas_kline').hide();
				$('#stock_canvas').show();
				this.intervalTimeline(true, lineType);
			}
			if (App.quoteView.period == "分时" || App.quoteView.period == "五日") {
				$("#pankou").show();
				$("#kline_pankou").hide();
			} else {
				$("#pankou").hide();
				$("#kline_pankou").show();
			}
		},
		//判读所属的股票类型
		getMarket: function() {
			var that = this;
			var real_fields = 'pe_rate,total_shares,member_count,hq_type_code';
			API.sort(App.quoteView.stock_code, real_fields, function(ret) {
				var fields = ret.data.sort.fields;
				var data = ret.data.sort[App.quoteView.stock_code];
				if (!data) {
					return;
				}
				var pe_rate = data[fields.indexOf("pe_rate")],
					total_shares = data[fields.indexOf("total_shares")],
					member_count = data[fields.indexOf("member_count")],
					hq_type_code = data[fields.indexOf("hq_type_code")];
				var stockB = App.quoteView.stock_code.split('.')[0];
				stockB = parseInt(stockB);
				if ($.inArray(App.quoteView.market, ['SZ', 'SS']) > -1) {
					if (pe_rate == null && member_count >= 0) { //&&total_shares>0 //用市盈率是否为null，成分个股总数来判断是否为指数股票
						$('#news').hide();
						$('#time_level').hide();
						if ($.inArray(hq_type_code, ['XSHG.MRI', 'XSHE.MRI'] > -1)) {
							$('.time-chart').css('width', '100%');
							App.quoteView.indexNum = 1;
							if (member_count > 0) {
								$('#up_down').show();
								if ($('#up_down').css('display') == 'block') {
									$('#block').hide();
									$('#buy').hide();
									$('#sell').hide();
									$('#display').hide();
									changeList = "";
									App.quoteView.bordZDF();
									App.commobj.setDisclaimer('body',0);
									var menushowData=window.data.menushow.split(',');
									if(menushowData[0].split(':')[1] == 'h' && menushowData[1].split(':')[1] == 'h' && menushowData[2].split(':')[1] == 'h'){
										$('#disclaimer_stock').css('margin-top','0');
									}else{
										$('#disclaimer_stock').css('margin-bottom','.8rem');
									}
								}
							}
						}
						App.quoteView.clickType = 'bk'; //
					} else if (pe_rate == 0 && !member_count || stockB > 900000 || (stockB > 200000 && stockB < 300000)) {
						$('#news').hide();
						App.quoteView.clickType = 'ag'; //
						$('.time-chart').css('width', '69%');
						$('#time_level').show(); //
						App.commobj.setDisclaimer('body',0);
						var menushowData=window.data.menushow.split(',');
						if(menushowData[0].split(':')[1] == 'h' && menushowData[1].split(':')[1] == 'h' && menushowData[2].split(':')[1] == 'h'){
							$('#disclaimer_stock').css({'position':'fixed',"bottom":0});
						}else{
							$('#disclaimer_stock').css({'position':'fixed',"bottom":0,"margin-bottom":".88rem"});
						}
					} else {
						if (_.news === 's') {
							$('#news').show();
							DRAW.coins(App.quoteView.stock_code);
						}

						//bug修改
						if (_.news === 's' && !App.quoteView.type) {
							var hover;
							var $this = $("#news .kline .swiper-wrapper").children();
							for (var i = 0; i < $this.length; i++) {
								if ($($this[i]).css("display") === "block") {
									hover = i;
									break;
								}
							}
							/*$($this[hover]).find("a").trigger("click");*/
							var e = {};
							e.target = $($this[hover]).find("a")[0];
							e.currentTarget = $($this[hover]).find("a")[0];
							that.toggleNews(e);
						}
						//
						//
						App.quoteView.clickType = 'ag';
						$('.time-chart').css('width', '69%');
						$('#time_level').show();
						if (App.quoteView.device != 'pc' && _.buy != "h") {
							$('#buy').show();
							$('#sell').show();
						}
						//debugger;
						//that.zjTimer();
					}
				} else if ($.inArray(App.quoteView.market, App.quoteView.furture) > -1) {//期货
					App.commobj.setDisclaimer('body',0);
					var menushowData=window.data.menushow.split(',');
					if(menushowData[0].split(':')[1] == 'h' && menushowData[1].split(':')[1] == 'h' && menushowData[2].split(':')[1] == 'h'){
						$('#disclaimer_stock').css({'position':'fixed',"bottom":0});
					}else{
						$('#disclaimer_stock').css({'position':'fixed',"bottom":0,"margin-bottom":".88rem"});
					}
					
					$('#news').hide();
				} else if ($.inArray(App.quoteView.market, ['HKM', 'HKI', 'XBHK']) > -1) {
					//免责声明新增代码-1.0.11版本-zhengxx18067
					if( localStorage.getItem('disclaimer') == 1){
						//return false;
					}else{
						$('#disclaimer').show();
						$('#mask').show();
						$('#disclaimer .iKnow').click(function(){
							$('#mask').hide();
							$('#disclaimer').hide();
							localStorage.setItem('disclaimer',1);//1 代表免责声明显示过一次 不再显示
						});
					}
					//end
					$('#buy').hide();
					$('#sell').hide();
					$('#news').hide();
					$('#display').hide();
					$('#time_level').hide();
					if (App.quoteView.market == 'HKM') {
						$('#hkm').show();
						App.quoteView.HKcompInfo();
					}
					if (App.quoteView.market == 'XBHK') {
						$('#block').hide();
					}
				} else if ($.inArray(App.quoteView.market, App.quoteView.usa) > -1) {
					$('#news').hide();
					$('#time_level').hide();
					/*if(!App.quoteView.type&&!App.quoteView.fin_com)
						{
							$($("#usa .kline p").children()[0]).addClass("hover");
							$($("#usa .kline p").children()[1]).removeClass("hover");
						}*/
					!App.quoteView.fin_com ? App.quoteView.us_finace_info() : (App.quoteView.fin_com == ".us_finace_info" ? App.quoteView.us_finace_info() : App.quoteView.us_company_info());
					$('#buy').hide();
					$('#sell').hide();
					$('#display').hide();
				}
				if ($('#time_level').css('display') == 'none') {
					$('.time-chart').addClass('show_chart').removeClass('hide_chart');
					$('#con-hight').show();
				}
				// API.menuControl();	
				//that.intervalTimeline();
				//console.log("getMarket:", App.quoteView.trendData);
				var leng = 0;
				$('#simulation li').each(function() {
					var ids = $(this).attr('id');
					if ($(this).css('display') != 'none') { //板块宽不计算在内
						leng = leng + 1;
					}
				})
				if (_.display == 'z' && ($.inArray(App.quoteView.market, App.quoteView.furture) > -1)) {
					$('#buy').show();
					$('#sell').show();
					leng = 3;
				}
				$('#simulation li').css('width', 100 / (leng) + '%');
				if (leng == 0) {
					$('#menu').hide()
				}
			});
			that.intervalTimeline();
		},
		handler_data: function(val, pro, type) { //处理数据
			var now_time = new Date();
			if (isNaN(val)) {
				return val;
			}
			if (val == 0 || !val) {
				if (Number(now_time.getHours()) == 9 && Number(now_time.getMinutes()) < 30) { //集合进价时间里
					return '--';
				} else {
					return App.quoteView.formatAmt(val, pro, type); // 交易时间
				}
			} else {
				return App.quoteView.formatAmt(val, pro, type);
			}
		},
		handler_balance: function(val, pro, type) { //处理数据
			var now_time = new Date();
			if (isNaN(val)) {
				return val;
			}
			if (val == 0 || !val) {
				if (Number(now_time.getHours()) == 9 && Number(now_time.getMinutes()) < 30) { //集合进价时间里
					return '--';
				} else {
					return pro == "business_balance" ? "--" : App.quoteView.formatAmt(val, pro, type); // 交易时间
				}
			} else {
				return App.quoteView.formatAmt(val, pro, type);
			}
		},
		handler_amount: function(val, hand) {
			if (typeof(val) === "number" && typeof(hand) === "number") {
				//成交量/手数
				var num = parseInt(val / hand);
				return App.quoteView.handler_data(num, 'business_amount', 2);
			}
		},
		readStockData: function() {
			var that = this;
			if ($.inArray(App.quoteView.market, App.quoteView.usa) > -1) { //美股没有交易额，用 “量”替代
				that.model.set("blanceAcount", "量");
				/*$("#business_balance").hide();
				$("#usa_amount").show();*/
			} else {
				that.model.set("blanceAcount", "额");
				/*$("#business_balance").show();
				$("#usa_amount").hide();*/
			}
			$("#pre_type").text("昨收");
			var real_fields = 'prod_name,open_px,high_px,low_px,last_px,business_amount,business_balance,offer_grp,bid_grp,preclose_px,w52_low_px,w52_high_px,px_change,px_change_rate,pe_rate,market_value,trade_status,turnover_ratio,vol_ratio,' +
				'business_amount_in,up_px,circulation_value,amplitude,business_amount_out,market_value,down_px,eps,entrust_rate,pe_rate,dyn_pb_rate,rise_count,fall_count,hq_type_code';
			API.real(App.quoteView.stock_code, real_fields, function(ret) {
				$("#usa_amount").hide();
				$("#business_balance").show();
				var fields = ret.data.snapshot.fields;
				var data = ret.data.snapshot[App.quoteView.stock_code];
				if (!data) {
					return;
				}
				App.quoteView.hq_type = data[fields.indexOf("hq_type_code")];
				App.quoteView.preclose_px = data[fields.indexOf("preclose_px")].toFixed(2);
				App.quoteView.business_amount = ((data[fields.indexOf("business_amount")]) / 1000000).toFixed(2);
				App.quoteView.prod_name = data[fields.indexOf("prod_name")];
				isFirst && !(App.commobj.getUrlParam("prod_name")) && window.data.control_title == 1 && that.init_title(App.quoteView.prod_name, App.quoteView.stock_code);
				isFirst = false;
				that.model.set("secu_abbr", App.quoteView.prod_name);
				var turnover_ratio = data[fields.indexOf("turnover_ratio")];
				// that.model.set("business_balance",that.formatAmt(data[fields.indexOf("business_balance")])||'0.00');
				var type, stock_type;
				if ($.inArray(App.quoteView.market, App.quoteView.furture) > -1) {
					$("#pre_type").text("昨结");
					if (App.quoteView.market == 'CCFX') {
						type = App.quoteView.stock_code.indexOf('T') == 0 ? 3 : 1; //中金所控制，国债保留三位小数；
					} else {
						type = 0; //其他期货，为整数；
					}
				} else if ($.inArray(App.quoteView.market, ['SZ', 'SS']) > -1) {
					var stockB = App.quoteView.stock_code.split('.')[0],
						pe_rate = data[fields.indexOf("pe_rate")],
						num_code = parseInt(stockB),
						must_price = data[fields.indexOf("up_px")];
					if (pe_rate == 0 && turnover_ratio == 0 || num_code > 900000 ||
						(num_code > 200000 && num_code < 200992)) {
						$('#news').hide();
						type = must_price == 0 ? 2 : 3; //表示基金数据保留三位小数/ 区分A股指数
					} else {
						type = 2; //表示A股数据保留2位小数
					}
					stock_type = "A"; //对A股内外盘做数据处理的标志	
				} else if (App.quoteView.market == 'XBHS') { //板块
					type = 2;
				} else {
					type = 3; //港美股数据保留3位小数
					if ($.inArray(App.quoteView.market, App.quoteView.usa) > -1) {
						$("#business_balance").hide();
						$("#usa_amount").show();
					}
				}
				fields.forEach(function(val, index, arr) {
					$('#' + val).removeClass('quote-bg-nodata');
					$('#kline_' + val).removeClass('quote-bg-nodata');
					var item_value = data[index];
					if (stock_type && $.inArray(val, ['business_amount_in', 'business_amount_out']) > -1) {
						item_value = item_value / 100; //A股内外盘数据处理
					}
					var d;
					// 比例数据增添% ,量比除外
					if ($.inArray(val, ['px_change_rate', 'amplitude', 'entrust_rate', 'turnover_ratio', 'vol_ratio']) > -1 && d != '__') {
						d = App.quoteView.handler_data(item_value, val, 2);
						if (val != 'vol_ratio' && d != '--') { //比例形式的数据加%
							if (Number(d) <= 100) {
								d = d + "%";
							}
						}
						if (val == 'px_change_rate') {
							if (Number(d.split("%")[0]) > 0) {
								d = "+" + d;
								//console.log(d);
							}
						}
					} else if ($.inArray(val, ['rise_count', 'fall_count']) > -1) {
						d = App.quoteView.handler_data(item_value, val, 0);
						if (Number(d) > 0) {
							d = d + '家'
						}
					} else {
						/***add by wyy
						      期货计算时，不需要除以手数，直接计算
						***/
						if (val == 'business_amount' && !($.inArray(App.quoteView.market, ['XSGE', 'XZCE', 'XDCE', 'CCFX', 'HKM', 'XBHS']) > -1)) {
							d = App.quoteView.handler_amount(item_value, data[1]);
						} else if (val == 'business_balance') {
							d = App.quoteView.handler_data(item_value, val, 2);
						} else {
							d = App.quoteView.handler_data(item_value, val, type);
						}
					}

					if (d == '--' && val == 'last_px') { //集合竞价时间里，最新价为昨收价
						d = App.quoteView.handler_data(data[fields.indexOf("preclose_px")], val, 2);
					}
					if (val === 'px_change') {
						if (d > 0) {
							d = "+" + d;
							//console.log(d);
						}
					}
					that.model.set(val, d);
					if (val === 'entrust_rate') {
						String(d).indexOf('-') == -1 ? $('#' + val).attr('class', 'quote-bg-rise') : $('#' + val).attr('class', 'quote-bg-fall');
						//d.indexOf('-')==-1?$('#'+val).addClass("quote-bg-rise"):$('#'+val).addClass("quote-bg-fall");
					}
					//量比>1显示成红色，<1绿色，=0黑丝
					//add by wyy 2017/3/30
					if (val === 'vol_ratio') {
						//d.indexOf('-')==-1?$('#'+val).attr('class','quote-bg-rise'):$('#'+val).attr('class','quote-bg-fall');
						d > 1 ? $('#' + val).addClass("quote-bg-rise").removeClass("quote-bg-fall") : (d < 1 ? $('#' + val).addClass("quote-bg-fall").removeClass("quote-bg-rise") : $('#' + val).removeClass("quote-bg-fall").removeClass("quote-bg-rise"));
						d > 1000 ? $('#' + val).css("fontSize", ".24rem") : $('#' + val).css("fontSize", ".26rem");
					}
					if (val === "business_amount_in" || val === "down_px") {
						$('#' + val).addClass('quote-bg-fall');
					}
					if (val === "business_amount_out" || val === "up_px") {
						$('#' + val).addClass('quote-bg-rise');
					}
					if (d == 0 || Number(String(d).split("%")[0]) == 0) { //如果数据为0，渲染颜色为默认色
						$('#' + val).removeClass('quote-bg-rise').removeClass('quote-bg-fall');
						$('#kline_' + val).removeClass('quote-bg-rise').removeClass('quote-bg-fall');
					}
				});
				//如果股票停牌，则显示--
				var trade_status = data[fields.indexOf("trade_status")]
				if (trade_status === "STOPT") {
					fields.forEach(function(val, index, arr) {
						var last_px = App.quoteView.handler_data(data[fields.indexOf("preclose_px")], val, 2);
						val === "last_px" ? that.model.set(val, last_px) : that.model.set(val, "--");
						$('#' + val).removeClass('quote-bg-rise').removeClass('quote-bg-fall').addClass("quote-bg-nodata");
						$('#kline_' + val).removeClass('quote-bg-rise quote-bg-fall').addClass("quote-bg-nodata");
						$('.px_last,.px_rate').removeClass("quote-bg-rise").removeClass("quote-bg-fall");
					})
				}
				var bid_grp = data[fields.indexOf("bid_grp")].split(",");
				var offer_grp = data[fields.indexOf("offer_grp")].split(",");
				window.last_px = data[fields.indexOf("preclose_px")];
				/*for (var i = 0; i < bid_grp.length; i += 3) {
					//>preclose_price?red:green
					//business_direction: buy:red , sell:green;
					var price = Number(bid_grp[i]).toFixed(2);
					if (price > last_px) {
						$("#buy_" + (i / 3 + 1)).addClass('quote-bg-rise').removeClass('quote-bg-fall');
					} else if (price < last_px) {
						$("#buy_" + (i / 3 + 1)).removeClass('quote-bg-rise').addClass('quote-bg-fall');
					} else {
						$("#buy_" + (i / 3 + 1)).removeClass('quote-bg-rise').removeClass('quote-bg-fall');
					}
					that.model.set("buy_" + (i / 3 + 1), Number(bid_grp[i]).toFixed(2));
					that.model.set("buy_" + (i / 3 + 1) + "_amount", (bid_grp[i + 1] / 100).toFixed(0));
				};
				for (var i = 0; i < offer_grp.length; i += 3) {
					var offer_price = Number(offer_grp[i]).toFixed(2);
					if (offer_price > last_px) {
						$("#sale_" + (i / 3 + 1)).addClass('quote-bg-rise').removeClass('quote-bg-fall');
					} else if (offer_price < last_px) {
						$("#sale_" + (i / 3 + 1)).removeClass('quote-bg-rise').addClass('quote-bg-fall');
					} else {
						$("#sale_" + (i / 3 + 1)).removeClass('quote-bg-rise').removeClass('quote-bg-fall');
					}
					that.model.set("sale_" + (i / 3 + 1), Number(offer_grp[i]).toFixed(2));
					that.model.set("sale_" + (i / 3 + 1) + "_amount", (offer_grp[i + 1] / 100).toFixed(0));
				};*/
				App.quoteView.trade_status = data[fields.indexOf("trade_status")];
				App.quoteView.secu_abbr = data[fields.indexOf("prod_name")];
				App.quoteView.s_code = "(" + App.quoteView.stock_code + ")";
				that.changeHeader();
				that.longfont();
				//控制头部显示，这里需要获取股票状态故在此调用
				//停牌需要特殊处理  add by wyy 2017/4/14
				that.controlTitle();
				//console.log(App.quoteView.hq_type);
				//that.toggeleTap(App.quoteView.market);
			});
		},
		//十字光标移动时数据的联动处理，暴露给画图方法
		//add by wyy 2017/4/14
		changeStockInfo: function(params) {
			var that = this;
			if (params) {
				clearInterval(App.quoteView.quoteTimer);
				for (var key in params) {
					//console.log(params)
					if (key == "business_amount" || key == "turnover_ratio" || key == "business_balance") {
						$('#kline_' + key).removeClass('quote-bg-fall quote-bg-rise');
					} else {
						if (key == "px_change" || key == "px_change_rate" || key == "close_px") {
							//dom = $('#'+key)
							var dom = key == "close_px" ? $("#last_px") : $('#' + key)
						} else {
							var dom = $('#kline_' + key)
						}
						params[key].color == 0 ? dom.removeClass('quote-bg-rise quote-bg-nodata quote-bg-nomal').addClass('quote-bg-fall') : (params[key].color == 1 ? dom.removeClass('quote-bg-fall quote-bg-nodata quote-bg-nomal').addClass('quote-bg-rise') : dom.removeClass('quote-bg-rise').removeClass('quote-bg-fall'))
						if (key == "px_change" || key == "px_change_rate" || key == "close_px") {
							var topDom = key == "close_px" ? $("#scroll_last_px") : $('#scroll_' + key)
							params[key].color == 0 ? topDom.removeClass('quote-bg-rise quote-bg-nodata quote-bg-nomal quote-bg-wechat').addClass('quote-bg-fall') : (params[key].color == 1 ? topDom.removeClass('quote-bg-fall quote-bg-nodata quote-bg-nomal quote-bg-wechat').addClass('quote-bg-rise') : topDom.removeClass('quote-bg-rise').removeClass('quote-bg-fall'))
								/*if(App.commobj.isWechat()){
									params[key].color==2?topDom.addClass('quote-bg-wechat'):"";
								}*/
						}

					}
					if (key == "business_balance") {
						params[key].data = App.quoteView.handler_balance(params[key].data, key, 2);
					}
					key == "close_px" ? that.model.set("last_px", params[key].data) : "";
					that.model.set(key, params[key].data);
				}
				this.longfont();
			} else {
				that.readStockData();
				that.stocktimer();
			}

		},
		//处理盘口数据内容过长时，设置字体小点
		longfont: function() {
			//盘口样式还原
			$(".data-block .span2").css("font_size", ".35rem");
			$(".data-block .span4").css("font_size", ".26rem");
			$(".data-block .span4").css("padding-left", ".05rem");
			$(".data-block .span1").css("font_size", ".589rem");
			$("#last_px_wrapper").css("margin-top", "0");
			$(".data-block .span5").css("font_size", ".26rem");
			//
			$(".data-block .span5").each(function() {
				if ($(this).text().length > 7) {
					$(this).css("fontSize", "0.22rem");
				}
			});
			$(".data-block .span4").each(function() {
				if ($(this).text().length > 8) {
					$(this).css("fontSize", "0.22rem");
					$(".data-block .span4").css("padding-left", ".02rem");
				}
				if ($(this).text().length > 9) {
					$(this).css("fontSize", "0.2rem");
					$(".data-block .span4").css("padding-left", ".02rem");
				}

			});
			//20161029	判断设备screen 的大小；
			var price_span = $('.real-price .span1').html(),
				rate_span = $('.real-price .span2').eq(0).html(),
				px_change_rate = $('.real-price .span2').eq(1).html();
			if (price_span.length > 7) {
				$('.data-block .span1').css('fontSize', '0.5rem');
				$("#last_px_wrapper").css("margin-top", ".1rem");
			}
			if (price_span.length > 9) {
				//alert(1111);
				$('.data-block .span1').css('fontSize', '0.45rem');
				$("#last_px_wrapper").css("margin-top", ".1rem");
			}
			/*if(rate_span.length>5){
				$('.data-block .span2').css('fontSize','0.3rem');
			}*/
			if (rate_span.length > 4 && px_change_rate.length > 5) {
				$('.data-block .span2').css('fontSize', '0.3rem');
			}
			if (rate_span.length > 4 && px_change_rate.length > 7) {
				$('.data-block .span2').css('fontSize', '0.26rem');
			}
			if (rate_span.length > 6) {
				$('.data-block .span2').css('fontSize', '0.23rem');
				//$('.data-block .span2').css('margin-top', '.4rem');
			}
		},
		//指数股指，涨跌榜切换
		toggleZDB: function(e) {
			var stockCode = App.commobj.getUrlParam('code');
			this.$el.find(".stock_info_all_bord p a").removeClass("hover");
			var el = $(e.currentTarget);
			var type = el.attr("linkto");
			el.addClass("hover");
			this.type = type;
			if (type != "bord_df_list") {
				tongji.customEvent('hq102_1',300,stockCode,App.commobj.getUrlParam('u'));
				App.quoteView.sorttype = 1;
			} else {
				tongji.customEvent('hq102_2',300,stockCode,App.commobj.getUrlParam('u'));
				App.quoteView.sorttype = 0;
			}
			changeList = "";
			//oldList = [];
			App.quoteView.bordZDF();
		},
		//切换美股财务、资料信息
		togglefin_com: function(e) {
			App.commobj.removeDisclaimer();
			this.$el.find(".us_stock_info_all p a").removeClass("hover");
			var el = $(e.currentTarget);
			var type = el.attr("linkto");
			el.addClass("hover");
			this.type = type;
			App.quoteView.fin_com = type;
			if (type == ".company_info_us") {
				App.quoteView.us_company_info();
			} else {
				App.quoteView.us_finace_info();
			}
		},
		bordZDF: function() { //涨跌榜
			sortFlag = true;
			var marketype = App.quoteView.market;
			$("#up_down_list").html("");
			$(".bord_df_list").html("");
			var param_type = 'prod_code'
			var mic = '000001.XBHS',
				stock_code = App.quoteView.stock_code.split(".")[0];
			if (stock_code == '1A0001') {
				mic = '000001.XBHS'; //只排序上证市场
			} else if (stock_code == '2A01') {
				mic = '399001.XBHS'; //创业
			} else {
				mic = stock_code + '.XBHS'; //板块
			}
			if (App.quoteView.datalength == 0 || App.quoteView.datalength % 20 == 0) {
				API.sortHq(mic, param_type, App.quoteView.startpos, App.quoteView.sortname, App.quoteView.sorttype, App.quoteView.pagecount, function(data) {
					var ss = data.data.sort;
					var fields = ss.fields;
					var showData = [],
						codes = [],
						str_codes;
					for (var key in ss) {
						// var tmp = {};
						if ("fields" == key) {
							continue;
						}
						codes.push(key);
					}
					str_codes = codes.join(',');
					if (marketype == 'XBHS') {
						App.OpenAPI.get("api/ma10_inflexion/?en_prod_code=" + str_codes, null, function(_data) {
							var _ss = _data.data.trade_status_grp;
							/*changeList = "";*/
							for (var a in ss) {
								var tmp = {};
								if ("fields" == a) {
									continue;
								}
								var prod_codes = a.split('.')[0];
								for (var i = 0; i < _ss.length; i++) {
									if (prod_codes == _ss[i].prod_code.split('.')[0]) {
										if (_ss[i].trade_status == 'buy') {
											tmp['stock_status'] = "买点";
											tmp['cls'] = "zxj_z";
										} else if (_ss[i].trade_status == 'sell') {
											tmp['stock_status'] = "卖点";
											tmp['cls'] = "zxj_d";
										} else if (_ss[i].trade_status == 'stock') {
											tmp['stock_status'] = "看涨";
											tmp['cls'] = "zxj_z";
										} else if (_ss[i].trade_status == 'cash') {
											tmp['stock_status'] = "看跌";
											tmp['cls'] = "zxj_d";
										} else if (_ss[i].trade_status == '') {
											tmp['stock_status'] = "--";
											tmp['cls'] = "emptys";
										}
										break;
									} else {
										tmp['stock_status'] = "--";
										tmp['cls'] = "emptys";
									}
								}
								tmp['prod_name'] = ss[a][fields.indexOf('prod_name')];
								tmp['prod_code'] = a;
								tmp['prod_code_all'] = a;
								var last_px = ss[a][fields.indexOf('last_px')];
								var px_change_rate = ss[a][fields.indexOf('px_change_rate')]
								if (last_px > 0) {
									tmp['last_px'] = last_px.toFixed(2);
									tmp['px_change_rate'] = px_change_rate.toFixed(2) + '%';
								} else {
									tmp['last_px'] = '--';
									tmp['px_change_rate'] = '--';
								}
								tmp['zd_color'] = px_change_rate == 0 ? "black" : (px_change_rate < 0 ? 'green' : 'red');
								showData.push(tmp);
								oldList.length < 20 ? changeList += a + "," : "";

							}
							//console.log(oldList.length);
							//console.log(showData.length);
							newList = [];
							if (oldList.length >= 20) {
								newList = showData.slice(0);
								for (var i = 0, length = oldList.length; i < length; i++) {
									for (var j = 0, slength = showData.length; j < slength; j++) {
										oldList[i].prod_code == showData[j].prod_code ? newList.splice(j, 1) : "";
									}
								}
								for (var k = 0, klength = newList.length; k < klength; k++) {
									changeList += newList[k].prod_code + ",";
								}
							}
							oldList = oldList.concat(showData);
							newList = newList.length > 1 ? newList : showData;
							var html = App.quoteView.zdTpl({
								"list": newList
							});
							sortFlag = false;
							App.quoteView.startpos = App.quoteView.startpos　 + showData.length;
							App.quoteView.datalength = showData.length;
							if (App.quoteView.startpos > 20 && showData.length > 0) {
								$("#xb_down_list").append(html);
								if (showData.length < 20) {
									$(".pull_refresh").hide();
									if (App.quoteView.market == 'XBHS') {
										$(".show_all").show();
										App.commobj.setDisclaimer('body',0);
										$('#disclaimer_stock').css('margin-bottom','.87rem');
										$("#bordStyle").css("margin-bottom", 0);
									}
								} else {
									if (App.quoteView.market == 'XBHS') {
										$("#bordStyle").css("margin-bottom", newsBottom);
										$(".pull_refresh").show();

									}
								}
							} else if (App.quoteView.startpos = 20) {
								$("#xb_down_list").html(html);
								if (showData.length == 20) {
									if (App.quoteView.market == 'XBHS') {
										$("#bordStyle").css("margin-bottom", newsBottom);
										$(".pull_refresh").show();
									}
								} else {
									$(".show_all").show();
									App.commobj.setDisclaimer('body',0);
									$('#disclaimer_stock').css('margin-bottom','.87rem');
									$("#bordStyle").css("margin-bottom", 0);
								}

							} else {
								$(".show_all").show();
								App.commobj.setDisclaimer('body',0);
									$('#disclaimer_stock').css('margin-bottom','.87rem');
								$("#bordStyle").css("margin-bottom", 0);
							}
						});
					} else {
						changeList = "";
						$("#up_down_list").html("");
						$(".bord_df_list").html("");
						for (var a in ss) { // 指数股指，涨跌榜
							var tmp = {};
							if ("fields" == a) {
								continue;
							}
							tmp['prod_name'] = ss[a][fields.indexOf('prod_name')];
							tmp['prod_code'] = a;
							tmp['prod_code_all'] = a;
							var last_px = ss[a][fields.indexOf('last_px')];
							var px_change_rate = ss[a][fields.indexOf('px_change_rate')]
							if (last_px > 0) {
								tmp['last_px'] = last_px.toFixed(2);
								tmp['px_change_rate'] = px_change_rate.toFixed(2) + '%';
							} else {
								tmp['last_px'] = '--';
								tmp['px_change_rate'] = '--';
							}
							tmp['zd_color'] = px_change_rate < 0 ? 'green' : 'red';
							showData.push(tmp);
							changeList += a + ",";
						}
						//console.log(changeList);
						var html = App.quoteView.zdTpl({
							"list": showData
						});
						if(App.quoteView.sorttype == 0){
							$(".bord_df_list").html(html);
							$(".bord_df_list li").each(function(){
								$(this).click(function(){
									var stockCode = $(this).attr('code');
									tongji.customEvent('hq105_2',0,stockCode,App.commobj.getUrlParam('u'));
								})
							})
						}else{
							$("#up_down_list").html(html);
							$("#up_down_list li").each(function(){
								$(this).click(function(){
									var stockCode = $(this).attr('code');
									tongji.customEvent('hq105_1',0,stockCode,App.commobj.getUrlParam('u'));
								})
							})
						}
						
					}

				});
			}
		},
		HKcompInfo: function() {
			var that = this;
			var funcId = ['20101002', '20101001'];
			//港股公司概况，
			API.HKcompInfo(App.quoteView.stock_code, '10105004', function(ret) {
				if (ret.data) {
					var datas = ret.data[0]['10105004'][0][App.quoteView.stock_code][0];
					for (var key in datas) {
						that.model.set(key, datas[key] + "");
					}
				}
			});
		},
		us_company_info: function() {
			var that = this;
			//美股公司概况，
			API.UScompanyInfo(App.quoteView.stock_code, function(ret) {
				var showData = [];
				var data = ret.data[App.quoteView.stock_code];
				var j = 0;
				if (data) {
					for (var key in data) {
						that.model.set(key, data[key]);
						infoList.length < 12 ? infoList.push(key) : "";
					}
				} else {
					for (var i = 0, length = infoList.length; i < length; i++) {
						that.model.set(infoList[i], "");
					}
				}
			}, function(err) {
				for (var i = 0, length = infoList.length; i < length; i++) {
					that.model.set(infoList[i], "");
				}
			});
			$("#finace_list").hide();
			$("#com_info_list").show();
			App.commobj.setDisclaimer('#usa',0);
		},
		us_finace_info: function() {
			var that = this;
			//美股公司财务，
			//var url="//open.hs.net/info/v3/finance?symbols="+App.quoteView.stock_code+"&state_type=1,2,3,4";
			var showDatas = [];
			API.USfinaceInfo(App.quoteView.stock_code, function(ret) {
				var data = ret.data[App.quoteView.stock_code];
				if (data.balance.length > 0 || data.cashFlow > 0 || data.finIndex > 0 || data.profit > 0) {
					for (var keys in data) {
						for (var key in data[keys][0]) {
							var tmp = {}
							that.model.set(key, App.quoteView.formatfinace(data[keys][0][key]));
							finaceList.length < 28 ? finaceList.push(key) : "";

						}
					}
					//$("#finace_list").show();
				} else {
					for (var i = 0, length = finaceList.length; i < length; i++) {
						that.model.set(finaceList[i], "");
					}
					//$("#finace_list").hide();	
				}
				that.model.set("profit", "资产负债表");
				that.model.set("blance", "利润表");
				that.model.set("finIndex", "财务指标");
				that.model.set("cashFlow", "资金流量表");
			}, function(err) {
				for (var i = 0, length = finaceList.length; i < length; i++) {
					that.model.set(finaceList[i], "");
				}
			});
			$("#finace_list").show();
			$("#com_info_list").hide();
			App.commobj.setDisclaimer('body',0);
			var menushowData=window.data.menushow.split(',');
			if(menushowData[0].split(':')[1] == 'h' && menushowData[1].split(':')[1] == 'h' && menushowData[2].split(':')[1] == 'h'){
				$('#disclaimer_stock').css('margin-top','0');
			}else{
				$('#disclaimer_stock').css('margin-bottom','0.88rem');
			}
		},
		formatfinace: function(balance) {
			if (balance == "") {
				return "";
			}
			if ("" + balance.indexOf(".") > -1) {
				balance = Number(balance.split(".")[0]);
			}
			if (isNaN(balance)) {
				return balance;
			}
			var prefix = "";
			if (balance < 0 || (balance + "").indexOf("-") == 0) {
				prefix = "-";
				balance = parseFloat(("" + balance).substr(1));
			}
			if (balance > 10000 && balance < 100000000) {
				return prefix + (balance / 10000).toFixed(2) + '万';
			} else if (balance > 100000000) {
				return prefix + (balance / 100000000).toFixed(2) + '亿';
			} else {
				return prefix + balance;
			};
		},
		formatBalance: function(balance) {
			if (balance == "") {
				return "";
			}
			var prefix = "";
			if (balance < 0 || (balance + "").indexOf("-") == 0) {
				prefix = "-";
				balance = parseFloat(("" + balance).substr(1));
			}
			if (balance > 10000 && balance < 100000000) { //
				return prefix + (balance / 10000).toFixed(2) + '万';
			} else if (balance > 100000000) {
				return prefix + (balance / 100000000).toFixed(2) + '亿';
			} else {
				return prefix + balance;
			};
		},
		formatAmt: function(amount, pro, type) {
			if (!type && type != 0)
				type = 2;
			if ($.inArray(pro, ['open_px', 'high_px', 'last_px', 'low_px', 'px_change', 'preclose_px']) > -1) { //不进行单位计量
				if (amount || amount == 0) {
					return amount.toFixed(type)
				} else {
					return "--";
				}
			} else {
				if ((amount && typeof(amount) === "number") || amount == 0) {
					if (pro == "business_amount") {
						if (amount > 9999 && amount < 100000000) {
							return (amount / 10000).toFixed(2) + '万';
						} else if (amount > 100000000) {
							return (amount / 100000000).toFixed(2) + '亿';
						} else {
							return String(amount).split(".")[1] ? amount.toFixed(type) : amount;
						}
					} else {
						if (amount > 9999 && amount < 10000000) {
							return (amount / 10000).toFixed(type) + '万';
						} else if (amount > 10000000) {
							return (amount / 100000000).toFixed(type) + '亿';
						} else {
							return Number(amount).toFixed(type);
						}
					}

				} else {
					return "--";
				}

			}
		},
		formatfin: function(amount) {
			return (amount * 100).toFixed(1);
		},
		formatWan: function(amount) {
			return (amount / 10000).toFixed(1);
		},
		intervalTimeline: function(cancel, lineType) {
			$('#stock_canvas').show();
			if (!lineType) {
				$('.stock_line p a').forEach(function(item, ind, arr) {
					if ($(item).hasClass('hover')) {
						lineType = $(item).attr('line_type');
					}
				})
			}
			if (cancel === false) {
				clearInterval(this.interval);
				return;
			}
			this.readStockData();
			drawTimeLine(this.canvas, this.valcanvas, lineType);
			//console.log(lineType);
			var that = this;
			// this.model.set("update_time",new Date().Format("yyyy/MM/dd hh:mm:ss"));
		},

		toggleNews: function(e) {
			App.commobj.removeDisclaimer();
			App.quoteView.finace = false;
			var stockCode = App.commobj.getUrlParam('code');
			if (App.quoteView.tabLength > 5) {
				var id = $(e.target).closest('.swiper-slide').attr('data-id');
				App.quoteView.slideToPosition(id);
			}
			window.endFlag = false; /**以下三个参数控制下拉加载更多的样式**/
			window.scrollAble = true;
			window.noContent = false;
			$(e.target).html() == "资金" ? $(".news").css("margin-bottom", "1rem") : $(".news").css("margin-bottom", "1.5rem");
			//isFirst  = false;			
			//切换到资金时隐藏正在加载中
			$('.tips,.pull_refresh').hide();
			var centerY = $("#trend").offset().top + $("#trend").height() + parseInt($(".time").css("margin-bottom"));
			scrollHeight = centerY - $('#stock').height();
			scrollFlag ? $("body").scrollTop(scrollHeight) : "";
			var indexl_tab = 0;
			this.$el.find(".stock_info_all p a").each(function(index, el) {
				var that = $(this);
				if (that.hasClass('hover')) {
					indexl_tab = index;
					return false;
				}
			})
			this.$el.find(".stock_info_all p a").removeClass("hover");
			var el = $(e.currentTarget),
				appName;
			var linkto = el.attr("linkto");
			el.addClass("hover");
			var newobj = $('.stock_news_list'),
				finaceObj = $('.stock_info');
			App.quoteView.type = "";
			newobj.show();
			finaceObj.hide();
			$("#jzlr").hide();
			if (linkto == '.stock_news_list') {
				tongji.customEvent('hq103_2',300,stockCode,App.commobj.getUrlParam('u'));
				//finaceObj.show();
				App.quoteView.type = "news"
				INFO.newslist();
			} else if (linkto == '.stock_announcement_list') {
				tongji.customEvent('hq103_3',300,stockCode,App.commobj.getUrlParam('u'));
				//finaceObj.show();
				INFO.ansList();
				App.quoteView.type = "notice";
			} else if (linkto == '.reserach_news_list') {
				tongji.customEvent('hq103_4',300,stockCode,App.commobj.getUrlParam('u'));
				//finaceObj.show();
				INFO.researchlist();
				App.quoteView.type = "reserach";
			} else if (linkto == '.stock_finace_list') {
				tongji.customEvent('hq103_1',300,stockCode,App.commobj.getUrlParam('u'));
				//newobj.show();
				$("#jzlr").show();
				//DRAW.coins(App.quoteView.stock_code);
				//this.stocktimer();
				INFO.finace();
				App.quoteView.finace = true;
			} else if (linkto == '.deep_data') {
				App.quoteView.leave = true;
				$(".stock_info_all p a").eq(indexl_tab).addClass('hover');
				window.location.href = "secudiagnosis.html?s=" + App.quoteView.stock_code.split(".")[0] + "&p=HSJY_1025&u=abc123&t=white&v=1.0&n=getDate()";
				el.removeClass("hover");
			} else if (linkto == '.F10') {
				tongji.customEvent('hq103_5',300,stockCode,App.commobj.getUrlParam('u'));
				App.quoteView.leave = true;
				$(".stock_info_all p a").eq(indexl_tab).addClass('hover');
				var url = "f10.html?s=" + App.quoteView.stock_code.split(".")[0],
					p = App.commobj.getUrlParam("p"),
					u = App.commobj.getUrlParam("u");
				if (p || u) {
					url = u ? url + "&pagetitle=F10&p=" + p + "&u=" + u + "&v=1.0&gh=0&n=getDate()" : url + "&p=" + p + "&v=1.0&gh=0&n=getDate()";
				} else {
					url = url + "&pagetitle=F10&p=HSJY_1025&u=abc123&v=1.0&gh=0&n=getDate()";
				}
				window.location.href = url;
				el.removeClass("hover");
			} else if (linkto == '.chain') {
				tongji.customEvent('hq103_6',300,stockCode,App.commobj.getUrlParam('u'));
				App.quoteView.leave = true;
				$(".stock_info_all p a").eq(indexl_tab).addClass('hover');
				var code = App.quoteView.stock_code.split('.')[0];
				window.location.href = window.data.chain_url + code;
				el.removeClass("hover");

			} else if (linkto == '.stockDia') {
				App.quoteView.leave = true;
				$(".stock_info_all p a").eq(indexl_tab).addClass('hover');
				var code = App.quoteView.stock_code.split('.')[0];
				//var url = window.data.stockDia_url + code,
				var url = "secudiagnosis.html?s="+ code,
					p = App.commobj.getUrlParam("p"),
					u = App.commobj.getUrlParam("u");
				if (p || u) {
					//url = u ? url + "&p=" + p + "&u=" + u + "&h=0#/secudiagnosis" : url + "&p=" + p + "&h=0#/secudiagnosis";
					url = u ? url + "&p=" + p + "&u=" + u + "&h=0#/secudiagnosis" : url + "&p=" + p + "&#/secudiagnosis";
				} else {
					url = url + "&p=HSJY_1025&u=lights&h=0#/secudiagnosis";
				}
				window.location.href = url;
				el.removeClass("hover");

			} else {
				App.quoteView.type = "data";
				this.readCompInfo();
				newobj.hide();
				finaceObj.show();
				//$("#jzlr").show();
			}
		},
		readCompInfo: function() {
			var that = this;
			var funcId = ['20101002', '20101001']
				//收入构成
			API.query(App.quoteView.stock_code, '20101004', function(ret) {
					var data = ret.data[0]['20101004'][0][App.quoteView.stock_code]; //业务输入的构成
					if (!data || data.length < 1) {
						return;
					}
					var data2 = new Array();
					var refDate = data[0].report_date;
					for (var i = 0; i < data.length; i++) {
						if (refDate == data[i].report_date) {
							data2.push(data[i]);
						}
					}
					var tpl = _.template('<%_.each(list,function(row){%><tr><td  style="">\
                	<%=row.industry%></td><td><%=row.main_oper_income_rate%>%<span>\
                	<%var x=App.quoteView.formatBalance(parseFloat(row.main_oper_income).toFixed(2));%>\
                	<%=x%></span></td></tr><%})%>')
					$("table.profileinfo").html(tpl({
						"list": data2
					}));
				})
				//十大流通股东
			API.query(App.quoteView.stock_code, "20101014", function(ret) {
					var data = ret.data[0]['20101014'][0][App.quoteView.stock_code];
					if (data == '') {
						$('.gd_info').hide();
					} else {
						var data = ret.data[0]['20101014'][0][App.quoteView.stock_code];
						var tpl = _.template('<%_.each(list,function(row){%><tr><td><%=row.sh_list%></td>\
            			<td style="text-align:right;"><% var x=parseFloat(row.pct_of_total_shares).toFixed(2);\
            			%><%=x%>%</td><%})%>');
						$(".gd_info_list").html(tpl({
							"list": data
						}));
					}

				})
				//公司概况，操盘必读
			API.query(App.quoteView.stock_code, funcId.join(","), function(ret) {
				for (var i = ret.data.length - 1; i >= 0; i--) {
					for (var key in ret.data[i]) {
						var _d = ret.data[i][key][0][App.quoteView.stock_code][0];
						for (var _key in _d) {
							if (_d[_key].indexOf(".") > -1 && _d[_key].indexOf(",") < 0) {
								_d[_key] = parseFloat(_d[_key]).toFixed(2);
							} else if (/^[\d]*$/.test(_d[_key]) || _key == "ipo_proceeds") {
								_d[_key] = App.quoteView.formatBalance(_d[_key].replace(/,/g, ""))
							}
							that.model.set(_key, _d[_key]);
						}
					}
				};
			});
		},
		//深度数据
		deep_data: function(appName, color, iframeId) {
			var that = this,
				version = '1.0';
			var stock = App.quoteView.stock_code.split('.')[0];
			$(".stock_news_list").html('<iframe  id=' + iframeId + ' class="iframeId" name="mainframe" onload="iframeAutoFit(this,' + iframeId + ')" frameborder="0" scrolling="no"  style="width:100%;outline:none;" src=' + API.getLightURL(appName, stock, color, version) + '></iframe>');

		},
		//样式处理
		changeHBG: 　 function(span1, span2, span4, tspan4) {
			var rate = this.model.get("px_change_rate");
			var preclose_px = Number(this.model.get("preclose_px"));
			var last_px = Number(this.model.get("last_px")),
				heighest_px = Number(this.model.get("high_px")),
				lowest_px = Number(this.model.get("low_px")),
				open_px = Number(this.model.get("open_px")),
				px_change_rate = Number(rate.substring(0, rate.length - 1)),
				px_change = Number(this.model.get("px_change"));
			var bgDom = this.$el.find('div.data');
			var height = bgDom.find('span.height');
			var low = bgDom.find('span.low');
			var open = bgDom.find('span.open');
			if (px_change_rate > 0) {
				span1.removeClass("quote-bg-fall").addClass("quote-bg-rise");
				span2.removeClass("quote-bg-fall").addClass("quote-bg-rise");
				$('.px_rate').removeClass("quote-bg-fall").addClass("quote-bg-rise");
				$("#scroll_px_change_rate,#scroll_px_change,#scroll_last_px").removeClass("quote-bg-fall quote-bg-wechat").addClass("quote-bg-rise");
			} else if (px_change_rate < 0) {
				span1.removeClass("quote-bg-rise").addClass("quote-bg-fall");
				span2.removeClass("quote-bg-rise").addClass("quote-bg-fall");
				$('.px_rate').removeClass("quote-bg-rise").addClass("quote-bg-fall");
				$("#scroll_px_change_rate,#scroll_px_change,#scroll_last_px").addClass("quote-bg-fall").removeClass("quote-bg-rise quote-bg-wechat");
			} else {
				span1.removeClass("quote-bg-rise").removeClass("quote-bg-fall");
				span2.removeClass("quote-bg-rise").removeClass("quote-bg-fall");
				$('.px_rate').removeClass("quote-bg-rise").removeClass("quote-bg-fall");
				$("#scroll_px_change_rate,#scroll_px_change,#scroll_last_px").removeClass("quote-bg-fall quote-bg-wechat quote-bg-rise") /*.add("color","#fff")*/ ;
			}
			//修复bug:平盘时显示
			px_change > 0 ? $("#px_change").removeClass("quote-bg-fall").addClass("quote-bg-rise") : $("#px_change").addClass("quote-bg-fall").removeClass("quote-bg-rise");
			px_change == 0 ? $("#px_change").removeClass("quote-bg-fall").removeClass("quote-bg-rise") : "";
			if (last_px >= preclose_px && tspan4) {
				//tspan4.removeClass("quote-bg-fall").addClass("quote-bg-rise");
				$('.px_last').removeClass("quote-bg-fall").addClass("quote-bg-rise");
			} else {
				$('.px_last').removeClass("quote-bg-rise").addClass("quote-bg-fall");
				//if(tspan4)
				//tspan4.removeClass("quote-bg-rise").addClass("quote-bg-fall");
			}
			if (heighest_px > preclose_px) {
				height.removeClass("quote-bg-fall").addClass("quote-bg-rise");
			} else if (heighest_px < preclose_px) {
				height.removeClass("quote-bg-rise").addClass("quote-bg-fall");
			} else {
				height.removeClass("quote-bg-fall").removeClass("quote-bg-rise");
			}
			if (open_px > preclose_px) {
				open.removeClass("quote-bg-fall").addClass("quote-bg-rise");
			} else if (open_px < preclose_px) {
				open.removeClass("quote-bg-rise").addClass("quote-bg-fall");
			} else {
				open.removeClass("quote-bg-fall").removeClass("quote-bg-rise");
			}
			if (lowest_px > preclose_px) {
				low.removeClass("quote-bg-fall").addClass("quote-bg-rise");
			} else if (lowest_px < preclose_px) {
				low.removeClass("quote-bg-rise").addClass("quote-bg-fall");
			} else {
				low.removeClass("quote-bg-fall").removeClass("quote-bg-rise");
			}
			$('.data-block span').forEach(function(item) {
				if ($(item).html() == '--') {
					$(item).addClass('quote-bg-nomal').removeClass("quote-bg-rise").removeClass("quote-bg-fall");
				}
			});
		},
		changeHeader: function() {
			var bgDom = this.$el.find('div.data');
			var span1 = bgDom.find('span.span1');
			var span2 = bgDom.find('span.span2');
			var span4 = bgDom.find('span.span4');
			var tspan4 = this.$el.find('.level-data .span2');
			var status = App.quoteView.trade_status;
			$('#secu_abbr').html(App.quoteView.secu_abbr);
			$('#s_code').html(App.quoteView.s_code);
			$('#scroll_abbr').html(App.quoteView.secu_abbr);
			$('#scroll_code').html(App.quoteView.s_code);
			$('#nstock').html(App.quoteView.secu_abbr);
			$('#cstock').html(App.quoteView.s_code);
			if (App.quoteView.secu_abbr.length < 34) {
				$('#nstock').removeClass('nstock');
				$('#cstock').removeClass('cstock');
			}
			if (status == "HALT" || status == "SUSP" || status == "") {
				span1.addClass("quote-bg-nomal");
				span2.addClass("quote-bg-nomal");
				span4.addClass("quote-bg-nomal");
				tspan4.addClass("quote-bg-nomal");
			} else {
				span1.removeClass("quote-bg-nomal");
				span2.removeClass("quote-bg-nomal");
				span4.removeClass("quote-bg-nomal");
				tspan4.removeClass("quote-bg-nomal");
			}
			if (status == "BREAK") {
				this.changeHBG(span1, span2);
			} else if (status == "ENDTR") {
				this.changeHBG(span1, span2, span4, tspan4);
			} else if (status == "START") {
				this.changeHBG(span1, span2, span4, tspan4);
			} else if (status == "PRETR") {
				this.changeHBG(span1, span2, span4, tspan4);
			} else if (status == "OCALL") {
				this.changeHBG(span1, span2, span4, tspan4);
			} else if (status == "TRADE") {
				this.changeHBG(span1, span2, span4, tspan4);
			} else if (status == "HALT") {
				$("#q_status").html("暂停交易");
			} else if (status == "SUSP") {
				$("#q_status").html("停盘");
			} else if (status == "POSTR") {
				$("#q_status").html("盘后");
			} else if (status == "") {
				$("#q_status").html("");
			}
		},
	});
	var timer_stoped = false;
	var stck = '<div class="t-line" style="" ><canvas id="canvas" class="canvas" height="190"  \
></canvas>\
</div>';

	function drawTimeLine(el, valel, func) {
		if (timer_stoped) { //定时器停止
			App.quoteView.stocktimer(); //启动定时器
		}

		func = func ? func : null;
		$('#stock_canvas').html(stck);
		$('#stock_canvas_kline').hide();
		$('#stock_canvas_kline').html('');
		$('#line_shstock').removeClass('chart-width');
		$('.s-ma-text').hide();
		$('.s-new-text').show();
		var _datas = func == 'trend5day' ? App.quoteView.trend5Data : App.quoteView.trendData;
		//console.log("drawTimeLine:", _datas, func, App.quoteView.trend5Data, App.quoteView.trendData);
		$('#con-hight').hide(); //默认高度
		//$('#s_loading').html('<div style="margin:auto;width: 20%;height:5.58rem"><img src="images/load.gif" style="margin: 100% 0;width: 0.31rem;height: 0.31rem;vertical-align: -.04rem;"></div>').show();
		//$('#s_chart').hide();
		var xScaler = [];
		if (_datas == undefined) {
			var drawData = {};
			//原代码存在异步bug，此处做安全屏蔽处理
			(function() {
				if (App.quoteView.stock_code != App.quoteView.last_code) {
					//App.quoteView.last_code="";
					//App.quoteView.last_code=App.quoteView.stock_code;
					//第一次调用显示分时图
					//StockGraph.draw("分时",App.quoteView.stock_code);
					App.quoteView.period ? StockGraph.draw(App.quoteView.period, App.quoteView.stock_code) : StockGraph.draw("分时", App.quoteView.stock_code);
				}
			})();
			 API.trend(App.quoteView.stock_code, func, function(data) {
			 	var _data = [],
			 		first_tmp, code = App.quoteView.stock_code;
			 	data.data.trend[App.quoteView.stock_code].forEach(function(data, index, t) {
			 		var fristime = data[0] + ""; //获取时间
			 		if (fristime && fristime.substring(fristime.length - 3, fristime.length) == '900') {
			 			App.quoteView.clock_timeline = ['9:00', '15:00'];
			 			App.quoteView.points_timeline = 241;
			 		}
			 		if (func == 'trend5day') { // 五日分时需处理
			 			var times = data[0] + "";
			 			var date = times.substring(4, 8);
			 			var d = date.split('');
			 			var ydate = times.substring(0, 8);
			 			for (var i = 1; i < d.length + 1; i++) {
			 				if ((i % 2 == 0) && (i < d.length)) {
			 					d[i - 1] = d[i - 1] + "-";
			 				} else {
			 					d[i - 1] = d[i - 1] + "";
			 				}
			 			}

			 			var last_d = d.join("");
			 			if ($.inArray(last_d, xScaler) == -1) {
			 				xScaler.push(last_d);
			 			}
			 			App.quoteView.clocker_trend5day = xScaler;
			 			if ($.inArray(App.quoteView.market, ['XSGE', 'XDCE', 'XZCE']) > -1) {
			 				if (index == 0) {
			 					first_tmp = times.substring(0, 8);
			 				}
			 				var year = new Date().getFullYear();
			 				var week = new Date(year + "/" + last_d.replace('-', '/')).getDay();

			 				if ((ydate == first_tmp || week == 6) && App.quoteView.points_trend5day != 1203) {
			 					return;
			 				}
			 			}
			 		}
			 		//分时数据不做处理
			 		_data.push({
			 			min_time: data[0],
			 			last_px: data[1],
			 			business_amount: data[2],
			 			business_balance: data[3] || data[2] * data[4],
			 			avg_px: data[4]
			 		});
			 		App.quoteView.model.set('avg_px', data[4]);
			 	});

			 	if (App.quoteView.model.get('avg_px') == '0') {
			 		$('.ma-title .px_av').hide();
			 	} else if ($.inArray(App.quoteView.stock_code, ['399001.SZ', '000001.SS', '1A0001.SS', '2A01.SZ', '399006.SZ']) > -1) {
			 		$('.ma-title .px_av').show();
			 		$('.ma-title .px_av label').html('领先:');
			 	} else {
			 		$('.ma-title .px_av').show();
			 		$('.ma-title .px_av label').html('均价:');
			 	}
			 	var real_fields = 'open_px,high_px,low_px,last_px,business_amount,business_balance,preclose_px,px_change,px_change_rate,pe_rate,circulation_value';
			 	API.real(App.quoteView.stock_code, real_fields, function(ret) {
			 		var fields = ret.data.snapshot.fields;
			 		var data = ret.data.snapshot[App.quoteView.stock_code];
			 		if (!data) {
			 			return;
			 		}
			 		var data_quote = {
			 			time: data[0],
			 			open: data[2],
			 			preClose: data[8],
			 			highest: data[3],
			 			lowest: data[4],
			 			price: data[5],
			 			volume: data[7] || data[5] * data[6],
			 			amount: data[6],
			 			circ: data[12]
			 		};
			 		if (func == 'trend5day') {
			 			var x_clocker = App.quoteView.clocker_trend5day;
			 			if (x_clocker && x_clocker.length > 5) { // 期货有7天的分时数据，需要处理成为5日数据。
			 				x_clocker.splice(0, 1);
			 				var year = new Date().getFullYear();
			 				for (var m = 0; m < x_clocker.length; m++) {
			 					var date = year + "/" + x_clocker[m].replace("-", "/");
			 					var week = new Date(date).getDay();
			 					if (week == 6) {
			 						x_clocker.splice(m, 1);
			 						App.quoteView.clocker_trend5day = x_clocker;
			 						break;
			 					}
			 				}
			 			}

			 			App.quoteView.clocker = App.quoteView.clocker_trend5day;
			 			App.quoteView.points = App.quoteView.points_trend5day
			 		} else {
			 			App.quoteView.clocker = App.quoteView.clock_timeline;
			 			App.quoteView.points = App.quoteView.points_timeline;
			 		}
			 		if (code == App.quoteView.stock_code) {
			 			var chart = DRAW.trendChart({
			 				quote: data_quote,
			 				mins: _data,
			 				wins: App.quoteView.coin || []
			 			}, func, data_quote['preClose']);
			 		}

			 		App.quoteView.preclose_px = data_quote['preClose'];

			 		if (func == 'trend5day') {

			 			App.quoteView.trend5Data = {
			 				quote: data_quote,
			 				mins: _data,
			 				wins: App.quoteView.coin || []
			 			};
			 		} else {
			 			App.quoteView.trendData = {
			 				quote: data_quote,
			 				mins: _data,
			 				wins: App.quoteView.coin || []
			 			};
			 		}

			 	});
			 });
		} else {
			if (func == 'trend5day') {
				App.quoteView.clocker = App.quoteView.clocker_trend5day;
				App.quoteView.points = App.quoteView.points_trend5day;

			} else {
				App.quoteView.clocker = App.quoteView.clock_timeline;
				App.quoteView.points = App.quoteView.points_timeline;

			}
			//$('.a-amount-text').find('span').eq(0).html("成交量:" + amount / 100);
			if (App.quoteView.period == undefined) {
				App.quoteView.period = "分时";
			}
			// var chart = DRAW.trendChart(_datas, func, App.quoteView.preclose_px);
			// DRAW.trendTimer(chart, func);


		}
	}

	var khtml = '<div class="k-line" style=" "> <canvas id="canvas" class="canvas" ></canvas>\
    </div>';
	//<div class="ma-title c-ma-text " style="position: absolute;bottom:1.6rem; left: -.08rem;">\</div>
	function drawKLine(el, type, size) {
		timer_stoped = true; //分时定时器关闭
		clearInterval(App.quoteView.quoteTimer);
		$('#line_shstock').addClass('chart-width');
		$('.time-level').hide();
		var _data = App.quoteView.klineData[type];
		//$('#s_loading').html('<div style="margin:auto;width: 20%;height:5.58rem"><img src="images/load.gif" style="margin: 100% 0;width: 0.31rem;height: 0.31rem;vertical-align: -.04rem;"></div>').show();
		$('.s-new-text').hide();
		if (!_data) {
			// alert(_data);
			API.kline(App.quoteView.stock_code, type, function(data) {
				var n_data = [];
				var code = App.quoteView.stock_code;

				function avg(data, index, num) {
					var sum = 0;
					for (var i = index; i > 0 && i > index - num; i--) {
						sum += data[i][4];
					}
					return sum / (index - i);
				}

				function cavg(data, index, num) {
					var amount = 0;
					for (var i = index; i > 0 && i > index - num; i--) {
						amount += data[i][5];
					}
					return amount / (index - i);
				}
				var datalength = data.data.candle[App.quoteView.stock_code].length;
				data.data.candle[App.quoteView.stock_code].forEach(function(d, index, t) {
					var k = {
						time: d[0],
						open_px: d[1],
						high_px: d[2],
						low_px: d[3],
						close_px: d[4],
						business_amount: d[5],
						business_balance: d[6] || d[5] * d[4],
						ma_5: avg(t, index, 5),
						ma_10: avg(t, index, 10),
						ma_20: avg(t, index, 20),
						ma_30: avg(t, index, 30),
						cma_5: cavg(t, index, 5),
						cma_10: cavg(t, index, 10)
					};
					if (t.length > 220) {
						if (index >= 30) {
							n_data[index - 30] = k;
						}
					} else {
						n_data[index] = k;
					}
				});
				//$('#s_chart').show();
				//$('#s_loading').html('');
				App.quoteView.klineData[type] = n_data;
				if (code == App.quoteView.stock_code) {
					$('#stock_canvas_kline').html(khtml);
				}
				//DRAW.klineChart(n_data);
				$('.s-ma-text').show();
			});
		} else {
			//$('#s_chart').show();
			//$('#s_loading').html('');
			$('.s-ma-text').show();
			$('#stock_canvas_kline').html(khtml);
			//DRAW.klineChart(_data);
		}
	};

})(Zepto);
$(window).scroll(function() {
	/*var throttled = _.throttle(updatePosition, 100);*/
	var scrollTop = $(this).scrollTop();
	var contentH = $(document).height();
	var windowH = $(this).height();
	//isFirstEnter = false;
	//var refresh = parseInt($(".pull_refresh").css("height"));
	App.quoteView.aFlag = ($("#news").css("display") == "block") ? true : false;
	App.quoteView.aFlag == true ? App.quoteView.usFlag = false : "";
	if (App.quoteView.market == 'XBHS' || App.quoteView.aFlag == true || App.quoteView.usFlag == true) { //定位菜单
		var screenH = screen.height;
		//var topheight = $('#xbhs .kline').offset().top||$('#news .kline').offset().top||$('#usa .kline').offset().top ;
		//var offset = $("#trend").offset().top;
		var contH = $('#trend').offset().top;
		var visibleBottom = window.scrollY + document.documentElement.clientHeight;
		var visibleTop = window.scrollY;
		var stockHeight = $('#stock').height();
		visibleTop += stockHeight;
		var centerY = $("#trend").offset().top + $("#trend").height() + parseInt($(".time").css("margin-bottom"));
		var dom = App.quoteView.market == 'XBHS' ? "#xbhs" : (App.quoteView.usFlag == true ? "#usa" : "#news"),
			klineDom = App.quoteView.market == 'XBHS' ? "#xbhs .kline" : (App.quoteView.usFlag == true ? "#usa .kline" : "#news .kline"),
			downDom = App.quoteView.market == 'XBHS' ? "#xb_down_list" : (App.quoteView.usFlag == true ? "#usa" : "#news"),
			stickyDom = App.quoteView.market == 'XBHS' ? "#stickyTab" : (App.quoteView.usFlag == true ? "#usTab" : "#newsTab");
		//不支持sticky属性则用js控制修改
		if (!isSupportSticky()) {
			//alert(klineDom);
			if (!(centerY > visibleTop && centerY < visibleBottom)) {
				scrollFlag = true;
				var  mgb = $(dom).css('margin-bottom');
				$(dom).attr('style', '');
				$(dom).css('margin-bottom',mgb);
				$(klineDom).addClass('xbhs');
				$(downDom).css('padding-top', '.64rem');
			} else /*if(topheight < contH)*/ {
				$(klineDom).removeClass('xbhs');
				$(downDom).css('padding-top', '0rem');
				scrollFlag = false;
			}
		} else {
			if (!(centerY > visibleTop && centerY < visibleBottom)) {
				scrollFlag = true;
				//console.log("111111"+$("body").scrollTop())
			} else {
				scrollFlag = false;
			}
			$(stickyDom).addClass("klineSticky");
		}
	}
	//以下为资讯下拉加载更多的判断
	if (scrollTop + windowH >= contentH && scrollAble) {
		var obj = $("#quote").css("display");
		var news = ($("#news").css("display") == "block");
		var xb_down_list = ($("#xb_down_list").css("display") == "block")
		if (obj == "block") {
			if (App.quoteView.type == "news") {
				news ? INFO.newslist(true) : "";
			} else if (App.quoteView.type == "reserach") {
				news ? INFO.researchlist(true) : "";
			} else if (App.quoteView.type == "notice") {
				news ? INFO.ansList(true) : "";
			}
			if (App.quoteView.market == 'XBHS') {
				if (!sortFlag) {
					xb_down_list ? App.quoteView.bordZDF() : "";
				}

			}
		}
	}
	/******
	当滑过股价详情一般时上面的标题栏发生变化,显示为股票详情
	******/
	if (scrollTop >= 20) {
		isFirstEnter = false;
	}
	if (!isFirstEnter) {
		if (scrollTop > 20) {
			$("#stockCode").removeClass("fadeInDown").addClass("animated fadeOutUp").hide();
			setTimeout(function() {
				$("#stock_content").removeClass("fadeOutDown").show().addClass("animated fadeInUp")
			}, 250);
			//$(".top-header p").css("width","100%");
			//$(".top-header").css("height",".58rem");
		} else {
			//$("#stockCode").addClass("animated fadeInDown");
			//$("#stock_content").hide();
			$("#stockCode").removeClass("fadeOutUp").show().addClass("animated fadeInDown");
			setTimeout(function() {
				$("#stock_content").removeClass("fadeInUp").addClass("fadeOutDown").hide()
			}, 250);
		}
	}

});
//$(window).scroll(throttled);