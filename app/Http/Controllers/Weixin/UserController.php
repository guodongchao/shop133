<?php
namespace App\Http\Controllers\Weixin;
use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
class UserController extends Controller
{
    /*
     * 首页
     */
    public function dome(){
        /*
         * 轮播图
         */
        $data=[
         '../../images/1.png',
         '../../images/2.png',
         '../../images/3.png'
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
    /*
     * 车源
     */
    public function dome2(){
        $data=[
            [
                "images"=>"../../images/oooo.jpg",
                "content"=>"奥迪"
            ],
            [
                "images"=>"../../images/bm.jpg",
                "content"=>"宝马"
            ],
            [
                "images"=>"../../images/r.jpg",
                "content"=>"奔驰"
            ],
            [
                "images"=>"../../images/bt.jpg",
                "content"=>"本田"
            ],
            [
                "images"=>"../../images/bk.jpg",
                "content"=>"别克"
            ],
            [
                "images"=>"../../images/timg.jpg",
                "content"=>"保时捷"
            ],
            [
                "images"=>"../../images/dz.jpg",
                "content"=>"大众"
            ],
            [
                "images"=>"../../images/feng.jpg",
                "content"=>"丰田"
            ],
            [
                "images"=>"../../images/ft.jpg",
                "content"=>"福特"
            ],
            [
                "images"=>"../../images/mzd.jpg",
                "content"=>"马自达"
            ],
        ];
        $arr=[
            [
                'alpha'=>'b',
                'list'=>[
                    [
                        'name'=>"保时捷",
                        'images_src'=>"../../images/timg.jpg"
                    ],
                    [
                        'name'=>"奔驰",
                        'images_src'=>"../../images/r.jpg"
                    ],
                    [
                        'name'=>"别克",
                        'images_src'=>"../../images/bk.jpg"
                    ]
                ]
            ],
            [
                'alpha'=>'c',
                'list'=>[
                    [
                        'name'=>"保时捷",
                        'images_src'=>"../../images/timg.jpg"
                    ],
                    [
                        'name'=>"奔驰",
                        'images_src'=>"../../images/r.jpg"
                    ],
                    [
                        'name'=>"别克",
                        'images_src'=>"../../images/bk.jpg"
                    ]
                ]
            ],
            [
                'alpha'=>'g',
                'list'=>[
                    [
                        'name'=>"保时捷",
                        'images_src'=>"../../images/timg.jpg"
                    ],
                    [
                        'name'=>"奔驰",
                        'images_src'=>"../../images/r.jpg"
                    ],
                    [
                        'name'=>"别克",
                        'images_src'=>"../../images/bk.jpg"
                    ]
                ]
            ]
        ];
        $info=[
            'data'=>$data,
            'arr' =>$arr
        ];
        return $info;
    }
}
