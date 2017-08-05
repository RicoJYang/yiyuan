<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-19
 * Time: 下午2:30
 */

namespace App\Http\Controllers;


use App\Exceptions\ParamsErrorException;
use Validator;

class ApiController extends Controller
{
    /**
     * 验证参数
     * @param $params //参数数组
     * @param $rules //验证规则
     * @param array $msg 自定义错误消息
     * @return bool
     */
    protected function validator($params, $rules, $msg=[])
    {
        $validator = Validator::make($params, $rules, $msg);
        if ($validator->fails()) {
           throw new ParamsErrorException(implode(",",$validator->errors()->all()));
        } else {
            return true;
        }
    }
}