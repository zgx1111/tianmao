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
        'username' => 'require',
        'password' => 'require',
    ];
    protected $message  =   [
        'username' => '账号不能为空',
        'password'     => '密码不能为空',

    ];

}