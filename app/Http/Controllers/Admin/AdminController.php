<?php
/**
 * Created by PhpStorm.
 * User: sdblo
 * Date: 2017/7/12
 * Time: 16:26
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ApiController;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AdminController extends ApiController
{

    protected $repository;

    public function __construct(AdminRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 登陆
     * @param Request $request
     * @return bool
     */
    public function login(Request $request)
    {
        $rules = [
            'account' => 'required|string',
            'password' => 'required|string'
        ];
        $this->validator($request->all(), $rules);
        return $this->repository->login($request->account, $request->password);
    }

    /**
     * 创建后台管理员账号
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request)
    {
        $rules = [
            'account' => 'required|string',
            'password' => 'required|string',
            'name' => 'required|string'
        ];
        $this->validator($request->all(), $rules);
        $params = [];
        $params['account'] = $request->account;
        $params['name'] = $request->name;

        $params['salt'] = str_random(10);
        $params['password'] = md5($params['account'] . $params['salt'] . md5($request->password));
        return $this->repository->create($params);
    }

    /**
     * 修改管理员信息
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'remark' => 'string'
        ];
        $this->validator($request->all(), $rules);
        $remark = isset($request->remark) ? $request->remark : '';
        return $this->repository->update($id, [
            'name' => $request->name,
            'remark' => $remark
        ]);
    }

    /**
     * 修改管理员密码
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function updatePwd(Request $request, $id)
    {
        $rules = [
            'password' => 'required|string',
        ];
        $this->validator($request->all(), $rules);
        return $this->repository->updatePwd($id, $request->password);
    }

}