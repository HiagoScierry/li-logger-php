<?php

use App\UseCase\Logger;
use PHPUnit\Framework\TestCase;


class LoggerTest extends TestCase {

  private $projectName = 'ExampleProjectName';

  public function testIfClassCreateLogObject(){
    //arrange
    $currentLevel = 'info';
    $message = 'test';
    $evidence = 'test';
    $stacktrace = 'test';

    //act
    $logger = new Logger($this->projectName);
    $logger->makeLog($currentLevel, $message, $evidence, $stacktrace);
    $result = $logger->outputLogObject();

    //assert
    $this->assertInstanceOf('App\Entity\Log', $result);
  }

  public function testIfClassCreateLogObjectWithCorrectValues(){
    //arrange
    $currentLevel = 'info';
    $message = 'test';
    $evidence = 'test';
    $stacktrace = 'test';

    //act
    $logger = new Logger($this->projectName);
    $logger->makeLog($currentLevel, $message, $evidence, $stacktrace);
    $result = $logger->outputLogObject();

    //assert
    $this->assertEquals($message, $result->getMessage());
    $this->assertEquals(strtoupper($currentLevel), $result->getLevel());
    $this->assertEquals($evidence, $result->getEvidence());
    $this->assertEquals($stacktrace, $result->getStacktrace());
  }

  public function testIfHasCorrectSpecificObjectInReturn(){
    //arrange
    $currentLevel = 'info';
    $message = 'test';
    $evidence = 'test';
    $stacktrace = 'test';

    //act
    $logger = new Logger($this->projectName);
    $logger->makeLog($currentLevel, $message, $evidence, $stacktrace);
    $result = $logger->outputLogInSpecificObject();

    //assert
    $this->assertArrayHasKey('parse_json', $result);
    $this->assertArrayHasKey('message', $result);
    $this->assertArrayHasKey('@timestamp', $result);
    $this->assertArrayHasKey('level', $result);
    $this->assertArrayHasKey('evidence', $result);
  }

}