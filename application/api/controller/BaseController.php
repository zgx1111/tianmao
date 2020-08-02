<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/7/31
 * Time: 19:40
 */

namespace app\api\controller;


use app\api\service\AdminToken as AdminTokenService;
use app\api\validate\AdminTokenGet;
use app\lib\enum\ScopeEnum;
use think\Controller;
use think\Exception;

class BaseController extends Controller
{
    //获得token令牌
    public static function getToken($username = '', $password = '', $scope = ''){
        //验证检查参数
        (new AdminTokenGet())->goCheck();
        //admin登录
        if ($scope == ScopeEnum::admin){
            $sh = new AdminTokenService();
            $token = $sh->get($username,$password);
            //判断是否获得了token
            if (!$token){
                return false;
            }
            return $token;
        }else{
            throw new Exception("权限错误");
        }

    }
}