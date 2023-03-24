<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require "src/ciphers/CaesarCipher.php";

final class CaesarCipherTest extends TestCase
{
    private CaesarCipher $caesarCipher;

    public function setUp(): void
    {
        $this->caesarCipher = new CaesarCipher(29);
    }

    /**
     * @dataProvider validEncryptInputProvider
     */  
    public function testEncryptValidInput($input, $validResult): void
    {
        $result = $this->caesarCipher->encrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validEncryptInputProvider(): array
    {
        return [
            [
                'a testuje to wxyz',
                'd whvwxmh wr zabc',
            ],
            [
                'a',
                'd',
            ],
            [
                'b',
                'e',
            ],
            [
                'c',
                'f',
            ],
            [
                'x',
                'a',
            ],
            [
                'y',
                'b',
            ],
            [
                'z',
                'c',
            ],
        ];
    }

    /**
     * @dataProvider validDencryptInputProvider
     */  
    public function testDencryptValidInput($input, $validResult): void
    {
        $result = $this->caesarCipher->decrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validDencryptInputProvider(): array
    {
        return [
            
            [
                'd whvwxmh wr zabc',
                'a testuje to wxyz',
            ],
            [
                'd',
                'a',
            ],
            [
                'e',
                'b',
            ],
            [
                'f',
                'c',
            ],
            [
                'a',
                'x',
            ],
            [
                'b',
                'y',
            ],
            [
                'c',
                'z',
            ],
        ];
    }

    
    /**
     * @dataProvider validEncryptInputProviderDifferentShift
     */  
    public function testEncryptValidInputDifferentShift($input, $validResult): void
    {
        $this->caesarCipher = new CaesarCipher(1);

        $result = $this->caesarCipher->encrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validEncryptInputProviderDifferentShift(): array
    {
        return [
            [
                'a testuje to wxyz',
                'b uftuvkf up xyza',
            ],
            [
                'a',
                'b',
            ],
            [
                'b',
                'c',
            ],
            [
                'c',
                'd',
            ],
            [
                'x',
                'y',
            ],
            [
                'y',
                'z',
            ],
            [
                'z',
                'a',
            ],
        ];
    }

    /**
     * @dataProvider validDencryptInputProviderDifferentShift
     */  
    public function testDencryptValidInputDifferentShift($input, $validResult): void
    {
        $this->caesarCipher = new CaesarCipher(1);

        $result = $this->caesarCipher->decrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validDencryptInputProviderDifferentShift(): array
    {
        return [
            [
                'b uftuvkf up xyza',
                'a testuje to wxyz',
            ],
            [
                'b',
                'a',
            ],
            [
                'c',
                'b',
            ],
            [
                'd',
                'c',
            ],
            [
                'y',
                'x',
            ],
            [
                'z',
                'y',
            ],
            [
                'a',
                'z',
            ],
        ];
    }
}