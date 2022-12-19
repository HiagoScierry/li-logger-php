<?php

namespace App\interfaces;

use App\interfaces\ILog;
use phpDocumentor\Reflection\Types\Array_;

interface ILogger
{
  public function makeLog($currentLevel, $message): void;

  public function outputLogObject(): ILog;
  public function outputLogInSpecificObject(): Array;
}