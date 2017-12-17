<?php

namespace Tests;

use IceCrypt\IceCrypt;
use PHPUnit\Framework\TestCase;

class IceCryptTest extends TestCase
{
	public function testBinarySafe()
	{
		for ($i=0; $i < 1000; $i++) { 
			$string = self::randString($i);
			$key	= self::randString(rand(32, 64));
			$encryptedString = IceCrypt::encrypt($string, $key);
			$this->assertEquals(
				IceCrypt::decrypt($encryptedString, $key), $string
			);
		}
	}

	private static function randString($n)
	{
		$r = "";
		for ($i=0; $i < $n; $i++) { 
			$r .= chr(rand(1, 255));
		}
		return $r;
	}
}