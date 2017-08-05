<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-4
 * Time: 下午10:05
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\ApiController;
use App\Repositories\ContractRepository;

class ContractController extends ApiController
{
    private $contractRepository;

    public function __construct(ContractRepository $contractRepository)
    {
        $this->contractRepository = $contractRepository;
    }

    public function index()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }
}