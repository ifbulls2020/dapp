<?php

namespace app\common\model;

use think\Model;

class ContractFollow extends Model
{
    // 表名
    protected $name = 'contract_follow';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;
    
    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;
    
    // 追加属性
    protected $append = [];
}