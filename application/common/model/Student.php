<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Student extends Model
{
    protected $table = 'student';

    use SoftDelete;

    public function writeInfo($data)
    {
        $validate = new \app\common\validate\Student();
        if (!$validate->check($data)) {
            return $validate->getError();
        }
        $result = $this->allowField(true)->save($data);
        if ($result) {
            return 1;
        } else {
            return '服务器错误请稍后再试';
        }
    }

    public function del($id)
    {
        $studentInfo =  $this->find($id);
        $result = $studentInfo->delete();
        if ($result){
            return 1;
        }else {
            return "删除失败，请稍后再试！";
        }
    }

}
