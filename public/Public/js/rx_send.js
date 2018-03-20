/**
 * Created by Administrator on 2017/11/22 0022.
 */
$(function () {
    //实时刷新获取市场数据

    //实时刷新获取市场数据


    function send_data () {
        //获取美原油
        // $.ajax({
        //     url:"/rx/rx/send_CL",
        //     type:'post',
        //     success:function (data) {
        //         if(data[0]['QChangeRate']<0){
        //             $('#QChangeRate_CL').parent().parent().css({'background-color':'green'});
        //             $('#QLastPrice_CL').html(data[0]['QLastPrice']);
        //             $('#QChangeRate_CL').html(Math.round(data[0]['QChangeRate']*100)/100+"%");
        //             $('#QSwing_CL').text(Math.round(data[0]['QSwing']*100)/100+"%");
        //         }else if(data[0]['QChangeRate']>0){
        //             $('#QChangeRate_CL').parent().parent().css({'background-color':'red'});
        //             $('#QLastPrice_CL').html(data[0]['QLastPrice']);
        //             $('#QChangeRate_CL').html(Math.round(data[0]['QChangeRate']*100)/100+"%");
        //             $('#QSwing_CL').text(Math.round(data[0]['QSwing']*100)/100+"%");
        //         }
        //
        //     }
        // });
        $.ajax({
            url:"/rx/rx/send_GC",
            type:'post',
            success:function (data) {
                if(data[0]['QChangeRate']<0){
                    $('#QChangeRate').parent().parent().css({'background-color':'green'});
                    $('#QLastPrice').html(data[0]['QLastPrice']);
                    $('#QChangeRate').html(Math.round(data[0]['QChangeRate']*100)/100+"%");
                    $('#QSwing').text(Math.round(data[0]['QSwing']*100)/100+"%");
                }else if(data[0]['QChangeRate']>0){
                    $('#QChangeRate').parent().parent().css({'background-color':'red'});
                    $('#QLastPrice').html(data[0]['QLastPrice']);
                    $('#QChangeRate').html(Math.round(data[0]['QChangeRate']*100)/100+"%");
                    $('#QSwing').text(Math.round(data[0]['QSwing']*100)/100+"%");
                }

            }
        });
        //
        $.ajax({
            url:"/rx/rx/send_HSI",
            type:'post',
            success:function (data) {
                if(data[0]['QChangeRate']<0){
                    $('#QChangeRate_hsi').parent().parent().css({'background-color':'green'});
                    $('#QLastPrice_hsi').html(data[0]['QLastPrice']);
                    $('#QChangeRate_hsi').html(Math.round(data[0]['QChangeRate']*100)/100+"%");
                    $('#QSwing_hsi').text(Math.round(data[0]['QSwing']*100)/100+"%");
                }else if(data[0]['QChangeRate']>0){
                    $('#QChangeRate_hsi').parent().parent().css({'background-color':'red'});
                    $('#QLastPrice_hsi').html(data[0]['QLastPrice']);
                    $('#QChangeRate_hsi').html(Math.round(data[0]['QChangeRate']*100)/100+"%");
                    $('#QSwing_hsi').text(Math.round(data[0]['QSwing']*100)/100+"%");
                }

            }
        });

        $.ajax({
            url:"/rx/rx/send",
            dataType: "json",
            type:'post',
            data:{'type':$('.move_active').attr('name')},
            success:function(data){
                data=data.res;
                data=data[0];
                if(data==''){
                    $(".ma").html('');
                }
                for(var item in data){
                            var name=data['CommodityNo'];
                            if(data['QChangeRate']<0){
                                $(".ma").html("<li class='mui-table-view-cell'  >"+data['CommodityNo']+data['ContractNo1']+"<a style='float: right'>"+"<span style='margin: 0 60px;font-weight:bold;color:green' class='new_price'>"+data['QLastPrice']+"</span>"+"<span style='color:green' class='percentage' >"+Math.round(data['QChangeRate']*100)/100+"%"+"</span>"+"</a>"+"<p>"+data['CommodityNo']+data['ContractNo1']+"</p>"+ "</li>");
                            }else if(data['QChangeRate']>0){
                                $(".ma").html("<li class='mui-table-view-cell'  >"+data['CommodityNo']+data['ContractNo1']+"<a style='float: right'>"+"<span style='margin: 0 60px;font-weight:bold;color:red' class='new_price'>"+data['QLastPrice']+"</span>"+"<span style='color:red' class='percentage' >"+Math.round(data['QChangeRate']*100)/100+"%"+"</span>"+"</a>"+"<p>"+data['CommodityNo']+data['ContractNo1']+"</p>"+ "</li>");
                            }
                            $('.mui-table-view-cell').attr('name',name);
                        }
            }

        });

    }
    function option() {
        $.ajax({
            url:'/rx/rx/option',
            type:'post',
            success:function (data) {
                var item;
                if(data==''){
                   return false;
                }
                for(var i=0;i<data.length;i++){
                    $.ajax({
                        url:'/rx/rx/send_list',
                        type:'post',
                        dataType:'json',
                        data:{'type':data[i]['type'],'num':data[i]['num']},
                        success:function (data) {

                            data=data[0];
                            if(data.QChangeRate<0){
                                item="<li class='mui-table-view-cell'   >"+data.CommodityNo+data.ContractNo1+"<a style='float: right'>"+"<span style='margin: 0 60px;font-weight:bold;color:green' class='new_price'>"+data.QLastPrice+"</span>"+"<span style='color:green' class='percentage' >"+Math.round(data.QChangeRate*100)/100+"%"+"</span>"+"</a>"+"<p>"+data.CommodityNo+data.ContractNo1+"</p>"+ "</li>";
                            }else if(data.QChangeRate>0){
                                item="<li class='mui-table-view-cell'   >"+data.CommodityNo+data.ContractNo1+"<a style='float: right'>"+"<span style='margin: 0 60px;font-weight:bold;color:red' class='new_price'>"+data.QLastPrice+"</span>"+"<span style='color:red' class='percentage' >"+Math.round(data.QChangeRate*100)/100+"%"+"</span>"+"</a>"+"<p>"+data.CommodityNo+data.ContractNo1+"</p>"+ "</li>";
                            }
                            $(".option").append(item);

                        }
                    })
                }


            }
        })


    }
   setInterval(send_data,1000)

   option();

   $('#list_1').on('click','li',function () {

       var type=$('#list_1 li').eq($(this).index()).attr('name');
       $.ajax({
           url:'/rx/rx/send',
           type:'post',
           dataType: "json",
           data:{'type':type},
           success:function(data){
               data=data.res;
               if(data==''){
                   $(".ma").html('');
               }

                   for(var item in data){
                       data=data[0];

                       var name=data['CommodityNo'];
                       if(data['QChangeRate']<0){
                           $(".ma").html("<li class='mui-table-view-cell'  >"+data.CommodityNo+data.ContractNo1+"<a style='float: right'>"+"<span style='margin: 0 60px;font-weight:bold;color:green' class='new_price'>"+data['QLastPrice']+"</span>"+"<span style='color:green' class='percentage' >"+Math.round(data['QChangeRate']*100)/100+"%"+"</span>"+"</a>"+"<p>"+data['CommodityNo']+data['ContractNo1']+"</p>"+ "</li>");
                       }else if(data['QChangeRate']>0){
                           $(".ma").html("<li class='mui-table-view-cell'  >"+data.CommodityNo+data.ContractNo1+"<a style='float: right'>"+"<span style='margin: 0 60px;font-weight:bold;color:red' class='new_price'>"+data['QLastPrice']+"</span>"+"<span style='color:red' class='percentage' >"+Math.round(data['QChangeRate']*100)/100+"%"+"</span>"+"</a>"+"<p>"+data['CommodityNo']+data['ContractNo1']+"</p>"+ "</li>");
                       }
                       $('.mui-table-view-cell').attr('name',name);
                   }


               }



       })
   });

//   实时获取用户资金



})