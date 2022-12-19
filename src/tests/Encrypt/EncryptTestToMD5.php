<?php
use App\UseCase\Encrypt;
use PHPUnit\Framework\TestCase;
  class EncryptTestToMD5 extends TestCase {

    private $projectName = 'ExampleProjectName';

    public function testToMD5IfEmpty() {
      //arrange
      $emptyString = '';

      //act 
      $encrypt = new Encrypt($this->projectName);
      $result = $encrypt->encryptToMD5($emptyString);

      //assert
      $this->assertEquals('-', $result);

    }

    public function testToMD5IfNotEmpty() {
      //arrange
      $notEmptyString = 'EXAMPLE_STRING_CASE';

      //act 
      $encrypt = new Encrypt($this->projectName);
      $result = $encrypt->encryptToMD5($notEmptyString);

      //assert
      $this->assertEquals($this->projectName.':ae53bcdcd64138444e14215322d501ec', $result);

    }

    
  }