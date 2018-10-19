<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/10/3
 * Time: 12:32 PM
 */

namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;

class Apply extends Controller
{
    public function signup()
    {
        $requset=Request::instance();
        $requset_username=$requset->post('username');
        $requset_userpwd=md5($requset->post('userpwd'));
        $requset_reuserpwd=md5($requset->post('reuserpwd'));
        $requset_name=$requset->post('name');
        $requset_number=$requset->post('number');
        $requset_class=$requset->post('class');
        $requset_professional=$requset->post('professional');
        $requset_grade=$requset->post('grade');
        $requset_project=$requset->post('project');
        $requset_tel=$requset->post('tel');
        $data=['username'=>$requset_username,'userpwd'=>$requset_userpwd,'name'=>$requset_name,
                'number'=>$requset_number,'class'=>$requset_class,'professional'=>$requset_professional,
                'grade'=>$requset_grade,'project'=>$requset_project,'tel'=>$requset_tel,'appoved'=>'0','team'=>'1'];
        $query_where_username=Db::table('t_user')->where('username',$requset_username)->find();
        $query_where_number=Db::table('t_user')->where('number',$requset_number)->find();
        if($query_where_username){
            return $this->error('用户名以存在，请重新注册！','Index/apply');
        }elseif ($query_where_number){
            return $this->error('学号已存在，请重新输入！','Index/apply');
        }elseif ($requset_userpwd!=$requset_reuserpwd){
            return $this->error('密码二次输入错误！','Index/apply');
        }else{
            $query_insert=Db::table('t_user')->insert($data);
            if($query_insert){
                return $this->success('注册成功，请等待审核！','Index/index');
            }
        }
    }
}