<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('/weixin/user', 'UserController@index');
    $router->get('/weixin/SendMsg', 'SendMsgController@index');
    $router->get('/wechat/sendmsga', 'SendMsgController@sendmsga');

});
