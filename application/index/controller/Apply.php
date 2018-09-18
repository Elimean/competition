<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/18
 * Time: 17:28
 */

namespace app\index\controller;
use think\Controller;
use think\Request;
class Apply extends Controller
{
    public function signup()
    {
        //return $this->fetch('index/apply');
        $request=Request::instance();
        dump($request->param());
    }
}