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
            $info = $file->move( '../public/uploads');

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

    public function demo(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        $name = input('name');
        echo  $name . "<br/>";
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../public/uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension() . "<br/>";
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName() . "<br/>";
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getFilename() . "<br/>";
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}
