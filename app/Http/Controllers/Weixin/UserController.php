<?php
namespace App\Http\Controllers\Weixin;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
class UserController extends Controller
{
    public function aa(){

           $arr=[
              [
                  'img'=>"../../image/photo.png",
                  'name'=>"相册",
              ],
               [
                   'img'=>"../../image/sc_2.png",
                   'nam'=>"收藏(现在是上传和下载)",
                   'url'=>"../upload/upload"
               ]

           ];
        echo json_encode($arr);

    }
}
