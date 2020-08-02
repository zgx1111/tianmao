<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/8/1
 * Time: 20:45
 */

namespace app\api\model;


class User extends BaseModel
{
    public function country(){
        //return $this->hasOne('Country','id','country_id');
        return $this->belongsTo('Country','country_id','id');
    }

}