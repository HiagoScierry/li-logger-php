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

  /**
   * @param mixed $message 
   * @param mixed $date 
   * @param mixed $level 
   * @param mixed $project 
   */
  public function __construct($message, $date, $level, $evidence, $stacktrace)
  {
    $this->message = $message;
    $this->date = $date;
    $this->level = $level;
    $this->evidence = $evidence;
    $this->stacktrace = $stacktrace;
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
  public function getEvidence(): string{
    return $this->evidence;
  }

  /**
   * @return string 
   */
  public function getStacktrace(): string
  {
    return $this->stacktrace;
  }

}