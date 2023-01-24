<?php

namespace App\interfaces;

use App\interfaces\ILog;

interface ILogger
{
  public function info(string $message, string $evidence = "", array $optionals): void;
  public function error(string $message, string $evidence = "", string $stacktrace, array $optionals): void;

}