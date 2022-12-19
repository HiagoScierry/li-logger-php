<?php

namespace App\interfaces;

interface IEncrypt
{
  public function encryptToMD5($data): string;
  public function encryptToB64($data): string;
}