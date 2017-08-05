<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-24
 * Time: 下午11:29
 */

namespace App\Http\Controllers\Admin;


use App\Exceptions\ParamsErrorException;
use App\Exceptions\ServiceErrorException;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

/**
 * @resource upload
 */
class FileController extends ApiController
{
    /**
     * 上传图片
     * @param Request $request
     * @return array
     */
    public function uploadOne(Request $request)
    {
        $files = $request->file();
        if (is_array($files) && count($files) > 0) {
            foreach ($files as $file) {
                $path = date('ymd');
                $result = $file->storePublicly($path, 'public');
                break;
            }
            if ($result) {
                return ['url' => asset('storage/' . $result), 'path' => $result];
            } else {
                throw new ServiceErrorException('保存失败');
            }

        } else {
            throw new ParamsErrorException('上传失败');
        }
    }
}