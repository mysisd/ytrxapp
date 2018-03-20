/**
 * Created by Administrator on 2017/11/14 0014.
 */
$(function () {

    //密钥
    var encrypt = new JSEncrypt();
    var publickey = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDBiYEk6LHMqqUm6WJCcSNfjlPZXPj/zHjmuVuU/QLE/yKqv2YEiPiGxaajZdBL4WUNRQxO4Dt4MDrjN43CsAzQj6OT/fDgroPERccBnwAZQr5FTR4GFfhxcoWxT/2nfmIVI7nHoJSeV7nHHwBBwagb4Z5EDrQDKr3vsumk9DY98wIDAQAB-----END PUBLIC KEY-----';
    encrypt.setPublicKey(publickey);
    $('.select_choice li').click(function () {
      $('#click').html($(this).html());
    })
    $('.select_choice li').click(function () {
        $('#clicks').html($(this).html());
    })

    $("#click").on("click", function(e){
        if($(".select_choice").is(":hidden")){
            $(".select_choice").show();
        }else{
            $(".select_choice").hide();
        }

        $(document).one("click", function(){
            $(".select_choice").hide();
        });

        e.stopPropagation();
    });
    $("#clicks").on("click", function(e){
        if($(".select_choice").is(":hidden")){
            $(".select_choice").show();
        }else{
            $(".select_choice").hide();
        }
        $(document).one("click", function(){
            $(".select_choice").hide();
        });

        e.stopPropagation();
    });
    $(".select_choice").on("click", function(e){
        e.stopPropagation();
    });

    $('.shichang').hide();
    $('#market').click(function () {
       $('.select').show();
       $('.shichang').hide();
       $(this).removeClass('active');
        $('#optional').addClass('active');
        $('.ma').hide();
        $('#old').hide();
        $('#qihuo').hide();
        $('.option').show();

    })
  $('#optional').click(function () {
      $('.select').hide();
      $('.shichang').show();
      $(this).removeClass('active');
      $('#market').addClass('active');
      $('.ma').show();
      $('.option').hide();
      $('#qihuo').show();
      $('#old').hide();

        // if( $('#old').is(':hidden')){
        //     $('#qihuo').css({margin: '-118px 32px'}).show();
        // }else{
        //     $('#qihuo').css({margin: '-620px 32px'}).show();
        // }



  })

    $('.mui-tab-item ').eq(0).addClass('mui-active');
    mui('.mui-bar-tab').on('tap','a',function(){
        document.location.href=$('.mui-tab-item ').eq($(this).index()).attr('href');
        $('.mui-tab-item ').eq($(this).index()).addClass('mui-active');

    });
    $('.animate').height(window.screen.height);
    $('.img').height(window.screen.height);
  $('#skip').click(function () {
      document.location.href='http://xmyttz.com/rx/rx/index'
  });




    $("#qihuo").on("click", function(e){
        if($("#item5mobile").is(":hidden")){
            $("#item5mobile").show();
        }
        $(document).one("click", function(){
            $("#item5mobile").hide();
        });
        e.stopPropagation();
    });
    //登录

    $('#mt_login_sub').click(function(){
        var phone_num=$('#mt_login_phone').val();
        var pwd=$('#mt_login_pwd').val();
        if(!/^[1]\d{10}$/.test(phone_num)){
            $('#error_system').show();
            $('#error_system_text').text('手机号格式错误');
            setTime=setTimeout(function(){$('#error_system').hide()},keepTime);
            return false;
        }else if(pwd.length<6||pwd.length>20){
            $('#error_system').show();
            $('#error_system_text').text('密码位数错误');
            setTime=setTimeout(function(){$('#error_system').hide()},keepTime);
            return false;
        }
        var phone    = encrypt.encrypt(phone_num);
        var password = encrypt.encrypt(pwd);
        $.ajax({
            url:'/rx/login/login',
            type:'POST',
            dataType:'json',
            data: {"phone": phone,"password": password},
            success:function(data){
                if(data.res=='success') {
                    $.cookie('users',data['orign'],{ path: '/'});
                    location.href = '/rx/user/index1';
                }else if(data.res=='error') {
                    alert('密码错误');
                }else if(data.res=='null'){
                    alert('该手机号尚未注册');
                }
            }
        });
    })

    //添加期货内容

    //期货类型切换
    $('#notice').click(function () {
        $(this).addClass('move_active');
        $('#new').removeClass('move_active');
        $('#info').removeClass('move_active');
        $('.notice').show();
        $('.zixun').hide();
        $('.info').hide();
        $('.slider').hide();
    })
    $('#new').click(function () {
        $(this).addClass('move_active');
        $('#notice').removeClass('move_active');
        $('#info').removeClass('move_active');
        $('.notice').hide();
        $('.zixun').show();
        $('.info').hide();
        $('.slider').show();
    })
    $('#info').click(function () {

        $('#notice').removeClass('move_active');
        $('#new').removeClass('move_active');
        $('.notice').hide();
        $('.zixun').hide();
        $('.info').show();
        $('.slider').hide();
    })

    //轮播
    var length,
        currentIndex = 0,
        interval,
        hasStarted = false, //是否已经开始轮播
        t = 3000; //轮播时间间隔
    length = $('.slider-panel').length;
    //将除了第一张图片隐藏
    $('.slider-panel:not(:first)').hide();
    //将第一个slider-item设为激活状态
    $('.slider-item:first').addClass('slider-item-selected');
    //隐藏向前、向后翻按钮
    $('.slider-page').hide();
    //鼠标上悬时显示向前、向后翻按钮,停止滑动，鼠标离开时隐藏向前、向后翻按钮，开始滑动
    $('.slider-panel, .slider-pre, .slider-next').hover(function() {
        stop();
        $('.slider-page').show();
    }, function() {
        $('.slider-page').hide();
        start();
    });
    $('.slider-item').hover(function(e) {
        stop();
        var preIndex = $(".slider-item").filter(".slider-item-selected").index();
        currentIndex = $(this).index();
        play(preIndex, currentIndex);
    }, function() {
        start();
    });
    $('.slider-pre').unbind('click');
    $('.slider-pre').bind('click', function() {
        pre();
    });
    $('.slider-next').unbind('click');
    $('.slider-next').bind('click', function() {
        next();
    });
    /**
     * 向前翻页
     */
    function pre() {
        var preIndex = currentIndex;
        currentIndex = (--currentIndex + length) % length;
        play(preIndex, currentIndex);
    }
    /**
     * 向后翻页
     */
    function next() {
        var preIndex = currentIndex;
        currentIndex = ++currentIndex % length;
        play(preIndex, currentIndex);
    }
    /**
     * 从preIndex页翻到currentIndex页
     * preIndex 整数，翻页的起始页
     * currentIndex 整数，翻到的那页
     */
    function play(preIndex, currentIndex) {
        $('.slider-panel').eq(preIndex).fadeOut(500)
            .parent().children().eq(currentIndex).fadeIn(1000);
        $('.slider-item').removeClass('slider-item-selected');
        $('.slider-item').eq(currentIndex).addClass('slider-item-selected');
    }
    /**
     * 开始轮播
     */
    function start() {
        if(!hasStarted) {
            hasStarted = true;
            interval = setInterval(next, t);
        }
    }
    /**
     * 停止轮播
     */
    function stop() {
        clearInterval(interval);
        hasStarted = false;
    }
    //开始轮播
    start();


    // 动态切换
    $('#hot').click(function () {
      $(this).addClass('zixun_active');
      $('#all').removeClass('zixun_active');
      $('.hot').show();
      $('.all').hide();
  })
    $('#all').click(function () {
        $(this).addClass('zixun_active');
        $('#hot').removeClass('zixun_active');
        $('.hot').hide();
        $('.all').show();
    })

    $("#cp").on("click", function(e){
        if($(".net").is(":hidden")){
            $(".curtain").show();
            $('.net').show();
        }
        $(document).one("click", function(){
            $(".net").hide();
            $(".curtain").hide();
        });

        e.stopPropagation();
    })
    $('#cancel').click(function () {
        $(".net").hide();
        $(".curtain").hide();
    })

    $("#headImage").click(function(){
        location.href='/rx/user/ceshi';

    })
    $('#shiming').click(function () {
        document.location.href='/rx/user/identity';
    })

    //期货内容点击部分内容


    //退出登录
    $('#logout').click(function () {
        $.ajax({
            url:'/rx/login/logout',
            type:'post',
            success:function () {
                $.cookie('users',{expires: -1},null);
                alert('退出成功');
              location.href="/rx/login/login";

            }
        })
    })

    //绑定银行卡
    $('#addcard_btn').click(function(){
        var window_width=$(window).width();
        var bankname=$.trim($('#bankname').val());
        var bankcode=$("#addcard_bankcode option:selected").val();
        var card=$.trim($('#card').val());
        var name=$.trim($('#idname').val());
        var idcard=$.trim($('#idcard').val());
        var cardprovince=$.trim($('#province').val());
        var cardcity=$.trim($('#city').val());
        var bankbranchname=$.trim($('#bankbranchname').val());
        var cardphone=$.trim($('#cardphone').val());
        var deal_pass=$.trim($('#deal_password').val());
        var deal_password = encrypt.encrypt(deal_pass);
        var strs=name.replace(/(^\s+)|(\s+$)/g, "");//去除前后的空格
        if (!strs.match(/^[\u4e00-\u9fa5]{2,4}$/)) {//我习惯用match
            error_info("只能输入2到4个汉字");
            return false;
        }
        if(window_width>768)$('#addcardform p input').css('border','1px solid #a9a9a9');
        if(bankname.length==0||card.length==0||name.length==0||idcard.length==0||cardprovince.length==0||cardcity.length==0||cardphone.length==0||bankbranchname.length==0){
            error_info('内容不得为空！');
            return false;
        }else if(!luhmCheck(card)){
            error_info('卡号格式错误！');
            if(window_width>768)$('#card').css('border','1px solid #f55');
            return false;
        }else if(!IdentityCodeValid(idcard)){
            error_info('身份证格式错误！');
            if(window_width>768)$('#idcard').css('border','1px solid #f55');
            return false;
        }else if(cardprovince == '请选择'){
            error_info('请选择开户省、市');
            return false;
        }else if(!/^[1]\d{10}$/.test(cardphone)){
            error_info('请输入正确的手机号！');
            if(window_width>768)$('#cardphone').css('border','1px solid #f55');
            return false;
        }else {
            $('#error_info').hide();
            $('#loading_img').show();
            showOverlay();
            var json = {
                "deal_password": deal_password,
                "bankname": bankname,
                "bankcode": bankcode,
                "card": card,
                "name": name,
                "idcard": idcard,
                "cardprovince": cardprovince,
                "cardcity": cardcity,
                'bankbranchname':bankbranchname,
                'cardphone':cardphone
            };
            $.ajax({
                type:'post',
                url:conUrl+'/addcard_success',
                dataType:'JSON',
                data: json,
                success:function(arr){
                    if(arr.flag==1){
                        setTimeout(function(){
                            $('#loading_img').hide();
                            $('#addcard_success').show();
                        },1000);
                    }else{
                        $('#loading_img').hide();
                        hideOverlay();
                        error_info('银行卡绑定失败，请重试或联系客服！');
                    }
                }
            })
        }
    })
    $('#cardphone').keydown(function(e){
        if(e.keyCode==13){
            $('#addcard_btn').click();
        }
    })
    $(".immediate").click(function () {
        $.ajax({
           url:'/rx/user/addcard',
           type:'post',
           success:function (data) {
               if(data.ret=='error'){
                   location.href='/rx/user/addcard';
            }else{
                   location.href='/rx/user/addcard';
            }
           }


       })
    })
  $('#position').click(function () {
     $('.position').show();
      $('.deal').hide();
      $('.entrust').hide();
      $('.posters').hide();
  })
    $('#posters').click(function () {
        $('.position').hide();
        $('.deal').hide();
        $('.entrust').hide();
        $('.posters').show();
    })
    $('#entrust').click(function () {
        $('.position').hide();
        $('.deal').hide();
        $('.entrust').show();
        $('.posters').hide();
    })
    $('#deal').click(function () {
        $('.position').hide();
        $('.deal').show();
        $('.entrust').hide();
        $('.posters').hide();
    })


//注册
    var phone_url=conUrl+'/has_phone';

    //PC
    $('#getCode').click(function(){
        stopTime();
        $('#register_form ul li input').css('border','1px solid #ccc');
        var phoneNum=$('#phone_num').val();
        var getCode=$(this);
        var time=59;
        var flag=0;
        if(/^[1]\d{10}$/.test(phoneNum)){
            $.ajax({
                type:'POST',
                url:'/rx/register/has_phone',
                dataType:'JSON',
                data:{'phone':phoneNum},
                success:function(data){
                    if(data.exist==1){
                        flag=1;
                    }else if(data.exist==0){
                        alert('该手机号已经注册');
                        $('#phone_num').css('border','1px solid #f99');
                    }
                },
                async:false
            });
            if(flag==1){
                $('#pc_code_num').select();
                getCode.css('cursor','default');
                getCode.css('color','#999');
                getCode.css('background','#eee');
                getCode.attr({ "disabled": "disabled" });
                $.ajax({
                    url:conUrl+'/abc',
                    type: 'post',
                    dataType:'JSON',
                    data: {'phone': phoneNum},
                    success: function (data) {
                        if(data.indexOf('success')){
                            getCode.html("<p>60秒后</p><p>可重新发送</p>");
                            var hander = setInterval(function () {
                                if (time <= 0) {
                                    clearInterval(hander);
                                    getCode.css('cursor','pointer');
                                    getCode.css('color','#fff');
                                    getCode.css('background','#0379b5')
                                    getCode.html("获取验证码");
                                    getCode.removeAttr("disabled");
                                }
                                else {
                                    getCode.css('cursor','default');
                                    getCode.css('color','#999');
                                    getCode.css('background','#eee');
                                    getCode.attr({ "disabled": "disabled" });
                                    getCode.html( "<p>"+ time + "秒后</p><p>可重新发送</p>");
                                    time--;
                                }
                            }, 1000);
                        }else{
                            alert('验证码发送失败，请联系客服');
                        }
                    }
                });
            }
        }else{
            alert('手机号格式错误');
            $('#phone_num').css('border','1px solid #f99');
            return false;
        }

    })
    $('#register_btn').click(function(){
        $('#errorInfo').hide();
        var phone_num=$('#phone_num').val();
        var code_num=$('#code_num').val();
        var pwd_num=$('#pwd_num').val();
        if(!$('#mt_checkbox').is(':checked')){
        	$('#errorInfo').show();
        	$('#errorInfo_text').text('请先阅读并同意注册协议');
        	return false;
        }else if(!/^[1]\d{10}$/.test(phone_num)){
        	$('#errorInfo').show();
        	$('#errorInfo_text').text('手机号码格式错误');
        	return false;
        }
        // else if(code_num.length!=6){
        // 	$('#errorInfo').show();
        // 	$('#errorInfo_text').text('验证码错误');
        // 	return false;
        // }
        else if(pwd_num.length<6||pwd_num.length>20){
        	$('#errorInfo').show();
        	$('#errorInfo_text').text('密码长度需在6-20位之间');
        	return false;
        }else if(pwd_num!=$('#pwd_num2').val()){
        	$('#errorInfo').show();
        	$('#errorInfo_text').text('两次密码输入不一致');
        	return false;
        }else{
        	// var phone    = encrypt.encrypt(phone_num);
        	// 	var password = encrypt.encrypt(pwd_num);
        		$.ajax({
        		    url:'/rx/register/registers',
        			type:'POST',
                    data:{
        					'phone'    : phone_num,
        					'password' : pwd_num,
        					// 'code'     : code_num

                    },
        			success:function(data){
        				if(data.register == 'repeat') {
        					alert('该手机号已经注册');
        					$('#phone_num').css('border','1px solid #f99');
        				}else if(data.register == 'success') {
        					location.href = '/rx/user/index1';
        				}else if(data.register == 'error') {
        					alert('验证码错误');
        				}else {
        					$('#error_system').show();
        					$('#error_system_text').text('服务器繁忙，请重试');
        					setTime=setTimeout(function(){$('#error_system').hide();location.reload();},keepTime);
        				}
        			}
        		});

        }
    })

    $('#guoji').click(function () {
       $.ajax({
           url:'/rx/user/null_card',
           type:'post',
           success:function (data) {
               if(data.ret='no'){
                   location.href = '/rx/user/addcard';
               }else if(data.ret='yes'){
                   location.href = '/rx/user/transaction';
               }
           }
       })
    })

    $('.per_but').click(function () {
        var sex = $('.suc-msg').text();
        var city= $('#city_text').text();
        var face=$('#img1')[0].src;

        $.ajax({
            url:'/rx/user/save_trans',
            type:'post',
            dataType:'JSON',
            data:{'sex':sex,'area':city,'face':face},
            success:function (data) {
                if(data.ret=='success'){
                    alert('更新成功');
                }
            }
        })

    })

//修改登录密码
    $('#oldpwd').blur(function () {
        var old_pass    = encrypt.encrypt($('#oldpwd').val());
        var phone    = encrypt.encrypt($.cookie('user_or'));
        $.ajax({
            url:'/rx/user/old_pass',
            type:'post',
            dataType:'JSON',
            data:{'password':old_pass,'phone':phone},
            success:function (data) {
                if(data.ret=='error'||data.ret=='null'){
                    alert('改密码与原密码不同，请重新输入');
                    $('#oldpwd').val('');
                }
            }

        })
    })
    $('#find_btn').click(function(){
        $('#errorInfo').hide();
        var phone_num=$('#find_phone_num').val();
        var code_num=$('#find_code_num').val();
        var pwd_num=$('#find_pwd_num').val();
        if(!/^[1]\d{10}$/.test(phone_num)){
            $('#errorInfo').show();
            $('#errorInfo_text').text('手机号码格式错误');
            return false;
        }else if(code_num.length!=6){
            $('#errorInfo').show();
            $('#errorInfo_text').text('验证码错误');
            return false;
        }else if(pwd_num.length<6||pwd_num.length>20){
            $('#errorInfo').show();
            $('#errorInfo_text').text('密码长度需在6-20位之间');
            return false;
        }else if(pwd_num!=$('#find_pwd_num2').val()){
            $('#errorInfo').show();
            $('#errorInfo_text').text('两次密码输入不一致');
            return false;
        }else{
            $.ajax({
                type:'POST',
                url:conUrl+'/findpwd',
                data:{'code':code_num,'phone':phone_num,'password':pwd_num},
                success:function(data){
                    if(data.reset=='success'){
                        alert('修改密码成功');
                        location.href='/rx/login/login';
                    }else if(data.reset=='error'){
                        alert('修改密码失败');

                    }
                }
            });
        }
    })

    $('.zhezao').height(document.body.scrollHeight);
    $('.content_btn').click(function(){
        var window_width=$(window).width();
        var new_pwd=$('#newpwd').val();
        var old_pwd=$('#oldpwd').val();
        var re_pwd=$('#newpwdagain').val();

        if(old_pwd.length<6||old_pwd.length>20||new_pwd.length<6||new_pwd.length>20){
            $('#error_info').show();
            $('#error_span').text('密码需要在6-20位之间！');
            return false;
        }else{
            if(new_pwd!=re_pwd){

                alert('两次密码输入不一致！');
                $('#newpwdagain').val('');
                if(window_width>768)$('#newpwdagain').css('border','1px solid #f55');
                return false;
            }else{
                $.ajax({
                    type:'POST',
                    url:conUrl+'/set_password',
                    dataType:'JSON',
                    data:{'old_pwd':old_pwd,'new_pwd':new_pwd},
                    success:function(arr){
                        if(arr.flag==1){

                            $('.zhezao').show();

                            $('#setpwd_success').show();
                        }else if(arr.flag==0){
                            $('#setpwd_error').show();
                        }else if(arr.flag==-1){

                            alert('原交易/登录密码错误！');
                            $('#oldpwd').val('');
                            if(window_width>768)$('#oldpwd').css('border','1px solid #f55');
                        }
                    }
                });
            }
        }
    })

    $('.content_btns').click(function(){
        var window_width=$(window).width();
        var new_pwd=$('#newpwd').val();
        var old_pwd=$('#oldpwd').val();
        var re_pwd=$('#newpwdagain').val();

        if(old_pwd.length<6||old_pwd.length>20||new_pwd.length<6||new_pwd.length>20){
            $('#error_info').show();
            $('#error_span').text('密码需要在6-20位之间！');
            return false;
        }else{
            if(new_pwd!=re_pwd){

                alert('两次密码输入不一致！');
                $('#newpwdagain').val('');
                if(window_width>768)$('#newpwdagain').css('border','1px solid #f55');
                return false;
            }else{
                $.ajax({
                    type:'POST',
                    url:conUrl+'/set_dealpassword',
                    dataType:'JSON',
                    data:{'old_pwd':old_pwd,'new_pwd':new_pwd},
                    success:function(arr){
                        if(arr.flag==1){

                            $('.zhezao').show();

                            $('#setpwd_success').show();
                        }else if(arr.flag==0){
                            $('#setpwd_error').show();
                        }else if(arr.flag==-1){

                            alert('原交易/登录密码错误！');
                            $('#oldpwd').val('');
                            if(window_width>768)$('#oldpwd').css('border','1px solid #f55');
                        }
                    }
                });
            }
        }
    })
    $('#resert').click(function () {
       var phone=$.trim($('#phone').val());
        if(phone==''){
           alert('手机号/用户名不能为空');
           return false;
       }
       $.ajax({
           url:'/rx/user/resert',
           type:'post',
           dataType:'JSON',
           data:{'phone':phone},
           success:function (data) {
            if(data.res=='success'){
                var myphone=phone.substr(3,4);
                var lphone=phone.replace(myphone,"****");
                $('#phone_code').text(lphone);
                $('#phone_one').val(phone);
                $('.code_text').show();
                $('.resert').hide();
                $('.resert_code').show();
            }else{
                alert('该手机号/用户名尚未注册');
            }
           }
       })

    })
    $('#next_code').click(function () {
        var new_deal=$('#payPassword_rsainput').val();
        var once_deal=$('#payPassword_rsainputs').val();
        var new_deals    = encrypt.encrypt(new_deal);

        if(new_deal!=once_deal){
            alert('两次输入的交易密码不正确');
            return false;
        }
        $.ajax({
            url:'/rx/user/resert_deal',
            type:'post',
            dataType:'JSON',
            data: "new_deal=" + new_deals,
            success:function (data) {
                if( data.res=='success'){
                    alert('重置交易密码成功');
                    location.href='/rx/user/index1'
                }else{
                    alert('重置交易密码失败');
                    location.href='/rx/user/resert_deal';

                }
            }
        })
    })
    $('.act').click(function () {
        $('#old_del').hide();
        $('#five_file').hide();
        $('#main').show();
        $('#chartdiv').hide();
        $('#myFrameId').show();
    })
    $('#time_sh').click(function () {
        $('#old_del').hide();
        $('#five_file').hide();
        $('#main').hide();
        $('#chartdiv').show();
        $('#myFrameId').show();
    })
    $('#dish').click(function () {

        $('#old_del').show();
        $('#five_file').hide();
        $('#main').hide();
        $('#chartdiv').hide();
        $('#myFrameId').hide();


    })
    $('.five_file').click(function () {
        $('#old_del').hide();
        $('#five_file').show();
        $('#chartdiv').hide();
        $('#myFrameId').hide();

    })
    // if($.cookie('names')==null){
    //     $.cookie('names','GC1804', { expires: 365});
    // }
    $('.ma').on('click','.mui-table-view-cell',function(e){
        $("#al>p").trigger("click");
        var text=$(this).find('p').text();
        var num = text.replace(/[^0-9]/ig,"");
        var value = text.slice('left',-4);

        $.cookie('names',text, { expires: 365});
        setInterval(function () {
            var texts=$.cookie('names');
            var nums = texts.replace(/[^0-9]/ig,"");
            var values = texts.slice('left',-4);
            $.ajax({
                url:'/rx/rx/send_list',
                type:'post',
                dataType: "json",
                data:{'type':values,'num':nums},
                success:function(data){
                    for(var item in data){
                        data=data[0];
                        $('.purchase_price1').eq(0).text(data['QBidPrice1']);
                        $('.purchase_price1').eq(1).text(data['QChangeValue']);
                        $('.purchase_price1').eq(2).text(data['QOpeningPrice']);
                        $('.purchase_price1').eq(3).text(data['QHighPrice']);
                        $('.purchase_price1').eq(4).text(data['QTotalQty']);
                        $('.purchase_price1').eq(5).text(data['QPositionQty']);
                        var a = data['QPositionQty']/10000;
                        var b = parseFloat(a).toFixed(3);
                        var result = b.substring(0,b.toString().length - 1);  //这里先将a转换为float类型再保留三位小数，最后截取字符串前b.length - 1位 $('.purchase_price1').eq(5).text(data['QPositionQty']);
                        $('.purchase_price1').eq(6).text(data['QAskPrice1']);
                        var a = data['QChangeRate'];
                        var b = parseFloat(a).toFixed(3);
                        var result = b.substring(0,b.toString().length - 1);
                        $('.purchase_price1').eq(7).text(result+'%');
                        $('.purchase_price1').eq(8).text(data['QPreSettlePrice']);
                        $('.purchase_price1').eq(9).text(data['QLowPrice']);
                        var a = data['QSwing'];
                        var b = parseFloat(a).toFixed(3);
                        var result = b.substring(0,b.toString().length - 1);
                        $('.purchase_price1').eq(10).text(result+'%');

                        $('.se_two').eq(0).text(data['QAskQty1']);
                        $('.se_two').eq(1).text(data['QAskQty2']);
                        $('.se_two').eq(2).text(data['QAskQty3']);
                        $('.se_two').eq(3).text(data['QAskQty4']);
                        $('.se_two').eq(4).text(data['QAskQty5']);
                        $('.se_two').eq(5).text(data['QBidQty1']);
                        $('.se_two').eq(6).text(data['QBidQty2']);
                        $('.se_two').eq(7).text(data['QBidQty3']);
                        $('.se_two').eq(8).text(data['QBidQty4']);
                        $('.se_two').eq(9).text(data['QBidQty5']);

                        $('.se_one').eq(0).text(data['QAskPrice1']);
                        $('.se_one').eq(1).text(data['QAskPrice2']);
                        $('.se_one').eq(2).text(data['QAskPrice3']);
                        $('.se_one').eq(3).text(data['QAskPrice4']);
                        $('.se_one').eq(4).text(data['QAskPrice5']);
                        $('.se_one').eq(5).text(data['QBidPrice1']);
                        $('.se_one').eq(6).text(data['QBidPrice2']);
                        $('.se_one').eq(7).text(data['QBidPrice3']);
                        $('.se_one').eq(8).text(data['QBidPrice4']);
                        $('.se_one').eq(9).text(data['QBidPrice5']);

                    }

                }
            })
        },1000)

        var ele=$('#old');
        if(ele.is(':hidden')){
            //是：当前是隐藏，那么显示元素
            ele.show();
        }
        else{
        //否：当前是显示，那么隐藏元素
            ele.hide();
    }


    })
    $('.option').on('click','.mui-table-view-cell',function(e){
        $("#al>p").trigger("click");
        var text=$(this).find('p').text();
        var num = text.replace(/[^0-9]/ig,"");
        var value = text.slice('left',-4);
        $.cookie('names',text, { expires: 365});
        var ele=$('#old');
        if(ele.is(':hidden')){
            //是：当前是隐藏，那么显示元素
            ele.show();
        }
        else{
            //否：当前是显示，那么隐藏元素
            ele.hide();
        }

    })

    $('#buy').on('click','a',function () {

        var text=$('.mui-table-view-cell').find('p').text();
        var pay_money=$('.purchase_price1').eq(0).text();
        var sell_money=$('.purchase_price1').eq(6).text();
        $.cookie('pay_money',pay_money);
        $.cookie('sell_money',sell_money);

    })
    $('#sell').on('click','a',function () {

        var text=$('.mui-table-view-cell').find('p').text();
        var pay_money=$('.purchase_price1').eq(0).text();
        var sell_money=$('.purchase_price1').eq(6).text();
        $.cookie('pay_money',pay_money);
        $.cookie('sell_money',sell_money);

    })


    $(".shops>p").trigger("click");
    $('.but li a').eq(0).click(function () {
        $('.but  li a').eq(0).css({color:'rgb(230, 203, 145)'});
        $('.but li a').eq(1).css({color:'#333'});
        $('.but  li a').eq(2).css({color:'#333'});
    })
    $('.but  li a').eq(1).click(function () {
        $('.but  li a').eq(1).css({color:'rgb(230, 203, 145)'});
        $('.but  li a').eq(0).css({color:'#333'});
        $('.but  li a').eq(2).css({color:'#333'});
    })
    $('.but  li a').eq(2).click(function () {
        $('.but  li a').eq(2).css({color:'rgb(230, 203, 145)'});
        $('.but  li a').eq(0).css({color:'#333'});
        $('.but  li a').eq(1).css({color:'#333'});
    })


    $("#add1").click(function(){
        var oldValue1=parseInt($("#sell_count").val());
        var oldValue=parseInt($("#count").val()); //取出现在的值，并使用parseInt转为int类型数据
        oldValue1++;
        oldValue++ ;  //自加1
       var hand= $(this).parent().parent().parent().find('.buy_mess').find('#hand').text();
        if( $("#count").val()>=hand){
            alert('最多只能输入'+hand+'手')
            return false;
        }
        var hands= $(this).parent().parent().parent().find('.sell_mess').find('#hand').text();
        if( $("#sell_count").val()>=hands){
            alert('最多只能输入'+hands+'手')
            return false;
        }
        $("#count").val(oldValue)  //将增加后的值付给控件
        //取出现在的值，并使用parseInt转为int类型数据
        $("#sell_count").val(oldValue1)  //将增加后的值付给控件
    });
    $("#redu").click(function(){
        var oldValue=parseInt($("#count").val()); //取出现在的值，并使用parseInt转为int类型数据
        oldValue--   //自减1
        if( oldValue==0){
            oldValue=1;
        }
        $("#count").val(oldValue)  //将增加后的值付给控件
        var oldValue1=parseInt($("#sell_count").val()); //取出现在的值，并使用parseInt转为int类型数据
        oldValue1--   //自减1
        if( oldValue1==0){
            oldValue1=1;
        }

        $("#sell_count").val(oldValue1)  //将增加后的值付给控件

    });
    $('.buy_title li').eq(0).click(function () {
        window.history.go(-1);
    })


    $('#optionals').click(function () {

        var text=$.cookie('names');
            var num = text.replace(/[^0-9]/ig,"");
            var value = text.slice('left',-4);
            console.log(text)
            $.ajax({
                url:'/rx/rx/optional',
                type:'post',
                dataType:'json',
                data:{'num':num,'type':value},
                success:function (data) {
                    if(data.res==1){
                        alert('添加自选成功');
                        location.reload();
                    }else if(data.res==0){
                        alert('添加自选失败');
                    }else if(data.res==null){
                        alert('已加入自选，请勿重复');
                    }
                }
            })
    })

    $('#redu1').click(function () {
        var oldValue=parseFloat($("#time_sell").val()); //取出现在的值，并使用parseInt转为int类型数据
        oldValue = (oldValue - 0.01).toFixed(2);
        // oldValue-- ;  //自减1

        $("#time_sell").val(oldValue)  //将增加后的值付给控件

    })
    $('#add2').click(function () {
        var oldValue1=parseFloat($("#time_sell").val());
        oldValue1 = (oldValue1+0.01).toFixed(2);
        // oldValue1++;
        $("#time_sell").val(oldValue1)  //将增加后的值付给控件
        //取出现在的值，并使用parseInt转为int类型数据
        $("#time_sell").val(oldValue1)  //将增加后的值付给控件
    })
    
    //定时刷新数据库
    // function optiona() {
    //     $.ajax({
    //         url:"/rx/rx/optiona",
    //         type:'post',
    //         success:function (data) {
    //             optiona = JSON.stringify(data);//将JSON对象转化成字符串
    //
    //             localStorage.setItem("optiona",optiona);//用localStorage保存转化好的的字符串
    //
    //         }
    //     })
    //     $.ajax({
    //         url:"/rx/rx/res",
    //         type:'post',
    //         success:function (data) {
    //             res = JSON.stringify(data);//将JSON对象转化成字符串
    //             localStorage.setItem("res",res);//用localStorage保存转化好的的字符串
    //         }
    //     })
    //     var optiona1 = localStorage.getItem("optiona");//取回students变量
    //     optiona1 = JSON.parse(optiona1);//把字符串转换成JSON对象
    //     var res1 = localStorage.getItem("res");//取回students变量
    //       res1 = JSON.parse(res1);//把字符串转换成JSON对象
    //
    //
    // }
    //
    //
    //
    //
    // onload = function()
    // {
    //     var _try_messages = JSON.parse(localStorage.getItem("optiona"));
    //     var dm = JSON.parse(localStorage.getItem("res"));
    //     var array = filterData(_try_messages, dm);
    //
    // }
    // function isEquals(a, b) {
    //     return JSON.stringify(a.sort()) === JSON.stringify(b.sort());
    // }
    // var filterData = function(a, b)
    // {
    //     var array = [];
    //     for (var i = 0; i < a.length; i++)
    //     {
    //         var x = a[i];
    //         for (var j = 0; j < b.length; j++)
    //         {
    //             var bj = b[j];
    //             if(a[i]['type']==bj['CommodityNo']&&a[i]['num']==bj['ContractNo1']&&a[i]['reservation']==bj['QBidPrice1']){
    //
    //             }
    //
    //         }
    //     }
    //
    // }
    // optiona()
})
