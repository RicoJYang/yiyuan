<?php
/**
 * Created by PhpStorm.
 * User: sdblo
 * Date: 2017/7/10
 * Time: 20:43
 */

namespace App\Repositories;

use App\Exceptions\ServiceErrorException;
use App\Models\Admin;

class AdminRepository
{

    public function login($account, $password)
    {
        $admin = Admin::where('account', $account)->first();
        if (!$admin) {
            throw new ServiceErrorException('用户不存在');
        }
        if (md5($account . $admin->salt . md5($password)) == $admin->password) {
            $admin->token = $this->genarateAdminToken($admin->id);
            $admin->save();
            $admin = $admin->toArray();
            return $admin;
        } else {
            throw new ServiceErrorException('密码不正确');
        }
    }

    public function create($data)
    {
        return Admin::create($data);
    }

    public function update($id, $data)
    {
        return Admin::where('id', $id)->update($data);
    }

    public function updatePwd($id, $password)
    {
        $admin = Admin::find($id);
        if (!$admin) {
            throw new ServiceErrorException('用户不存在');
        }
        $admin->password = md5($admin->account . $admin->salt . md5($password));
        return $admin->save();
    }


    public function genarateAdminToken($adminId)
    {
        return md5($adminId . time());
    }

    public function all($type)
    {
        $where = [];
        if ($type > 0) {
            $where[] = ['type', $type];
        }
        return Admin::where($where)->get(['id','name'])->toArray();
    }
}