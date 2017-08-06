<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-6
 * Time: 下午6:19
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\ApiController;
use App\Http\Requests\ContractExecution;
use App\Repositories\ContractExecutionRepository;

class ContractExecutionController extends ApiController
{
    private $repository;

    public function __construct(ContractExecutionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store(ContractExecution $request)
    {
        return $this->repository->store($request->all());
    }
}