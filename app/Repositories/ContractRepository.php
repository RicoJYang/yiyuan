<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-4
 * Time: 下午10:06
 */

namespace App\Repositories;


use App\Models\Contract;
use App\Models\ContractGoods;
use App\Models\Variety;
use Illuminate\Support\Facades\DB;

class ContractRepository
{
    public function generateCN($varietyId, $type)
    {
        $variety = Variety::find($varietyId);
        $typeCode = $type == 1 ? "S" : "B";
        $maxToday = Contract::whereDate('created_at', date("Y-m-d"))->where('type', (int)$type)->count();
        $max = str_pad($maxToday + 1, 3, "0", STR_PAD_LEFT);
        $cn = "SCYY-" . date('ymd') . "-" . $variety->code . "-$max" . $typeCode;
        return ['cn' => $cn];
    }

    public function store($params)
    {
        $goods = $params['goods'];
        unset($params['goods']);
        DB::transaction(function () use ($params, $goods) {
            if (isset($params['annex']) && is_array($params['annex']) && count($params['annex']) > 0) {
                $params['annex'] = implode(",", $params['annex']);
            }
            $params['created_date'] = date('Y-m-d', strtotime($params['created_date']));
            $params['delivery_from'] = date('Y-m-d', strtotime($params['delivery_date'][0]));
            $params['delivery_end'] = date('Y-m-d', strtotime($params['delivery_date'][1]));
            unset($params['delivery_date']);
            $amount = 0;
            $weight = 0;
            foreach ($goods as $item) {
                $item['count'] = round($item['weight'] * $item['price'], 2);
                $amount = $amount + $item['count'];
                $weight = $weight + $item['weight'];
            }
            $params['total_fee'] = $amount;
            $params['total_weight'] = $weight;
            $params['variety_id'] = $goods[0]['variety_id'];
            $contract = Contract::create($params);
            foreach ($goods as $item) {
                $item['remainder_weight'] = $item['weight'];
                $item['count'] = round($item['weight'] * $item['price'], 2);
                $item['contract_id'] = $contract->id;
                ContractGoods::create($item);
            }
        });

    }

    public function index($params)
    {
        $where = [];
        $query = Contract::query();
        if (isset($params['cn'])) {
            $where[] = ['cn', 'like', "%{$params['cn']}%"];
        }
        if (isset($params['type']) && $params['type'] > 0) {
            $where[] = ['type', (int)$params['type']];
        }
        if (isset($params['status']) && $params['status'] > 0) {
            $where[] = ['status', (int)$params['status']];
        }
        return $query->where($where)
            ->with('variety')
            ->with('goods.variety')
            ->with('goods.storage')
            ->with(['customer' => function ($query) use ($params) {
                if (isset($params['customer'])) {
                    $query->where('name', 'like', "%{$params['customer']}%");
                }
            }])
            ->orderBy('status')
            ->orderByDesc('created_at')
            ->paginate(request()->input('pageSize', 15));
    }
}