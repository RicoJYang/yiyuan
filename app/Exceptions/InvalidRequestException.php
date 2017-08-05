<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-28
 * Time: 下午10:44
 */

namespace App\Exceptions;

use Mockery\Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidRequestException extends HttpException
{
    public function __construct($message = '', $code = 400, Exception $previous = null)
    {
        parent::__construct(200, $message ?: '无效请求', $previous, [], $code);
    }
}