<?php

if (! function_exists('ice_encrypt')) {
    function ice_encrypt($string, $key, $binarySafe = true)
    {
        return \IceCrypt\IceCrypt::encrypt($string, $key, $binarySafe);
    }
}

if (! function_exists('ice_decrypt')) {
    function ice_decrypt($string, $key, $binarySafe = true)
    {
        return \IceCrypt\IceCrypt::decrypt($string, $key, $binarySafe);
    }
}
