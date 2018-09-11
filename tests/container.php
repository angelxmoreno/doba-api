<?php

use DI\ContainerBuilder;
use function DI\get;

$builder = new ContainerBuilder();
$builder->addDefinitions([
    'test_user' => 'mikeb',
    'test_password' => 'password',
    'test_retailer_id' => '1765191',
    'api' => function () {
        return \Axm\DobaApi\Factory::buildApi(
            get('test_user'),
            get('test_password'),
            get('test_retailer_id')
        );
    }
]);

try {
    $container = $builder->build();
} catch (\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
    exit(0);
}

return $container;
