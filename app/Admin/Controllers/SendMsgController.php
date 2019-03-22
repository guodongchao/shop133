<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/7
 * Time: 18:39
 */

namespace App\Admin\Controllers;
use App\Model\WeixinUser;
use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;
use GuzzleHttp\Client;


class SendMsgController extends WeixinUser
{
    /**
     * @param Content $content
     * @return Content群发消息
     */
    public function index(Content $content)
    {
        return $content
            ->header('Index')
            ->description('description')
            ->body(view('admin.sendmsg.sendmsg'));
    }
    public function sendmsga(){
        $msg = $_POST['msg'];
        //  print_r($msg) ;exit;
        //调接口
        $url = 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token='.WechatUser::getAccessToken();
        $suers=WechatUser::all()->toArray();
        $arr_openid =array_column($suers,'openid');
        //  print_r($arr_openid);
        $data = [
            'touser' => $arr_openid,
            'msgtype' => "text",
            'text' => ['content'=>$msg]
        ];
        //echo $msg;exit;
        //print_r($data);exit;
        $client = new Client();

        $r = $client->request('POST',$url,[
            'body'=>json_encode($data,JSON_UNESCAPED_UNICODE)
        ]);
        //var_dump($r);exit;
        $response_arr = json_decode($r->getBody(),true);
        //print_r($response_arr);
        if($response_arr){
            echo '发送成功';
        }else{
            echo '发送失败';
        }



    }



}