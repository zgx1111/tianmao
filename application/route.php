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
Route::get("/country","admin/Admin/country");
Route::get("/userAdd","admin/Admin/userAdd");
Route::get("/userAll","admin/Admin/userAll");
Route::get("/orderAdd","admin/Admin/orderAdd");
Route::get("/orderAll","admin/Admin/orderAll");
Route::get('/orderUpdate','admin/Admin/orderUpdate');
Route::get('/userUpdate','admin/Admin/userUpdate');
Route::get('/cityAdd','admin/Admin/cityAdd');
Route::get('/cityUpdate','admin/Admin/cityUpdate');
Route::get('/countryAdd','admin/Admin/countryAdd');
Route::get('/countryUpdate','admin/Admin/countryUpdate');






Route::post('api/:version/admin/login','api/:version.Admin/login');
Route::get('api/:version/order/getOrderAll','api/:version.Order/getOrderAll');
Route::get('api/:version/country/getCountry','api/:version.Country/getCountry');
Route::post('api/:version/order/orderAdd','api/:version.Order/orderAdd');
Route::get('api/:version/user/getUserAll','api/:version.User/getUserAll');
Route::post('api/:version/user/userAdd','api/:version.User/userAdd');
Route::get('api/:version/user/getUserOne','api/:version.User/getUserOne');
Route::post('api/:version/user/userUpdate','api/:version.User/userUpdate');
Route::get('api/:version/order/getOrderOne','api/:version.Order/getOrderOne');
Route::post('api/:version/order/orderUpdate','api/:version.Order/orderUpdate');
Route::get('api/:version/city/getCityAll','api/:version.City/getCityAll');
Route::post('api/:version/city/cityAdd','api/:version.City/cityAdd');
Route::get('api/:version/city/getCityOne','api/:version.City/getCityOne');
Route::post('api/:version/city/cityUpdate','api/:version.City/cityUpdate');
Route::get('api/:version/country/getCountryAll','api/:version.Country/getCountryAll');
Route::get('api/:version/city/getCity','api/:version.City/getCity');
Route::post('api/:version/country/countryUpdate','api/:version.Country/countryUpdate');
Route::post('api/:version/country/countryAdd','api/:version.Country/countryAdd');
Route::get('api/:version/country/getCountryOne','api/:version.Country/getCountryOne');