/**
 * VIEW news
 * @param  {[type]} $ stock list page
 * @return {[type]}   [description]
 */
;(function($){
	
	App.infonetView.wrap({
		beforeRender:function(arg){		
			
		},
		
		afterRender:function(arg){
			$("#content").html('');
			$('#tnews').html('');
			$('#t_date').html('');
			if(typeof arg != "string"){
				return;
			}
			var args = arg.split(",");
			var func_id = args[0], s_code = args[1], newsId = args[2],flag=args[4],annouceNo=args[3];
			this.newsId=newsId;
			App.infonetView.stock_code = s_code;
			if(flag=="single"){
				App.commobj.singleFlag=true;
				$("#menu_flag").css("display","none");
				$("#add-stock").css("display","none");
			}
			var model = this.model;
			$(window).scrollTop(0);
			var market=s_code.split('.')[1];
				if(market=='SS'||market=='SZ'){
					market='level1';
				}else if(market=='O'||market=='N'||market=='A'){
					market='us';
				}else{
					market='hk';
				}
			var url="news_info";
			if(func_id=='20103001'){
				url="newsinfo?type=news_info&";
			}else if(func_id=='20103003'){
				url="newsinfo?type=notice_info&secu_market="+market+"&";
			}else if(func_id=='20103004'){
				url="newsinfo?type=report_info&";
			}
			App.OpenAPI.get("api/"+url+"symbols="+s_code+"&id="+newsId,null,function(ret){
				ret = typeof ret =="object" ? ret:JSON.parse(ret);
				if(ret.data && ret.data[0] && ret.data[0][func_id] && ret.data[0][func_id][0]){
					ret = ret.data[0][func_id][0][s_code][0];
				}
				if(!ret){
					$("#content").html("暂无数据");
					return;
				}
				var values;
				if(ret.data['date']){
					var values =ret.data['date'];
				}else{
					var values =ret.data['publ_date']
					if(values.length==21){//去掉时间末尾多个0；
						values=values.substring(0,19);
					}
				}
				$('#tnews').html(ret.data['title']);
				$('#t_date').html(values);
				var content=ret.data['content'];
				if(!content){
					content=ret.data['conclusion']
				}
				$("#content").html(content.replace(/\n\r\n|\n \n|\n/g,"<br/>"));
				App.commobj.setDisclaimer('body',1);
			});


		},
		afterUnRender:function(){
			App.commobj.removeDisclaimer();
			// history.pushState({},  "行情", _.smaRebackUrl);
			// history.replaceState(null,  "行情", _.smaRebackUrl);
		}
	});
})(Zepto);

