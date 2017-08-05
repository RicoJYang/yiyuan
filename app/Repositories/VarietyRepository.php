<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-5
 * Time: 下午1:10
 */

namespace App\Repositories;


use App\Models\Variety;

class VarietyRepository
{
    public function all()
    {
        $parents = Variety::whereNull('parent_id')->get()->toArray();
        foreach ($parents as $index => $parent) {
            $parents[$index]['children'] = Variety::where('parent_id',$parent['id'])->get()->toArray();
        }
        return $parents;
    }
}