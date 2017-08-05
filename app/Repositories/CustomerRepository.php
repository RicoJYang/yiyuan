<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-4
 * Time: 下午8:53
 */

namespace App\Repositories;


use App\Models\Customer;

class CustomerRepository
{
    public function index()
    {
        return Customer::orderBy('created_at', 'desc')->paginate(request()->input('pageSize', 15));
    }

    public function all($keyword)
    {
        $where = [];
        if ($keyword != '') {
            $where[] = ['name', 'like', "%$keyword%"];
        }

        return Customer::where($where)->orderBy('created_at', 'desc')->get(['id','name'])->toArray();
    }

    public function update($data, $id)
    {
        return Customer::query()->where('id', $id)->update($data);
    }

    public function store($data)
    {
        return Customer::query()->create($data);
    }

    public function delete($id)
    {
        return Customer::query()->where('id', $id)->delete();
    }
}