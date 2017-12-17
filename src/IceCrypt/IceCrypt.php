<?php

namespace IceCrypt;

/**
 * @author Ammar Faizi <ammarfaizi2@gmail.com>
 * @license MIT
 */ 
class IceCrypt
{
    /**
     * @param string    $str
     * @param string    $key
     * @param bool      $binarySafe
     * @return string
     */
    public static function encrypt($str, $key, $binarySafe = true)
    {
        $key = (string) $key;
        $salt = self::makeSalt();
        $key  = sha1($key.$salt);
        $klen = strlen($key);
        $slen = strlen($str);
        $k = $klen - 1;
        $j = 0;
        $h = $slen - 1;
        $r = "";
        for ($i=0; $i < $slen; $i++) {
            $r .= chr(
                ord($str[$i]) ^ ($posibly = ord($key[$j])) ^ ($cost = ord($key[$k])) ^ ($i | (($k & $j) ^ $h)) ^ (($i + $k + $j + $h) % 2) ^ ($cost % 2) ^ ($posibly ^ 2) ^ (($posibly + $cost) % 3) ^ (abs(~$cost + $posibly) % 2)
            );
            $j++;
            $k--;
            $h--;
            if ($j === $klen) {
                $j = 0;
            }
            if ($k === -1) {
                $k = $klen - 1;
            }
            if ($h === 0) {
                $h = $slen - 1;
            }
        }
        return $binarySafe ? strrev(base64_encode($r.$salt)) : $r.$salt;
    }

    /**
     * @param string    $str
     * @param string    $key
     * @param bool      $binarySafe
     * @return string
     */
    public static function decrypt($str, $key, $binarySafe = true)
    {
        $key = (string) $key;
        $str = $binarySafe ? base64_decode(strrev($str)) : $str;
        if (strlen($str) < 6) {
            return false;
        }
        $salt = substr($str, -5);
        $str  = substr($str, 0, -5);
        $key  = sha1($key.$salt);
        $klen = strlen($key);
        $slen = strlen($str);
        $k = $klen - 1;
        $j = 0;
        $h = $slen - 1;
        $r = "";
        for ($i=0; $i < $slen; $i++) {
            $r .= chr(
                ord($str[$i]) ^ ($posibly = ord($key[$j])) ^ ($cost = ord($key[$k])) ^ ($i | (($k & $j) ^ $h)) ^ (($i + $k + $j + $h) % 2) ^ ($cost % 2) ^ ($posibly ^ 2) ^ (($posibly + $cost) % 3) ^ (abs(~$cost + $posibly) % 2)
            );
            $j++;
            $k--;
            $h--;
            if ($j === $klen) {
                $j = 0;
            }
            if ($k === -1) {
                $k = $klen - 1;
            }
            if ($h === 0) {
                $h = $slen - 1;
            }
        }
        return $r;
    }

    /**
     * @return string
     */
    private static function makeSalt()
    {
        $r = "";
        for ($i=0; $i < 5; $i++) {
            $r .= chr(rand(1, 255));
        }
        return $r;
    }
}
