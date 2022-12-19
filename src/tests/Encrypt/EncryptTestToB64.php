<?php
use App\UseCase\Encrypt;
use PHPUnit\Framework\TestCase;

class EncryptTestToB64 extends TestCase {
  public function testToB64IfEmpty() {
    //arrange
    $emptyString = '';

    //act 
    $encrypt = new Encrypt();
    $result = $encrypt->encryptToB64($emptyString);

    //assert
    $this->assertEquals('-', $result);

  }

  public function testToB64IfNotEmpty() {
    //arrange
    $notEmptyString = 'EXAMPLE_STRING_CASE';

    //act 
    $encrypt = new Encrypt();
    $result = $encrypt->encryptToB64($notEmptyString);

    //assert
    $this->assertEquals('RVhBTVBMRV9TVFJJTkdfQ0FTRQ==', $result);

  }
}