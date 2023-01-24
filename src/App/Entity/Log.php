<?php

namespace App\Entity;

use App\interfaces\ILog;

class Log implements ILog
{
  private $message = '';
  private $date;
  private $level = '';
  private $evidence;
  private $stacktrace;

  private $optionals;
  /**
   * @param mixed $message 
   * @param mixed $date 
   * @param mixed $level 
   * @param mixed $project 
   * @param mixed $evidence
   * @param mixed $stacktrace
   * @param array $optionals
   */
  public function __construct($message, $date, $level, $evidence, $stacktrace, $optionals = array())
  {
    $this->message = $message;
    $this->date = $date;
    $this->level = $level;
    $this->evidence = $evidence;
    $this->stacktrace = $stacktrace;
    $this->optionals = $optionals;
  }

  /**
   * @return string 
   */

  public function getMessage(): string
  {
    return $this->message;
  }

  /**
   * @return string 
   */
  public function getDate(): string
  {
    return $this->date;
  }

  /**
   * @return int 
   */

  public function getLevel(): string
  {
    return $this->level;
  }

  /**
   * @return string 
   */
  public function getEvidence(): string
  {
    return $this->evidence;
  }

  /**
   * @return string 
   */
  public function getStacktrace(): string
  {
    return $this->stacktrace;
  }

  /**
   * @return array 
   */
  public function getOptionals(): array
  {
    return $this->optionals;
  }

}