<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-5
 * Time: 下午11:18
 */

namespace App\Models;


class ContractGoods extends BaseModel
{
    public function storage()
    {
        return $this->belongsTo('App\Models\Storage','storage_id');
    }

    public function variety()
    {
        return $this->belongsTo('App\Models\Variety','variety_id');
    }
}