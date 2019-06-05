<?php
namespace App\Http\Controllers\Weixin;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
class UserController extends Controller
{
    public function dome(){
        $data=[
         '/images/1.png',
         '/images/2.png',
         '/images/3.png',
        ];
        $arr=[
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/desk_publish@2x.png",
                "content"=>"发布车源"
            ],
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/desk_bid@2x.png",
                "content"=>"户准寻车"
            ],
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/desk_order@2x.png",
                "content"=>"我的订单"
            ],
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/desk_massage@2x.png",
                "content"=>"通知消息"
            ],
        ];
       $info=[
           'data'=>$data,
           'arr' =>$arr

       ];
        return $info;
    }
}
