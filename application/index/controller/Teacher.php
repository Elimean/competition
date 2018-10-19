<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/10/13
 * Time: 9:17 PM
 */

namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Cookie;

class Teacher extends Controller
{
    public function login()
    {
        $request=Request::instance();
        $request_user=$request->post('username');
        $request_pwd=$request->post('userpwd');
        $query=Db::table('t_teacher')->where('username',$request_user)->find();
        if (!$query){
            return $this->error('用户名不存在！','Index/apply');
        }else{
            if ($query['password']!=md5($request_pwd)){
                return $this->error('密码错误！','Index/apply');
            }else{
                Cookie::set('teacher_id',$query['id'],28800);
                return $this->success('登录成功！','Teacher/index');
            }
        }
    }

    public function index()
    {
        $cookie=Cookie::get('teacher_id');
        $cookie_has=Cookie::has('teacher_id');
        if(!$cookie_has){
            return $this->error('登录超时！','Index/apply');
        }
        $query=Db::table('t_teacher')->where('id',$cookie)->find();
        //$query_user_unappoved=Db::table('t_user')->where('appoved',0)->select();
        //$query_user_appoved=Db::table('t_user')->where('appoved',1)->select();
        //$this->assign('username_unappoved',$query_user_unappoved);
        //$this->assign('username_appoved',$query_user_appoved);
        /*$query_user_unappoved=Db::query('select a.*,b.class_values,c.professional_values,d.grade_values,e.project_values from t_user a
                                              inner join t_class b on a.class = b.id
                                              inner join t_professional c on a.professional = c.id 
                                              inner join t_grade d on a.grade = d.id 
                                              inner join t_project e on a.project = e.id where appoved=?',[0]);
        $query_user_appoved=Db::query('select a.*,b.class_values,c.professional_values,d.grade_values,e.project_values from t_user a
                                            inner join t_class b on a.class = b.id 
                                            inner join t_professional c on a.professional = c.id 
                                            inner join t_grade d on a.grade = d.id 
                                            inner join t_project e on a.project = e.id where appoved=?',[1]);*/
        $query_user_unappoved=Db::table('t_user')->alias('a')->join('t_class b','a.class = b.id','inner')
                                                    ->join('t_professional c','a.professional = c.id')
                                                    ->join('t_grade d','a.grade = d.id')
                                                    ->join('t_project e','a.project = e.id')
                                                    ->where('appoved',0)->where('project',$query['project_id'])->paginate(20);
        $query_user_appoved=Db::table('t_user')->alias('a')->join('t_class b','a.class = b.id','inner')
                                                    ->join('t_professional c','a.professional = c.id')
                                                    ->join('t_grade d','a.grade = d.id')
                                                    ->join('t_project e','a.project = e.id')
                                                    ->where('appoved',1)->paginate(20);
        $page_unappoved=$query_user_unappoved->render();
        $page_appoved=$query_user_appoved->render();
        $this->assign('user_unappoved',$query_user_unappoved);
        $this->assign('user_appoved',$query_user_appoved);
        $this->assign('page_unappoved',$page_unappoved);
        $this->assign('page_appoved',$page_appoved);
        $this->assign('name',$query['name']);
        return $this->fetch('teacher/index');
    }

    public function appoved()
    {
        $request=Request::instance();
        $request_number=$request->param('id');
        $query_number=Db::table('t_user')->where('number',$request_number)->find();
        if ($query_number){
            Db::table('t_user')->where('number',$request_number)->update(['appoved'=>1]);
            $this->success('审核通过');
        }else{
            $this->error('服务器出现错误，请稍后在试！','Teacher/index');
        }
    }

    public function unappoved()
    {
        $request=Request::instance();
        $request_number=$request->param('id');
        $query_number=Db::table('t_user')->where('number',$request_number)->find();
        if ($query_number){
            Db::table('t_user')->where('number',$request_number)->update(['appoved'=>0]);
            $this->success('操作完成！');
        }else{
            $this->error('服务器出现错误，请稍后在试！','Teacher/index');
        }
    }
}