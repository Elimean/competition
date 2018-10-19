<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/9/21
 * Time: 下午11:16
 */

namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Cookie;

class Adminuser extends Controller
{
    public function index()
    {
        $cookie=Cookie::get('id');
        $cookiehas=Cookie::has('id');
        if (!$cookiehas)
        {
            $this->error("请求时间超时，请重新登录",'Index/index');
        }
        $query=Db::table('t_admin')->where('id',$cookie)->find();
        $query_class=Db::table('t_class')->where('id',1)->select();
        $this->assign('class_list',$query_class);
        $this->assign('name',$query['name']);
        return $this->fetch('admin/user');
    }

    public function usermanager()
    {
        $cookie=Cookie::get('id');
        $cookiehas=Cookie::has('id');
        if (!$cookiehas)
        {
            $this->error("请求时间超时，请重新登录",'Index/index');
        }
        $query=Db::table('t_admin')->where('id',$cookie)->find();
        $this->assign('name',$query['name']);
        return $this->fetch('admin/usermanager');
    }

}