<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/9/21
 * Time: 下午10:38
 */

namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Cookie;

class Admin extends Controller
{
    public function login()
    {
        $request=Request::instance();
        $adminname=$request->post('adminname');
        $adminpwd=$request->post('adminpwd');
        $query=Db::table('t_admin')->where('admin_name',$adminname)->find();
        if(!$query){
            return $this->error('用户名不存在');
        }else{
            if($query['admin_pwd']!=md5($adminpwd)){
                return $this->error('密码错误');
            }else{
                Cookie::set('id',$query['id'],3600);
                return $this->success('登录成功',"Adminuser/index");
                //return Cookie::get('id');
            }
        }
    }
}