<?php


namespace app\admin\controller;

use app\common\model\Admin;
use think\Controller;

class Index extends Controller
{
    // 登录
    public function index() {
        return view();
    }

    public function dologin(){
        if (request()->isAjax()) {
            $data = [
                'username' => input('username'),
                'password' => input('password')
            ];
            $result = model('Admin')->dologin($data);

            if ($result == 1) {
                return $this->success('登录成功', 'home/index');
            }else {
                return $this->error($result);
            }
        }
    }
}
