# Php-pulse

Php-pulse is a library for PHP that provides a set of interfaces for healthcheck and monitoring.

[![PHP Composer](https://github.com/vesh95/php-pulse/actions/workflows/test.yml/badge.svg)](https://github.com/vesh95/php-pulse/actions/workflows/test.yml)

## Installation

To install Php-pulse, run the following command:

```
composer require vesh95/heartbeat
```

## Usage

To use Php-pulse, create a new instance of the `HealthcheckRunner` class and add checks to it. Then, run the checks by
calling the `run()` method.

```php
use PhpPulse\Healthcheck\HealthcheckRunner;
use PhpPulse\Check\CheckInterface;

$runner = new HealthcheckRunner();
$runner->append(new CheckInterface());
$results = $runner->run();
```

The `run()` method returns a `ResultsCollection` object that contains the results of the checks.

## Contributing

Contributions are welcome. Please see the [contributing guide](CONTRIBUTING.md) for more information.

## License

Php-pulse is licensed under the MIT License. See the [license file](LICENSE.md) for more information.