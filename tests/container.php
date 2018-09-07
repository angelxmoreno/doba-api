<?php

use Axm\DobaApi\Api\OrdersApi;
use Axm\DobaApi\Auth;
use Axm\DobaApi\Request;
use DI\ContainerBuilder;
use function DI\create;
use function DI\get;
use GuzzleHttp\Client;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    'test_user' => 'mikeb',
    'test_password' => 'password',
    'test_retail_id' => '1765191',
    Auth::class => create()->constructor(
        get('test_user'),
        get('test_password'),
        get('test_retail_id')
    ),
    'HttpClient' => create(Client::class),
    Request::class => create()->constructor(
        get(Auth::class),
        get('HttpClient'),
        new \Symfony\Component\Cache\Simple\FilesystemCache()
    ),
    OrdersApi::class => create()->constructor(get(Request::class)),
    ProductsApi::class => create()->constructor(get(Request::class)),
]);

try {
    $container = $builder->build();
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(0);
}

return $container;
