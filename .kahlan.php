<?php
/**
 * @var Kahlan\Cli\Kahlan $this
 */

use Kahlan\Filter\Filters;

$spec_dir = implode(DS, [
    __DIR__,
    'tests',
    'Unit'
]);

/** @var \Kahlan\Cli\CommandLine $commandLine */
$commandLine = $this->commandLine();
$commandLine->option('spec', 'default', $spec_dir);
$commandLine->option('cc', 'default', true);
$commandLine->option('reporter', 'default', 'verbose');

Filters::apply($this, 'run', function ($chain) {
    $container = require __DIR__ . '/tests/container.php';
    $scope = $this->suite()->root()->scope();
    $scope->container = $container;

    return $chain();
});