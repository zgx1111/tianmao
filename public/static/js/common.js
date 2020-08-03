window.base = {
    g_restUrl:'/api/v1',
    getAdminData:function(params){
        if (!params.type){
            params.type = 'get';
        }
        var that = this;
        $.ajax({
            type:params.type,
            url:this.g_restUrl + params.url,
            data:params.data,
            //设置token请求的值
            beforeSend:function (XMLHttpRequest){
                if (params.tokenFlag){
                    XMLHttpRequest.setRequestHeader('token',that.getLocalStorage('adminToken'));
                }
            },
            success:function (res) {
                params.sCallback && params.sCallback(res);
            },
            error:function (res) {
                params.sCallback && params.sCallback(res);
            }
        });
    },
    //缓存令牌
    setLocalStorage:function(key,val){
        var exp=new Date().getTime()+(3600*24*7*1000);  //令牌过期时间
        var obj={
            val:val,
            exp:exp
        };
        localStorage.setItem(key,JSON.stringify(obj));
    },
    //从缓存中读取令牌
    getLocalStorage:function(key){
        var info= localStorage.getItem(key);
        if(info){
            info = JSON.parse(info);
            //查看缓存令牌是否过期
            if (info.exp > new Date().getTime()) {
                return info.val;
            }
            else{
                this.deleteLocalStorage(key);
            }
        }
        return '';
    },
    //删除缓存
    deleteLocalStorage:function(key){
        return localStorage.removeItem(key);
    },
    //删除缓存
    deleteLocalStorage1:function(key){
        return localStorage.removeItem(key);
    },
}