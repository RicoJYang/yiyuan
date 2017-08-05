<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 17-6-21
 * Time: 下午4:50
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at'];
}