<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
class WeixinChat extends Model
{
    public $table = "users";
    public $timestamps = false;
}
?>