<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/8/1
 * Time: 17:31
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Country as CountryModel;
use think\Request;

class Country extends BaseController
{
    public function getCountry(){
        $re = CountryModel::select();
        return [
            'status' => true,
            'data' => $re
        ];
    }
    //获得全部县
    public function getCountryAll(){
        $page = Request::instance()->get('page');
        $begin = ($page-1) * 13;
        $re = (new CountryModel())->with('city')
            ->limit($begin,13)
            ->select();
        $count = (new CountryModel())->select()->count();

        $sumPage = intval($count / 13);
        if ($count % 13 > 0){
            $sumPage++;
        }
        return [
            'status' => true,
            'count' => $count,
            'nowPage' => $page,
            'sumPage' => $sumPage,
            'data' => $re

        ];

    }
    //添加县
    public function countryAdd(){
        $name = input('post.name');
        $city_id = input('post.city_id');
        $re = new CountryModel();
        $re->name = $name;
        $re->city_id = $city_id;
        return $re->save();
    }
    //获得一个县
    public function getCountryOne(){
        $id = Request::instance()->get('id');
        $re = (new CountryModel())->where('id',$id)
            ->find();
        if ($re){
            return [
                'status' => true,
                'data' => $re
            ];
        }
    }
    //更新县
    public function countryUpdate(){
        $id = input('post.id');
        $name = input('post.name');
        $city_id = input('post.city_id');
        $user = (new CountryModel())->get($id);
        $user->name = $name;
        $user->city_id = $city_id;
        return $user->save();
    }

}