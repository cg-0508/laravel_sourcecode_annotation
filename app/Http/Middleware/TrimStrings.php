<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * 排除指定字段名（key）的值，即以下面为 key 的 value 将不进行空白字符清理
     *
     * @var array
     */
    protected $except = [
        'password',
        'password_confirmation',
    ];
}
