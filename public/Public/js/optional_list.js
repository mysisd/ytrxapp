
/**
 * VIEW optional_list
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
;(function($){
  App.optional_listView.wrap({
    beforeRender:function(){
      //TODO
      return true;
    },
    ready:function(){
      //TODO
    },
    afterRender:function(){
      var that = this;
      var open_id = App.commobj.getQueryString('open_id');//获取url里的open_id
      var view_id = App.commobj.getQueryString('view_id');//获取url里的view_id
      var local_open_id = localStorage.getItem('open_id');//获取本地open_id
      var local_view_id = localStorage.getItem('view_id');//获取本地view_id
      var sharetime = App.commobj.getQueryString('sharetime');
      if(sharetime){
        localStorage.setItem('sharetime',sharetime*1000);
      }else{
        localStorage.setItem('sharetime','');
      }
      if(view_id && open_id){
        if(view_id == local_view_id){
            if(localStorage.getItem("tokens") != null){
              that.queryOpstock(localStorage.getItem("tokens"));
            }else{
              that.getLoginMessage(view_id);
            }
        }else{
            that.getLoginMessage(view_id);
        }
      }
      if(sharetime){
        sharetime = new Date(parseInt(sharetime*1000));
        $('#optional_list .header-info .date').html(that.dateFormat(sharetime,'yyyy-MM-dd hh:mm:ss'));    
      }else{
        localStorage.setItem('sharetime','');
        sharetime = new Date();
        $('#optional_list .header-info .date').html(that.dateFormat(sharetime,'yyyy-MM-dd hh:mm:ss'));    
      }
      $('#optional_list .top_img img').attr('src',App.commobj.getQueryString('imgurl'));
      $('#optional_list .header-info .name').html(decodeURIComponent(App.commobj.getQueryString('username'))+'的自选股列表');    
      //$('#optional_list .header-info .date').html(that.dateFormat(sharetime,'yyyy-MM-dd hh:mm:ss'));    
    },
    real:function(en_prod_code){//自选股内容渲染
      var tplList = _.template('<%_.each(list, function(row){%>\
            <tr data-id="<%=row.stock_code%>">\
              <td>\
                <h3><%=row.stock_name%></h3>\
                <p><%=row.stock_code%></p>\
              </td>\
              <% var obj = _.setCls(row.px_change, \
                [{c: "zxj_z", c2: "", f: "+"}, {c: "zxj_t", c2: "zdf_t", f: ""},{c: "zxj_d", c2:"zdf_d", f: ""}])%>\
              <td class="<%=obj.c%>"><%=row.last_px%></td>\
              <td ><i class="zdf_z <%=obj.c2%>"><%= obj.f + ((row.trade_status == "STOPT"||row.trade_status == "HALT")? "停牌" : (row.px_change_rate+"%")) %></i></td>\
            </tr>\
          <%})%>');
      App.OpenAPI.get("api/real/?en_prod_code="+en_prod_code+"&fields=prod_name,last_px,px_change_rate,px_change,trade_status",null,function(data){
            var ss = data.data.snapshot;
            var fields = ss.fields;
            var showData  = [],arr_code=[],sourArr=[], html='';
            for(var a in ss){
              var tmp = {};
              if("fields"==a){
                continue;
              }
              tmp['stock_name'] = ss[a][fields.indexOf('prod_name')];
              tmp['stock_code'] = a;
              tmp['prod_code_all'] = a;
              tmp['last_px'] = ss[a][fields.indexOf('last_px')].toFixed(2);
              tmp['px_change_rate'] = ss[a][fields.indexOf('px_change_rate')].toFixed(2);
              tmp['px_change']= ss[a][fields.indexOf('px_change')].toFixed(2);
              tmp['trade_status']=ss[a][fields.indexOf('trade_status')];
              showData.push(tmp);
            }
            $('#optional_list .optional_table tbody').html( tplList({list: showData}) );
            App.optional_listView.go_Quote();
          });
    },
    go_Quote:function(){
      $('.optional_table tbody tr').each(function(){
        $(this).click(function(){
          App.optional_listView.goQuote($(this).data('id'));
        });
      });
    },
    goQuote:function(e){
      var code = e;
      var open_id = App.commobj.getQueryString('open_id');//获取url里的open_id
      window.location.href=_.stockquote_url_per+'?code='+e+"&open_id="+open_id+"&mystocks="+encodeURIComponent(localStorage.getItem("mystocks"))+"&isLogin="+localStorage.getItem("isLogin")+"&token="+localStorage.getItem("token");
    },
    getLoginMessage:function(input_value){
      var view_id = input_value;
      localStorage.setItem("view_id",view_id);
      var ajax_url = _.protocal + _.login_url+"&open_id="+view_id;
      //console.log(ajax_url);      
      var app_key = _.key + ":" + _.secret;
      var authorization_code = encoder(app_key);
      //console.log(authorization_code);
      $.ajax({//获取token
          type : 'get',
          url : ajax_url,
          beforeSend: function(request) {
              request.setRequestHeader("authorization", authorization_code);
          },
          success : function(res){
              var token = res.data.token;
              localStorage.setItem("tokens",token);
              App.optional_listView.queryOpstock(token);
          }
      });
    },
    queryOpstock:function(token){
      //var share_datetime = '2017-01-06 10:10:10';
      var sharetime = localStorage.getItem('sharetime');
      if(sharetime){
        sharetime = new Date(parseInt(sharetime));
        sharetime = App.optional_listView.dateFormat(sharetime,'yyyy-MM-dd hh:mm:ss');
      }else{
        sharetime="";
      }
      //sharetime = sharetime?new Date(parseInt(sharetime)):'';
      $.ajax({//查询用户自选股
          type:'POST',
          url:_.fstocksnap+"queryStockSnap.json", 
          beforeSend:function(req){
            req.setRequestHeader("authorization", token);
          },
          data:{
            'share_datetime':sharetime
          },
          success:function(data){
            if(data.success == true){
              //console.log("第一次查询自选股成功");
              var ss = data.data;
              if(ss){
                  var arr_mystock ="";
                  for(var i=0;i<ss.length;i++){
                    var obj = ss[i];
                    var stock_code = obj.stock_code;
                    var stock_market = obj.stock_market;
                    var stock = stock_code+"."+stock_market+",";
                    arr_mystock += stock;
                  }
                  var code_to_save = arr_mystock.substring(0,arr_mystock.length-1);
                  localStorage.setItem("view_stocks",code_to_save);
                  App.optional_listView.getData(); 
              }
            }else{
              if(data.error_code =="20300003"){
                  App.commobj.reLogin_viewid(function(res){
                        var token = res.data.token;
                        localStorage.setItem("tokens",token);
                        $.ajax({
                          type:'POST',
                          url:_.fstocksnap+"queryStockSnap.json",
                          beforeSend:function(req){
                            req.setRequestHeader("authorization", token);
                          },
                          data:{
                            'share_datetime':sharetime
                          },
                          success:function(data){
                            if(data.success == true){
                              //console.log("第二次查询自选股成功");
                              var ss = data.data;
                              if(ss){
                                  var arr_mystock ="";
                                  for(var i=0;i<ss.length;i++){
                                    var obj = ss[i];
                                    var stock_code = obj.stock_code;
                                    var stock_market = obj.stock_market;
                                    var stock = stock_code+"."+stock_market+",";
                                    arr_mystock += stock;
                                  }
                                  var code_to_save = arr_mystock.substring(0,arr_mystock.length-1);
                                  localStorage.setItem("view_stocks",code_to_save);
                                  App.optional_listView.getData(); 
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
    mystockTimer: function(){//定时器
        var that=this;
        clearInterval(App.optional_listView.timer);
        App.optional_listView.timer=setInterval(function(){
            that.getData();
        },6000);
    },
    getData:function(){
        var that = this;
        if(localStorage.getItem("view_stocks") == ''){
            App.optional_listView.en_prod_code='';
            $('#optional_list .optional_table tbody').html('<tr><td colspan="3" style="text-align: center;color:#999;">暂无自选股</td></tr>');

        }else{
            App.optional_listView.en_prod_code=localStorage.getItem("view_stocks");
            that.real(App.optional_listView.en_prod_code);
        }
    },
    afterUnRender:function(){
    },
    dateFormat:function(newdate,format) {
           var date = {
                  "M+": newdate.getMonth() + 1,
                  "d+": newdate.getDate(),
                  "h+": newdate.getHours(),
                  "m+": newdate.getMinutes(),
                  "s+": newdate.getSeconds(),
                  "q+": Math.floor((newdate.getMonth() + 3) / 3),
                  "S+": newdate.getMilliseconds()
           };
           if (/(y+)/i.test(format)) {
                  format = format.replace(RegExp.$1, (newdate.getFullYear() + '').substr(4 - RegExp.$1.length));
           }
           for (var k in date) {
                  if (new RegExp("(" + k + ")").test(format)) {
                         format = format.replace(RegExp.$1, RegExp.$1.length == 1
                                ? date[k] : ("00" + date[k]).substr(("" + date[k]).length));
                  }
           }
           return format;
    }
  });
})(Zepto);
//根据值大小选择class --- 12, ['cls1', 'cls2', 'cls3']
_.setCls = function(v, arr){
  return v > 0? arr[0] : (v==0? arr[1] : arr[2]);
};