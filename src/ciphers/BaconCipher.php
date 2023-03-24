<?php
include_once "src/ciphers/CiphersContract.php";

class BaconCipher implements CiphersContract
{
    public function __construct()
    {
        //
    }

    /**
     * Version with different value for each char
     */
    public function encrypt(string $input):string
    {
        $output = "";

        foreach (str_split($input) as $char){
            if (ord($char) >= 97 && ord($char) <= 122) {
                $charIntAsString = (string)decbin(ord($char) - 97);

                if (strlen($charIntAsString) < 5) {
                    $repeats = (5 - strlen($charIntAsString));

                    for ($i=0; $i<$repeats; $i+=1){
                        $charIntAsString = '0' . $charIntAsString;
                    }

                }
                
                $output .= str_replace('0','a', str_replace('1', 'b', $charIntAsString));
            } else {
                $output .= $char;
            }
        }

        return $output;
    }

    public function decrypt(string $input):string
    {
        $output = "";

        $newInput = str_replace('a','0', str_replace('b', '1', $input));
        
        $words = explode(' ', $newInput);
        $it = 0;
        foreach ($words as $word) {
            while ($word) {
                $singleCharBits = substr($word, 0, 5);
                $chartFigure = chr(bindec($singleCharBits) + 97);
                $word = substr($word, 5);

                $output .= $chartFigure;
            }
            
            $it += 1;

            if (count($words) > $it){
                $output .= " ";
            }
        }

        return $output;
    }
}