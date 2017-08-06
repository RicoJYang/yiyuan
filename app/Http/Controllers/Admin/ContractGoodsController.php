<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-6
 * Time: 下午5:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\ApiController;
use App\Http\Requests\ContractGoods;
use App\Repositories\ContractGoodsRepository;

class ContractGoodsController extends ApiController
{
    private $contractGoodsRepository;

    public function __construct(ContractGoodsRepository $contractRepository)
    {
        $this->contractGoodsRepository = $contractRepository;
    }

    public function store(ContractGoods $request)
    {

    }
}