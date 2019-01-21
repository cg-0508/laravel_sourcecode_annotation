<?php

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/
// 实例化 Laravel 服务容器，并调用其构造函数，执行初始化任务
// 从数据类型本质上来说，Laravel 服务容器就是一个类，PHP 解析过程会被实例化为一个对象。
$app = new Illuminate\Foundation\Application(
    realpath(__DIR__.'/../')
);

// 把没有做好的 `App\Http\Kernel` 类的对象，放在 bindings 属性中， `Illuminate\Contracts\Http\Kernel` 这串字符就是标记
$app->singleton(
    Illuminate\Contracts\Http\Kernel::class, // 类名::class : 返回一个标准的类全名（包含从根命名空间到当前空间的路由）
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

// 返回初始化完成的 Laravel 服务容器
return $app;
