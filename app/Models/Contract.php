<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-5
 * Time: 下午8:43
 */

namespace App\Models;


class Contract extends BaseModel
{
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function variety()
    {
        return $this->belongsTo('App\Models\Variety','variety_id');
    }
}