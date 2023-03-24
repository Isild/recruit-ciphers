<?php
include_once "src/ciphers/CiphersContract.php";

class AtBashCipher implements CiphersContract
{
    public function __construct()
    {
        //
    }

    public function encrypt(string $input):string
    {
        $output = "";

        foreach(str_split($input) as $char){
            if(ord($char)>=97 && ord($char) <= 122) {
                $charInt = 122 - (ord($char) - 97);

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
                $charInt = 97 + (122 - ord($char));
    
                $output .= chr($charInt);
            } else {
                $output .= $char;
            }
        }

        return $output;
    }
}