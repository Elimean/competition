<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/10/4
 * Time: 8:40 PM
 */

namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Cookie;

class Userlogin extends Controller
{
    public function login()
    {
        $request = Request::instance();
        $request_name = $request->post('username');
        $request_pwd = $request->post('userpwd');
        $query = Db::table('t_user')->where('username', $request_name)->find();
        if (!$query) {
            return $this->error('用户名不存在！', 'Index/apply');
        } else {
            if (md5($request_pwd) != $query['userpwd']) {
                return $this->error('密码错误', 'Index/apply');
            }elseif ($query['appoved']==0){
                $this->error('正在进行审核，请稍后在试！');
            } else {
                Cookie::set('user_id', $query['id'], 3600);
                return $this->success('登录成功', 'Userindex/index');
            }
        }
    }
}