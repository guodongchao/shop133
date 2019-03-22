<?php
namespace App\Http\Controllers\Login;
use App\Http\Controllers\Controller;
use App\Model\WeixinChat;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class loginController extends Controller
{
    public function userlogin(){
        return view('test.test');
    }
    public function userlogins(){
        $arr=WeixinChat::where(['name'=>$_POST['uname']])->first();
        if($arr){
            $res=WeixinChat::where(['email'=>$_POST['email']])->first();
            if($res){
                echo '登录成功';
            }else{
                echo '密码不对';
            }
        }else{
            echo '账号不对';
        }
    }
}