<?php

require __DIR__ . '/vendor/autoload.php';

use App\UseCase\Logger;



echo "INFO LOG \n";
$logger = new Logger();
$logger->info('Teste de log', 'evidence', array());

echo "ERROR LOG \n";

$logger->error('Teste de log', 'evidence', 'stacktrace', array());