<?php

use Axm\DobaApi\Api;
use Axm\DobaApi\Auth;
use DI\ContainerBuilder;
use GuzzleHttp\Client;
use function DI\create;
use function DI\get;

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
    Client::class => create()->constructor(get(Auth::class)),
    Api::class => create()->constructor(get(Client::class))
]);

try {
    $container = $builder->build();
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(0);
}

return $container;
