<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-6
 * Time: 下午6:18
 */

namespace App\Repositories;


use App\Models\ContractExecution;
use App\Models\ContractGoods;
use Illuminate\Support\Facades\DB;

class ContractExecutionRepository
{

    public function store($params)
    {
        $params['created_date'] = date("Y-m-d", strtotime($params['created_date']));
        if ($params['delivery_date']) {
            $params['delivery_date'] = date("Y-m-d", strtotime($params['delivery_date']));
        }
        DB::transaction(function () use ($params) {
            $where=[
                ['contract_id', $params['contract_id']],
                ['variety_id', $params['variety_id']]
            ];
            $cut = ContractExecution::where($where)->sum('delivery_weight');
            $cut = $cut + $params['delivery_weight'];
            ContractGoods::query()->where($where)->update(['remainder_weight'=>DB::raw("weight-$cut")]);
            ContractExecution::create($params);
        });
        return [];
    }
}