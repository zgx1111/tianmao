<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/8/1
 * Time: 16:01
 */

namespace app\api\model;


use traits\model\SoftDelete;

class Orders extends BaseModel
{
    use SoftDelete;
    public function getStatusAttr($value)
    {
        $status = [1=>'已付款',2=>'已发货'];
        return $status[$value];
    }

    public function Country()
    {
        return $this->belongsTo('Country','country_id','id');
    }
}