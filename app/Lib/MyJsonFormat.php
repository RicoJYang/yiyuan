<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-23
 * Time: 下午3:28
 */

namespace App\Lib;


use Dingo\Api\Http\Response\Format\Json;

class MyJsonFormat extends Json
{
    protected function encode($content)
    {
        if (isset($content['status_code'])) {
            if (!isset($content['code'])) {
                $content['code'] = $content['status_code'];
            }
        } elseif (is_array($content)) {
            return json_encode([
                'code' => 200,
                'data' => $content,
                'message' => '成功'
            ]);
        }
        return json_encode($content);


    }
}