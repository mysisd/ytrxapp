/**
 * Created by Administrator on 2018/1/24 0024.
 */
$(function () {
    function money() {
        $.ajax({
            url:'/rx/rx/money',
            type:'post',
            success:function (data) {
                $.cookie('money',data);
            }
        })
        // var num = $.cookie('names').replace(/[^0-9]/ig,"");
        // var value = $.cookie('names').slice('left',-4);
        //
        // $.ajax({
        //     url:'/rx/rx/hand_num',
        //     type:'post',
        //     dataType:'json',
        //     data:{'num':num,'type':value},
        //     success:function (data) {
        //         $.cookie('hand',data);
        //     }
        //
        // })
    }

    setInterval(money,1000)


    $('#count').keyup(function () {
        if($('#count').val()-$('#hand').text()>0){
            alert('最多只能输入'+$('#hand').text()+'手');
            $('#count').val($('#hand').text())
        }
        if($('#count').val()==0){
            $('#count').val(1)
        }
    })
    // $('#count').keyup(function () {
    //     if($('#count').val()-$('.buy_mess>span').text()>0){
    //         alert('最多只能输入'+$('.buy_mess>span').text()+'手');
    //         $('#count').val(+$('.buy_mess>span').text())
    //     }
    //     if($('#count').val()==0){
    //         $('#count').val(1)
    //
    //     }
    // })
    $('tr').eq(0).find('th:last').find('span').text($.cookie('money'));




    $('#sell_count').keyup(function () {
        if($('#sell_count').val()-$('#hand').text()>0){
            alert('最多只能输入'+$('#hand').text()+'手');
            $('#sell_count').val(+$('#hand').text())
        }
        if($('#sell_count').val()==0){
            $('#sell_count').val(1)

        }
    })
    $('#sell_button').click(function () {
        var hand=$('#sell_count').val();
    })
    $('.span').eq(3).text($.cookie('money'))
})