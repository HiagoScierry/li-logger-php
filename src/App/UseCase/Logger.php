<?php

namespace App\UseCase;

use App\Entity\Log;
use App\interfaces\ILog;
use App\interfaces\ILogger;
use App\Constants\Levels;
class Logger implements ILogger
{

  private $log;
  private $levels = [];
  private $encrypt;

  public function __construct($projetctName)
  {
    $this->levels = Levels::LEVEL;
    $this->encrypt = new Encrypt($projetctName);
  } 

  	/**
	 * @return bool
	 */
  private function verifyLevel($currentLevel): bool
  {
    return in_array(strtoupper($currentLevel), $this->levels);
  }


  public function makeLog($currentLevel, $message, $evidence = '', $stacktrace = ''): void
  {    
    if (!$this->verifyLevel($currentLevel)) {
      var_dump($currentLevel);
      throw new \Exception('Invalid log level');
    }


    $date = date(DATE_ATOM);
    $level = strtoupper($currentLevel);

    $this->log = new Log($message, $date, $level, $evidence, $stacktrace);

  }


	/**
	 * @return ILog
	 */
  public function outputLogObject(): ILog
  {
    return $this->log;
  }

  public function outputLogInSpecificObject(): Array
  {
    return array(
      'parse_json' => 'true',
      'message' => $this->log->getMessage(),
      '@timestamp' => $this->log->getDate(),
      'level' => $this->log->getlevel(),
      'evidence' => $this->encrypt->encryptToB64($this->log->getEvidence()),
      'stacktrace' => $this->encrypt->encryptToMD5($this->log->getStacktrace()) 
    );
  }

}