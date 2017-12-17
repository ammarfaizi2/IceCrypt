# IceCrypt PHP Encryption



# Installation
`composer require ammarfaizi2/icecrypt`



# Example
```php
<?php
require __DIR__ . "/vendor/autoload.php";

use IceCrypt\IceCrypt;

$string = "Hello World!";
$key	= "secret12345";

// encrypt
$encrypted_string = IceCrypt::encrypt($string, $key);
echo "Encrypted string : " . $encrypted_string . "\n";

// decrypt
$decrypted_string = IceCrypt::decrypt($encrypted_string, $key);
echo "Decrypted string : " . $decrypted_string . "\n";
```


# LICENSE
Licensed under the <a href="https://github.com/ammarfaizi2/IceCrypt/blob/master/LICENSE">MIT License</a>