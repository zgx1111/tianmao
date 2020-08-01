<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/7/31
 * Time: 21:21
 */

namespace app\api\model;


use think\Exception;
use think\Model;

class BaseModel extends Model
{
    //登录验证账号密码
    public static function check($name,$pass){
        $re = self::where('username','=',$name)
            ->where('password','=',$pass)
            ->find();
        return $re;
    }

}