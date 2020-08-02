<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/8/1
 * Time: 15:55
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\model\Orders as OrdersModel;
use app\api\model\Remind as RemindModel;
use think\Db;
use think\Request;

class Order extends BaseController
{
    //获得全部订单
    public function getOrderAll(){
        $page = Request::instance()->get('page');
        $begin = ($page-1) * 13;
        //获得用户id
        $re = (new OrdersModel())
            ->with('country')
            ->limit($begin,13)
            ->select();
        $count = (new OrdersModel())->select()->count();

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
    //获得一个订单
    public function getOrderOne(){
        $id = Request::instance()->get('id');
        $re = (new OrdersModel())->where('id',$id)
            ->find();
        if ($re){
            return [
                'status' => true,
                'data' => $re->getData()
            ];
        }
    }
    //修改订单
    public function orderUpdate(){
        $id = input('post.id');
        $order_no = input('post.order_no');
        $snap_items = input('post.snap_items');
        $snap_address = input('post.snap_address');
        $contacts = input('post.contacts');
        $phone = input('post.phone');
        $country_id = input('post.country_id');
        $status = input('post.status');
        $order = (new OrdersModel())->get($id);
        $order->order_no = $order_no;
        $order->snap_items = $snap_items;
        $order->snap_address = $snap_address;
        $order->contacts = $contacts;
        $order->phone = $phone;
        $order->country_id = $country_id;
        $order->status = $status;
        return $order->save();
    }

    //添加订单
    public function orderAdd(){
        $order_no = input('post.order_no');
        $snap_items = input('post.snap_items');
        $snap_address = input('post.snap_address');
        $contacts = input('post.contacts');
        $phone = input('post.phone');
        $country_id = input('post.country_id');
        $status = input('post.status');

        // 启动事务
        Db::startTrans();
        try{
            //将订单存入订单表
            $order = new OrdersModel();
            $order->order_no = $order_no;
            $order->snap_items = $snap_items;
            $order->snap_address = $snap_address;
            $order->contacts = $contacts;
            $order->phone = $phone;
            $order->country_id = $country_id;
            $order->status = $status;
            $order->save();

            //将订单存入订单提醒
            $remind = new RemindModel();
            $remind->data([
                'order_id' => $order->id,
                'country_id' => $country_id,
            ]);
            $remind->save();
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }
        return true;
    }
}