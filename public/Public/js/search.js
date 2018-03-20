/**
 * VIEW search
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
;
(function() {
  var search_obj = {
    myOptional: [],
    /*自选股列表*/
    keyType: 0,
    /*0--数字键盘 1--英文键盘*/
    isFirstOpenKey: true,
    /*是否第一次打开键盘*/

    historyLen: 20 /*历史记录最大长度*/
  };


  var token = App.commobj.getValue("token");
  var user_param = {
    user_id: App.commobj.getValue("user_id")
  };
  var isLogin = App.commobj.getValue("isLogin");
  var timer; //语音动画循环计时器
  var t,t1,t2,t3,t4,t5;
  

  /*设置列表高度*/
  var set_search_list_height = function() {
    if ($("#num_div").css("display") === 'none' && $("#E_div").css("display") === 'none') {
      $("#search_list").height("100%");
    } else if ($("#num_div").css("display") === 'none' && $("#E_div").css("display") != 'none') {
      $("#search_list").height($("body").height() - $("#search_header").height() - $("#E_div").height());
    } else {
      $("#search_list").height($("body").height() - $("#search_header").height() - $("#num_div").height());
    }

  };
  var tml = _.template('<h2>为您找到以下内容</h2><ul><%_.each(list,function(row){%>\
        <% var class_name = "add_btn";if(row.isMy){class_name = "del_btn"}%>\
        <li><div class="stock_div"><p class="name"><%=row.prod_name%></p><p class="code"><%=row.prod_code%></p></div>\
        <div class="btn_div"><a class= "add_btn" style= "<%= row.isMy?"display:none":"display:block" %>"></a><a class="del_btn" style="<%= row.isMy?"display:block":"display:none"%>"></a></div></li>\
        <%})%></ul>');
  var changeType = function(type) {
    if (type == 0) {
      /*切换成数字键盘*/
      App.commobj.store("keyType", 0);
      $("#num_div").show();
      $("#E_div").hide();

    } else {
      /*切换成英文键盘*/
      App.commobj.store("keyType", 1);
      $("#num_div").hide();
      $("#E_div").show();

    }

    var time_c = 0;
    if (search_obj.isFirstOpenKey) {
      time_c = 200;
    }
    setTimeout(function() {
      set_search_list_height();
    }, time_c);


  };

  var get_my_list = function(olist) {
    var nlist = [];
    for (var i = 0; i < olist.length; i++) {
      var obj = olist[i];
      /*匹配自选股*/
      if ($.inArray(obj.prod_code, search_obj.myOptional) != -1) {
        $.extend(obj, {
          isMy: true
        });
      } else {
        $.extend(obj, {
          isMy: false
        });
      }
      nlist.push(obj);
    }
    return nlist;
  };

  /*展示历史搜索*/
  var showHistory = function() {

    /*移除搜索查询结果*/
    /*$($("#search_list_div").find("ul"))[0].remove();
    $($("#search_list_div").find("h2"))[0].remove();*/

    window.changeList = "";
    var list_str = App.commobj.getValue("history");
    var list_name_str = App.commobj.getValue("history_name");
    var list_zh = [];
    /*展示历史*/
    if (list_str && list_name_str) {

      var list = list_str.split(",");
      var list_name = list_name_str.split("|");

      for (var i = 0; i < list.length; i++) {
        if (list[i]&&list_name[i]!==""){
              list_zh.push({
                prod_code: list[i],
                prod_name: list_name[i]
              });
            window.changeList += list[i]+",";
        }
          
      }
      //console.log(changeList);
      //
      var tml_h = _.template('<h2>历史搜索<a class="empty qc_btn" href="javascript:;">清空</a></h2><ul><%_.each(list,function(row){%>\
        <% var class_name = "display:none";if(row.isMy){class_name = "display:block"}%>\
        <li><div class="stock_div"><p class="name"><%=row.prod_name%></p><p class="code"><%=row.prod_code%></p></div>\
        <div class="btn_div"><a class= "add_btn" style= "<%= row.isMy?"display:none":"display:block" %>"></a><a class= "del_btn" style= "<%= row.isMy?"display:block":"display:none" %>"></a></div></li>\
        <%})%></ul>');

      var html = tml_h({
        "list": get_my_list(list_zh)
      });
      $("#search_list_div").html(html);
      // bind_tap();
    }


  };
    //保存访问过的历史记录
  var storage = function(code, name) {
    if (App.commobj.getValue("history")) {

      var list = App.commobj.getValue("history").split(",");
      var names = App.commobj.getValue("history_name");
      var list_name = names ? names.split("|") : names;

      //if(str instanceof Array){
      //  list = str;
      //}else{
      //  list.push(str);
      //}
      if ($.inArray(code, list) == -1) {
        //list.push(code);
        //list.reverse();
        /*超过上限删最后一条*/
        if (list.length > search_obj.historyLen - 1) {
          list.splice(search_obj.historyLen - 1, 1);
          list_name.splice(search_obj.historyLen - 1, 1);
        }

      } else {
        /*已经存在的 先删除 再排到最前面*/
        //console.log($.inArray(code,list));
        /*** add by wyy
        新股上市第一天的名称和之后的不一样，故做此处理
        删除老的股票名称，更换为新的
        ***/
        var index = $.inArray(code, list)
        list.splice(index, 1);
        $.inArray(name, list_name)==-1?list_name.splice(index, 1): list_name.splice($.inArray(name, list_name), 1);
      }
      App.commobj.store("history", "");
      App.commobj.store("history_name", "");
      /*刚点的放最前面*/
      App.commobj.store("history", code + "," + list.toString());
      App.commobj.store("history_name", name + "|" + list_name.join("|"));
    } else {
      App.commobj.store("history", code);
      App.commobj.store("history_name", name);
    }
  };
  
  
  var quote = function(code) {
    //console.log(changeList);
    var url = location.href.replace(/#.*/, '#quote?code='+code);  
    App.commobj.setCookie("stocks",window.changeList);  
    window.location.replace(url);
    //window.location.href = '#quote?code='+code/*+"&refer=search"*/;
  };
  var set_default = function() {
    $("#code_m").css("color", "#999");
    $("#code_s").html("请输入股票代码/拼音简称");
    $('head').append("<style>.gb:before{ left:0.68rem}</style>");
    showHistory();
  };
  /*查询股票*/
  var quer_stock = function(isYY) {
      var value = $("#code_s").html();
      //if(value.length>1)
      App.OpenAPI.get('api/wizard/?prod_code=' + value + '&data_count=20&en_finance_mic=SS,SZ,O,N,HKM,XSGE,XZCE,XDCE,CCFX', null, function(data) {
        window.changeList = "";
        var list_r = [],newList=[];
        var list = data.data;
        //newList = list.slice(0);
        for(var i=0;i<list.length;i++){
          list[i].prod_name!=""?newList.push(list[i]):"";
        }
        if (newList) {
          list_r = get_my_list(newList)
        }
        var html = tml({
          "list": list_r
        });
        for(var i=0;i<newList.length;i++){
          window.changeList+= newList[i].prod_code+",";
        }
        //console.log(window.changeList);
        if (isYY && list_r.length == 1) { //语音搜索
          var code = list_r[0].prod_code;
          var name = list_r[0].prod_name;
          quote(code);
          storage(code, name);
        } else if (isYY && list_r.length == 0) {

        }


        $("#search_list_div").html(html);

        // bind_tap();

      }, function(resp) {
        //alert(error);
        if (isYY && resp.error_code == '1') { //无股票
          $('.yuyin_none').show();
          setTimeout(function() {
            $('.yuyin_none').hide();
          }, 2000);
          set_default()
          return;
        }
      });



    }
  
  var set_gb_left = function(isYY) {
    if ($("#code_s").html().length > 0) {
      var left_w = parseInt($("#code_m").css('padding-left')) + $("#code_s").width() + 2;
      $('head').append("<style>.gb:before{ left:" + left_w + "px }</style>");
      $("#code_m").css("color", "#333");
      quer_stock(isYY);
    } else {
      set_default();
    }
  };
  var clearOne = function() {
    var color_val = $("#code_m").css("color");
    var html_s = $("#code_s").html();
    if (color_val === 'rgb(153, 153, 153)') {

    } else {
      if (html_s.length > 0) {
        $("#code_s").html(html_s.substr(0, html_s.length - 1));
        set_gb_left();
      } else {
        //set_default();
      }
    }

  };
  var hideKey = function() {
    $("#num_div").hide();
    $("#E_div").hide();
    set_search_list_height();
  };

  var showKey = function() {
    if ($("#num_div").css("display") === 'none' && $("#E_div").css("display") === 'none') {
      $("#num_div").show();
      $("#E_div").hide();
      set_search_list_height();
    }
  };
  
  var sureFun = function() {
    /*todo 有搜索到结果，点击键盘确定按钮，就进入第一只股票的行情详情页*/
    //判断是否有搜索结果
    var res = $('#search_list_div ul').html();
    if (res) {
      var htm = $('#search_list_div ul').find('li').eq(0);
      var code = htm.find(".code").html();
      var name = htm.find(".name").html()
      storage(code, name);
      quote(code);
    }
  };

  
  var sub_code = function(param, isAfter) {
    /*从小数点截断*/
    if (isAfter) {
      return param.substr(param.indexOf(".") + 1);
    } else {
      return param.substr(0, param.indexOf("."));
    }

  };
  
  var editMy = function(type, code_o, stock_name, obj) {
    var wxisLogin = App.commobj.getValue("wxisLogin");
    var code = sub_code(code_o);
    var code_type = sub_code(code_o, true);
    if (type == 'add_btn') {
      if (App.commobj.getValue("isLogin") == 1) {
        token = App.commobj.getValue("token");
        $.ajax({ //增加自选
          type: 'POST',
          url: _.fstock + "addStock.json?",
          data: {
            stock_code: code,
            stock_market: code_type
          },
          beforeSend: function(req) {
            req.setRequestHeader("authorization", token);
          },
          success: function(data) {
            if (data.success == true) {
              //console.log("第一次添加自选股成功");
              var ss = data.data;
              $(obj).find('.del_btn').show();
              $(obj).find('.add_btn').hide();
              App.commobj.addstocklocal(code_o, "add"); //添加到缓存中去20160613
              search_obj.myOptional.push(code_o);
            } else {
              if (data.error_code == "20300003") {
                if (App.commobj.getValue('open_id')) {
                  App.commobj.reLogin_openid(function(res) {
                    //console.log("open_id重新登录成功");
                    var token = res.data.token;
                    App.commobj.store("token", token);
                    $.ajax({ //重新删除自选
                      type: 'POST',
                      url: _.fstock + "addStock.json?",
                      data: {
                        stock_code: code,
                        stock_market: code_type
                      },
                      beforeSend: function(req) {
                        req.setRequestHeader("authorization", token);
                      },
                      success: function(data) {
                        if (data.success == true) {
                          //console.log("第二次增加自选股成功");
                          //$(obj).attr("class", "del_btn");
                          $(obj).find('.del_btn').show();
                          $(obj).find('.add_btn').hide();
                          App.commobj.addstocklocal(code_o, "add"); //添加到缓存中去20160613
                          search_obj.myOptional.push(code_o);
                          var ss = data.data;
                        }
                      }
                    });
                  });

                } else {
                  App.commobj.reLogin(function(res) {
                    //console.log("重新登录成功");
                    var token = res.data.token;
                    //console.log(token);
                    App.commobj.store("token", token);
                    $.ajax({ //重新删除自选
                      type: 'POST',
                      url: _.fstock + "addStock.json?",
                      data: {
                        stock_code: code,
                        stock_market: code_type
                      },
                      beforeSend: function(req) {
                        //console.log(token);
                        req.setRequestHeader("authorization", token);
                      },
                      success: function(data) {
                        if (data.success == true) {
                          //console.log("第二次增加自选股成功");
                          //$(obj).attr("class", "del_btn");
                          $(obj).find('.del_btn').show();
                          $(obj).find('.add_btn').hide();
                          App.commobj.addstocklocal(code_o, "add"); //添加到缓存中去20160613
                          search_obj.myOptional.push(code_o);
                          //console.log(search_obj.myOptional);
                          var ss = data.data;
                        }
                      }
                    });
                  });

                }

              }
            }


          }
        });
      } else {
        //$(obj).attr("class", "del_btn");
        $(obj).find('.del_btn').show();
        $(obj).find('.add_btn').hide();
        App.commobj.addstocklocal(code_o, "add"); //添加到缓存中去20160613
        search_obj.myOptional.push(code_o);
        //console.log(search_obj.myOptional);
      }
    } else {
      //$(obj).attr("class","add_btn");
      //console.log(token);


      if (App.commobj.getValue("isLogin") == 1) {
        //if(isLogin == 1){
        token = App.commobj.getValue("token");
        $.ajax({ //删除自选
          type: 'POST',
          url: _.fstock + "deleteStock.json?",
          data: {
            stock_code: code,
            stock_market: code_type
          },
          beforeSend: function(req) {
            //console.log(token);
            req.setRequestHeader("authorization", token);
          },
          success: function(data) {
            //console.log(data);
            //console.log(data.success);
            //console.log(data.error_code);
            if (data.success == true) {
              //console.log("第一次删除自选股成功");
              //$(obj).attr("class", "add_btn");
              $(obj).find('.add_btn').show();
              $(obj).find('.del_btn').hide();
              App.commobj.delstocklocal(code_o); //删除缓存中的股票20160613
              search_obj.myOptional.splice($.inArray(code_o, search_obj.myOptional), 1);
              var ss = data.data;
            } else {
              if (data.error_code == "20300003") {
                if (App.commobj.getValue('open_id')) {
                  App.commobj.reLogin_openid(function(res) {
                    //console.log("open_id重新登录成功");
                    var token = res.data.token;
                    //console.log(token);
                    App.commobj.store("token", token);
                    $.ajax({ //重新删除自选
                      type: 'POST',
                      url: _.fstock + "deleteStock.json?",
                      data: {
                        stock_code: code,
                        stock_market: code_type
                      },
                      beforeSend: function(req) {
                        //console.log(token);
                        req.setRequestHeader("authorization", token);
                      },
                      success: function(data) {
                        if (data.success == true) {
                          //console.log("第二次删除自选股成功");
                          //$(obj).attr("class", "add_btn");
                          $(obj).find('.add_btn').show();
                          $(obj).find('.del_btn').hide();
                          App.commobj.delstocklocal(code_o); //删除缓存中的股票20160613
                          search_obj.myOptional.splice($.inArray(code_o, search_obj.myOptional), 1);
                          var ss = data.data;
                        }
                      }
                    });
                  });
                } else {
                  App.commobj.reLogin(function(res) {
                    //console.log("重新授权成功");
                    var token = res.data.token;
                    //console.log(token);
                    App.commobj.store("token", token);
                    $.ajax({ //重新删除自选
                      type: 'POST',
                      url: _.fstock + "deleteStock.json?",
                      data: {
                        stock_code: code,
                        stock_market: code_type
                      },
                      beforeSend: function(req) {
                        //console.log(token);
                        req.setRequestHeader("authorization", token);
                      },
                      success: function(data) {
                        if (data.success == true) {
                          //console.log("第二次删除自选股成功");
                          //$(obj).attr("class", "add_btn");
                          $(obj).find('.add_btn').show();
                          $(obj).find('.del_btn').hide();
                          App.commobj.delstocklocal(code_o); //删除缓存中的股票20160613
                          search_obj.myOptional.splice($.inArray(code_o, search_obj.myOptional), 1);
                          var ss = data.data;
                        }
                      }
                    });
                  });
                }
              }
            }
          }
        });
        //}
      } else {
        //$(obj).attr("class", "add_btn");
        $(obj).find('.add_btn').show();
        $(obj).find('.del_btn').hide();
        App.commobj.delstocklocal(code_o); //删除缓存中的股票20160613
        search_obj.myOptional.splice($.inArray(code_o, search_obj.myOptional), 1);
      }
    }

  };
  
  


  var bind_tap = function() {
    $(".search li .stock_div").bind("click", function() {
      /*点击增加历史记录，并跳转至行情详情页面---todo*/
      var code = $(this).find(".code").html();
      var name = $(this).find(".name").html();
      storage(code, name);
      quote(code);

      //console.log($(this).find(".code").html());
    });
    $(".search li .btn_div").bind("click", function() {

      var class_name = $(this).find("a").attr("class");
      var code = $(this).prev("div").find(".code").html();
      var stock_name = $(this).prev("div").find(".name").html();
      // console.log(class_name);
      editMy(class_name, code, stock_name, $(this).find("a"));
      // console.log(2);
    });

    $(".search  .qc_btn").bind("click", function() {
      App.commobj.store("history", "");
      App.commobj.store("history_name", "");
      $("#search_list_div").html("");
    });
  }

  



  var queryMyOption = function() {
    var list = [];
    if (App.commobj.getValue("mystocks")) {
      list = App.commobj.getValue("mystocks").split(",");
    }
    if (list.length && list[0] != '') {
      search_obj.myOptional.length = 0;
      for (var j = 0; j < list.length; j++) {
        search_obj.myOptional.push(list[j]);
      }
      showHistory(); //20160613从缓存中获取股票代码集
    } else {
      App.OpenAPI.post(_.fstock + "/fstock/stock/qryStock.json", {
        user_id: App.commobj.getValue("user_id")
      }, function(data) {
        var list = data.data;
        /*清空自选*/
        search_obj.myOptional.length = 0;
        if (list) {
          App.searchView.tmp = "";
          if (list.length > 3)
            for (var i = 0; i < 3; i++) { //从数据库里取到3条数据，判断是否为默认自选
              var obj = list[i],
                codeType = obj.code_type.substring(0, 4),
                mc_finace = '';
              var stock_code = obj.stock_code;
              mc_finace = App.commobj.market(codeType);
              if (App.searchView.tmp == '') {
                App.searchView.tmp = stock_code + "." + mc_finace;
              } else {
                App.searchView.tmp = App.searchView.tmp + "," + stock_code + "." + mc_finace;
              }
            }

          if (App.searchView.tmp == '1A0001.SS,2A01.SZ,000001.SZ') {
            list.splice(0, 3);
          }
          list.reverse();
          for (var i = 0; i < list.length; i++) {
            var obj = list[i];
            var codeType = obj.code_type.substring(0, 4),
              mc_finace = App.commobj.market(codeType);
            if (obj.stock_name == "")
              continue;
            search_obj.myOptional.push(obj.stock_code + "." + mc_finace);
            App.commobj.addstocklocal(obj.stock_code + "." + mc_finace); //20160613匹配原先有添加自选股的用户，运行一段时间后可以去掉这行代码
          }
          if (App.searchView.tmp == '1A0001.SS,2A01.SZ,000001.SZ') {
            var tmpstock = App.searchView.tmp,
              tmps = tmpstock.split(',');
            search_obj.myOptional.concat(tmps);
            for (var i = 0; i < tmps.length; i++) {
              App.commobj.addstocklocal(tmps[i]);
            }
          }
          showHistory();
        }
      }, false);
    }
  };

  

  /*todo 获取历史搜索*/
  /*var getHistoryStock = function(){
    var history_list = App.commobj.getValue("history");
  }*/

  //getHistoryStock();
  

  

  
  var setAnimateYuyin = function() {
    var $this = $('.yuyin_cancel');
    $this.find(".left_sb").css("display", "block");
    $this.find(".right_sb").css("display", "block");
    var $sb1 = $this.find(".sb1"),
      $sb2 = $this.find(".sb2"),
      $sb3 = $this.find(".sb3");
    //var timer;
    single();
    clearInterval(timer);
    timer = setInterval(function() {
      single();
    }, 3000);

    function single() {
      t = setTimeout(function() {
        $sb1.addClass("sb1_white");
      }, 500);
      t1 = setTimeout(function() {
        $sb2.addClass("sb2_white");
      }, 1000);
      t2 = setTimeout(function() {
        $sb3.addClass("sb3_white");
      }, 1500);
      t3 = setTimeout(function() {
        $sb3.removeClass("sb3_white");
      }, 2000);
      t4 = setTimeout(function() {
        $sb2.removeClass("sb2_white");
      }, 2500);
      t5 = setTimeout(function() {
        $sb1.removeClass("sb1_white");
      }, 3000);
    };

  };
  var clearAnimateYuyin = function() {
    clearInterval(timer);
    clearTimeout(t);
    clearTimeout(t1);
    clearTimeout(t2);
    clearTimeout(t3);
    clearTimeout(t4);
    clearTimeout(t5);
    var $this = $('.yuyin_cancel');
    var $sb1 = $this.find(".sb1"),
      $sb2 = $this.find(".sb2"),
      $sb3 = $this.find(".sb3");
    for (var i = 1; i <= 3; i++) {
      $('.yuyin_cancel').find(".sb" + i).removeClass("sb" + i + "_white");
    }
  }
  //增加键盘点击效果
  $("#E_div table tbody tr td a").on("touchstart",function(e){
         var target = $(e.currentTarget),
         ahp = target.text();
         if(target.attr("id")!="clear_one"&&target.attr("id")!="change_num"&&target.attr("id")!="hide_key_E"&&target.attr("id")!="sure_btn_E"){
            $(target).parent().hide();
              if(ahp=="Q"){
                $("#big"+ahp).show().addClass("show-style").css("transform","scale(2.5,2.5)").css("left","0");
              }else if(ahp=="P"){
                $("#big"+ahp).show().addClass("show-style").css("transform","scale(2.5,2.5)").css("left","-.38rem");
              }else{
                $("#big"+ahp).show().addClass("show-style").css("transform","scale(2.5,2.5)");
              }   
          }     
  })
  $("#E_div table tbody tr td a").on("touchend",function(e){
         e.preventDefault();
         var target = $(e.currentTarget),
         ahp = target.text();
         $(target).parent().show();
         $("#big"+ahp).hide();
            //App.searchView.setVal(e)
  })
  $("#num_div table tbody tr td a,#zero").on("touchstart",function(e){
         var target = $(e.currentTarget);
         $(target).addClass("press");
  })
  $("#num_div table tbody tr td a,#zero").on("touchend",function(e){
         e.preventDefault();
         var target = $(e.currentTarget);
         $(target).removeClass("press");
         //App.searchView.setVal(e);
  })
  //禁止长按弹出在浏览器中打开等
  document.oncontextmenu=function(e){
    //或者return false;
    e.preventDefault();
  };

  App.searchView.wrap({
    events: {
      "touchend #E_div table tbody tr td a": "setVal", //键盘点击事件
      "touchend #num_div table tbody tr td a": "setVal", //键盘点击事件
      "click #clear_all": "clearAll", //清空input框
      "click #cancel_div": "cancelSearch", //取消搜索
      "click #change_E": "changeE",
      "click #hide_keyBord": "hideKey",
      "click #code_m": "showKey",
      "click #sure_btn": "sure",
      "click #clear_one_num": "clear_one",
      "touchend #zero": "setVal",
      'click .search li .stock_div': 'addHistory',
      "click .search li .btn_div": 'opertor',
      "click .search .qc_btn": 'qc_btn',
      "click #confirm .cancle": "cancel_clear",
      "click #confirm .sure": "sure_clear"
    },

    addHistory: function(e) {
      /*点击增加历史记录，并跳转至行情详情页面---todo*/
      var code = $(e.currentTarget).find(".code").html();
      var name = $(e.currentTarget).find(".name").html();
      storage(code, name);
      quote(code);
      //console.log($(this).find(".code").html());
    },
    opertor: function(e) {
      var $this = $(e.currentTarget);
      //var class_name = $this.find("a").attr("class");
      var class_name = $this.find("a:visible").attr("class");
      var code = $this.prev("div").find(".code").html();
      var stock_name = $this.prev("div").find(".name").html();
      // console.log(class_name);
      editMy(class_name, code, stock_name, $this);
      // console.log(2);
    },

    qc_btn: function() {
      $('#confirm').show();
    },
    cancel_clear: function() {
      $('#confirm').hide();
    },
    sure_clear: function() {
      App.commobj.store("history", "");
      App.commobj.store("history_name", "");
      $("#search_list_div").html("");
      $('#confirm').hide();
    },
    beforeRender: function() {
      //TODO
      App.commobj.changeTitle('搜索');
      return true;
    },
    ready: function() {
      //TODO
    },
    afterRender: function(arg) {
      this.storageMsg();
      var screen_width = screen.width > 1000 ? document.body.offsetWidth : screen.width;
      $('#search_list_div').width(screen_width);
      if (_.skin_default == '1') { //存储默认皮肤样式
        this.setSkin();
      }
      history.replaceState({}, "", window.domain + '#search');
      if (App.commobj.getValue("isLogin") == 1) {
          //$('.add_zxg').hide();
          var token = App.commobj.getValue('token');
          App.searchView.queryOpstock(token);
      }
      if (App.commobj.getValue('mystocks') ) {
        var mystock = App.commobj.getValue('mystocks').split(',');
        //console.log(mystock);
        for (var i = 0; i < mystock.length; i++) {
          search_obj.myOptional.push(mystock[i]);
        }
        //console.log(search_obj.myOptional);
      } else {
        //console.log(search_obj.myOptional);
      }
      $('html').addClass('search-body');
      $('body').addClass('search-body');
      /*if (arg) {
        var viewUrl = arg.split(",")
        sessionStorage.setItem("search", viewUrl[0] + (viewUrl.length > 1 ? "/" + viewUrl[1] : ""));
      }*/
      $(".fixed-top").hide();
      $(".fixed-bottom").hide();
      $('.header-fdj').hide();
      App.searchView.data_count = 20;
      /*加载我的自选股*/
      //queryMyOption();
      if (App.commobj.getValue("keyType") && App.commobj.getValue("keyType") == 1) {
        /*显示英文键盘*/
        changeType(1);
      } else {
        /*默认显示数字*/
        changeType(0);
      }

      /*todo 显示历史搜索记录*/
      showHistory();
      this.yuyin();
    },
    afterUnRender: function() {
      $('.header-fdj').show();
      $('html').removeClass('search-body');
      $('body').removeClass('search-body');
      set_default();
      $('#search input').blur(function() { //清空搜索文本框内容
        $('#search input').val("");
      });
      $("#search_list_div").html("");
      search_obj.myOptional.length = 0;
      $('#confirm').hide();
      localStorage.removeItem('reffer');
    },
    storageMsg: function() {
      var mystocks = App.commobj.getUrlParam("mystocks"); //获取url里的自选股
      var token = App.commobj.getUrlParam("token");
      var theme_color = App.commobj.getUrlParam("theme_color"); //获取主题颜色
      var font_color = App.commobj.getUrlParam("font_color"); //获取字体颜色
      if (mystocks && mystocks != 'null') {
        App.commobj.store("mystocks", decodeURIComponent(mystocks)); //存储
      }
      if (token && token != 'null') {
        //if(App.commobj.getValue('token')){
            App.commobj.store("token", token);
        //}
      }
      if (theme_color && theme_color != 'null') {
        App.commobj.store("theme_color", theme_color);
      }
      if (font_color && font_color != 'null') {
        App.commobj.store("font_color", font_color);
      }
    },
    setSkin: function() {
      var theme_color = '#' + App.commobj.getValue("theme_color");
      var font_color = '#' + App.commobj.getValue("font_color");
      if (theme_color) {
        $(".am-header").css("background-color", theme_color);
        $(".login").css('background-color', theme_color);
        $(".all_xz").css("color", theme_color);
        $(".del").css("background-color", theme_color);
        $(".am-header").css("background", theme_color);
      }
      if (font_color) {
        $('.optional_edit').css("color", font_color);
        $('.am-header h1').css("color", font_color);
        $('.del').css("color", font_color);
        $('.search_header .cancel').css("color", font_color);
      }
    },
    queryOpstock: function(token) {
        $.ajax({ //查询用户自选股
            type: 'POST',
            url: _.fstock + "queryOpstock.json",
            async:false,
            beforeSend: function(req) {
                req.setRequestHeader("authorization", token);
            },
            success: function(data) {
                if (data.success == true) {
                    //console.log("第一次查询自选股成功");
                    var ss = data.data;
                    if (ss) {
                        var arr_mystock = "";
                        for (var i = 0; i < ss.length; i++) {
                            var obj = ss[i];
                            var stock_code = obj.stock_code;
                            var stock_market = obj.stock_market;
                            var stock = stock_code + "." + stock_market + ",";
                            arr_mystock += stock;
                        }
                        var code_to_save = arr_mystock.substring(0, arr_mystock.length - 1);
                        App.commobj.store("mystocks", code_to_save);
                    }
                } else {
                    if (data.error_code == "20300003") {
                        App.commobj.reLogin(function(res) {
                            //console.log("重新授权成功");
                            var token = res.data.token;
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
                                        if (ss) {
                                            var arr_mystock = "";
                                            for (var i = 0; i < ss.length; i++) {
                                                var obj = ss[i];
                                                var stock_code = obj.stock_code;
                                                var stock_market = obj.stock_market;
                                                var stock = stock_code + "." + stock_market + ",";
                                                arr_mystock += stock;
                                            }
                                            var code_to_save = arr_mystock.substring(0, arr_mystock.length - 1);
                                            App.commobj.store("mystocks", code_to_save);
                                        }
                                    }
                                }
                            });
                        });


                    }
                }

            }
        });
    },
    changeE: function() {
      /*切换成英文键盘*/
      changeType(1);
    },
    clear_one: function() {
      clearOne();
    },
    sure: function() {

      sureFun();
    },
    hideKey: function() {
      $('html').removeClass('search-body');
      $('body').removeClass('search-body');
      hideKey();
    },
    showKey: function() {
      $('html').addClass('search-body');
      $('body').addClass('search-body');
      showKey();
    },
    clearAll: function() {
      $("#code_s").html("");
      set_gb_left();
    },
    cancelSearch: function(e) {
      $('#search input').blur(function() { //清空搜索内容
        $('#search input').val("");
      });
      set_default();
      if(App.commobj.getValue('reffer')=='list'){
        history.back();
      }else{
        // window.location.href = "#mystock"; //取消直接跳自选股页
        history.go(-1); // 哪来回哪去
      }
      e.stopPropagation();

    },
    setVal: function(obj) {
      //var target = $(obj.currentTarget);
      if ($('.search_box').data('type') == 'yuyin') {
        $("#code_s").html('');
        $('.search_box').removeData('type');
      }
      //target.parent().addClass("middle-click");
    /*  $(target).parent().hide();
      $("#bigE").show().addClass("show-style").css("transform","scale(2,2)");*/
      var value = $(obj.currentTarget).html();
      var color_val = $("#code_m").css("color");
      var a_id = $(obj.currentTarget).attr("id");
      var html_s = $("#code_s").html();
      $('#search_list').scrollTop('0'); //重新搜索时回到最上面
      if (a_id === 'clear_one') {
        if (color_val === 'rgb(153, 153, 153)') {

        } else {
          if (html_s.length > 0) {
            $("#code_s").html(html_s.substr(0, html_s.length - 1));
            set_gb_left();
          } else {
            //set_default();
          }
        }

      } else if (a_id === 'hide_key_E') {
        $('html').removeClass('search-body');
        $('body').removeClass('search-body');
        hideKey();
      } else if (a_id === 'change_num') {
        /*切换成数字键盘*/
        changeType(0);

      } else if (a_id === 'sure_btn_E') {
        sureFun();
        /*todo 确定*/
      } else {
        if (color_val === 'rgb(153, 153, 153)') {
          $("#code_s").html(value);
        } else {
          if (html_s.length < 6) {
            $("#code_s").html(html_s + value);
          }
        }
        set_gb_left();

      }

    },
    querVal: function() {
      quer_stock();
    },
    /**语音功能*/
    yuyin: function() {
      //判断是否微信，微信显示，其他不显示
      var ua = window.navigator.userAgent.toLowerCase();
      var yuyin_flag = true;
      //var touchstart = true;
      var timeOutEvent;
      if (ua.indexOf("micromessenger") == -1) { //微信客户端
        return;
      }
      if(window.data.show_yuyin=="0"){
        $('.txt_yuyin').hide();
        return;
      }else{
        $('.txt_yuyin').show();
      }


      //获取公众号配置信息
      $.ajax({ //增加自选
        type: 'POST',
        url: _.yuyin_url + "/weixin/sign.json",
        data: {
          redirectUri: location.href.split('#')[0]
        },
        success: function(data) {
          console.log('get wx config');
          wx.config({
            debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
            appId: data.data.app_id, // 必填，公众号的唯一标识
            timestamp: data.data.timestamp, // 必填，生成签名的时间戳
            nonceStr: data.data.noncestr, // 必填，生成签名的随机串
            signature: data.data.signature, // 必填，签名，见附录1
            jsApiList: ['startRecord', 'stopRecord', 'onVoiceRecordEnd', 'translateVoice'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
          });
        }
      })

      $('.txt_yuyin').unbind('touchstart').on('touchstart', function(event) {
        wx.stopRecord();
        console.log(yuyin_flag + "  touchstart");
        if (!yuyin_flag) {
          //touchstart= false;
          return;
        }

        if (!localStorage.rainAllowRecord || localStorage.rainAllowRecord !== 'true') {
          wx.ready(function() {
            console.log('start startRecord 1');
            wx.startRecord({
              success: function() {
                localStorage.rainAllowRecord = 'true';
                wx.stopRecord();
                console.log('start stopRecord 1');
              },
              cancel: function() {
                //alert('用户拒绝授权录音');
                console.log('用户拒绝授权录音');

              }
            });
          });
          return;
        }
        event.preventDefault();
        setAnimateYuyin();
        var posStart = 0;
        posStart = event.touches[0].pageY; //获取起点坐标
        timeOutEvent = setTimeout(function() {
          timeOutEvent = 0;
        }, 1000);
        wx.ready(function() {
          console.log('start startRecord 2');
          wx.startRecord({
            success: function() {
              localStorage.rainAllowRecord = 'true';
              yuyin_flag = false;
              setTimeout(function(){yuyin_flag = true;},3000);
              console.log('start startRecord 2  success');
            },
            cancel: function() {
              //alert('用户拒绝授权录音');
              console.log('用户拒绝授权录音');
            }
          });
          console.log(yuyin_flag + '    2 touchstart end');
          $('.yuyin_none').hide();
          $('.yuyin_cancel').show();
        });
        set_default();
        $('.search_box').data('type', 'yuyin');
      }, false);

      //长按阻止默认事件
      $('.txt_yuyin')[0].addEventListener('touchstart', function(e) {
        e.preventDefault();
      }, false);

      $('.txt_yuyin').unbind('touchend').on('touchend', function(event) {

        event.preventDefault();
        console.log("touchend 1");
        /* if (!touchstart) {
           touchstart = true;
           return;
         }*/
        clearTimeout(timeOutEvent);
        var posEnd = 0;
        posEnd = event.changedTouches[0].pageY; //获取终点坐标
        $('.yuyin_cancel').hide();
        clearAnimateYuyin();
        var voice;
        var stopRecord = function() {
          console.log('start stopRecord 1');
          wx.stopRecord({
            success: function(res) {
              console.log('start stopRecord 1 success');

              voice = res.localId;
              console.log(voice + " ---------------localId");
              setTimeout(function() {
                yuyin_flag = true;
                //touchstart = true;
              }, 1000);
              if (posStart - posEnd > 40) { //上滑取消
                console.log("Cancel");
                //alert('已取消');
                return;
              };
              if (timeOutEvent != 0) {
                //alert("你这是点击，不是长按");
                console.log("请长按");
                return false;
              }
              if (!voice) {
                return;
              }
              console.log(yuyin_flag + " ---------------yuyin_flag translateVoice begin");
              wx.translateVoice({
                localId: voice, // 需要识别的音频的本地Id，由录音相关接口获得
                isShowProgressTips: 1, // 默认为1，显示进度提示
                success: function(res) {
                  //alert(res.translateResult); // 语音识别的结果
                  console.log(res.translateResult + "---------微信返回内容")
                  var word = res.translateResult;
                  var reg = /[\u4e00-\u9fa5]/g;
                  //alert(word);
                  word = word.substring(0, word.length - 1); //去掉微信翻译后最后的句号
                  //$("#code_s").html(word);
                  if (reg.test(word)) { //存在中文时，调后台
                    $.ajax({ //增加自选
                      type: 'POST',
                      url: _.yuyin_url + "/weixin/siri.json",
                      data: {
                        word: word
                      },
                      success: function(data) {
                        if (data.data.length == 0) {
                          $('.yuyin_none').show();
                          setTimeout(function() {
                            $('.yuyin_none').hide();
                          }, 2000);
                          set_default();
                          //alert('无此股票,请重试');
                          return;
                        }

                        if (data.data.length == 1) {
                          //location.href=''
                          $("#code_s").html(word);
                          var code = data.data[0].prod_code;
                          var name = data.data[0].prod_name;
                          storage(code, name);
                          quote(code);
                        } else {
                          //$("#code_s").html(data.data.code);
                          var list_r = [];
                          var list = data.data;
                          if (list) {
                            list_r = get_my_list(list)
                          }
                          var html = tml({
                            "list": list_r
                          });
                          $("#code_s").html(word)
                          $("#search_list_div").html(html);
                          var left_w = parseInt($("#code_m").css('padding-left')) + $("#code_s").width() + 2;
                          $('head').append("<style>.gb:before{ left:" + left_w + "px }</style>");
                          $("#code_m").css("color", "#333");
                          //quer_stock();
                        }
                      }
                    })
                  } else { //没中文时直接调用openAPI
                    $("#code_s").html(word);
                    var left_w = parseInt($("#code_m").css('padding-left')) + $("#code_s").width() + 2;
                    $('head').append("<style>.gb:before{ left:" + left_w + "px }</style>");
                    $("#code_m").css("color", "#333");
                    var isYY = true;
                    quer_stock(isYY);
                  }
                }
              });
            },
            fail: function(res) {
              //alert(JSON.stringify(res));
              console.log(JSON.stringify(res) + "--------------stop fail");
              $('.yuyin_none').hide();
              setTimeout(function() {
                yuyin_flag = true;
                //touchstart = true;
              }, 1000);
            }
          });
        }
        wx.ready(function() {
          console.log(timeOutEvent)
          if (timeOutEvent != 0) {
            setTimeout(function() {
              stopRecord();
            }, 500)
          } else {
            stopRecord();
          }


          wx.onVoiceRecordEnd({
            // 录音时间超过一分钟没有停止的时候会执行 complete 回调
            complete: function(res) {
              console.log("onVoiceRecordEnd " + res.localId);
              voice = res.localId;
              //alert('录音时间（' + voice.localId + '）已超过一分钟');
            }
          });

          wx.error(function(res) {
            //alert(res.errMsg);
            yuyin_flag = true;
            //touchstart = true;
            console.log(res.errMsg + "----------wx error");
          });
        });
      }, false);
    }
  });
})();