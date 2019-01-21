<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));


require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// 解析出在服务容器 bindings 属性中以 'Illuminate\Contracts\Http\Kernel' 为键，对应的服务对象。
// 注意：以 'Illuminate\Contracts\Http\Kernel' 为键，实际对应不是 'App\Http\Kernel' 的类对象，
// 而是对应能够生成 'App\Http\Kernel' 类对象的闭包函数。
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);


$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
