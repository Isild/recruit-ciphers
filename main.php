<?php

require "src/ciphers/CaesarCipher.php";
require "src/ciphers/AtBashCipher.php";
require "src/ciphers/BaconCipher.php";

// CaesarCipher
$caesar = new CaesarCipher(29);
$textTest1 = 'a testuje to wxyz';

$encrypt1 = $caesar->encrypt($textTest1);
$decrypt1 = $caesar->decrypt($encrypt1);

echo "testing text: " . $textTest1 . "\n";
echo "caesar encryption: " . $encrypt1 . "\n";
echo "caesar decryption: " . $decrypt1 . "\n";
echo "\n###\n\n";

// AtBashCipher
$textTest2 = 'ala ma kota';

$atBash = new AtBashCipher();

$encrypt2 = $atBash->encrypt($textTest2);
$decrypt2 = $atBash->decrypt($encrypt2);

echo "testing text: " . $textTest2 . "\n";
echo "atBash encryption: " . $encrypt2 . "\n";
echo "atBash decryption: " . $decrypt2 . "\n";
echo "\n###\n\n";

// BaconCipher
$textTest3 = 'zala ma kota';

$bacon = new BaconCipher();

$encrypt3 = $bacon->encrypt($textTest3);
$decrypt3 = $bacon->decrypt($encrypt3);

echo "testing text: " . $textTest3 . "\n";
echo "bacon encryption: " . $encrypt3 . "\n";
echo "bacon decryption: " . $decrypt3 . "\n";