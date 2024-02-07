# Logutil
Logutil is a logging utility for PHP.

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
You need to have PHP installed on your machine. Also, you need to install the dependencies of the project using Composer.

## Installation
You can install LogUtil via Composer. Run the following command in your project directory:

```sh
composer require hpz937/logutil
```

### Usage
You can use the Log class from the Hpz937\Logutil namespace to log messages. Here's an example:

```php
<?php
use Hpz937\Logutil\Log;

Log::info('This is an informational message');
Log::error('This is an error message');
?>
```

You can also set the log file path and the execution environment (CLI or not) using the setLogFile and setRunFromCli methods respectively.

### Running the tests
Explain how to run the automated tests for this system.

### Deployment
Add additional notes about how to deploy this on a live system.

### Built With
- adhocore/cli - Command line interface library for PHP

### License
This project is licensed under the MIT License - see the LICENSE file for details
