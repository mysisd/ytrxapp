/**
 * Created by Administrator on 2017/11/27 0027.
 */
$(function () {
    $.ajax({
        url:'/rx/user/acc',
        type:'post',
        success:function (data) {
            if(data.ret=='yes'){
                $('.guonei').show();
                $('#guoji').hide();
                $('.yes_guoji').show();
                $('#guonei').hide();
            }else{
                $('#guoji').show();
                $('#guonei').show();
                $('.guonei').hide();
                $('.yes_guoji').hide();
            }
        }
    })
})