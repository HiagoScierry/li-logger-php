<?php

use App\UseCase\Logger;
use PHPUnit\Framework\TestCase;


class LoggerTest extends TestCase
{

  public function testInfoLog()
  {

    // Arrange
    $logger = new Logger();

    $outputDate = date('Y-m-d');
    $outPutString = '{"app":"PROJECT_NAME","hash":"b317f3a1e1ec146d8923adb2bd02186c","content":"ZXZpZGVuY2U=","parse_evidence":"true","parse_json":"true"}{"parse_json":"true","message":"TestMessage","@timestamp":"' . $outputDate . '","level":"INFO","evidence":"PROJECT_NAME:b317f3a1e1ec146d8923adb2bd02186c","stacktrace":"","optionals":{"test":"test"}}';

    // Act
    $logger->info('TestMessage', 'evidence', array('test' => 'test'));

    // Assert
    $this->expectOutputString('{"app":"PROJECT_NAME","hash":"b317f3a1e1ec146d8923adb2bd02186c","content":"ZXZpZGVuY2U=","parse_evidence":"true","parse_json":"true"}');
    $this->expectOutputString($outPutString);
  }

  public function testErrorLog()
  {
    // Arrange
    $logger = new Logger();

    $outputDate = date('Y-m-d');
    $outPutString = '{"app":"PROJECT_NAME","hash":"b317f3a1e1ec146d8923adb2bd02186c","content":"ZXZpZGVuY2U=","parse_evidence":"true","parse_json":"true"}{"app":"PROJECT_NAME","hash":"09ff4e76715abf9dddb956721cdd2183","content":"c3RhY2t0cmFjZQ==","parse_evidence":"true","parse_json":"true"}{"parse_json":"true","message":"TestMessage","@timestamp":"' . $outputDate . '","level":"ERROR","evidence":"PROJECT_NAME:b317f3a1e1ec146d8923adb2bd02186c","stacktrace":"PROJECT_NAME:09ff4e76715abf9dddb956721cdd2183","optionals":{"test":"test"}}';

    // Act
    $logger->error('TestMessage', 'evidence', 'stacktrace', array('test' => 'test'));

    // Assert
    $this->expectOutputString('{"app":"PROJECT_NAME","hash":"b317f3a1e1ec146d8923adb2bd02186c","content":"ZXZpZGVuY2U=","parse_evidence":"true","parse_json":"true"}{"app":"PROJECT_NAME","hash":"09ff4e76715abf9dddb956721cdd2183","content":"c3RhY2t0cmFjZQ==","parse_evidence":"true","parse_json":"true"}{"parse_json":"true","message":"TestMessage","@timestamp":"' . $outputDate . '","level":"ERROR","evidence":"PROJECT_NAME:b317f3a1e1ec146d8923adb2bd02186c","stacktrace":"PROJECT_NAME:09ff4e76715abf9dddb956721cdd2183","optionals":{"test":"test"}}');



  }


}