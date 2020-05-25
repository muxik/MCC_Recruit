<?php

namespace app\common\model;

use think\Model;

class Admin extends Model
{
    protected $table = "admin";

    public function dologin($date)
    {
        $validate = new \app\common\validate\Admin();
        if (!$validate->check($date)) {
            return $validate->getError();
        }
        $result = $this->where($date)->find();

        if ($result) {
            $sessionData = [
                'id' => $result['id'],
                'username' => $result['username']
            ];
            session('admin', $sessionData);
            return 1;
        } else {
            return "登录失败";
        }
    }
}
