<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require "src/ciphers/AtBashCipher.php";

final class AtBashCipherTest extends TestCase
{
    private AtBashCipher $atBashCipher;

    public function setUp(): void
    {
        $this->atBashCipher = new AtBashCipher();
    }

    /**
     * @dataProvider validEncryptInputProvider
     */  
    public function testEncryptValidInput($input, $validResult): void
    {
        $result = $this->atBashCipher->encrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validEncryptInputProvider(): array
    {
        return [
            [
                'ala ma kota',
                'zoz nz plgz'
            ],
            [
                'a',
                'z'
            ],
            [
                'b',
                'y'
            ],
            [
                'c',
                'x'
            ],
            [
                'x',
                'c'
            ],
            [
                'y',
                'b'
            ],
            [
                'z',
                'a'
            ],
            
        ];
    }

    
    /**
     * @dataProvider validDencryptInputProvider
     */  
    public function testDencryptValidInput($input, $validResult): void
    {
        $result = $this->atBashCipher->decrypt($input);
        $this->assertSame($validResult, $result);
    }

    public static function validDencryptInputProvider(): array
    {
        return [
            [
                'zoz nz plgz',
                'ala ma kota',
            ],
            [
                'z',
                'a',
            ],
            [
                'y',
                'b',
            ],
            [
                'x',
                'c',
            ],
            [
                'c',
                'x',
            ],
            [
                'b',
                'y',
            ],
            [
                'a',
                'z',
            ],
            
        ];
    }
}