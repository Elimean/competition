<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/10/4
 * Time: 9:16 PM
 */

namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Db;

class Userindex extends Controller
{
    public function index()
    {
        $cookie=Cookie::get('user_id');
        $cookie_has=Cookie::has('user_id');
        if (!$cookie_has)
        {
            $this->error('登录超时，请重新登录','Index/index');
        }
        $query_where=Db::table('t_user')->where('id',$cookie)->find();
        $this->assign('username',$query_where['name']);
        $this->assign('user_id',$cookie);
        return $this->fetch('contestants/index');
    }
}