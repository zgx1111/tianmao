<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/8/2
 * Time: 17:05
 */

namespace app\api\controller\v1;


use app\api\model\City as CityModel;
use app\api\controller\BaseController;
use think\Paginator;
use think\Request;

class City extends BaseController
{
    public function getCity(){
        $re = CityModel::select();
        return [
            'status' => true,
            'data' => $re
        ];
    }
    //获得全部城市
    public function getCityAll(){
        $page = Request::instance()->get('page');
        $begin = ($page-1) * 13;
        $re = (new CityModel())
            ->limit($begin,13)
            ->select();
        $count = (new CityModel())->select()->count();

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
    //添加城市
    public function cityAdd(){
        $name = input('post.name');
        $re = new CityModel();
        $re->name = $name;
        return $re->save();
    }
    //获得一个城市
    public function getCityOne(){
        $id = Request::instance()->get('id');
        $re = (new CityModel())->where('id',$id)
            ->find();
        if ($re){
            return [
                'status' => true,
                'data' => $re
            ];
        }
    }
    //更新城市
    public function cityUpdate(){
        $id = input('post.id');
        $name = input('post.name');
        $user = (new CityModel())->get($id);
        $user->name = $name;
        return $user->save();
    }

}