<?php

namespace app\common\validate;



use think\Validate;

class Admin extends Validate
{
    protected $rule = [
        'username|用户名'  =>  'require',
        'password|密码' =>  'require',
    ];
}
