<?php
/**
 * @var Kahlan\Cli\Kahlan $this
 */

use Kahlan\Filter\Filters;

include __DIR__ .'/vendor/autoload.php';


$spec_dir = implode(DS, [
    __DIR__,
    'tests'
]);

/** @var \Kahlan\Cli\CommandLine $commandLine */
$commandLine = $this->commandLine();
$commandLine->option('spec', 'default', $spec_dir);
$commandLine->option('cc', 'default', true);
$commandLine->option('reporter', 'default', 'verbose');

$container = require __DIR__ . '/tests/container.php';
Filters::apply($this, 'run', function ($next) use ($container) {
    $scope = $this->suite()->root()->scope(); // The top most describe scope.
    $scope->container = $container;

    return $next();
});
