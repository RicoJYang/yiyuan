<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-6
 * Time: 下午6:19
 */

namespace App\Http\Requests;


class ContractExecution extends BaseRequest
{
    public function rules()
    {
        return [
            'contract_id'=>'required|exists:contracts,id',
            'car_no'=>'required|max:255',
            'variety_id'=>'required|exists:variety,id',
            'delivery_date'=>'date',
            'delivery_weight'=>'required',
            'order_weight'=>'required',
            'remarks'=>'max:500',
            'created_date'=>'required|date'
        ];
    }
}