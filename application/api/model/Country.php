<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/8/1
 * Time: 17:33
 */

namespace app\api\model;


class Country extends BaseModel
{
    public function city(){
        return $this->hasOne('City','id','city_id');
    }

}