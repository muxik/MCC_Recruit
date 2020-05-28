<?php


namespace app\index\controller;

use think\Console;
use think\Controller;

class Student extends Controller
{
    public function setInfo() {
        if (request()->isAjax()){
            $file = request()->file('file');
            if (!$file) $this->error("请上传图片");
            $info = $file->validate(['size'=>50550500,'ext'=>'jpg,png,gif,jpeg'])->move( '../public/uploads');

            if ($info) {
                $data = [
                    'pic' => $info->getSaveName(),
                    'name' => input('name'),
                    'sex' => input('sex'),
                    'age' => input('age'),
                    'class' => input('class'),
                    'class_teacher' => input('class_teacher'),
                    'phone' => input('phone'),
                    'interest' => input('interest'),
                    'comment' => input('comment'),
                ];
                $result = model('Student')->writeInfo($data);
                if ($result == 1) {
                    $this->success("提交成功",'/');
                } else {
                    $this->error($result);
                }
            } else{
                return $file->getError();
            }
        }
    }
}
