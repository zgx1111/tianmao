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
class Country extends BaseController
{
    public function getCountryAll(){
        $re = CountryModel::select();
        return [
            'status' => true,
            'data' => $re
        ];
    }

}