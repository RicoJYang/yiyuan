<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-4
 * Time: 下午10:05
 */

namespace App\Http\Controllers\Admin;


use App\Exceptions\ServiceErrorException;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Contract;
use App\Repositories\ContractRepository;
use Illuminate\Http\Request;

class ContractController extends ApiController
{
    private $contractRepository;

    public function __construct(ContractRepository $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    public function index(Request $request)
    {
        $rules=[
            'type'=>'in:0,1,2',
            'status'=>'0,1,2',
        ];
        return $this->contractRepository->index($request->all());
    }

    public function store(Contract $request)
    {
        $params = $request->all();
        try {
            $this->contractRepository->store($params);
            return [];
        } catch (\Exception $exception) {
            throw new ServiceErrorException($exception->getMessage());
        }
    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function getCN(Request $request)
    {
        $rules = [
            'type'=>'required|in:1,2',
            'variety_id'=>'required|exists:variety,id'
        ];
        $this->validator($request->all(),$rules);
        return $this->contractRepository->generateCN($request->variety_id,$request->type);
    }
}