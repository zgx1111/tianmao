<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/7/31
 * Time: 20:54
 */

namespace app\api\service;


class Token
{
    //生成token
    public static function generateToken(){
        //32个字符组成
        $randChar = getRandChar(32);
        //有三个字符串MD5加密
        //获得当前请求的时间戳
        $time = $_SERVER['REQUEST_TIME_FLOAT'];
        //盐
        $salf = config('secure.token_salf');

        return md5($randChar.$time.$salf);
    }

    //缓存token
    public static function saveToken($value){
        //获得token
        $token = self::generateToken();
        //缓存时间
        $expire_in = config('setting.token_expire_in');
        //缓存token
        $result = cache($token,json_encode($value),$expire_in);
        if(!$result){
            throw new TokenException([
                'msg' => '服务器缓存异常',
                'errorCode' => 10005
            ]);
        }
        return $token;
    }
    //检验token令牌是否过期
    public static function verifyToken($token){
        $exist = Cache::get($token);
        if($exist){
            return true;
        }else{
            return false;
        }
    }
    //根据参数来获得缓存中的值
    public static function getCurrentTokenVar($key){
        //将token在header中传过来
        $token = Request::instance()
            ->header('token');
        //获得缓存
        $var = Cache::get($token);
        //判断缓存是否为空
        if(!$var){
            throw new TokenException();
        }else{
            //判断是否为数组，不是就转化为数组，因为使用默认的文件缓存返回字符串，而用redis返回是数组
            if(!is_array($var)){
                $var = json_decode($var,true);
            }
            //判断key是否存在,存在就返回
            if(array_key_exists($key,$var)){
                return $var[$key];
            }else{
                throw new Exception('Token不存在');
            }
        }
    }
    //获得uid
    public static function getCurrentUid(){
        return self::getCurrentTokenVar('uid');
    }

}