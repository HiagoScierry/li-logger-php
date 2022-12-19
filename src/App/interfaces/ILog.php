<?php 

namespace App\interfaces;
interface ILog {
  
  public function __construct($message, $date, $level, $evidence, $stacktrace);
 
  public function getMessage(): string;
  
  public function getDate(): string;
  
  public function getLevel(): string;
  
  public function getEvidence(): string;
  
  public function getStacktrace(): string;

  
}