<?php

namespace app\manage\validate;

use app\common\validate\Validate;

class OutCarValidate extends Validate
{

    /**
     * @var array
     */
    protected $rule = [
        'wofang_id|我房网第三方Id'  =>  ['require','unique:out_car,wofang_id'],
    ];

    /**
     * @var array
     */
    protected $message = [
        'wofang_id.require'  =>  ':attribute 不能为空',
        'wofang_id.unique'  =>  ':attribute 已存在',
    ];

    /**
     * @var array
     */
    protected $scene = [
        'sync'   =>  ['wofang_id'],
        'create'   =>  ['wofang_id'],
        'update'  =>  ['wofang_id'],
        'save'  =>  [],
        'not'  =>  [],
    ];

}