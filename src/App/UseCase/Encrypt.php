<?php

namespace App\UseCase;

use App\interfaces\IEncrypt;
class Encrypt implements IEncrypt
{

	public $projectName = '';


	public function __construct($projectName = 'PHP-Logger' )
	{
		$this->projectName = $projectName;
	}

	/**
	 * @param mixed $data
	 * @return string
	 */
	public function encryptToMD5($data): string
	{
		if ($data == '') {
			return '-';
		}

		return $this->projectName . ':' . md5($this->encryptToB64($data));

	}

	/**
	 *
	 * @param mixed $data
	 * @return string
	 */
	public function encryptToB64($data): string
	{
		if ($data == '') {
			return '-';
		}

		return base64_encode($data);
	}
}