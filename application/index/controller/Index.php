<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    public function index()
    {
        return view('index/index');
    }

    public function project()
    {
        return view('index/project');
    }

    public function rules()
    {
        return view('index/rules');
    }

    public function apply()
    {
        return view('index/apply');
    }

    public function about()
    {
        return view('index/about');
    }


    public function adminindex()
    {
        return view('admin/index');
    }

    public function ad()
    {
        return view('admin/ad');
    }

    public function usermanager()
    {
        return view('admin/usermanager');
    }

    public function contestantslist()
    {
        return view('admin/contestantslist');
    }
}
