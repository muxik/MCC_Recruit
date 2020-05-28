<?php

namespace app\admin\controller;

use app\common\model\Student;
use think\Controller;

class Home extends Base
{
    // 后台主页
    public function index()
    {
        $this->assign('student', model('Student')->select());
        return view();
    }

    public function del()
    {
        if (request()->isAjax()){
            $id = input('id');
            $result = model('Student')->del($id);
            if ($result == 1){
                $this->success('删除成功', '');
            }else {
                $this->error($result);
            }
        }
    }

    public function quit()
    {
        if (request()->isAjax()){
            session('admin', null);
            $this->success("退出成功！", "Index/index");
        }
    }

}
