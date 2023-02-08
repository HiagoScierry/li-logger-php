<?php

namespace App\UseCase;

use App\Entity\Log;
use App\interfaces\ILog;
use App\interfaces\ILogger;

class Logger implements ILogger
{
  private $log;
  private $appName;


  public function __construct()
  {
    $this->appName = $_ENV['APP_NAME'] ? $_ENV['APP_NAME'] : 'ExampleApp';
  }

  /**
   * @param string $message
   * @param string $evidence
   * @param array $optionals
   * 
   * @return ILog
   */
  public function info(string $message, string $evidence = "", array $optionals): void
  {
    $this->log = new Log($message, date('Y-m-d'), 'INFO', $this->createHash($evidence), '', $optionals);
    print(json_encode($this->outputLog()));
    // echo "\n";
  }

  /**
   *
   * @param string $message
   * @param string $evidence
   * @param string $stacktrace
   * @param array $optionals
   * @return ILog
   */
  public function error(string $message, string $evidence = "", string $stacktrace, array $optionals): void
  {
    $this->log = new Log($message, date('Y-m-d'), 'ERROR', $this->createHash($evidence), $this->createHash($stacktrace), $optionals);
    print(json_encode($this->outputLog()));
  }

  private function createHash($content): string
  {
    $contentInB64 = base64_encode($content);
    $contentInMD5 = md5($contentInB64);

    $jsonContent = json_encode(
      array(
        'app' => $this->appName,
        'hash' => $contentInMD5,
        'content' => $contentInB64,
        'parse_evidence' => 'true',
        'parse_json' => 'true',
      )
    );

    print($jsonContent);

    return $this->appName . ":" . $contentInMD5;
  }

  private function outputLog(): array
  {
    return array(
      'parse_json' => 'true',
      'message' => $this->log->getMessage(),
      '@timestamp' => $this->log->getDate(),
      'level' => $this->log->getlevel(),
      'evidence' => $this->log->getEvidence(),
      'stacktrace' => $this->log->getStacktrace(),
      'optionals' => $this->log->getOptionals(),
    );
  }

}