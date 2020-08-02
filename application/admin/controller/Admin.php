<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/7/31
 * Time: 21:48
 */

namespace app\admin\controller;


use think\Controller;

class Admin extends Controller
{
    //登陆界面
    public function login(){
        return view();
    }

    //欢迎界面
    public function welcome(){
        return view();

    }

    //主页面
    public function index(){
        return view();
    }
    //市界面
    public function city(){
        return view();
    }
    //添加市界面
    public function cityAdd(){
        return view();
    }
    //更新市界面
    public function cityUpdate(){
        $id = input('get.id');
        $this->assign('id',$id);
        return view();
    }
    //县界面
    public function country(){
        return view();
    }
    //添加县界面
    public function countryAdd(){
        return view();
    }
    //更新县界面
    public function countryUpdate(){
        $id = input('get.id');
        $this->assign('id',$id);
        return view();
    }

    //添加用户
    public function userAdd(){
        return view();
    }
    //所有用户
    public function userAll(){
        return view();
    }
    //修改用户
    public function userUpdate(){
        $id = input('get.id');
        $this->assign("id", $id);
        return view();
    }

    //所有订单
    public function orderAll(){
        return view();
    }

    //添加订单
    public function orderAdd(){
        return view();
    }
    //修改订单
    public function orderUpdate(){
        $id = input('get.id');
        $this->assign("id", $id);
        return view();
    }

}