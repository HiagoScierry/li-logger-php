<?php

use App\UseCase\Logger;
use PHPUnit\Framework\TestCase;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class LoggerTest extends TestCase {

  public function testInfoLog()
  {
    //ARRANGE 
    $logger = new Logger();

    //ACT
    $logger->info('Teste de log', 'evidence', array());

    //ASSERT
    $this->expectOutputString('{"app":"app","hash":"evidence","content":"ZXZpZWN1dGU=","parse_evidence":"true","parse_json":"true"}');
    $this->expectOutputString('{"message":"Teste de log","date":"2021-03-01 21:00:00","level":"INFO","evidence":"app:evidence","stacktrace":"","optionals":[]}');
  }
          
}