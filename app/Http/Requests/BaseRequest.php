<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-19
 * Time: 下午4:31
 */

namespace App\Http\Requests;

use App\Exceptions\ParamsErrorException;
use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * 配置验证器实例.
     *
     * @param  \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            throw new ParamsErrorException(implode(",", $validator->errors()->all()));
        }
    }
}