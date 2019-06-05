<?php
namespace App\Http\Controllers\Weixin;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
class UserController extends Controller
{
    public function dome(){
        /*
         * 轮播图
         */
        $data=[
         '../../images/1.png',
         '../../images/2.png',
         '../../images/3.png',
        ];
        /*
         * 工作台
         */
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
        /*
         * 服务
         */
        $serve=[
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/home_car_source@2x.png",
                "content"=>"车源管理"
            ],
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/home_logistical@2x.png",
                "content"=>"物流管理"
            ],
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/home_finance@2x.png",
                "content"=>"车商金融"
            ],
            [
                "url"=>"/pages/logs/logs",
                "images"=>"../../images/home_headlines@2x.png",
                "content"=>"车市头条"
            ],
        ];
       $info=[
           'data'=>$data,
           'arr' =>$arr,
           'serve'=>$serve

       ];
        return $info;
    }
}
