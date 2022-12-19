<?php

require __DIR__ . '/vendor/autoload.php';

use App\UseCase\Encrypt;
use App\UseCase\Logger;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$logger = new Logger("ExampleProjectName");

$logger->makeLog('info', 'This is a message', 'This is a evidence', 'This is a stacktrace');

$log = $logger->outputLogInSpecificObject();

var_dump($log);