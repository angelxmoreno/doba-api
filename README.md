# Doba API

A PHP library for interacting with the Doba API

[![Build Status](https://travis-ci.com/angelxmoreno/doba-api.svg?branch=master)](https://travis-ci.com/angelxmoreno/doba-api)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/ddaf821f9634457f8cb8cd66bec406c8)](https://www.codacy.com/app/angelxmoreno/doba-api?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=angelxmoreno/doba-api&amp;utm_campaign=Badge_Grade)
[![Maintainability](https://api.codeclimate.com/v1/badges/912a9093e06bae1573b9/maintainability)](https://codeclimate.com/github/angelxmoreno/doba-api/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/912a9093e06bae1573b9/test_coverage)](https://codeclimate.com/github/angelxmoreno/doba-api/test_coverage)
[![License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.txt)
[![Minimum PHP Version](http://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg)](https://php.net/)

## Features

- Make calls to the Doba API
- PSR6 cache for faster responses
- Objects as responses
- Uses Guzzle to reduce complexity and increase compatibility when cURL is not available 

## Examples

```php
$ordersApi->getOrders();
$ordersApi->getOrders([
    'limit' => 4
]);
```

## Requirements

- PHP >=7.1

## Installation

You can install this library using [composer](http://getcomposer.org).

The recommended way to install as a composer package:

```sh
composer require angelxmoreno/doba-api
```

## Setup


## Reporting Issues
If you have a problem with this library please open an issue on [GitHub](https://github.com/angelxmoreno/cakephp-linked-entities/issues).

## License
This code is offered under an [MIT license](https://opensource.org/licenses/mit-license.php).
