<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-28
 * Time: 下午1:33
 */

namespace App\Lib;


use App\Models\Log;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Common
{
    public static function getThisMonthFirstDay()
    {
        return date('Y-m-01 00:00:00');
    }

    public static function getThisMonthLastDay()
    {
        $currentMonthFirstDay = self::getThisMonthFirstDay();
        return date('Y-m-d 00:00:00', strtotime("$currentMonthFirstDay +1 month -1 day"));
    }

    public static function insertPayLogs($error, $response = '')
    {
        DB::table('pay_logs')->insert([
            'response' => $response,
            'error' => $error,
        ]);
    }

    public static function getPicUrl($value)
    {
        return env('ALIYUN_OSS_DOMAIN') . "/" . $value;
    }

    public static function needPayDeposit($userCurrentDeposit, $type = 1)
    {
        if ($type == 2) {
            return 0;
        } else {
            $deposit = config('lepao.deposit');
            return $userCurrentDeposit < $deposit ? 1 : 0;
        }
    }

    public static function toCent($value)
    {
        return intval(strval($value * 100));
    }

    public static function getUserFromToken()
    {
        $token = request()->header('Authorization');
        $user = null;
        if ($token) {
            $token = Str::replaceFirst('Bearer', '', $token);
            $user = User::where('token', $token)->first();
            if (empty($user) || $user->token_exp->timestamp < time()) {
                return null;
            }
        }
        return $user;
    }

    public static function hasUserAgent($keyword)
    {
        $userAgent = request()->header('User-Agent');
        return Str::contains($userAgent, $keyword);
    }

    public static function logException($exception)
    {

        $request = request();
        $log = [
            'content' => $exception->getMessage(),
            'user_id' => $request->currentUserId,
            'request' => $request->fullUrl(),
            'extras' => $exception->getTraceAsString(),
            'ip' => $request->ip(),
            'create_at' => Carbon::now()->toDateTimeString(),
            'comment' => 'error'
        ];
        try {
            Log::firstOrCreate($log);
        } catch (\Exception $exception) {
            return;
        }

    }
}