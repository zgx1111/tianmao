<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/8/1
 * Time: 20:43
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\User as UserModel;
use think\Request;

class User extends BaseController
{
    public function getUserAll(){
        $page = Request::instance()->get('page');
        $begin = ($page-1) * 13;

        $re = (new UserModel())->with('country')
            ->limit($begin,13)
            ->select();
        $count = (new UserModel())->select()->count();

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
    //获得一个用户
    public function getUserOne(){
        $id = Request::instance()->get('id');
        $re = (new UserModel())->where('id',$id)
            ->find();
        if ($re){
            return [
                'status' => true,
                'data' => $re
            ];
        }

    }
    //修改用户
    public function userUpdate(){
        $id = input('post.id');
        $username = input('post.username');
        $password = input('post.password');
        $country_id = input('post.country_id');
        $truename = input('post.truename');
        $phone = input('post.phone');
        $user = (new UserModel())->get($id);
        $user->username = $username;
        $user->password = $password;
        $user->country_id = $country_id;
        $user->true_name = $truename;
        $user->phone = $phone;
        return $user->save();

    }
    public function userAdd(){
        $username = input('post.username');
        $password = input('post.password');
        $country_id = input('post.country_id');
        $truename = input('post.truename');
        $phone = input('post.phone');
        $user = new UserModel();
        $user->username = $username;
        $user->password = $password;
        $user->country_id = $country_id;
        $user->true_name = $truename;
        $user->phone = $phone;
        $re = $user->save();

        if ($re){
            return true;
        }else{
            return false;
        }

    }

}