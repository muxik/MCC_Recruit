<?php


namespace app\common\validate;


use think\Validate;

class Student extends Validate
{
    protected $rule = [
        'pic|图片' => 'require',
        'name|名字' => 'require|max:6',
        'age|年龄' =>  'require|number',
        'sex|性别' =>  'require|max:1',
        'class|班级' => 'require',
        'class_teacher|班主任' => 'require',
        'phone|手机号' => 'require|number|length:11',
        'interest|兴趣爱好' => 'require',
        'comment|自我评价' => 'require'
    ];
}
