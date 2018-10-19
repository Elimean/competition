<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/9/22
 * Time: 上午12:24
 */

namespace app\index\controller;
use think\Controller;
use think\Cookie;

class Delcookie extends Controller
{
    public function index()
    {
        Cookie::delete('id');
        Cookie::delete('user_id');
        return $this->success('用户安全退出','Index/index');
    }
}