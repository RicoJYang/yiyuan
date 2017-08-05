<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-5
 * Time: 下午2:48
 */

namespace App\Http\Requests;


class Contract extends BaseRequest
{
    public function rules()
    {
        return [
            'type'=>'required|in:1,2',
            'cn'=>'required|max:255',
            //'variety_id'=>'required|exists:variety,id',
            'customer_id'=>'required|exists:customers,id',
            'created_date'=>'required|date',
            'category'=>'required|in:1,2',
            'pay_way'=>'required|in:1,2',
            'delivery_address'=>'required|max:255',
            'remark'=>'max:500'
        ];
    }
}