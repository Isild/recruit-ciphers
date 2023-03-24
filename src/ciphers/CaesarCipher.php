<?php
include_once "src/ciphers/CiphersContract.php";

class CaesarCipher implements CiphersContract
{
    private $shift;

    public function __construct($shift = 10)
    {
        $this->shift = $shift;
    }

    public function encrypt(string $input):string
    {
        $output = "";

        foreach(str_split($input) as $char){
            if(ord($char)>=97 && ord($char) <= 122) {
                $charInt = ord($char) + $this->shift % 26;

                if($charInt > 122) {
                    $charInt = $charInt % 122 + 97 - 1;
                }
    
                $output .= chr($charInt);
            } else {
                $output .= $char;
            }
        }

        return $output;
    }

    public function decrypt(string $input):string
    {
        $output = "";

        foreach(str_split($input) as $char){
            if(ord($char)>=97 && ord($char) <= 122) {
                $charInt = ord($char) - $this->shift % 26;

                if($charInt < 97) {
                    $charInt = 122 - (97 - $charInt) + 1;
                }
    
                $output .= chr($charInt);
            } else {
                $output .= $char;
            }
        }

        return $output;
    }
}