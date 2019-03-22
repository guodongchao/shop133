<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
class WeixinUser extends Model
{
    public $table = "wx_user";
    public $timestamps = false;
    public static $redis_weixin_access_token_key = 'str:weixin:access_token';     //微信 access_token
    /**
     * 获取access_token
     */
    public static function getAccessToken(){
        //获取缓存
        $access_token = Redis::get(self::$redis_weixin_access_token_key);
        if(!$access_token){
            $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.env('WEIXIN_APPID').'&secret='.env('WEIXIN_APPSECRET');
            //echo $url;
            $data = json_decode(file_get_contents($url),true);
            $access_token = $data['access_token'];
            //写入缓存
            Redis::set(self::$redis_weixin_access_token_key,$access_token);
            //设置过期时间
            Redis::setTimeout(self::$redis_weixin_access_token_key,3600);

        }else{
            return $access_token;
        }

    }



}
?>