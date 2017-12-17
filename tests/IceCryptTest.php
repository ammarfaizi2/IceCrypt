<?php

namespace Tests;

use IceCrypt\IceCrypt;
use PHPUnit\Framework\TestCase;

class IceCryptTest extends TestCase
{
	public function testBinarySafe()
	{
		for ($i=0; $i < 2000; $i++) { 
			$string = self::randString($i);
			$key	= self::randString(rand(32, 64));
			$encryptedString = IceCrypt::encrypt($string, $key);
			$this->assertEquals(
				IceCrypt::decrypt($encryptedString, $key), $string
			);
		}
	}

	public function testNonBinarySafe()
	{
		for ($i=0; $i < 2000; $i++) { 
			$string = self::randString($i);
			$key	= self::randString(rand(32, 64));
			$encryptedString = IceCrypt::encrypt($string, $key, false);
			$this->assertEquals(
				IceCrypt::decrypt($encryptedString, $key, false), $string
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