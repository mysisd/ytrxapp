;(function (win) {
    var LightSDK = {},
        ajax,
        cid,//组件id
        iid="",
        params = {};//实例id

    if(win.Light && win.Light.ajax){
        ajax = win.Light.ajax;
    }

    if(win.$ && win.$.ajax){
        ajax = win.$.ajax;
    }

    if(!ajax){
        console.error("请引入Lighting/jQuery/Zepto以处理ajax请求");
        return;
    }

    //请求ajax
    var request = function (url,method,params,cb) {
        var d = ajax({
            url:url,
            type:method,
            data:params,
            success:function (d) {
                if(cb) cb(d);
            },
            async:!!cb,
            dataType:"json"
        });

        if(!cb){
            return JSON.parse( d.responseText);
        }
    };

    //url上的请求参数处理
    var search = win.location.search;
    if(search&&search.length>1){
        search.substr(1).split("&").forEach(function (s) {
            s = s.split("=");
            if(s[0]){
                params[s[0]]=s[1];
            }
        });
    }

    /**
     * API：属性
     * @type {{version: string, license: null}}
     */
    LightSDK.options={
        version:"1.3.2-20161111",
        license:null
    };

    /**
     * API：设置组件ID
     */
    LightSDK.register = function (options) {
        cid = options.cid;
        iid = options.iid||"";
    };

    /**************************参数配置****************************/
    var config;
    LightSDK.config = {
        get:function (key,cb) {
            //异步和同步的处理很麻烦
            if(arguments.length==2){
                //异步
                if(config){
                    cb(config[key])
                }else{
                    ajax_config(function (data) {
                        config = data.data;
                        cb(config[key])
                    })
                }
            }

            if(arguments.length==1 && typeof key=="function"){
                cb = key;
                if(config){
                    cb(config)
                }else{
                    ajax_config(function (data) {
                        config = data.data;
                        cb(config)
                    })
                }
            }

            if(arguments.length==1 && typeof key=="string"){
                if(config){
                    return config;
                }else{
                    config = ajax_config(null);
                    return config;
                }
            }

            if(arguments.length==0){
                if(config){
                    return config[key];
                }else{
                    config = ajax_config(null);
                    return config[key];
                }
            }
        }
    };
    function ajax_config(cb) {
        return request("api/getparams.json","get",{
            compId:cid,
            instanceId:iid,
            referrer:location.href
        },cb)
    }

    /**************************会话接入****************************/
    LightSDK.account = {
        userInfo:function () {
            return request("api/token.php","get",{
                access_token:params.access_token
            },cb)
        }
    };

    /**************************OpenAPI接入****************************/
    LightSDK.openapi = {
        token:function (cb) {
            return request("api/account_token.php","get",{
                compId:cid
            },cb)
        }
    };

    /**************************管理台接入****************************/
    LightSDK.console = {
        context:function () {
            return params;
        }
    };

    win.LightSDK = LightSDK;
})(window);
