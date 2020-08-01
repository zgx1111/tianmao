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
    //县界面
    public function county(){
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

}