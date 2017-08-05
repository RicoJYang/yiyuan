<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-8-5
 * Time: 下午1:09
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\ApiController;
use App\Repositories\VarietyRepository;

class VarietyController extends ApiController
{
    private $varietyRepository;
    public function __construct(VarietyRepository $repository)
    {
        $this->varietyRepository = $repository;
    }

    public function all()
    {
        return $this->varietyRepository->all();
    }
}