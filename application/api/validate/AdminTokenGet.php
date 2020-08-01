<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/7/31
 * Time: 20:15
 */

namespace app\api\validate;


class AdminTokenGet extends BaseValidate
{
    protected $rule = [
        'username' => 'require|isEmpty',
        'password' => 'require|isEmpty',
    ];
    protected $messagge = [
        'username' => '用户名不能为空',
        'password' => '密码不能为空',
    ];

}