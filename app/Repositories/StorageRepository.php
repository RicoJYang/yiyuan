<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-6
 * Time: 下午2:33
 */

namespace App\Repositories;


use App\Models\Storage;

class StorageRepository
{
    public function all($params)
    {
        $where = [];
        if(isset($params['keyword'])){
            $where[] = ['name','like',"%{$params['keyword']}%"];
        }
        return Storage::query()->where($where)->get()->toArray();
    }

    public function index($params)
    {
        $where = [];
        if(isset($params['keyword'])){
            $where[] = ['name','like',"%{$params['keyword']}%"];
        }
        return Storage::query()->where($where)->paginate(request()->input('pageSize',15));
    }

    public function store($params)
    {
        return Storage::create($params);
    }

    public function update($params,$id)
    {
        return Storage::where('id',$id)->update($params);
    }

    public function delete($id)
    {
        return Storage::query()->where('id',$id)->delete();
    }
}