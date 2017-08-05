<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-21
 * Time: 下午3:02
 */

namespace App\Exceptions;


use Symfony\Component\HttpKernel\Exception\HttpException;

class ServiceErrorException extends HttpException
{
    public function __construct($message = '', $code = 500, Exception $previous = null)
    {
        parent::__construct(200, $message ?: '对不起，发生错误', $previous, [], $code);
    }
}