/**
 * VIEW mystock
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
;
(function($) {
    App.mystockView.wrap({
        beforeRender: function() {
            var that = this;
            App.commobj.changeTitle('自选');
            App.commobj.setBottom();//是否显示登陆
            that.initThead();
            that.initSort(); //返回显示排序状态
            App.commobj.changeTitle('自选');
            App.commobj.setCookie("stocks","");
            return true;
        },

        afterRender: function() {
            var that = this;
            var local_auth_id = App.commobj.getValue('auth_id');
            var local_open_id = App.commobj.getValue('open_id');
            var mystock_height = $("#mystock").height();
            var b_height = $(window).height();
            if (local_auth_id || local_open_id) { //本地存在账号，未同步
                App.commobj.queryOpstock(function() {
                    that.showMystock();
                });
                $("#mystock .login").html("已登录");
            } else { //未登录显示本地数据
                
                that.showMystock();
            }
            if (mystock_height < b_height) { //底部灰色布局
                $('#mystock').height($(window).height());
            }
            if(App.commobj.OS_decide() == 'ios'){
                $('.optional').addClass('ios_optional');
            }else{
                $('.optional').removeClass('ios_optional');
            }
        },
        afterUnRender: function() {
            App.commobj.removeDisclaimer();
            clearInterval(window.timer); //停止定时器
            $('.optional_table tbody').html("");
            $('.optional_table').data('r', '');
            $('.optional_table').data('p', '');
        },
        initThead: function() {
            var showCelue = window.data.cl_s;
            var thead = _.template('<tr>\
              <th class="edit optional_edit">\
               <a href="javascript:;"><i></i>编辑</a>\
              </th>\
              <%=  (showCelue== "1"? "<th>策略</th>" : "") %>\
              <th class="price"><a href="javascript:;">最新价<i class="up"></i><i class="down"></i></a></th>\
              <th class="change"><a href="javascript:;" >涨跌幅</a><i class="up"></i><i class="down"></i></th>\
            </tr>');
            showCelue == "1" ? $('.optional_table').addClass('showCelue') : ''
            $('#optional_thead').html(thead({
                showCelue: showCelue
            }));
        },
        showMystock: function() {
            var that = this;
            var mystocks = App.commobj.getValue('mystocks');
            if (mystocks) { //默认只显示前100条
                var mystocks_arr = mystocks.split(',');
                if (mystocks_arr.length > 100) {
                    mystocks = mystocks_arr.slice(0, 100).join(",");
                    App.commobj.store("mystocks", mystocks);
                }
            }
            if(mystocks==''||mystocks==window.data.default_stock){
                $('.add_zxg').show();
            }else{
                $('.add_zxg').hide();
            }
            that.getStock(); //指数
            that.real(mystocks); //自选股
            clearInterval(window.timer);
            window.timer = setInterval(function() {
                that.getStock();
                that.real(mystocks);
            }, 6000);
        },
        getStock: function() {
            var that = this;
            var en_prod_code = '1A0001.SS,2A01.SZ,000001.SZ';
            App.OpenAPI.get("api/real/?en_prod_code=" + en_prod_code + "&fields=prod_name,last_px,px_change_rate,px_change", null, function(data) {
                var ss = data.data.snapshot;
                var fields = ss.fields;
                var showData = [],
                    arr_code = [],
                    sourArr = [],
                    html = '';
                var last_px, px_change_rate, px_change;
                for (var a in ss) {
                    var tmp = {},
                        ind;
                    if ("fields" == a) {
                        continue;
                    } else if (a == "1A0001.SS") {
                        ind = 1;
                    } else if (a == "2A01.SZ") {
                        ind = 2
                    } else {
                        ind = 3
                    }
                    last_px = ss[a][fields.indexOf('last_px')];
                    px_change_rate = ss[a][fields.indexOf('px_change_rate')];
                    px_change = ss[a][fields.indexOf('px_change')];
                    $("#szzs_stock .last_px" + ind).html(last_px == 0 ? '--' : last_px.toFixed(2));
                    $("#szzs_stock .px_change_rate" + ind).html(last_px == 0 ? '--' : (px_change_rate.toFixed(2) + "%"));
                    $("#szzs_stock .px_change" + ind).html(last_px == 0 ? '--' : (px_change.toFixed(2)));
                    var cls = _.setCls(ss[a][fields.indexOf('px_change')].toFixed(2), ["zxj_z", "", "zxj_d"]);
                    $('#szzs_stock .sz' + ind).removeClass('zxj_d').removeClass('zxj_z').addClass(cls);
                }
            });
        },
        real: function(en_prod_code) { //自选股内容渲染
            if (!en_prod_code) {
                $('.optional_table tbody').html("");
                return;
            }
            var cl_s = window.data.cl_s;
            var map = {
                'US': ['O', 'N', 'A'],
                'HK': ['HKI', 'HKM', 'HKG', 'HKN', 'HKE']
            }
            var tplList = _.template('<%_.each(list, function(row){%>\
            <tr data-id="<%=row.stock_code%>" class="<%=(+old[row.stock_code]-row.last_px)>0?"d_jy":(+old[row.stock_code]-row.last_px)<0?"z_jy":""%>">\
              <td>\
                <h3><%=row.stock_name%></h3>\
                <p><%=row.stock_code%></p>\
                <%=map.US.indexOf(row.stock_code.split(".")[1])!==-1?"<em class=us>US</em>":""%>\
                <%=map.HK.indexOf(row.stock_code.split(".")[1])!==-1?"<em class=hk>HK</em>":""%>\
              </td>\
              <%=  (showCelue== "1"? "<td class="+(row.cls)+">"+(row.stock_status)+"</td>" : "") %>\
              <% var obj = _.setCls(row.px_change_rate.split("%")[0], \
                [{c: "zxj_z", c2: "", f: "+"}, {c: "zxj_t", c2: "zdf_t", f: ""},{c: "zxj_d", c2:"zdf_d", f: ""}])%>\
                <%if(row.last_px=="--"){%><td class="zxj_p"><%=row.last_px%></td><%}%>\
                <%if(row.last_px!="--"){%><td class=""><%=row.last_px%></td><%}%>\
              <td ><i class="zdf_z <%=obj.c2%>"><%= obj.f + ((row.trade_status == "STOPT")? "停牌" : (row.px_change_rate+"%")) %></i></td>\
            </tr>\
          <%})%>');
            App.OpenAPI.get("api/real/?en_prod_code=" + en_prod_code + "&fields=prod_name,last_px,px_change_rate,px_change,trade_status", null, function(data) {
                var ss = data.data.snapshot;
                var fields = ss.fields;
                var showData = [],
                    arr_code = [],
                    sourArr = [],
                    html = '';

                var type = sessionStorage.getItem('type');
                var desc = sessionStorage.getItem('desc');
                var code_change = en_prod_code.split(',');
                var x_code = '';
                for (var x = 0; x < code_change.length; x++) {
                    var market = App.commobj.getEchange(code_change[x].split(".")[1]);
                    if (market != "XSHE" && market != "XSHG") { //修复 bug #31526 【三星S6 edge 安卓6.0】微信，授权登录后，自选股页面无数据，正式环境有20多条自选股
                        //return false;
                        x_code += "";
                    } else {
                        x_code += code_change[x].split(".")[0] + "." + market + ",";
                    }
                }
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                if (x_code == '') {
                    for (var a in ss) {
                        var tmp = {};
                        if ("fields" == a) {
                            continue;
                        }
                        tmp['preclose_px'] = ss[a][fields.indexOf('preclose_px')];
                        tmp['stock_name'] = ss[a][fields.indexOf('prod_name')];
                        tmp['stock_code'] = a;
                        tmp['prod_code_all'] = a;
                        if (a == 'HKM.ES') {
                            if ((h == 9) && (m < 15)) {
                                tmp['last_px'] = '--';
                            } else {
                                tmp['last_px'] = ss[a][fields.indexOf('last_px')].toFixed(3);
                            }
                            if ((h == 9) && (m < 15)) {
                                tmp['px_change_rate'] = '--';
                            } else {
                                tmp['px_change_rate'] = ss[a][fields.indexOf('px_change_rate')].toFixed(2);
                            }
                            tmp['px_change'] = ss[a][fields.indexOf('px_change')].toFixed(3);
                        } else {
                            if ((h == 9) && (m < 15)) {
                                tmp['last_px'] = '--';
                            } else {
                                tmp['last_px'] = ss[a][fields.indexOf('last_px')].toFixed(2);
                            }
                            if ((h == 9) && (m < 15)) { //if(ss[a][fields.indexOf('px_change_rate')].toFixed(2) == '0.00'){
                                tmp['px_change_rate'] = '--';
                            } else {
                                tmp['px_change_rate'] = ss[a][fields.indexOf('px_change_rate')].toFixed(2);
                            }
                            tmp['px_change'] = ss[a][fields.indexOf('px_change')].toFixed(2);
                        }
                        tmp['trade_status'] = ss[a][fields.indexOf('trade_status')];
                        tmp['stock_status'] = "--";
                        tmp['cls'] = "emptys";
                        /***
                           add by wyy 2017/4/21
                           退市股票会报错故自选列表退市股票不显示
                        ***/
                        tmp['stock_name']==""?"":showData.push(tmp);
                    }
                    var old = $('.optional_table').data('p');
                    var priceList = [];
                    for (var i = 0; i < showData.length; i++) {
                        priceList[showData[i].stock_code] = showData[i].last_px;
                    }
                    old = old ? old : priceList;
                    $('.optional_table').data('r', showData);
                    $('.optional_table').data('p', priceList);
                    var data = showData.concat();
                    if (type && desc != undefined) {
                        showData = App.mystockView.sortBy(data, type, desc);
                    }
                    var changeList="";
                    for(var i=0;i<showData.length;i++){
                        changeList+=showData[i].stock_code+",";
                    }
                    //console.log(changeList);
                    $('.optional_table tbody').html(tplList({
                        old: old,
                        list: showData,
                        showCelue: cl_s,
                        map: map
                    }));
                    return;
                }
                var en_prod_codes = x_code.substring(0, x_code.length - 1);
                App.OpenAPI.get("api/ma10_inflexion/?en_prod_code=" + en_prod_codes, null, function(_data) {
                    var _ss = _data.data.trade_status_grp;
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
                        tmp['stock_name'] = ss[a][fields.indexOf('prod_name')];
                        tmp['stock_code'] = a;
                        tmp['prod_code_all'] = a;
                        if (a == 'HKM.ES') {
                            if ((h == 9) && (m < 15)) {
                                tmp['last_px'] = '--';
                            } else {
                                tmp['last_px'] = ss[a][fields.indexOf('last_px')].toFixed(3);
                            }
                            if ((h == 9) && (m < 15)) {
                                tmp['px_change_rate'] = '--';
                            } else {
                                tmp['px_change_rate'] = ss[a][fields.indexOf('px_change_rate')].toFixed(2);
                            }
                            tmp['px_change'] = ss[a][fields.indexOf('px_change')].toFixed(3);
                        } else {
                            //if(ss[a][fields.indexOf('last_px')].toFixed(2) == '0.00'){
                            if ((h == 9) && (m < 15)) {
                                tmp['last_px'] = '--';
                            } else {
                                tmp['last_px'] = ss[a][fields.indexOf('last_px')].toFixed(2);
                            }
                            if ((h == 9) && (m < 15)) { //if(ss[a][fields.indexOf('px_change_rate')].toFixed(2) == '0.00'){
                                tmp['px_change_rate'] = '--';
                            } else {
                                tmp['px_change_rate'] = ss[a][fields.indexOf('px_change_rate')].toFixed(2);
                            }
                            tmp['px_change'] = ss[a][fields.indexOf('px_change')].toFixed(2);
                        }
                        tmp['trade_status'] = ss[a][fields.indexOf('trade_status')];
                        tmp['stock_name']!=""?showData.push(tmp):"";
                    }
                    var old = $('.optional_table').data('p');
                    var priceList = [];
                    for (i = 0; i < showData.length; i++) {
                        priceList[showData[i].stock_code] = showData[i].last_px;
                    }
                    old = old ? old : priceList;
                    $('.optional_table').data('r', showData);
                    $('.optional_table').data('p', priceList);
                    var data = showData.concat();
                    if (type && desc != undefined) {
                        showData = App.mystockView.sortBy(data, type, desc);
                    }
                     changeList="";
                    for(var i=0;i<showData.length;i++){
                        changeList+=showData[i].stock_code+",";
                    }
                    //console.log(changeList);
                    $('.optional_table tbody').html(tplList({
                        old: old,
                        list: showData,
                        showCelue: cl_s,
                        map: map
                    }));
                });
            });
        },
        go_Quote: function(e) {
            var el = $(e.currentTarget);
            el.addClass('hover');
            var page = e.currentTarget.nodeName=="TR"?"mystocks":"index";
            var changeList=changeList?changeList:App.commobj.getValue('mystocks');
            changeList = page == "index"?"1A0001.SS,2A01.SZ,399006.SZ":changeList;
            //console.log(changeList);
            App.commobj.setCookie("stocks",changeList);
            setTimeout(function(){window.location.href = '#quote?code='+el.data('id')/*+"&refer=mystock"*/;},100);
        },
        events: {
            "click .add_zxg": "addZXG",
            "click .header-fdj": "addZXG",
            "click .optional_edit": "optionalEdit",
            "click .price": 'sortPrice',
            'click .change a': 'sortChange',
            'click .login': 'login',
            'click .optional_table tbody tr' : 'go_Quote',
            'click #mystock .top_stock' : 'go_Quote'
        },
        login: function() {
            if (data.is_test == 1) {
                var login_url = '#/login';
            } else {
                var callback_url = location.origin + location.pathname;
                var login_url = "" + encodeURIComponent(callback_url);
            }
            window.location.href = login_url;
        },
        addZXG: function() {
            App.commobj.store('reffer', 'list');
            window.location.href = "#search";
        },
        optionalEdit: function() {
            //App.commobj.store("mystocks", App.mystockView.en_prod_code);
            sessionStorage.setItem("isEdit", true);
            window.location.href = "#optional_edit";
        },
        initSort: function() {
            var type = sessionStorage.getItem('type');
            var desc = sessionStorage.getItem('desc');
            var $p = $('#optional_thead .price');
            var $u = $('#optional_thead .price .up');
            var $d = $('#optional_thead .price .down');
            var $c = $('#optional_thead .change');
            var $cu = $('#optional_thead .change .up');
            var $cd = $('#optional_thead .change .down');
            if (sessionStorage.getItem("isEdit")) {
                sessionStorage.removeItem("isEdit");
                sessionStorage.removeItem("type");
                sessionStorage.removeItem("desc");
                return;
            }

            if (type == 'last_px' && desc == 'true') {
                $p.find('a').addClass('active');
                $d.addClass('active');
            } else if (type == 'last_px' && desc == 'false') {
                $p.find('a').addClass('active');
                $u.addClass('active');
            }

            if (type == "px_change_rate" && desc == 'true') {
                $c.find('a').addClass('active');
                $cd.addClass('active');
            } else if (type == 'px_change_rate' && desc == 'false') {
                $c.find('a').addClass('active');
                $cu.addClass('active');
            }
        },
        //价格排序
        sortPrice: function() {
            var changeList = "";
            var r = $('.optional_table').data('r') || [];
            var $p = $('#optional_thead .price');
            var $u = $('#optional_thead .price .up');
            var $d = $('#optional_thead .price .down');
            var $c = $('#optional_thead .change');
            var map = {
                'US': ['O', 'N', 'A'],
                'HK': ['HKI', 'HKM', 'HKG', 'HKN', 'HKE']
            }
            var data = r.concat();
            $c.find('.active').removeClass('active');
            $p.find('a').addClass('active');
            sessionStorage.setItem('type', 'last_px');
            if ($d.hasClass('active')) {
                $u.addClass('active');
                $d.removeClass('active');
                data = App.mystockView.sortBy(data, 'last_px', 'false');
                sessionStorage.setItem('desc', false);
            } else if ($u.hasClass('active')) {
                $u.removeClass('active');
                $p.find('a').removeClass('active');
                data = r.concat();
                sessionStorage.removeItem('type');
                sessionStorage.removeItem('desc');
            } else {
                $d.addClass('active');
                $u.removeClass('active');
                data = App.mystockView.sortBy(data, 'last_px', 'true');
                sessionStorage.setItem('desc', true);
            }
            for(var i=0;i<data.length;i++){
                changeList += data[i].stock_code+",";
            }
            //console.log("rank"+changeList);
            var old = $('.optional_table').data('p');
            if (data.length == 0)
                return;
            $('.optional_table tbody').html(tplList({
                old: old,
                list: data,
                showCelue: window.data.cl_s,
                map: map
            }));
        },
        //涨跌幅排序
        sortChange: function() {
            var changeList = "";
            var map = {
                'US': ['O', 'N', 'A'],
                'HK': ['HKI', 'HKM', 'HKG', 'HKN', 'HKE']
            }
            var r = $('.optional_table').data('r') || [];
            var $p = $('#optional_thead .price');
            var $u = $('#optional_thead .change .up');
            var $d = $('#optional_thead .change .down');
            var $c = $('#optional_thead .change');
            var data = r.concat();
            $p.find('.active').removeClass('active');
            $c.find('a').addClass('active');
            sessionStorage.setItem('type', 'px_change_rate');
            if ($d.hasClass('active')) {
                $u.addClass('active');
                $d.removeClass('active');
                data = App.mystockView.sortBy(data, 'px_change_rate', 'false');
                sessionStorage.setItem('desc', false);
            } else if ($u.hasClass('active')) {
                $u.removeClass('active');
                $c.find('a').removeClass('active');
                data = r.concat();
                sessionStorage.removeItem('type');
                sessionStorage.removeItem('desc');
            } else {
                $d.addClass('active');
                $u.removeClass('active');
                data = App.mystockView.sortBy(data, 'px_change_rate', 'true');
                sessionStorage.setItem('desc', true);
            }
            if (data.length == 0)
                return;
            for(var i=0;i<data.length;i++){
                changeList += data[i].stock_code+",";
            }
            //console.log(changeList);
            var old = $('.optional_table').data('p') || [];
            $('.optional_table tbody').html(tplList({
                old: old,
                list: data,
                showCelue: window.data.cl_s,
                map: map
            }));
        },
        sortBy: function(arr, prop, desc) {
            var ret = [],
                len = arr.length;
            var compare = function(property) {
                return function(a, b) {
                    var value1 = a[property];
                    var value2 = b[property];
                    return value1 - value2;
                }
            }
            if (arr.length == 0) {
                return arr;
            }

            var ret = arr.sort(compare(prop));
            if (desc == 'true')
                ret.reverse();
            return ret;
        },

    });
})(Zepto);
//根据值大小选择class --- 12, ['cls1', 'cls2', 'cls3']
_.setCls = function(v, arr) {
    return v > 0 ? arr[0] : (v < 0 ? arr[2] : arr[1]);
};