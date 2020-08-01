<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/7/31
 * Time: 19:41
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\lib\enum\ScopeEnum;
use think\Request;

class Admin extends BaseController
{
    //管理员登录
    public function login(){
        $username = Request::instance()->param('username');
        $password = Request::instance()->param("password");
        $token = self::getToken($username,$password,ScopeEnum::admin);
        if ($token){
            return [
                'status'=>true,
                'token'=>$token
            ];
        }else{
            return [
                'status'=>false,
                'token'=>null
            ];
        }

    }

}