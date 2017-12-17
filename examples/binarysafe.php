<?php

require __DIR__ . "/../src/IceCrypt/IceCrypt.php";

use IceCrypt\IceCrypt;

$string = "Hello World!";
$key	= "secret12345";

// encrypt
$encrypted_string = IceCrypt::encrypt($string, $key);
echo "Encrypted string : " . $encrypted_string . "\n";

// decrypt
$decrypted_string = IceCrypt::decrypt($encrypted_string, $key);
echo "Decrypted string : " . $decrypted_string . "\n";
