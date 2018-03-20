/**
 * VIEW optional_edit
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
;
(function() {
  var ms = 500,
    PN = '#optional_edit';
  var user_param = {
    user_id: window.localStorage.getItem("user_id")
  };
  var isLogin = localStorage.getItem("isLogin");
  var token = localStorage.getItem("token");
  var mystock = localStorage.getItem("mystocks");

  App.optional_editView.wrap({
    afterRender: function() {
      var that = this;
      user_param = {
        user_id: localStorage.getItem("user_id")
      };
      if (!that.sortable) {
        that.sortable = Sortable.create(that._get('.edit_table')[1], {
          handle: '.move',
          ghostClass: 'ghost',
          chosenClass: 'chosen',
          axis: 'y'
        });
      }
      this.getData();
      $(window).scrollTop('0'); //页面滚动到最
    },
    beforeRender: function() {
      $('.fixed-bottom, .fixed-top').hide();

      return true;
    },
    ready: function() {
      //TODO
    },
    afterUnRender: function() {
      $('.all_xz').find('.ui-radio').removeClass('ui-radio-current');
      $('.all_xz').find('span').text('全选');
      _.skin_edit ? $(".del").css("background-color", _.skin_edit) : '';
      $('.fixed-bottom, .fixed-top').show();
      $('.del .num').html('');
      $("ul .edit_table").html("");
      this.save(); //保存自选股编辑状态
    },
    events: {
      'click #optional_edit .edit_table .w13': "singleSel",
      'click #optional_edit .all_xz': "allSel",
      'click #optional_edit .totop': 'toTop',
      'click #optional_edit .del': 'delete',
      'click #optional_edit .header-leftLink': 'save'
    },

    singleSel: function(e) {
      var $n = $(PN + ' .all_xz'),
        all = '全选',
        cancel = '全选'; //去掉全选与全取消切换
      $(e.target).closest('.w13').find('.ui-radio').toggleClass('ui-radio-current');
      var length = $('.edit_table li').length,
        current = $('.edit_table li').find('.ui-radio-current').length;

      if (current > 0) {
        _.skin_edit_active ? $(".del").css("background-color", _.skin_edit_active) : '';
        $("#optional_edit .del").addClass('active');
        $('.del .num').html('(' + current + ')');
      } else {
        $("#optional_edit .del").removeClass('active');
        _.skin_edit ? $(".del").css("background-color", _.skin_edit) : '';
        $('.del .num').html('');
      }

      if (current == length) {
        $n.addClass('active');
        $n.find('.ui-radio').addClass('ui-radio-current');
        $n.find('span').text(cancel);
      } else{
        $n.removeClass('active');
        $n.find('.ui-radio').removeClass('ui-radio-current');
        $n.find('span').text(all);
      }
    },
    allSel: function(e) {

      var node = $(PN + ' .ui-radio'),
        $n = $(PN + ' .all_xz'),
        all = '全选',
        cancel = '全选', //去掉全选与全取消切换
        current = $('.edit_table li').length;
      if ($n.hasClass('active')) {
        $n.removeClass('active');
        node.removeClass('ui-radio-current');
        $n.find('span').text(all);
        _.skin_edit ? $(".del").css("background-color", _.skin_edit) : '';
        $("#optional_edit .del").removeClass('active');
        $('.del .num').html('');
      } else {
        $n.addClass('active');
        node.addClass('ui-radio-current');
        $n.find('span').text(cancel);
        _.skin_edit_active ? $(".del").css("background-color", _.skin_edit_active) : '';
        $("#optional_edit .del").addClass('active');
        $('.del .num').html('(' + current + ')');

      }
    },
    toTop: function(e) {
      var node = $(e.target).parents('li'),
        cur = node.index(),
        height = node.height(),
        that = this;
      if (cur > 0) {
        that._get('li:lt(' + cur + ')').css(that._translate(height));
        node.css(that._translate(-cur * height));
        clearTimeout(node.animated);
        node.animated = setTimeout(function() {
          that._get('li').removeAttr('style');
          node.prependTo(node.parent());
        }, ms)
      }
    },
    delete: function(e) {
      var that = this,
        arr = [];

      that._get('.ui-radio-current').each(function() {
        var stocks = {
          code_type: '',
          stock_code: '',
          code: ''
        };
        stocks.code_type = $(this).attr('cval');
        stocks.stock_code = $(this).attr('val');
        stocks.stock_name = $(this).attr('stockName')
        stocks.code = $(this).attr('code'); //新增字段属性，便于本地缓存操作；
        arr.push(stocks);
      });
      if (arr.length == 0) {
        return; // 没有自选股了，直接回退
      } else {
        that.delData({
          user_id: user_param.user_id,
          stocks: JSON.stringify(arr)
        });
      }
    },
    save: function() {
      var that = this,
        arr = [];
      that._get('.edit_table .ui-radio').each(function() {
        var stocks = {
          code_type: '',
          stock_code: '',
          code: ''
        };
        stocks.code_type = $(this).attr('cval');
        stocks.stock_code = $(this).attr('val');
        stocks.code = $(this).attr('code'); //新增字段属性，便于本地缓存操作；
        stocks.stock_name = $(this).attr('stockName');
        arr.push(stocks);
      });
      that.delData({
        user_id: user_param.user_id,
        stocks: JSON.stringify(arr)
      });
      that.setData({
        user_id: user_param.user_id,
        stocks: JSON.stringify(arr)
      });
    },
    getData: function() {
      var that = this;
      var mystocks = localStorage.getItem("mystocks");
      that.real(mystocks);
    },
    real: function(en_prod_code) {
      var that = this;
      /***
        修复未登录情况下只有一条数据时，编辑页未清空bug
        by wyy 2017/4/20
      ***/
      if (!en_prod_code) {
        that._get('ul.edit_table').html("");
        return;
      }
      App.OpenAPI.get("api/real/?en_prod_code=" + en_prod_code + "&fields=prod_name,last_px,px_change_rate,px_change", null, function(data) {
        var ss = data.data.snapshot;
        var fields = ss.fields;
        var showData = [],
          arr_code = [],
          sourArr = [],
          html = '';
        for (var a in ss) {
          var tmp = {};
          if ("fields" == a) {
            continue;
          }
          tmp['stock_name'] = ss[a][fields.indexOf('prod_name')];
          tmp['stock_code_new'] = a;
          tmp['stock_code'] = a.split(".")[0];
          tmp['code_type'] = App.commobj.getEchange(a.split(".")[1]);
          //showData.push(tmp);
          tmp['stock_name']==""?"":showData.push(tmp);
        }
        var tpl = _.template('<%_.each(list, function(row){%>\
              <li>\
                <div class="w13">\
                  <form class="ui-form" role="form">\
                    <div class="ui-form-item">\
                       <div class="ui-formContainer">\
                        <div class="ui-radio-box"><% var code=row.stock_code.split(".")[0];%>\
                          <div class="ui-radio" code="<%=row.stock_code_new%>" val="<%=code%>" cval="<%=row.code_type%>" stockName="<%=row.stock_name%>"></div>\
                          <input type="hidden" class="ui-radio-value" />\
                        </div>\
                       </div>\
                    </div>\
                  <form>\
                </div>\
                <div class="w45">\
                      <h3><%=row.stock_name%></h3>\
                      <p><%=row.stock_code_new%></p>\
                    </div>\
                    <div class="w18">\
                      <a class="totop"></a>\
                    </div>\
                    <div class="w24">\
                      <a class="move"></a>\
                    </div>\
                  </li>\
            <%})%>');
        that._get('ul.edit_table').html(tpl({
          list: showData
        }));
        //此方法解决安卓长按出现系统默认事件，为window添加事件导致无法滚动和click事件失效
        $('.move').each(function() {
          $(this)[0].addEventListener('touchstart', function(e) {
            e.preventDefault();
          }, false);
        });
      });
    },
    delData: function(param) {
      var that = this;
      that._get('.ui-radio-current').parents('li').remove();
      //20160613解析参数params
      var obj = JSON.parse(param.stocks);
      for (var stock in obj) {
        if (stock == 'each')
          continue;
        App.commobj.delstocklocal(obj[stock].code);
      }

      $('.all_xz').find('.ui-radio').removeClass('ui-radio-current');
      $('.all_xz').find('span').text('全选');
      _.skin_edit ? $(".del").css("background-color", _.skin_edit) : '';
      $("#optional_edit .del").removeClass('active');
      $('.del .num').html('');
    },
    setData: function(param) {
      var obj = JSON.parse(param.stocks);
      for (var stock in obj) {
        if (stock == 'each')
          continue;
        App.commobj.addstocklocal(obj[stock].code);
      }
      if (localStorage.getItem("isLogin") == 1) {
        var mystock = localStorage.getItem("mystocks");
        var arr = [];
        if (mystock != "") {
          var list = mystock.split(',');
          for (var i = 0; i < list.length; i++) {
            var obj = list[i],
              stocks = {},
              codeType = obj.split('.')[1];
            stocks['stock_code'] = obj.split('.')[0];
            stocks['stock_market'] = codeType;
            arr.push(stocks);
          }
        }
        token = localStorage.getItem("token");
        window.zxg_async = true;
        var data = {
          jreq:JSON.stringify(arr)
        };
        API.update_opstock(data).then(function(data) {})
      }
      window.location.href = "#mystock";
      $('.all_xz').find('.ui-radio').removeClass('ui-radio-current');
      $('.all_xz').find('span').text('全选');
      _.skin_edit ? $(".del").css("background-color", _.skin_edit) : '';
      $('.del .num').html('');
    },
    _get: function(seletor) {
      return $(PN + ' ' + seletor);
    },
    _translate: function(h) {
      return {
        '-webkit-transform': 'translate3d(0,' + h + 'px,0)',
        'transform': 'translate3d(0,' + h + 'px,0)',
        '-webkit-transition': 'all ' + ms + 'ms',
        'transition': 'all ' + ms + 'ms'
      }
    }
  });
  
})();