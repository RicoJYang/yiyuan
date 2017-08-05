<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-3
 * Time: 下午11:57
 */

namespace App\Http\Controllers\Admin;


use App\Exceptions\ServiceErrorException;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Customer;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;

class CustomerController extends ApiController
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        return $this->customerRepository->index();
    }

    public function all(Request $request)
    {
        $keyword = $request->input('keyword','');
        return $this->customerRepository->all($keyword);
    }

    public function update(Customer $request, $id)
    {
        if ($this->customerRepository->update($request->all(), $id)) {
            return [];
        } else {
            throw new ServiceErrorException('修改失败');
        }
    }

    public function store(Customer $request)
    {
        if ($this->customerRepository->store($request->all())) {
            return [];
        } else {
            throw new ServiceErrorException('添加失败');
        }
    }

    public function delete($id)
    {
        if ($this->customerRepository->delete($id)) {
            return [];
        } else {
            throw new ServiceErrorException('删除失败');
        }
    }
}