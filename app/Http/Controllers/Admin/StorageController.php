<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-6
 * Time: 下午2:33
 */

namespace App\Http\Controllers\Admin;


use App\Exceptions\ServiceErrorException;
use App\Http\Controllers\ApiController;
use App\Repositories\StorageRepository;
use Illuminate\Http\Request;

class StorageController extends ApiController
{
    private $storageRepository;

    public function __construct(StorageRepository $repository)
    {
        $this->storageRepository = $repository;
    }

    public function all(Request $request)
    {
        return $this->storageRepository->all($request->all());
    }

    public function index(Request $request)
    {
        return $this->storageRepository->index($request->all());
    }

    public function delete($id)
    {
        if ($this->storageRepository->delete($id) > 0) {
            return [];
        } else {
            throw new ServiceErrorException('删除失败');
        }
    }

    public function store(Request $request)
    {
        return $this->storageRepository->store($request->all());
    }
}