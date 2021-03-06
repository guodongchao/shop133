<?php



namespace App\Http\Controllers\User;



use App\Model\UserModel;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redis;


class UserController extends Controller

{


    //手机端登录页面
    public function alogin(){
        $recurl=$_GET["recurl"] ?? env("SHOP_URL");

        $info=[
            "redirect"=>$recurl
        ];
        return view("test.login",$info);
    }


    /**
    *移动端登录处理页面
     */
    public function apilogins(Request $request)

    {

        $name = $request->input('u_name');

        $password = $request->input('u_pwd');
        //echo $password;exit;
        //$redirect = urldecode($request->input('redirect')) ?? env('SHOP_URL');

        $where=[

            'name'=>$name

        ];

        $userInfo=UserModel::where($where)->first();

        if(empty($userInfo)){

            $response = [

                'errno' =>  40001,

                'msg'   =>  '用户名不存在'

            ];

            return $response;

        }

        $pas = $userInfo->pass;
        if(password_verify($password,$pas)){
            $uid = $userInfo->uid;
            $key = 'token:' . $uid;
            $token = Redis::get($key);
            if(empty($token)){
                $token = substr(md5(time() + $uid + rand(1000,9999)),10,20);
                //  Redis::set($key,$token);
                //   Redis::setTimeout($key,60*60*24*7);
                Redis::del($key);
                Redis::hSet($key,'web',$token);
                //  var_dump($token);exit;
            }
            setcookie('xnn_uid',$uid,time()+86400,'/','qianqianya.xyz',false,true);
            setcookie('xnn_token',$token,time()+86400,'/','qianqianya.xyz',false,true);
            $request->session()->put('xnn_u_token',$token);
            $request->session()->put('xnn_uid',$uid);
            $response = [
                'errno' =>  0,
                'msg'   =>  '登陆成功',
            ];
        }else{
            $response = [
                'errno' =>  40002,
                'msg'   =>  '登录失败'
            ];
        }
        //   print_r($response);exit;
        return $response;

    }
    /**
    *退出
     */
    public function quit(){
        setcookie('xnn_uid',null,time()-3600,'/','qianqianya.xyz',false,true);
        setcookie('xnn_token',null,time()-3600,'/','qianqianya.xyz',false,true);
        header("refresh:0;url='https://gdc.qianqianya.xyz/'");
        //header("refresh:2,url=".$data['url']);
    }
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 登陆页面
     */

    public function loginView(Request $request)

    {

        $redirect = urldecode($request->input('redirect'));

        if(empty($redirect)){

            $redirect = env('SHOP_URL');

        }

        $info = [

            'redirect'  =>  $redirect,

        ];

        return view('test.login',$info);

    }
    /**

     * @param Request $request

     * @return array

     * pc登陆处理请求

     */

    public function loginAction(Request $request)

    {

        $name = $request->input('u_name');

        $password = $request->input('u_pwd');
        //echo $password;exit;
        //$redirect = urldecode($request->input('redirect')) ?? env('SHOP_URL');

        $where=[

            'name'=>$name

        ];

        $userInfo=UserModel::where($where)->first();

        if(empty($userInfo)){

            $response = [

                'errno' =>  40001,

                'msg'   =>  '用户名不存在'

            ];

            return $response;

        }

        $pas = $userInfo->pass;
        if(password_verify($password,$pas)){
            $uid = $userInfo->uid;
            $key = 'token:' . $uid;
            $token = Redis::get($key);
            if(empty($token)){
                $token = substr(md5(time() + $uid + rand(1000,9999)),10,20);
              //  Redis::set($key,$token);
             //   Redis::setTimeout($key,60*60*24*7);
                Redis::del($key);
                Redis::hSet($key,'web',$token);
                //  var_dump($token);exit;
            }
            setcookie('xnn_uid',$uid,time()+86400,'/','qianqianya.xyz',false,true);
            setcookie('xnn_token',$token,time()+86400,'/','qianqianya.xyz',false,true);
            $request->session()->put('xnn_u_token',$token);
            $request->session()->put('xnn_uid',$uid);
            $response = [
                'errno' =>  0,
                'msg'   =>  '登陆成功',
            ];
        }else{
            $response = [
                'errno' =>  40002,
                'msg'   =>  '登录失败'
            ];
        }
        //   print_r($response);exit;
        return $response;

    }

    /**

     * 个人中心

     */

    public function center()

    {

        echo "个人中心";

    }



    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     * 注册页面

     */

    public  function registerView(Request $request)

    {

        $redirect = urldecode($request->input('redirect'));

        if(empty($redirect)){

            $redirect = env('SHOP_URL');

        }

        $info = [

            'redirect'  =>  $redirect,

        ];

        return view('test.reg',$info);

    }



    public function registerAction(Request $request)

    {

        $pass=$request->input('u_pwd');

        $pass1=$request->input('u_pwd1');

        $re=UserModel::where(['name'=>$request->input('u_name')])->first();

        if($re){

            $response = [

                'errno' =>  40004,

                'msg'   =>  '用户名已存在'

            ];

            return $response;

        }

        if($pass1!==$pass){

            $response = [

                'errno' =>  40005,

                'msg'   =>  '密码与确认密码不一致'

            ];

            return $response;

        }

        $pas=password_hash($pass,PASSWORD_BCRYPT);

        $data=[

            'name'=>$request->input('u_name'),

            'pass'=>$pas,

            'email'=>$request->input('u_email'),

            'reg_time'=>time(),

        ];

        $uid=UserModel::insertGetId($data);

        if($uid){

            $key = 'token:' . $uid;

            $token = substr(md5(time() + $uid + rand(1000,9999)),10,20);

            Redis::set($key,$token);

            Redis::setTimeout($key,60*60*24*7);

            setcookie('xnn_uid',$uid,time()+86400,'/','qianqianya.xyz',false,true);
            setcookie('xnn_token',$token,time()+86400,'/','qianqianya.xyz',false,true);

            $request->session()->put('xnn_u_token',$token);

            $request->session()->put('xnn_uid',$uid);

            $response = [

                'errno' =>  0,

                'msg'   =>  '注册成功'

            ];

        }else{

            $response = [

                'errno' =>  40006,

                'msg'   =>  '注册失败'

            ];

        }

        return $response;

    }
    /**
    *登录
     */
    public function apiLogin(Request $request)

    {

        $name = $request->input('u_name');

        $password = $request->input('u_pwd');

        $where=[

            'name'=>$name

        ];

        $userInfo=UserModel::where($where)->first();

        if(empty($userInfo)){

            $response = [

                'errno' =>  40001,

                'msg'   =>  '用户名不存在'

            ];

            return $response;

        }

        $pas = $userInfo->password;

        if(password_verify($password,$pas)){

            $uid = $userInfo->uid;

            $key = 'token:' . $uid;

            $token = Redis::get($key);

            if(empty($token)){

                $token = substr(md5(time() + $uid + rand(1000,9999)),10,20);

           //     Redis::set($key,$token);

            //    Redis::setTimeout($key,60*60*24*7);
                Redis::del($key);
                Redis::hSet($key,'app',$token);

            }

            $response = [

                'errno' =>  0,

                'msg'   =>  '登陆成功',

                'token' =>  $token

            ];

        }else{

            $response = [

                'errno' =>  40002,

                'msg'   =>  '登录失败'

            ];

        }

        return $response;

    }




}
