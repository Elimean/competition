<?php
/**
 * Created by PhpStorm.
 * User: dongyucheng
 * Date: 2018/10/18
 * Time: 10:53 PM
 */

namespace app\index\controller;
use think\Controller;
use think\Db;

class Lists extends Controller
{
    public function index()
    {
        $query=Db::table('t_user')->alias('a')->join('t_class b','a.class = b.id','inner')
            ->join('t_professional c','a.professional = c.id')
            ->join('t_grade d','a.grade = d.id')
            ->join('t_project e','a.project = e.id')->paginate(50);
        $this->assign('name',$query);
        return $this->fetch('index/lists');
    }
}