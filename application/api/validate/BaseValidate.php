<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 2020/7/31
 * Time: 19:46
 */

namespace app\api\validate;



use app\lib\exception\BaseException;
use think\Exception;
use think\Request;
use think\Validate;
use app\lib\exception\ParameterException;
class BaseValidate extends Validate
{
    //获得传过来的所有参数，check方法检验参数是否合格
    public function goCheck(){
        //获得所有参数
        $request = Request::instance();
        $param = $request->param();
        $result = $this->check($param);
        if (!$result){
            throw new ParameterException([
                'msg' => $this->error
                ]
            );

        }
        return $result;
    }
    //自定义判断是否为空
    protected function isEmpty($value,$rule='',$data = '',$field=''){
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }

}