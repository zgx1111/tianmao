<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 16:39
 */

//自定义的配置文件
return [
    //图片url的前缀地址
    //'img_prefix' => 'http://h.cn/images',
    //'img_prefix' => 'https://wh.yxadult.xyz/images',
    'img_prefix' => 'http://wh.noforgot.top/images',
    //缓存时间七天
    'token_expire_in' => 3600*24*7,
    //订单状态
    //1.未支付、2.已支付、3.已发货 、4.已支付但是库存不足,5是已接单，6是部分退款，7是全部退款，8是申请退款中
    'noPay'=>1,
    'halfRefund' => 6,
    'allRefund' => 7,
    'refundApply' => 8,


];