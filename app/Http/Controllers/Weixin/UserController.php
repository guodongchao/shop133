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
         'images/1.png',
         'images/2.png',
         'images/3.png',
        ];
       $info=[
           'data'=>$data
       ];
        return $info;
    }
}
