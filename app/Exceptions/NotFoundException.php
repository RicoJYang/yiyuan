<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-7-6
 * Time: 上午10:34
 */

namespace App\Exceptions;


use Mockery\Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class NotFoundException extends HttpException
{
    public function __construct($message = '', $code = 404, Exception $previous = null)
    {
        parent::__construct(200, $message ?: '没有找到相关资源', $previous, [], $code);
    }
}