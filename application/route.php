<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];
use think\Route;

Route::get("/","admin/Admin/login");
Route::get("/index","admin/Admin/index");
Route::get("/welcome","admin/Admin/welcome");
Route::get("/city","admin/Admin/city");
Route::get("/county","admin/Admin/county");
Route::get("/userAdd","admin/Admin/userAdd");
Route::get("/userAll","admin/Admin/userAll");




Route::post('api/:version/admin/login','api/:version.Admin/login');