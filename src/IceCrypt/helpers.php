<?php

if (! function_exists('ice_encrypt')) {
	function ice_encrypt($string, $key, $binarySafe)
	{
		return \IceCrypt\IceCrypt::encrypt($string, $key, $binarySafe);
	}
}

if (! function_exists('ice_decrypt')) {
	function ice_encrypt($string, $key, $binarySafe)
	{
		return \IceCrypt\IceCrypt::decrypt($string, $key, $binarySafe);
	}
}
