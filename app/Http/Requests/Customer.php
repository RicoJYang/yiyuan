<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-4
 * Time: 下午9:01
 */

namespace App\Http\Requests;


class Customer extends BaseRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:customers,name',
            'type' => 'integer'
        ];
    }
}